<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        if (session()->get('token')) {
            return redirect()->to('/');
        }

        helper('form');
        $error = null;
        $email = '';

        if ($this->request->getMethod() === 'POST') {
            $email  = $this->request->getPost('email');
            $passwd = $this->request->getPost('password');

            try {
                $client  = \Config\Services::curlrequest();
                $resp    = $client->request('POST', 'http://localhost:8090/index.php/login', [
                    'json'        => ['email' => $email, 'password' => $passwd],
                    'http_errors' => false,
                ]);
                
                $body = $resp->getBody();
                $payload = json_decode($body, true);

                if ($resp->getStatusCode() === 200 && !empty($payload['token'])) {
                    session()->set('token', $payload['token']);
                    return redirect()->to('/');
                }
                $error = $payload['message'] ?? 'Login gagal. Periksa email & password.';
            } catch (\Throwable $e) {
                $error = 'Backend tidak terjangkau: ' . $e->getMessage();
            }
        }

        return view('login', ['error' => $error, 'email' => $email]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
