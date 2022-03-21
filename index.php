<?php

/*
 Single Responsibility Principle:

 Dictates that a class should have only one reason to change or
 it shouldn't have to do too many responsibilities in order to
 achieve a task.

 If the class does a lot of things, such as validating authentication,
 fetching data from the database, these responsibilities must have to
 be extracted to a another class or implemented on an existing class
 that should do the work.

 */

use SOLID\SingleResponsibility\SalesHtmlOutput;
use SOLID\SingleResponsibility\SalesReporter;
use SOLID\SingleResponsibility\SalesRepository;

require "vendor/autoload.php";


$salesReporter = new SalesReporter(new SalesRepository());

$startDate = '2021-03-20';
$endDate = '2022-03-20';

echo "Single Responsibility: \n";
echo $salesReporter->between($startDate, $endDate, new SalesHtmlOutput());
