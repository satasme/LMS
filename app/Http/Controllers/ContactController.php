<?php

namespace App\Http\Controllers;
use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function create() { 

        return view('admin.contact_form'); 
       }  
  
       public function store(Request $request) { 
        $contact = new Contact;
        
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->mobile_number = $request->mobile_number;
        $image = $request->file('diagram');

        $new_name = date('YmdHis') . "." . $image->getClientOriginalExtension();;
        $image->move(public_path('/images/'), $new_name);
        $contact->diagram = $new_name; 
        $contact->message = $request->message;
       
    

        $contact->save();
        
        return response()->json(['success'=>'Form is successfully submitted!']);
  
      }
}
