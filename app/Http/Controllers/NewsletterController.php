<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
// use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);



        // $response = $mailchimp->ping->get();
    
        // $response = $mailchimp->lists->getAllLists();
    
        // $response = $mailchimp->lists->getList('c41ebc5616');
    
        // $response = $mailchimp->lists->getListMembersInfo('c41ebc5616');
    
        try {
            
            // $newsletter = new Newsletter();
    
            // $newsletter->subscribe(request('email'));
    
            $newsletter->subscribe(request('email'));
    
        } catch (Exception $e){
            throw ValidationException::withMessages([
                'email' => 'this email could not be added to our newsletter list'
            ]);
        }
    
        // ddd($response);
    
        return redirect('/')
            ->with('success', 'You are now signed up for our newsletter');
    }
}
