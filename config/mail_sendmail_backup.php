<?php

/*
 * ACIL DURUM: SMTP çalışmazsa bu ayarları kullan
 *
 * .env dosyasında:
 * MAIL_MAILER=sendmail
 * MAIL_SENDMAIL_PATH="/usr/sbin/sendmail -bs -i"
 *
 * DİKKAT: Bu yöntem spam olarak işaretlenebilir!
 * Sadece geçici çözüm olarak kullan.
 */

return [
    'default' => env('MAIL_MAILER', 'sendmail'),

    'mailers' => [
        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],
    ],

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'noreply@yourdomain.com'),
        'name' => env('MAIL_FROM_NAME', 'Comland Ltd.'),
    ],
];
