<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Mail;
class FrontController extends Controller
{
    public function addFeedback(Request $request)
    {
        $input = $request->all();
        Mail::send('mailfb', array('name'=>$input["name"],'email'=>$input["mail"], 'content'=>$input['message']), function($message){
	        $message->to('nguyentloan13954@gmail.com', 'WiComLab')->subject('Visitor Feedback!')->from($_POST['mail'], 'Visitor');
	    });
        Session::flash('flash_message', 'Send message successfully!');
        return redirect()->route('new')->with(['msg' => 'Add new post successfull']);
    }
}