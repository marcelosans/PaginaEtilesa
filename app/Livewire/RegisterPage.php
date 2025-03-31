<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterPage extends Component
{

    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    protected $rules = [
        'name' => 'required|min:3|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:8|confirmed',
        'password_confirmation' => 'required'
    ];

    protected $messages = [
        'name.required' => 'El nombre es obligatorio',
        'name.min' => 'El nombre debe tener al menos 3 caracteres',
        'email.required' => 'El correo electrónico es obligatorio',
        'email.email' => 'Ingresa un correo electrónico válido',
        'email.unique' => 'Este correo ya está registrado',
        'password.required' => 'La contraseña es obligatoria',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres',
        'password.confirmed' => 'Las contraseñas no coinciden',
        'password_confirmation.required' => 'Confirma tu contraseña'
    ];

    public function register()
    {
        $this->validate();

        try {
            // Crear el usuario
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            // Autenticar al usuario recién registrado
            Auth::login($user);

            // Redireccionar al dashboard o página principal
            return redirect()->intended();
        } catch (\Exception $e) {
            session()->flash('error', 'Ha ocurrido un error al registrar tu cuenta. Por favor, intenta de nuevo.');
        }
    }


    public function render()
    {
        return view('livewire.register-page');
    }
}
