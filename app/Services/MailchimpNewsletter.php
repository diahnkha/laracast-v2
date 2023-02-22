<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter
{

    // new newsletter apiclient
    public function __construct(protected ApiClient $client)
    {

    }
    public function subscribe(string $email, string $list = null)
    {

        $list ??= config('services.mailchimp.lists.subscribers');
        // $mailchimp = new ApiClient();

        // $mailchimp->setConfig([
        //     'apiKey' => config('services.mailchimp.key'),
        //     'server' => 'us17'
        // ]);

        return $this->client->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }



    
}