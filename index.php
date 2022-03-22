<?php

use SOLID\DependencyInversion\MailChimp;
use SOLID\DependencyInversion\OrderService;
use SOLID\DependencyInversion\SendGrid;
use SOLID\InterfaceSegregation\ReadUserRepository;
use SOLID\InterfaceSegregation\WriteUserRepository;
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
 Liskov Substitution Principle:

 Any implementation of an abstraction or interface should be substitutable
 anywhere that the abstraction is accepted.

 Covariance and Contravariance:

 - Covariance: allows a child class method to declare a return type that is a
               sub-type of the parent methods return type.
               - If Parent class return types are: int,string,array
               - Any Sub-class that inherits the Parent class may return any of
               the return types from one to the three but no a type that is not
               defined on the Parent Class.

 - Contravariance: any method of a sub-class's parameters may increase
                   its range of parameters, but it must accept all parameters the parent accepts.
                   - If Parent class parameters types are: int,string,array
                   - Any Sub-class that inherits the Parent class should accept the same
                   parameters types and add more if its necessary.

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

/*
 Interface Segregation:

 A client should not be forced to implement an
 interface that it doesn't use.

 E.g: Let say that an interface of a repository can do
 many things: create, read, update, delete, all, show.

 But this interface has too many methods* that might not be necessary to
 use in order to be implemented in some repository class.

 What if we want to separate the repository logic with a repository that only
 writes and then another repository that only reads from the database?
 Here is where this principle comes into play.

 * interfaces that defines a lots of methods that might not be used in some classes
 are called "fat interfaces".

*/

echo "\n\nInterface Segregation: \n";

$userRepository = new WriteUserRepository();
echo $userRepository->create([
    'name' => 'Diego',
    'email' => 'diego@example.com'
]) . "\n";

$readUserRepository = new ReadUserRepository();
echo $readUserRepository->all() . "\n";

/*
  Dependency Inversion:

  Depend on abstractions, not on concretions.

  It all about decoupling code.

  High level code: Code that isn't concerned about the specifics
  of the application.

  Low level code: it is concerned with details and specifics of the
  application.

  Dependency Inversion != Dependency Injection.

  The core idea behind this principle:

  The High level code should never depend upon a low level code. It
  should depend upon an abstraction that low level code depends
  upon that same abstraction.

 */

echo "\n\nDependency Inversion: \n";

$orderService = new OrderService(new SendGrid());
echo $orderService->create() . "\n";
$orderService = new OrderService(new MailChimp());
echo $orderService->create() . "\n";
