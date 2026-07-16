<?php
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthLoginForm extends Component
{

public $email = '';
public $password = '';
public $remember = false;

protected $rules = [
'email' => 'required|string|email',
'password' => 'required|string',
];

protected $messages = [
'email.required' => 'Please enter your email address to log in.',
'email.email' => 'This email format is invalid.',
'password.required' => 'The password field cannot be empty.',
];

public function login()
{
$this->validate();

if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
throw ValidationException::withMessages([
'email' => 'Invalid credentials. Please verify your email and password.',
]);
}

session()->regenerate();

session()->flash('success', 'Welcome back to the crew! Access granted.');

return redirect()->route('car.index');
}

public function render()
{
return view('livewire.auth-login-form');
}
}
