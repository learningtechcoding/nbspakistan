<?php

namespace App\Http\Controllers;

use App\Models\NotificationTemplate;
use Exception;
use Illuminate\Http\Request;

class NotificationTemplateController extends Controller
{

    private $fields = [
        "strings" => [
            "template_name" => "Enter template name",
            "president_name" => "Enter president name",
            "website_url" => "Enter website url",
            "contact_email" => "Enter header contact email",
            "contact_phone" => "Enter header single phone",
            "central_president" => "Enter central president name",
        ],
        "textareas" => [
            "pg1" => "Enter body first paragraph",
            "copy_to" => "Enter copy text",
            "regards" => "Enter regards text",
            "address" => "Enter bottom address",
            "contact_numbers" => "Enter bottom multiple phone",
            "bottom_contact_email" => "Enter bottom contact email",
        ]
    ];
    private $name = 'notification-template';

    private $model = NotificationTemplate::class;

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
