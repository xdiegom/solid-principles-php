<?php

namespace SOLID\SingleResponsibility;

/*
 SalesHtmlOutput:
 This class implements the SalesOutputInterface
 in order to format the total sales if they want to
 be displayed in HTML format.
*/

class SalesHtmlOutput implements SalesOutputInterface
{
    public function output($sales)
    {
        return "<h1>Total sales: $$sales</h1>";
    }
}
