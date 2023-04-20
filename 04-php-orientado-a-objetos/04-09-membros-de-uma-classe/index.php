<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.09 - Membros de uma classe");

require __DIR__ . "/source/autoload.php";

/*
 * [ constantes ] http://php.net/manual/pt_BR/language.oop5.constants.php
 */
fullStackPHPClassSession("constantes", __LINE__);


/*
 * [ propriedades ] http://php.net/manual/pt_BR/language.oop5.static.php
 */
fullStackPHPClassSession("propriedades", __LINE__);


/*
 * [ métodos ] http://php.net/manual/pt_BR/language.oop5.static.php
 */
fullStackPHPClassSession("métodos", __LINE__);


/*
 * [ exemplo ] Uma classe trigger
 */
fullStackPHPClassSession("exemplo", __LINE__);

use Source\Members\Trigger;

$trigger = new Trigger();
$trigger::show("Um Objeto trigger");
$trigger::show("Um Objeto trigger", Trigger::ACCEPT);
$trigger::show("Um Objeto trigger", Trigger::WARNING);
$trigger::show("Um Objeto trigger", Trigger::ERROR);

echo $trigger::push("Esse é um Retorno para Usuário", Trigger::WARNING);

$reflection = new \ReflectionClass(Trigger::class);
$errorTypes = $reflection->getConstants();

var_dump([
    $trigger,
    $errorTypes
]);