<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Newsletter;
use App\Mail\NewsletterMail;

class NewsletterController extends Controller
{
   public function index(Request $request)
    {
        $newsletters = Newsletter::all();
        return view('admin.newsletter.index', compact('newsletters'));
    }

    function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $data = $request->all();
        $data['status'] = 'active';
        $data['send_status'] = 'pending';
        $ip = $request->ip();
$response = @json_decode(file_get_contents("http://ip-api.com/json/{$ip}"));

        $data['ip_address'] = $ip;
        $data['country'] = $response->country ?? 'Unknown';
        $data['city'] = $response->city ?? 'Unknown';
        $data['postal_code'] = $response->zip ?? 'Unknown';
        $data['state'] = $response->regionName ?? 'Unknown';
        $data['latitude'] = $response->lat ?? 0;
        $data['longitude'] = $response->lon ?? 0;
        $data['timezone'] = $response->timezone ?? 'UTC';
// dd($data);
       $result = \App\Models\Newsletter::create($data);
       if($result){
           Mail::to($request->email)->send(new NewsletterMail($data));
           return redirect(route('thankyou'))->with('success', 'Subscription successful!');
        }

    }
    function destroy($id)
    {
        $newsletter = \App\Models\Newsletter::findOrFail($id);
        $newsletter->delete();

        return redirect()->back()->with('success', 'Unsubscribed successfully!');
    }
   
   
    
}
