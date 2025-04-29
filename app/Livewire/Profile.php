<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class Profile extends Component
{
    public $name;
    public $email;
    public $current_password;
    public $password;
    public $password_confirmation;
    
    public $successMessage = '';

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id)],
            'current_password' => ['nullable', 'required_with:password', 'string'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function updateProfile()
    {
        $this->validate();

        $user = Auth::user();
        
        // Si se proporcionó una contraseña, verificar la contraseña actual
        if ($this->password) {
            if (!Hash::check($this->current_password, $user->password)) {
                $this->addError('current_password', 'La contraseña actual es incorrecta.');
                return;
            }
        }

        $user->name = $this->name;
        $user->email = $this->email;
        
        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        try {
            $user->save();
            $this->reset(['current_password', 'password', 'password_confirmation']);
            $this->successMessage = '¡Perfil actualizado correctamente!';
        } catch (\Exception $e) {
            $this->addError('save_error', 'Error al guardar los cambios: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
