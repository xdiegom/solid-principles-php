<?php

namespace SOLID\DependencyInversion;

class SendGrid implements MailInterface
{
    public function send()
    {
        echo 'Sending mail with SendGrid service';
    }
}
