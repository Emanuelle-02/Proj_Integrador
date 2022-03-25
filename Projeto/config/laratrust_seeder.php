<?php

return [
    'role_structure' => [
        'administrador' => [
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'bibliotecario' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'usuario' => [
            'profile' => 'r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
