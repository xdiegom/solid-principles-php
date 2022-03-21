<?php

namespace SOLID\SingleResponsibility;

/*
 SalesOutputInterface:
 This interface is the contract for different
 classes that format the output of the sales.
*/

interface SalesOutputInterface
{
    /**
     * It returns the sales amount in a specific format
     * @param mixed $sales
     * @return mixed
     */
    public function output($sales);
}
