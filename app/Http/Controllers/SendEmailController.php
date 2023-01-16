<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use App\Mail\NotifyMail;


class SendEmailController extends Controller
{

public function index($email)
{
    Mail::to($email)->send(new NotifyMail());
    
    if (Mail::failures()) {
        return response()->Fail('Sorry! Please try again latter');
    }else{
        return response()->success('Great! Successfully send in your mail');
    }
} 
}