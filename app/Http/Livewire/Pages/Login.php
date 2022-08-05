<?php

namespace App\Http\Livewire\Pages;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        $user = User::where('email', '=', $this->email)->first();

        if (!$user) {
            throw ValidationException::withMessages(['email' => 'User không tồn tại']);
        }

        if (!Hash::check($this->password, $user->password)) {
            throw ValidationException::withMessages(['password' => 'Mật khẩu không đúng']);
        }

        Auth::login($user);

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.pages.login');
    }
}
