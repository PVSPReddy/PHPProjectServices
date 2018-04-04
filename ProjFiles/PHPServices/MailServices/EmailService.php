<?php

class EmailServiceType1
{
    public function SendEmail()
    {
        $to      = 'nobody@example.com';
        $subject = 'the subject';
        $message = 'hello';
        $headers = 'From: webmaster@example.com' .
        "\r\n" .
        'Reply-To: webmaster@example.com' .
        "\r\n" .
        'X-Mailer: PHP/' .
        phpversion();
        mail($to, $subject, $message, $headers);
    }
}
class EmailServiceType2
{
}
?>