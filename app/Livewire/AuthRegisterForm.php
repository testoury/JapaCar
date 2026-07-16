<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthRegisterForm extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    protected $rules = [
        'name' => 'required|string|min:3|max:255',
        'email' => 'required|string|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ];

    protected $messages = [
        'name.required' => 'The Username field is required.',
        'name.min' => 'Your username must be at least 3 characters.',
        'email.required' => 'An email address is required to join the crew.',
        'email.unique' => 'This email is already registered in our system.',
        'password.required' => 'Please enter a secure password.',
        'password.min' => 'Your password must be at least 8 characters long.',
        'password.confirmed' => 'The password confirmation does not match.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function register()
    {
        $validatedData = $this->validate();

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Auth::login($user);

        session()->flash('success', 'Welcome aboard `' . $user->name . '`! Driver profile initialized successfully.');

        return redirect()->route('car.index');
    }

    public function render()
    {
        return view('livewire.auth-register-form');
    }
}

