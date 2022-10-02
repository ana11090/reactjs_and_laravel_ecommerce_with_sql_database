<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Contact;
use App\Models\DesignYourOwn;
use App\Models\Review;
use App\Models\Oauth_access_token;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Mail;
use App\Mail\SendEmail;

class ContactController extends Controller
{
    public function ContactUserGetInfo(Request $request){
        $id = $request->user_id;
        if($id!=NULL){
            
        $user = User::find($id);
        $user_name = $user->name;
        $user_email = $user->email;
        
        $result = Contact::insert([
            'user_name' => $user_name,
            'email' => $user_email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);
        }else{
        $result = Contact::insert([
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);
        }
        
        

        return $result;
        
    }

    public function DesignYourOwnAPI(Request $request){
        $id = $request->user_id;
        if($id!=NULL){
            
        $user = User::find($id);
        $user_name = $user->name;
        $user_email = $user->email;
        
        $result = DesignYourOwn::insert([
            'user_name' => $user_name,
            'email' => $user_email,
            'name' => $request->name,
            'category' => $request->category,
            'metal' => $request->metal,
            'size' => $request->size,
            'description' => $request->description,
            'stones' => $request->stones,
           
        ]);
        }else{
        $result = DesignYourOwn::insert([
            'email' => $request->email,
            'name' => $request->name,
            'category' => $request->category,
            'metal' => $request->metal,
            'size' => $request->size,
            'description' => $request->description,
            'stones' => $request->stones,
            
        ]);
        }

        return $result;
        
    }

    public function ContactMessages(){
        $message = Contact::latest()->paginate(10);
        return view('admin.contact', compact('message'));
    }

    public function SendEmail(){
        return view('admin.sendEmail');
    }

    public function SendEmailRequest(Request $request){
        $data = $request->email;
        $users = User::get();
        foreach($users as $user){
             Mail::to($user->email)->send(new SendEmail($data));
        }
        return redirect()->back()->with('success', 'Email send!');
    }

    public function Reviews(){
        $reviews = Review::latest()->paginate(10);
        return view('admin.reviews', compact('reviews'));
        
    }

}
