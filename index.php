<?php

use SOLID\LiskovSubstitution\BankingService;
use SOLID\LiskovSubstitution\CurrentAccount;
use SOLID\LiskovSubstitution\FixedTermAccount;
use SOLID\LiskovSubstitution\SavingAccount;
use SOLID\OpenClosed\Checkout;
use SOLID\OpenClosed\PaypalPaymentMethod;
use SOLID\OpenClosed\StripePaymentMethod;
use SOLID\SingleResponsibility\SalesHtmlOutput;
use SOLID\SingleResponsibility\SalesReporter;
use SOLID\SingleResponsibility\SalesRepository;

require "vendor/autoload.php";


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


$salesReporter = new SalesReporter(new SalesRepository());

$startDate = '2021-03-20';
$endDate = '2022-03-20';

echo "Single Responsibility: \n";
echo $salesReporter->between($startDate, $endDate, new SalesHtmlOutput());

/*
 Open-Closed Principle:

 Entities should be open for extension, but closed for modification.

 In order to do that, we follow the next statement:

 "Separate extensible behavior behind an interface, and flip the dependencies"
 */

echo "\n\nOpen Closed: \n";
$checkout = new Checkout();

echo $checkout->begin(100, new StripePaymentMethod()) . "\n";

echo $checkout->begin(100, new PaypalPaymentMethod()) . "\n";

/*
 Any implementation of an abstraction or interface should be substitutable
 anywhere that the abstraction is accepted.

 Covariance and Contravariance:

 - Covariance: any method of a class can be widen but not narrowed on its
               return types.

 - Contravariance: any method of a class can't be narrowed on its
                   arguments.

 Checks in order to adhere to the Liskov substitution:
 1. Signature must match
 2. Precondition can't be greater
 3. Post conditions at least equal to
 4. Exception types must match

 The Big Picture:

- Return types can be made narrower: Sub-classes can return sub-types or a smaller Union Types in the return type.
- Parameters can be widened: Sub-classes must accept and handle all parameter types the parent method handles.
                             But it can be widened to accept more types or parent types.
- Property types cannot be changed.

 */

 // TODO:
 // Given I have a class "Account" and a "SavingAccount", "CurrentAccount"
 // and "FixedTermAccount" and a service "BankingService" that exposes
 // and API for depositing and withdrawing money.

 // How to implement https://www.baeldung.com/java-liskov-substitution-principle#1-the-root-cause
 // with PHP?

echo "\n\nLiskov substitution (PENDING IMPLEMENTATION): \n";

/*
$bankingService = new BankingService(new SavingAccount());
echo $bankingService->withdraw(100) . "\n";
echo $bankingService->deposit(100) . "\n";

$bankingService = new BankingService(new CurrentAccount());
echo $bankingService->withdraw(100) . "\n";
echo $bankingService->deposit(100) . "\n";

// Problem over here:
// Argument #1 ($account) must be of type SOLID\LiskovSubstitution\WithdrawableAccount,
// SOLID\LiskovSubstitution\FixedTermAccount given.

$bankingService = new BankingService(new FixedTermAccount());
$bankingService->deposit(100) . "\n";
*/
