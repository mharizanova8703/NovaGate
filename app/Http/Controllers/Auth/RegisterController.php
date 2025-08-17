<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;   // make sure this is imported

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'                  => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'              => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response'  => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                        'secret'   => config('services.recaptcha.secret_key'),
                        'response' => $value,
                        'remoteip' => request()->ip(),
                    ])->json();

                    if (!($response['success'] ?? false)) {
                        $fail('reCAPTCHA verification failed. Please try again.');
                    }
                }
            ],
        ], [
            'g-recaptcha-response.required' => 'Please confirm you are not a robot.',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
