<?php

// Select variables to connect database from .env.
$host = env('DB_HOST', 'localhost');
$username = env('DB_USERNAME', 'username');
$password = env('DB_PASSWORD');
$dbName = env('DB_DATABASE');
$conn = mysqli_connect($host, $username, $password, $dbName);

// Check connection
if($conn === false){
    die("Connect to IT services.. " . mysqli_connect_error());
}
$sql = "SELECT * FROM settings as se
        WHERE se.key='smtp_host' ||
         se.key='smtp_port' ||
         se.key='smtp_encrypted' ||
         se.key='smtp_email' ||
         se.key='smtp_password'";

$smtp = [];

if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)){
            $smtp[$row['key']]=$row['value'];
        }
        mysqli_free_result($result);
    }

}

// Close connection
mysqli_close($conn);


return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | This option controls the default mailer that is used to send any email
    | messages sent by your application. Alternative mailers may be setup
    | and used as needed; however, this mailer will be used by default.
    |
    */

    'default' => env('MAIL_MAILER', 'smtp'),

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Here you may configure all of the mailers used by your application plus
    | their respective settings. Several examples have been configured for
    | you and you are free to add your own as your application requires.
    |
    | Laravel supports a variety of mail "transport" drivers to be used while
    | sending an e-mail. You will specify which one you are using for your
    | mailers below. You are free to add additional mailers as required.
    |
    | Supported: "smtp", "sendmail", "mailgun", "ses",
    |            "postmark", "log", "array"
    |
    */

    'mailers' => [
        'smtp' => [
            'transport' => 'smtp',
            'host' => $smtp['smtp_host'],
            'port' => $smtp['smtp_port'],
            'encryption' => $smtp['smtp_encrypted'],
            'username' => $smtp['smtp_email'],
            'password' => $smtp['smtp_password'],
            'timeout' => null,
            'auth_mode' => null,
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'mailgun' => [
            'transport' => 'mailgun',
        ],

        'postmark' => [
            'transport' => 'postmark',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => '/usr/sbin/sendmail -bs',
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all e-mails sent by your application to be sent from
    | the same address. Here, you may specify a name and address that is
    | used globally for all e-mails that are sent by your application.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Markdown Mail Settings
    |--------------------------------------------------------------------------
    |
    | If you are using Markdown based email rendering, you may configure your
    | theme and component paths here, allowing you to customize the design
    | of the emails. Or, you may simply stick with the Laravel defaults!
    |
    */

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/frontend-assets/mail'),
        ],
    ],

];
