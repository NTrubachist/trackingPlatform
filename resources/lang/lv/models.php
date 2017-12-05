<?php

return[

    'user'              => [
        'fname' => 'Vārds',
        'lname' => 'Uzvārds',
        'email' => 'E-pasts',
        'password' => 'Parole',
        'defaults' => [
            'fname' => 'Nikolajs',
            'lname' => 'Trubačistovs',
            'email' => 'niko@epasts.lv',
            'password' => 'Parole'
        ]
    ],
    'client'            => [
        'name' => 'Nosaukums',
        'phone' => 'Numurs',
        'email' => 'E-pasts',
        'register_number' => 'Riģistrācijas numurs',
        'defaults' => [
            'name' => 'Nosaukums',
            'phone' => '265489647',
            'email' => 'niko@epasts.lv',
            'register_number' => 'ABS1254785'
        ]
    ],
    'order'            => [
        'name' => 'Nosaukums',
        'describe' => 'Apraksts',
        'price' => 'Cena',
        'defaults' => [
            'name' => 'Nosaukums',
            'describe' => 'Apraksts',
            'price' => 'Cena'
        ]
    ]

];
