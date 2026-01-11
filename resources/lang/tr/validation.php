<?php

return [
    'required' => ':attribute alanı zorunludur.',
    'email' => ':attribute geçerli bir e-posta adresi olmalıdır.',
    'max' => [
        'string' => ':attribute en fazla :max karakter olabilir.',
    ],
    'in' => 'Seçilen :attribute geçersiz.',

    'attributes' => [
        'name' => 'Ad Soyad',
        'email' => 'E-posta',
        'phone' => 'Telefon',
        'subject' => 'Konu',
        'message' => 'Mesaj',
    ],

    'custom' => [
        'name' => [
            'required' => 'Lütfen adınızı ve soyadınızı girin.',
            'minlength' => 'Ad Soyad en az 3 karakter olmalıdır.',
        ],
        'email' => [
            'required' => 'Lütfen e-posta adresinizi girin.',
            'email' => 'Lütfen geçerli bir e-posta adresi girin.',
        ],
        'phone' => [
            'required' => 'Lütfen telefon numaranızı girin.',
            'pattern' => 'Lütfen geçerli bir telefon numarası girin.',
        ],
        'subject' => [
            'required' => 'Lütfen bir konu seçin.',
        ],
        'message' => [
            'required' => 'Lütfen mesajınızı yazın.',
            'minlength' => 'Mesaj en az 10 karakter olmalıdır.',
        ],
    ],
];
