<?php

namespace App\Http\Controllers\Admin;

use Mail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Mail\Mailer;
use App\Models\ContactList;
use App\Models\ContactPage;
use Illuminate\Http\Request;
use App\Http\Requests;
//use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

class ContactListController extends Controller
{

    public function index()
    {
        $contactlist = ContactList::all();
        return view('admin.contactlist')->with('contactlist', $contactlist);
    }
    public function ContactUsForm(Request $request)
    {
        $contacts = new ContactPage();
        $contact = $contacts->findOrFail('1');


        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email_id' => 'required|email',
            'message' => 'required'
        ]);
        //  Send mail to admin
        ContactList::create($request->all());
        $contact_emailid = str_replace("\xE2\x80\x8B", "",  $contact->form_email_id);
        Mail::send('frontend.mail', array(
            'name' => $request->get('name'),
            'email_id' => $request->get('email_id'),
            'bodyMessage' => $request->get('message'),
            'form_email_id' => $contact_emailid,
        ), function ($message) use ($request, $contact_emailid) {
            $message->from($request->email_id);
            $message->to($contact_emailid, 'Admin')->subject("Newvo Contact Form");
        });
        $request->session()->flash('statuscode', 'success');
        return back()->with('success', 'We would like to thank you for writing to us.');
    }
}
