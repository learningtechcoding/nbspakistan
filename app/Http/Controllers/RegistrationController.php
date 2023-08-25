<?php

namespace App\Http\Controllers;

use App\Mail\ApplicationAccepted;
use App\Models\NotificationTemplate;
use App\Models\Registration;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class RegistrationController extends Controller
{
    private $name = "registrations";

    private $fields = [
        "strings" => [
            "name" => 'Person Name',
            "email" => 'Person Email',
            "cnic" => 'Person CNIC',
            "phone" => 'Person Phone Number',
            "city" => 'Person City',
        ],
        "images" => [
            "image" => 'Person image'
        ],
        "spinners" => [
            "province" => [
                "tc" => "Twin Cities",
                "pb" => "Punjab",
                "kpk" => "K-P-K",
                "sd" => "Sindh",
                "ajk" => "Azad Kashmir",
                "ba" => "Blochistan",
                "gb" => "Gilgith Baltistan"
            ]
        ]
    ];

    private $model = Registration::class;

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'father-name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'regex:/^03[0-9]{9}$/', 'unique:registrations'],
            'province' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'cnic' => ['required', 'string', 'regex:/^[0-9]{5}-[0-9]{7}-[0-9]$/', 'max:15', 'min:15', 'unique:registrations'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:registrations'],
            'education' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date'],
            'wing-type' => ['required', 'max:255'],
            'image' => ['required']
        ]);

        $newReg = new Registration;
        $newReg["name"] = $request->input("name");
        $newReg["father-name"] = $request->input("father-name");
        $newReg["phone"] = $request->input("phone");
        $newReg["province"] = $request->input("province");
        $newReg["city"] = $request->input("city");
        $newReg["cnic"] = $request->input("cnic");
        $newReg["email"] = $request->input("email");
        $newReg["education"] = $request->input("education");
        $newReg["birthday"] = $request->input("birthday");
        $newReg["occupation"] = $request->input("occupation");
        $newReg["institution"] = $request->input("institution");
        $newReg["wing-type"] = $request->input("wing-type");


        if ($request->has('image') && $request->input('image')) {
            try {
                $image_parts = explode(";base64,", $request->input('image'));
                $image_type = explode("image/", $image_parts[0])[1];
                $image_base64 = base64_decode($image_parts[1]);

                $fileName = str_replace(' ', '-', round(microtime(true) * 1000) . $request->input("name") . '.' . $image_type);
                $imageFullPath = public_path() . "/storage/images/$this->name/" . $fileName;
                file_put_contents($imageFullPath, $image_base64);

                $newReg->image = "$this->name/" . $fileName;
            } catch (Exception $e) {
                return redirect()->back()->with("error", "Image not able to upload");
            }
        }
        $newReg->save();

        return redirect('/register')->with('message', 'Registration application recieved successfuly. We will contact you soon');
    }

    public function index(Request $request)
    {
        if (Auth::user()->type === "superAdmin") {
            $data = $this->model::where('is_accepted', true)->latest()->get();
        } else {
            $data = $this->model::where('is_accepted', true)->where('province', Auth::user()->province)->latest()->get();
        }

        $templates = NotificationTemplate::all();
        return view('registrations.show', ['fields' => $this->fields, 'templates' => $templates, 'data' => $data, 'name' => $this->name]);
    }
    public function new()
    {
        if (Auth::user()->type === "superAdmin") {
            $data = $this->model::where('is_accepted', null)->latest()->get();
        } else {
            $data = $this->model::where('is_accepted', null)->where('province', Auth::user()->province)->latest()->get();
        }

        $templates = NotificationTemplate::all();
        return view('registrations.new', ['fields' => $this->fields, 'templates' => $templates, 'data' => $data, 'name' => $this->name]);
    }
    public function rejects()
    {

        if (Auth::user()->type === "superAdmin") {
            $data = $this->model::where('is_accepted', false)->latest()->get();
        } else {
            $data = $this->model::where('is_accepted', false)->where('province', Auth::user()->province)->latest()->get();
        }

        return view('registrations.rejects', ['fields' => $this->fields, 'data' => $data, 'name' => $this->name]);
    }

    public function show($id)
    {
        $data = $this->model::findOrFail($id);
        return view('registrations.detail', ['data' => $data, 'province' => $this->fields['spinners']['province']]);
    }

    public function accept(Request $request, $id)
    {

        $regRecord = $this->model::findOrFail($id);
        $regRecord->is_accepted = true;
        $regRecord->role = $request->input("reg-role");
        $regRecord->regards = $request->input("reg-template");
        $regRecord->save();

        Mail::to($regRecord->email)->send(new ApplicationAccepted($regRecord, $request->input("reg-file")));

        return redirect('/admin/registrations')->with("message", 'Application accepted successfuly');
    }

    public function uploadFile(Request $request)
    {
        $file = $request->file('file');
        if ($file) {
            $fileReqName = Str::random(200) . "m.pdf";
            $file->move(public_path()."/storage/registrations/", $fileReqName);
            return new JsonResponse(['success' => true, "fileName" => "registrations/" . $fileReqName], 200);
        }
        return new JsonResponse(['success' => false], 500);
    }

    public function reject($id)
    {
        $regRecord = $this->model::findOrFail($id);
        $regRecord->is_accepted = false;
        $regRecord->save();
        return redirect("/admin/registrations")->with("message", 'Application rejected successfuly');
    }

    public function delete($id)
    {
        $child = $this->model::findOrFail($id);
        $image = $child->image;
        if ($image) {
            try {
                unlink(public_path() . "/storage/images/$image");
            } catch (Exception $e) {
            }
        }
        $child->delete();
        return redirect("/admin/$this->name")->with("message", "$this->name deleted successfully");
    }

    /* Notification admin functions */
    public function adminIndex(Request $request)
    {
        $data = $this->model::where('is_accepted', true)->where("notification_created", false)->latest()->get();
        return view('notifyadmin.show', ['fields' => $this->fields, 'data' => $data, 'name' => $this->name]);
    }

    public function adminShow($id)
    {
        $data = $this->model::findOrFail($id);
        return view('notifyadmin.detail', ['data' => $data, 'province' => $this->fields['spinners']['province']]);
    }
    public function adminDelete($id)
    {
        $child = $this->model::findOrFail($id);
        $child->notification_created = true;
        $child->save();
        return redirect("/admin/register-application-notification");
    }
}
