<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'auth.superadmin']);
    }
    public function index()
    {
        $registrations = Registration::where("is_accepted", true)->count();

        //General [announcement][latest-news]
        $generalJsonString = Storage::get("/private/general.txt");
        $generalJson = json_decode($generalJsonString, true);
        if ($generalJson) {
            $announcementString = $generalJson["announcement-string"];
            $latestNews = $generalJson["latest-news"];
        } else {
            $announcementString = "";
            $latestNews = "";
        }

        return view('admin.home', ["registrations" => $registrations, "videos" => 0, "members" => 0, "blogs" => 0, "announcementString" => $announcementString, "latestNews" => $latestNews]);
    }

    public function about(Request $request)
    {
        $name = "about";
        if ($request->isMethod('GET')) {
            $data = Storage::get("/private/$name-page.txt");
            return view('admin.page', ['data' => $data, 'name' => $name]);
        } else if ($request->isMethod('PUT')) {
            $request->validate([
                "$name" => ['required']
            ]);
            $data = $request->input($name);
            Storage::put("/private/$name-page.txt", $data);
            return redirect()->back()->with("message", "$name page updated successfuly");
        }
    }
    public function privacy(Request $request)
    {
        $name = "privacy";
        if ($request->isMethod('GET')) {
            $data = Storage::get("/private/$name-page.txt");
            return view('admin.page', ['data' => $data, 'name' => $name]);
        } else if ($request->isMethod('PUT')) {
            $request->validate([
                "$name" => ['required']
            ]);
            $data = $request->input($name);
            Storage::put("/private/$name-page.txt", $data);
            return redirect()->back()->with("message", "$name page updated successfuly");
        }
    }

    public function generalInfoUpdate(Request $request)
    {
        $announcementString = $request->input("announcement-string");
        $latestNews = $request->input("latest-news");

        $generalJsonString = json_encode(["announcement-string" => $announcementString, "latest-news" => $latestNews]);
        if ($generalJsonString) {
            Storage::put("/private/general.txt", $generalJsonString);
        }
        return redirect()->back()->with('message', 'Info updates successfully');
    }

    public function editorImageSave(Request $request)
    {
        $image = $request->file('file');
        if ($image) {
            $fileName = str_replace(' ', '-', round(microtime(true) * 1000) . $image->getClientOriginalName());
            $image->move(public_path() . "/storage/images/editor/", $fileName);
            return json_encode(array('location' => '/storage/images/editor/' . $fileName));
        } else {
            return json_encode(array('error' => true));
        }
    }
}
