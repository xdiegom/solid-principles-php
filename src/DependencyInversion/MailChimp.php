<?php

namespace SOLID\DependencyInversion;

class MailChimp implements MailInterface
{
    public function send()
    {
        echo 'Sending mail with MailChimp service';
    }
}
