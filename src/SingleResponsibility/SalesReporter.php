<?php

namespace SOLID\SingleResponsibility;

class SalesReporter
{
    protected $repo;

    public function __construct(SalesRepository $repo)
    {
        $this->repo = $repo;
    }

    public function between($startDate, $endDate, SalesOutputInterface $formatter)
    {
        $sales = $this->repo->between($startDate, $endDate);

        return $formatter->output($sales);
    }
}
