<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    private $fields = [
        "strings" => [
            "name" => 'Enter person name',
            "email" => 'Enter person email',
        ],
        "passwords" => [
            "password" => 'Enter account password',
        ],
        "images" => [
            "image" => 'Enter person profile image'
        ],
        "spinners" => [
            "type" => [
                "input" => "Choose account type",
                "required" => true,
                "superAdmin" => "Super Admin",
                "admin" => "Province Admin",
            ],
            "province" => [
                "input" => "Choose admin province(optional)",
                "required" => false,
                "" => "Choose any",
                "pb" => "Punjab",
                "tw" => "Twin Cities",
                "kpk" => "K-P-K",
                "sd" => "Sindh",
                "ajk" => "Azad Kashmir",
                "ba" => "Blochistan",
                "gb" => "Gilgith Baltistan"
            ]
        ]
    ];
    private $name = 'accounts';

    private $model = User::class;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = $this->model::all();
        return view('admin.show', ['fields' => $this->fields, 'data' => $slides, 'name' => $this->name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage', ['fields' => $this->fields, 'name' => $this->name]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "email" => ["email", "unique:users"]
        ]);
        $child = new $this->model;

        if (isset($this->fields['integers'])) {
            $integers = $this->fields['integers'];
            foreach ($integers as $key => $value) {
                if ($request->has($key) && $request->input($key)) {
                    $child[$key] = $request->input($key);
                } else {
                    return redirect()->back()->with("error", "$key field is empty");
                }
            }
        }

        if (isset($this->fields['strings'])) {
            $strings = $this->fields['strings'];
            foreach ($strings as $key => $value) {
                if ($request->has($key) && $request->input($key)) {
                    $child[$key] = $request->input($key);
                } else {
                    return redirect()->back()->with("error", "$key field is empty");
                }
            }
        }

        if (isset($this->fields['floats'])) {
            $floats = $this->fields['floats'];
            foreach ($floats as $key => $value) {
                if ($request->has($key) && $request->input($key)) {
                    $child[$key] = $request->input($key);
                } else {
                    return redirect()->back()->with("error", "$key field is empty");
                }
            }
        }

        if (isset($this->fields['textareas'])) {
            $textareas = $this->fields['textareas'];
            foreach ($textareas as $key => $value) {
                if ($request->has($key) && $request->input($key)) {
                    $child[$key] = $request->input($key);
                } else {
                    return redirect()->back()->with("error", "$key field is empty");
                }
            }
        }

        if (isset($this->fields['images'])) {
            $images = $this->fields['images'];
            foreach ($images as $key => $value) {
                $image = $request->file($key);
                if ($image) {
                    $fileName = str_replace(' ', '-', round(microtime(true) * 1000) . $image->getClientOriginalName());
                    $image->move(public_path() . "/storage/images/$this->name/", $fileName);
                    $child[$key] = "$this->name/" . $fileName;
                } else {
                    return redirect()->back()->with("error", "No $key selected");
                }
            }
        }
        if (isset($this->fields['passwords'])) {
            $passwords = $this->fields['passwords'];
            foreach ($passwords as $attr => $input) {
                if ($request->has($attr) && $request->input($attr)) {
                    if (strlen($request->input($attr)) < 8) {
                        return redirect()->back()->with("error", "$attr field must has atleast 8 characters");
                    } else {
                        $child[$attr] = Hash::make($request->input($attr));
                    }
                } else {
                    return redirect()->back()->with("error", "$attr field is empty");
                }
            }
        }
        if (isset($this->fields['spinners'])) {
            $spinners = $this->fields['spinners'];
            foreach ($spinners as $attr => $data) {
                if ($request->has($attr) && $request->input($attr)) {
                    $child[$attr] = $request->input($attr);
                } else {
                    if ($data['required']) {
                        return redirect()->back()->with("error", "$attr field is empty");
                    }
                }
            }
        }

        $child->save();
        return redirect("/admin/$this->name")->with("message", "New $this->name added successfuly");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $child = $this->model::findOrFail($id);
        return view('admin.manage', ['fields' => $this->fields, 'name' => $this->name, 'child' => $child]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $child = $this->model::findOrFail($id);
        if (isset($this->fields['integers'])) {
            $integers = $this->fields['integers'];
            foreach ($integers as $key => $value) {
                if ($request->has($key) && $request->input($key)) {
                    $child[$key] = $request->input($key);
                }
            }
        }

        if (isset($this->fields['strings'])) {
            $strings = $this->fields['strings'];
            foreach ($strings as $key => $value) {
                if ($request->has($key) && $request->input($key)) {
                    $child[$key] = $request->input($key);
                }
            }
        }

        if (isset($this->fields['floats'])) {
            $floats = $this->fields['floats'];
            foreach ($floats as $key => $value) {
                if ($request->has($key) && $request->input($key)) {
                    $child[$key] = $request->input($key);
                }
            }
        }

        if (isset($this->fields['textareas'])) {
            $textareas = $this->fields['textareas'];
            foreach ($textareas as $key => $value) {
                if ($request->has($key) && $request->input($key)) {
                    $child[$key] = $request->input($key);
                }
            }
        }

        if (isset($this->fields['images'])) {
            $images = $this->fields['images'];
            foreach ($images as $key => $value) {
                $image = $request->file($key);
                if ($image) {
                    try {
                        if ($child[$key]) {
                            unlink(public_path() . "/storage/images/$child[$key]");
                        }
                    } catch (Exception $e) {
                    }
                    $fileName = str_replace(' ', '-', round(microtime(true) * 1000) . $image->getClientOriginalName());
                    $image->move(public_path() . "/storage/images/$this->name/", $fileName);
                    $child[$key] = "$this->name/" . $fileName;
                }
            }
        }

        if (isset($this->fields['passwords'])) {
            $passwords = $this->fields['passwords'];
            foreach ($passwords as $attr => $input) {
                if ($request->has($attr) && $request->input($attr)) {
                    $child[$attr] = Hash::make($request->input($attr));
                }
            }
        }
        if (isset($this->fields['spinners'])) {
            $spinners = $this->fields['spinners'];
            foreach ($spinners as $attr => $data) {
                if ($request->has($attr) && $request->input($attr)) {
                    $child[$attr] = $request->input($attr);
                }
            }
        }

        $child->save();
        return redirect("/admin/$this->name")->with("message", "$this->name updated successfuly");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $child = $this->model::findOrFail($id);
        if (isset($this->fields['images'])) {
            $images = $this->fields['images'];
            foreach ($images as $key => $value) {
                try {
                    if ($child[$key]) {
                        unlink(public_path() . "/storage/images/$child[$key]");
                    }
                } catch (Exception $e) {
                }
            }
        }

        $child->delete();
        return redirect("/admin/$this->name")->with("message", "$this->name deleted successfully");
    }
}
