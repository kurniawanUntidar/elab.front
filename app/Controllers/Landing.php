<?php

namespace App\Controllers;

class Landing extends BaseController
{
    public function index()
    {
        $client = \Config\Services::curlrequest();
        $news = [];
        try {
            $resp = $client->request('GET', 'http://localhost:8090/index.php/', ['http_errors' => false]);
            $data = json_decode($resp->getBody(), true);
            if ($resp->getStatusCode() === 200) {
                $news = $data['news'] ?? [];
            }
        } catch (\Throwable $e) {
            // Silently fail to keep landing page accessible
        }
        
        return view('landing', ['news' => array_slice($news, 0, 3)]);
    }
}