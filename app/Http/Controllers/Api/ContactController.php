<?php

namespace App\Http\Controllers\Api;

use App\Mail\ContactMessageMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function message() 
    {

        $email = new ContactMessageMail();
        return response()->json('ciao');
    }
}
