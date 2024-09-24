<?php

namespace App\Http\Controllers\contactPage;

use App\Http\Controllers\Controller;
use App\Models\NoticeDocument;
use App\Mail\contactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    //
    public function contactPageView()
    {
        $noticeDocuments = NoticeDocument::all();
        return view('frontend.contact', compact('noticeDocuments'));
    }

    public function contactPageCreate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required|recaptcha',
        ], [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please provide a valid email address.',
            'phone.required' => 'Please enter your phone number.',
            'subject.required' => 'The subject field is required.',
            'message.required' => 'Don\'t forget to write your message.',
            'g-recaptcha-response.required' => 'Please complete the CAPTCHA.',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $subject = $request->input('subject');
        $message = $request->input('message');

        // Send email or store the message in a database
        // ...
        Mail::to(['mdfarhansadiq01@gmail.com'])->send(new contactMail($name, $email, $phone, $subject, $message, $chk = 'admin'));

        Mail::to([$email])->send(new contactMail($name, $email, $phone, $subject, $message, $chk = 'user'));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
