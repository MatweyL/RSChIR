<?php


return [


    'pdf' => [
        'controller' => 'pdf',
        'action' => 'show'
    ],

    'pdf/upload' => [
        'controller' => 'pdf',
        'action' => 'upload'
    ],
    'statistics' => [
        'controller' => 'statistics',
        'action' => 'show'
    ],
    'note' => [
        'controller' => 'note',
        'action' => 'show'
    ],
    'note/delete' => [
        'controller' => 'note',
        'action' => 'delete'
    ],
    'note/update' => [
        'controller' => 'note',
        'action' => 'update'
    ],
    'note/create' => [
        'controller' => 'note',
        'action' => 'create'
    ],
    'note/api' => [
        'controller' => 'note',
        'action' => 'api'
    ],
    'user/api' => [
        'controller' => 'user',
        'action' => 'api'
    ],



];