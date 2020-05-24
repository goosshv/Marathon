<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use App\Marathon;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $req) {
        $data = $req->validate([
            'name' => 'required |min:5|max:50',
            'email' => 'required |min:5|max:50|email:rfc,dns',
            'marathon' => 'required'
        ]);
        Mail::to($data['email'])->send( new ContactFormMail($data));
        return redirect()->route('home')->with('success', 'Благодарим вас за поддержку, письмо с реквизитами данного марафона отправлено вам на почту!');
    }
    public function getListMarathon() {
        return view('contact', ['data' => Marathon::all()]);
    }
}
