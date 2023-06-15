<?php

namespace App\Controllers;

use App\Models\Model_Auth;
use App\Models\Tokens;

class ForgotPassword extends BaseController
{
    public function index()
    {
        echo view('forgot');
    }
    public function forgotPassword()
    {
        // Logika untuk mengirim email/reset password ke user
        $email = $_POST['email'];
        $userModel = new Model_Auth();
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            $token = $this->generateToken();
            $tokenModel = new Tokens();
            $tokenModel->insert([
                'token' => $token,
                'user_id' => $user['id_users'],
                'created' => date('Y-m-d H:i:s')
            ]);

            // Send email with the reset password link
            $resetLink = base_url('reset-password/' . $token); // URL reset password dengan token
            $data = [
                'link' => $resetLink,
            ];
            $message = view('email-forgot', $data);
            $this->sendEmail($email, 'Reset Password', $message);

            session()->setFlashdata('sukses', 'Berhasil, Silakan cek email anda');
            return redirect()->to('/forgot');
        } else {
            session()->setFlashdata('msg', 'Email tidak ditemukan');
            return redirect()->to('/forgot');
        }
    }

    public function resetPassword($token)
    {
        $tokenModel = new Tokens();
        $tokenData = $tokenModel->where('token', $token)->first();

        if ($tokenData) {
            // Tampilkan halaman form reset password
            return view('reset', ['token' => $token]);
        } else {
            session()->setFlashdata('msg', 'Token salah');
            return redirect()->to('/login');
        }
    }

    public function updatePassword()
    {
        $token = $_POST['token'];
        $password = $_POST['password'];

        $tokenModel = new Tokens();
        $tokenData = $tokenModel->where('token', $token)->first();

        if ($tokenData) {
            $userModel = new Model_Auth();
            $userModel->update($tokenData['user_id'], ['password' => password_hash($password, PASSWORD_DEFAULT)]);
            $tokenModel->delete($tokenData['id']);

            session()->setFlashdata('sukses', 'Password Berhasil diubah, silakan masuk');
            return redirect()->to('/login');
        } else {
            session()->setFlashdata('msg', 'Token salah');
            return redirect()->to('/reset');
        }
    }

    private function generateToken()
    {
        $length = 32; // Panjang token yang diinginkan
        $token = bin2hex(random_bytes($length / 2));
        return $token;
    }

    private function sendEmail($recipient, $subject, $content)
    {
        $email = \Config\Services::email();
        $email->setTo($recipient);
        $email->setSubject($subject);
        $email->setMessage($content);
        $email->send();
    }
}
