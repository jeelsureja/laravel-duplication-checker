<?php

return [
    'excluded_directories' => [
        'vendor',
        'storage',
    ],
    'warning_route' => 'duplication/warnings',
    'detection_method' => 'hashing', // or 'tokenization', 'ast'
];