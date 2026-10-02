<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

        public function confirm(Request $request)
    {
        // $contact = $request->only(['name', 'email', 'tel', 'content']);
        return view('contact.confirm');
    }

        public function thanks()
    {
        return view('contact.thanks');
    }

}
