<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.10 - Fundamentos da abstração");

require __DIR__ . "/source/autoload.php";

/*
 * [ superclass ] É uma classe criada como modelo e regra para ser herdada por outras classes,
 * mas nunca para ser instanciada por um objeto.
 */
fullStackPHPClassSession("superclass", __LINE__);

$alex = new \Source\App\User("Alex", "Pavanello");
var_dump($alex);

/*
 * [ especialização ] É uma classe filha que implementa a superclasse e se especializa
 * com suas prórpias rotinas
 */
fullStackPHPClassSession("especialização.a", __LINE__);
$account = new \Source\Bank\AccountSaving("488","658975", $alex, "1000");
var_dump($account);
$account->extract();
$account->deposit(1000);
$account->extract();
$account->deposit(1000);
$account->extract();
$account->withdrawal(50);
$account->extract();

/*
 * [ especialização ] É uma classe filha que implementa a superclass e se especializa
 * com suas prórpias rotinas
 */
fullStackPHPClassSession("especialização.b", __LINE__);

$account = new \Source\Bank\AccountCurrent("488","658975", $alex, "1000", "1000");
var_dump($account);
$account->extract();
$account->deposit(1000);
$account->extract();
$account->withdrawal(50000);
$account->withdrawal(3000);
$account->extract();