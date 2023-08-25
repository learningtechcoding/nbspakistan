<?php

namespace App\Http\Controllers;

use App\Models\CentralCabinet;
use Exception;
use Illuminate\Http\Request;

class CentralCabinetController extends Controller
{
    private $fields = [
        "strings" => [
            "name" => 'Enter member name',
            "position" => 'Enter member position',
            "member_info" => 'Enter member member info',
            "phone" => 'Enter member phone',
            "email" => 'Enter member email',
            "facebook_link" => 'Enter member facebook link',
            "twitter_link" => 'Enter member twitter link'
        ],
        "images" => [
            "image" => 'Enter member image'
        ]
    ];
    private $name = 'central-cabinets';

    private $model = CentralCabinet::class;

    private $type;

    public function __construct()
    {
        $this->type = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))[3];
        $this->name .= "/" . $this->type;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($this->type === "coc") {
            $data = $this->model::where('cabinets_type', 'coc')->get();
        } else if ($this->type === "cc") {
            $data = $this->model::where('cabinets_type', 'cc')->get();
        } else {
            return redirect('/admin') - with('error', 'Not found');
        }
        return view('admin.show', ['fields' => $this->fields, 'data' => $data, 'name' => $this->name]);
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
        $child->cabinets_type = $this->type;

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
