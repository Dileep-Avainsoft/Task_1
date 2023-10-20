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

            'name'=>$request->name,
            'email'=>$request->email,
            // 'logo'=>$request->logo,
            'website'=>$request->website,
        ];
                    // ];
        Mail::to('codingcommunity.in@gmail.com')->send(new ContectMail($mail_data));
        return redirect('dashboard') ;
            }
}
