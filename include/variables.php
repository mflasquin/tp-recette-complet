<?php
const ROLE_USER = 'USER';
const ROLE_ADMIN = 'ADMIN';

const USERS = [
    [
        'firstname' => 'Mickaël',
        'lastname' => 'Andrieu',
        'email' => 'mickael.andrieu@exemple.com',
        'age' => 34,
        'password' => '830d1ab1b2aeeb959613c80ff2c95d9a', //devine
        'stayConnected' => '9iiJW8OY8r0NvCGHcqh2QICnSDSwlZJJeDyUaG2Z500hU9OPL3JQELCEuwcZXP1l7jsSp7Mn5Zz0pHqTmoM9q5hW8LM1mC4hfS7rVyUibt898bTt8wdEeWfavNGubOmNjOLsXQxeK4W0CQD5iaKbUR'
    ],
    [
        'firstname' => 'Mathieu',
        'lastname' => 'Nebra',
        'email' => 'mathieu.nebra@exemple.com',
        'age' => 34,
        'password' => '3c01e67d36e951690488c39f83581332', //MiamMiam
        'stayConnected' => ''
    ],
    [
        'firstname' => 'Laurène',
        'lastname' => 'Castor',
        'email' => 'laurene.castor@exemple.com',
        'age' => 28,
        'password' => '703b18cc932d892b8887156eedcbd4e0', //laCasto28
        'stayConnected' => ''
    ],
];

$recipes = [
    [
        'title' => 'Cassoulet',
        'recipe' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet auctor ex. Suspendisse potenti. Maecenas eget aliquam libero. Cras scelerisque sapien vel risus tempor sollicitudin. Donec metus mi, lacinia in nisi quis, porta consectetur justo. Sed interdum feugiat elementum. Aliquam erat volutpat. Etiam pharetra urna congue, feugiat arcu vel, varius nisl. Maecenas maximus, erat ac sollicitudin feugiat, libero diam tempus augue, eget cursus sem ligula ac quam. Aenean auctor eros vitae odio condimentum, ac malesuada felis faucibus.',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Couscous',
        'recipe' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet auctor ex. Suspendisse potenti. Maecenas eget aliquam libero. Cras scelerisque sapien vel risus tempor sollicitudin. Donec metus mi, lacinia in nisi quis, porta consectetur justo. Sed interdum feugiat elementum. Aliquam erat volutpat. Etiam pharetra urna congue, feugiat arcu vel, varius nisl. Maecenas maximus, erat ac sollicitudin feugiat, libero diam tempus augue, eget cursus sem ligula ac quam. Aenean auctor eros vitae odio condimentum, ac malesuada felis faucibus.',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Escalope milanaise',
        'recipe' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet auctor ex. Suspendisse potenti. Maecenas eget aliquam libero. Cras scelerisque sapien vel risus tempor sollicitudin. Donec metus mi, lacinia in nisi quis, porta consectetur justo. Sed interdum feugiat elementum. Aliquam erat volutpat. Etiam pharetra urna congue, feugiat arcu vel, varius nisl. Maecenas maximus, erat ac sollicitudin feugiat, libero diam tempus augue, eget cursus sem ligula ac quam. Aenean auctor eros vitae odio condimentum, ac malesuada felis faucibus.',
        'author' => 'mathieu.nebra@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Salade Romaine',
        'recipe' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet auctor ex. Suspendisse potenti. Maecenas eget aliquam libero. Cras scelerisque sapien vel risus tempor sollicitudin. Donec metus mi, lacinia in nisi quis, porta consectetur justo. Sed interdum feugiat elementum. Aliquam erat volutpat. Etiam pharetra urna congue, feugiat arcu vel, varius nisl. Maecenas maximus, erat ac sollicitudin feugiat, libero diam tempus augue, eget cursus sem ligula ac quam. Aenean auctor eros vitae odio condimentum, ac malesuada felis faucibus.',
        'author' => 'mailquinexistepas@toto.fr',
        'is_enabled' => true,
    ],
];