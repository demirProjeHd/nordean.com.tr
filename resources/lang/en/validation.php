<?php

return [
    'required' => 'The :attribute field is required.',
    'email' => 'The :attribute must be a valid email address.',
    'max' => [
        'string' => 'The :attribute must not be greater than :max characters.',
    ],
    'in' => 'The selected :attribute is invalid.',

    'attributes' => [
        'name' => 'Full Name',
        'email' => 'Email',
        'phone' => 'Phone',
        'subject' => 'Subject',
        'message' => 'Message',
    ],

    'custom' => [
        'name' => [
            'required' => 'Please enter your full name.',
            'minlength' => 'Full name must be at least 3 characters.',
        ],
        'email' => [
            'required' => 'Please enter your email address.',
            'email' => 'Please enter a valid email address.',
        ],
        'phone' => [
            'pattern' => 'Please enter a valid phone number.',
        ],
        'subject' => [
            'required' => 'Please select a subject.',
        ],
        'message' => [
            'required' => 'Please write your message.',
            'minlength' => 'Message must be at least 10 characters.',
        ],
    ],
];
