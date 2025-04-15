<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Banner;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Mail;

class HomeController extends Controller
{
    public function index()
    {
        $faqData = Faq::where('status', 1)->get(); 
        $bannerData = Banner::where('status', 1)->get(); 
        $serviceData = Service::where('status', 1)->get(); 
        return view('frontend.home', compact('faqData', 'bannerData', 'serviceData'));
    }

    public function AboutUs(){
        return view('frontend.aboutus');
    }

    public function ContactMail(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'comments' => 'required|string',
        ]);
    
        // Prepare data
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'comments' => $request->comments,
        ];
    
        // Send email
        Mail::to('deepak@thetemz.com')->send(new ContactFormMail($data));
    
        // Redirect to thank you page
        return redirect()->route('thankyou')->with('success', 'Your message has been sent successfully.');
    }
    
    
}
