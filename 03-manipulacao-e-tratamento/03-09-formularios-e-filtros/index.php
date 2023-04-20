<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.09 - Formuários e filtros");

/*
 * [ request ] $_REQUEST
 * https://php.net/manual/pt_BR/book.filter.php
 */
fullStackPHPClassSession("request", __LINE__);
$form = new stdClass();
$form->name ='Alex';
$form->mail ='alex@email.com';
$form->method ='get';
$form->method ='post';
var_dump($_REQUEST);

include __DIR__. DIRECTORY_SEPARATOR . "form.php";


/*
 * [ post ] $_POST | INPUT_POST | filter_input | filter_var
 */
fullStackPHPClassSession("post", __LINE__);

var_dump($_POST);

$post = filter_input(INPUT_POST, "name", FILTER_DEFAULT);
$postArray = filter_input_array(INPUT_POST, FILTER_DEFAULT);

var_dump(
    $post,
    $postArray
);

if($postArray){
    if(in_array("", $postArray)){
        echo "<p class='trigger warning'>Peencha todos os Campos!</p>";
    } elseif(!filter_var($postArray['mail'], FILTER_VALIDATE_EMAIL)){
        echo "<p class='trigger warning'>E-mail não válido!</p>";
    } else{     //remove codigo de cada indice do array
        $saveStrip = array_map("strip_tags", $postArray);
                //remove espaços desnecessários de cada indice
        $save = array_map("trim", $saveStrip);
        echo "<p class='trigger accept'>Dados Cadastrado com Sucesso!</p>";

        var_dump($save);
    }    
}

$form->method ='post';
include __DIR__. DIRECTORY_SEPARATOR . "form.php";

/*
 * [ get ] $_GET | INPUT_GET | filter_input | filter_var
 */
fullStackPHPClassSession("get", __LINE__);

var_dump($_GET);
$get = filter_input(INPUT_GET, "mail", FILTER_VALIDATE_EMAIL);
$getArray = filter_input_array(INPUT_GET, FILTER_DEFAULT);

var_dump($get);
var_dump($getArray);

$form->method ='get';
include __DIR__ . DIRECTORY_SEPARATOR . "form.php";


/*
 * [ filters ] list | id | var[_array] | input[_array]
 * http://php.net/manual/pt_BR/filter.constants.php
 */
fullStackPHPClassSession("filters", __LINE__);

var_dump(
    filter_list(),
    [
        filter_id("validate_email"),
        FILTER_VALIDATE_EMAIL,
        filter_id("string"),
        //FILTER_SANITIZE_STRING
    ]
);

$filterForm = [
    "name"=>FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    "mail"=>FILTER_VALIDATE_EMAIL
];
$getForm = filter_input_array(INPUT_GET, $filterForm);
var_dump($getForm);

$email = "email@email.com";

var_dump([
    filter_var($email, FILTER_VALIDATE_EMAIL)
],
    filter_var_array($getForm, $filterForm)
);
