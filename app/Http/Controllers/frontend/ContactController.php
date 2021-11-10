<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class ContactController extends Controller
{
    public function contact_view(){
        return view('frontend.contact');
    }
    public function contact_post(Request $request){
       // return $request->input();
        $request->validate([

            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required'
        ]);
        $data = array();
        $data['contact_name'] = $request->name;
        $data['contact_email'] = $request->email;
        $data['contact_subject'] = $request->subject;
        $data['contact_message'] = $request->message;
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();

        $query = DB::table('contact')->insert($data);
        return redirect()->back()->with('success','form submitted successfuly');
    }
}
