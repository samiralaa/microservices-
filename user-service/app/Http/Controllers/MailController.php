<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        $code = [
            'title' => 'samir',
            'body' => 'This is for testing email using smtp.'
        ];

        Mail::to('devsamiralzeer243@gmail.com')->send(new DemoMail($code));

        dd("Email is sent successfully.");
    }
}
