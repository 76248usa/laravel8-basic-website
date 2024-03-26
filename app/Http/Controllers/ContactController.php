<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{

    public function AdminContact(){
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function AdminAddContact(){
        return view('admin.contact.create');
    }

    public function AdminStoreContact(Request $request){
        $requestValidate = $request->validate([
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        Contact::insert([
        'address' => $request->address,
        'email' => $request->email,
        'phone' => $request->phone,
        'created_at' => Carbon::now()
    ]);
    return Redirect()->back()->with('success', 'Contact inserted successfully');
    }

    public function AdminEditContact(Request $request, $id){
        $contact = Contact::findOrFail($id);
        return view('admin.contact.edit', compact('contact'));
    }

    public function AdminUpdateContact(Request $request, $id){
        
        Contact::findOrFail($id)->update([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'updated_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success','Updated Contact');
    }

    public function AdminDeleteContact($id){
        $contact = Contact::findOrFail($id)->delete();
        return Redirect()->back()->with('success','Deleted Contact');
    }

    public function Contact(){
        $contacts = DB::table('contacts')->first();
        return view('pages.contact', compact('contacts'));
    }

// public function ContactForm(Request $request){
//         ContactForm::insert([
//             'name' => $request->name,
//             'email' => $request->email,
//             'subject' => $request->subject,
//             'message' => $request->message,
//             'created_at' => Carbon::now()
//         ]);
    
//         return Redirect()->route('contact')->with('success','Your Message Send Successfully');

//     }

    public function ContactForm(Request $request){

        $validatedData = $request->validate([
            'name' => 'required',
            'email' =>'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

         ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()

        ]);

        return Redirect()->route('contact')->with('success','Your message was sent successfully');
    }

    public function ContactMessage(){
        $messages = ContactForm::all();
        return view('admin.contact.message', compact('messages'));
    }

    public function DeleteMessage($id){
        ContactForm::findOrFail($id)->delete();
        return Redirect()->back()->with('success','Deleted successfully');
    }


}
