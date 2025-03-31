<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginPage extends Component
{
    public $email = '';
    public $password = '';

    protected $rules = [
        'email' => 'required|email|max:255|exists:users,email',
        'password' => 'required|min:5|max:255',
    ];

    protected $messages = [
        'email.required' => 'El correo electrónico es obligatorio',
        'email.email' => 'Ingresa un correo electrónico válido',
        'email.exists' => 'Este correo no está registrado',
        'password.required' => 'La contraseña es obligatoria',
        'password.min' => 'La contraseña debe tener al menos 5 caracteres',
    ];

    public function save()
    {
        $this->validate();

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('error', 'Las credenciales proporcionadas son incorrectas');
            return;
        }

        return redirect()->intended();
    }

    /**
     * Render del componente
     */
    public function render()
    {
        return view('livewire.login-page');
    }
}