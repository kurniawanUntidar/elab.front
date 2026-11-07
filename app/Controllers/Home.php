<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $token = session()->get('token');
        if (!$token) return redirect()->to('/login');

        try {
            $client = \Config\Services::curlrequest();
            $resp = $client->request('GET', 'http://localhost:8090/index.php/', [
                'headers'     => ['Authorization' => 'Bearer ' . $token],
                'http_errors' => false,
            ]);
            $data = json_decode($resp->getBody(), true);
            
            if ($resp->getStatusCode() !== 200) {
                return "API Error (" . $resp->getStatusCode() . "): " . ($data['message'] ?? 'Unknown');
            }
            
            return view('dashboard', ['news' => $data['news'] ?? []]);
        } catch (\Throwable $e) {
            return "Error: " . $e->getMessage();
        }
    }
}