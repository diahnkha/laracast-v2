<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(string $email)
    {
        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us17'
        ]);

        return $response = $mailchimp->lists->addListMember('c41ebc5616', [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }
}