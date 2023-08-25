<?php

namespace App\Http\Controllers;

use App\Models\News;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    private $fields = [
        "textareas" => [
            'title' => "Enter news title"
        ],
        "dates" => [
            'date' => 'Choose date'
        ],
        "images" => [
            "cover" => 'Enter news cover image'
        ],
        "editor" => [
            'text',
            'Enter news description'
        ]
    ];
    private $name = 'news';
    private $table = 'news';
    private $model = News::class;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->model::orderBy('date')->get();
        return view('admin.show', ['fields' => $this->fields, 'data' => $data, 'name' => $this->name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $total = $this->model::all()->count();
        return view('admin.manage', ['fields' => $this->fields, 'name' => $this->name, 'total' => $total]);
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
        $total = $this->model::all()->count();

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
        if (isset($this->fields['dates'])) {
            $dates = $this->fields['dates'];
            foreach ($dates as $key => $value) {
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
        if (isset($this->fields['editor'])) {
            $attr = $this->fields['editor'][0];
            $child[$attr] = $request->input($attr);
        }

        if (isset($this->fields['orderBy'])) {
            $attr = $this->fields['orderBy'][0];
            $position = $request->input($attr);
            $child[$attr] = $request->input($attr);
            if ($position <= $total) {
                DB::update("update $this->table set $attr = $attr + 1 where $attr >= ?", [$position]);
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
        $total = $this->model::all()->count();
        return view('admin.manage', ['fields' => $this->fields, 'name' => $this->name, 'total' => $total, 'child' => $child]);
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
        if (isset($this->fields['dates'])) {
            $dates = $this->fields['dates'];
            foreach ($dates as $key => $value) {
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
        if (isset($this->fields['editor'])) {
            $attr = $this->fields['editor'][0];
            $child[$attr] = $request->input($attr);
        }

        if (isset($this->fields['orderBy'])) {
            $attr = $this->fields['orderBy'][0];
            $position = $request->input($attr);
            if ($position != $child[$attr]) {
                $childPos = $child[$attr];
                $child[$attr] = $request->input($attr);
                if ($position < $childPos) {
                    DB::update("update $this->table set $attr = $attr + 1 where $attr >= ? and $attr < ?", [$position, $childPos]);
                } else {
                    DB::update("update $this->table set $attr = $attr - 1 where $attr > ? and $attr <= ?", [$childPos, $position]);
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
        $total = $this->model::all()->count();
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
        if (isset($this->fields['orderBy'])) {
            $attr = $this->fields['orderBy'][0];
            $childPos = $child[$attr];
            if ($childPos < $total) {
                DB::update("update $this->table set $attr = $attr - 1 where $attr > ?", [$childPos]);
            }
        }
        $child->delete();
        return redirect("/admin/$this->name")->with("message", "$this->name deleted successfully");
    }
}
