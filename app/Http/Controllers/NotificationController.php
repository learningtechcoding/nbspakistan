<?php

namespace App\Http\Controllers;

use App\Models\NotificationTemplate;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    private $fields = [
        "strings" => [
            "name" => "Enter member name",
            "number" => "Enter member phone number",
            "role" => "Enter member role",
            "cnic" => "Enter member cnic",
            "ref_no" => "Enter reference number"
        ],
        "dates" => [
            "date" => "Choose date"
        ],
        "images" => [
            "image" => "Choose image"
        ]
    ];

    public function index()
    {
        $templates = NotificationTemplate::all();
        return view('admin.notification.main', ['templates' => $templates, 'fields' => $this->fields]);
    }
}
