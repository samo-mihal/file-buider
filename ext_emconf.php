<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'File builder',
    'description' => '"Helper for editing existing file',
    'category' => 'be',
    'author' => 'Samuel Mihal',
    'author_email' => 'samuel.mihal@digitalwerk.agency',
    'author_company' => 'Digitalwerk',
    'state' => 'stable',
    'version' => '0.0.1',
    'constraints' => [
        'depends' => [
            'php' => '7.2.0-7.3.999',
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Digitalwerk\\FileBuilder\\' => 'Classes'
        ]
    ],
];
