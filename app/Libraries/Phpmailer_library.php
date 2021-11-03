<?php

namespace App\Libraries;

use App\ThirdParty\phpmailer\src\Exception;
use App\ThirdParty\phpmailer\src\PHPMailer;
use App\ThirdParty\phpmailer\src\SMTP;

class Phpmailer_library
{
    public function __construct()
    {
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load()
    {
        // require_once(APPPATH.'ThirdParty/phpmailer/src/Exception.php');
        // require_once(APPPATH.'ThirdParty/phpmailer/src/PHPMailer.php');
        // require_once(APPPATH.'ThirdParty/phpmailer/src/SMTP.php');

        $objMail = new PHPMailer();
        return $objMail;
    }
}
