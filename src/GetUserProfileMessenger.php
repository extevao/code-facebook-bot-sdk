<?php

namespace CodeBot;

use GuzzleHttp\Client;

class GetUserProfileMessenger {

    const URL = 'https://graph.facebook.com/v2.11';

    private $userProfileId;
    private $pageAccessToken;

    public function __construct(string $pageAccessToken, string $userProfileId) {
        $this->pageAccessToken = $pageAccessToken;
        $this->userProfileId = $userProfileId;
    }

    public function make() {
        $client = new Client;
        $url = GetUserProfileMessenger::URL . '/' . $this->userProfileId;
        $method = 'GET';

        $response = $client->request($method, $url, [
            'query' => [
                'fields' => 'first_name,last_name,profile_pic',
                'access_token' => $this->pageAccessToken
            ]
        ]);

        return $response->getBody();
    }


}