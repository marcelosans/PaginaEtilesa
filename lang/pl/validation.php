<?php
// Archivo de validación en Polaco (pl/validation.php)
return [
    'required' => 'Pole :attribute jest wymagane.',
    'email' => 'Pole :attribute musi być prawidłowym adresem email.',
    'current_password' => 'Aktualne hasło jest nieprawidłowe.',
    'password' => 'Hasło musi mieć co najmniej 8 znaków.',
    'confirmed' => 'Potwierdzenie :attribute nie pasuje.',
    'unique' => 'Podany :attribute jest już zajęty.',
    
    // Atributos - esto te permitirá personalizar los nombres de los atributos en los mensajes de error
    'attributes' => [
        'name' => 'imię',
        'email' => 'adres email',
        'password' => 'hasło',
        'current_password' => 'aktualne hasło',
    ],
];