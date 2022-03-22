<?php

namespace SOLID\DependencyInversion;

class OrderService
{
    protected $mailService;

    public function __construct(MailInterface $mailService)
    {
        $this->mailService = $mailService;
    }

    public function create()
    {
       // Action that creates the order and sends an email
       // that could be either SendGrid or MailChimp or whatever
       // other mail service that will implement the MailService
       // interface.

        $this->mailService->send();
    }
}
