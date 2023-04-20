<?php

use Source\Models\User;
use League\Plates\Engine;

require __DIR__ . '/../../fullstackphp/fsphp.php';
require __DIR__ . "/../vendor/autoload.php";

fullStackPHPClassName("07.06 - Uma camada de visualização");

/*
 * [ plates ] https://packagist.org/packages/league/plates
 */
fullStackPHPClassSession("plates", __LINE__);

$plates = new Engine(__DIR__ . "/../assets/views", "php");
var_dump(get_class_methods($plates));

//$plates->addFolder("test","test");

$plates->addFolder("test", __DIR__. "/../assets/views/test" );

if(empty($_GET["id"])){
 echo $plates->render("test::list", [
 "title" => "Usuarios do sistema",
 "list" => (new \Source\Models\User())->all()
 ]);
}else{
 echo $plates->render("test::user", [
 "title"=> "Editar usuario",
 "user" =>(new \Source\Models\User())->findById($_GET["id"])
 ]);
}









fullStackPHPClassSession("synthesize", __LINE__);

