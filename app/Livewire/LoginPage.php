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
    public $remember = false;
    
    // Propiedades para el formulario de registro
    public $name = '';
    public $passwordConfirmation = '';
    
    // Estado del formulario (login o registro)
    public $showLoginForm = true;
    
    // Mensajes de error
    public $loginError = '';
    public $registerSuccess = '';
    
    // Reglas de validación para el login
    protected $loginRules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];
    
    // Reglas de validación para el registro
    protected $registerRules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'passwordConfirmation' => 'required|same:password',
    ];
    
    // Mensajes personalizados para validación
    protected $messages = [
        'email.required' => 'El correo electrónico es obligatorio',
        'email.email' => 'Ingresa un correo electrónico válido',
        'email.unique' => 'Este correo electrónico ya está registrado',
        'password.required' => 'La contraseña es obligatoria',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres',
        'passwordConfirmation.same' => 'Las contraseñas no coinciden',
        'name.required' => 'El nombre es obligatorio',
        'name.min' => 'El nombre debe tener al menos 3 caracteres',
    ];
    
    /**
     * Método para cambiar entre formularios
     */
    public function toggleForm()
    {
        $this->showLoginForm = !$this->showLoginForm;
        $this->resetValidation();
        $this->reset(['loginError', 'registerSuccess']);
    }
    
    /**
     * Método para iniciar sesión
     */
    public function login()
    {
        // Validar los datos de entrada
        $this->validate($this->loginRules);
        
        // Intentar el login
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            // Regenerar la sesión
            session()->regenerate();
            
            // Redireccionar a la página principal o dashboard
            return redirect()->intended(route('dashboard'));
        }
        
        // Si el login falla
        $this->loginError = 'Las credenciales proporcionadas no coinciden con nuestros registros.';
        $this->password = '';
    }
    
    /**
     * Método para registrar un nuevo usuario
     */
    public function register()
    {
        // Validar los datos de entrada
        $this->validate($this->registerRules);
        
        // Crear el nuevo usuario
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        
        // Limpiar los campos
        $this->reset(['name', 'email', 'password', 'passwordConfirmation']);
        
        // Mostrar mensaje de éxito
        $this->registerSuccess = '¡Registro exitoso! Ahora puedes iniciar sesión.';
        
        // Cambiar al formulario de login
        $this->showLoginForm = true;
    }
    
    /**
     * Método para solicitar restablecer contraseña
     */
    public function forgotPassword()
    {
        return redirect()->route('password.request');
    }
    
    /**
     * Render del componente
     */
    public function render()
    {
        return view('livewire.login-page');
    }
}
