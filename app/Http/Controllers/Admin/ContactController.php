<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Models\ContactPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $contactsettings = ContactPage::find('1');
        return view('admin.contactsettings')->with('contactsettings', $contactsettings);
    }
    public function update(Request $request)
    {
        $category = ContactPage::find('1');
        $category->address = $request->input('address');
        $category->phone_number = $request->input('phone_number');
        $category->email_id = $request->input('email_id');
        $category->form_email_id = $request->input('form_email_id');
        $category->address_map = $request->input('address_map');
        $category->save();
        $request->session()->flash('statuscode', 'success');
        return redirect('/contactsettings')->with('status', 'Settings data has been Added.');
    }
    public function showcontact(Request $request)
    {
        $banner = new Banner();
        $bannerlist = $banner->findOrFail('6');
        $contacts = new ContactPage();
        $contact = $contacts->findOrFail('1');
        $contactall = array(
            'contact' => $contact,
            'bannerlist' => $bannerlist
        );
        return view('frontend/contact')->with('contactall', $contactall);
    }
}
