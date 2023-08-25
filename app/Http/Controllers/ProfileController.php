<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    private $fields = [
        "strings" => [
            "name" => 'Name field',
        ],
        "images" => [
            "image" => 'Profile image'
        ],
        "passwords" => [
            'password' => 'New password',
            'password_confirmation' => 'Confirm new password',
        ]
    ];
    private $name = 'profile';

    private $model = User::class;


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $child = Auth::user();
        return view('admin.manage', ['fields' => $this->fields, 'name' => $this->name, 'child' => $child]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->has('password') && $request->input('password') != "") {
            $request->validate([
                "password" => ['confirmed', 'min:8']
            ]);
        }
        $child = $this->model::findOrFail(Auth::user()->id);
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
        if (isset($this->fields['passwords'])) {
            if ($request->has("password") && $request->input("password")) {
                $child["password"] = Hash::make($request->input("password"));
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
        return redirect("/$this->name")->with("message", "$this->name updated successfuly");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $child = $this->model::findOrFail(Auth::user()->id);
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
        Auth::logout();
        return redirect("/")->with("message", "Account deleted successfully");
    }
}