<?php

return [
    'module' => 'Usuario|Usuarios',
    'fillable' => [
        'id' => '#',
        'first_name' => 'Nombres',
        'last_name' => 'Apellidos',
        'phone' => 'Teléfono',
        'email' => 'Email',
        'address' => 'Dirección',
    ],
    'action' => [
        'add' => 'Registrar usuario',
        'edit' => 'Editar usuario',
        'destroy' => 'Eliminar usuario',
    ],
    'titles' => [
        'header' => 'Gestión de usuarios'
    ],

];
