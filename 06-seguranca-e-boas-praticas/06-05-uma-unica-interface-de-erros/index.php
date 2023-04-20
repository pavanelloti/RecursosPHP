<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.05 - Uma única interface de erros");

require __DIR__ . "/../source/autoload.php";

/*
 * [ message class ] Uma classe padrão para reportar ao usuário
 */
fullStackPHPClassSession("message class", __LINE__);

$message = new \Source\Core\Message();
var_dump($message, get_class_methods($message));


/*
 * [ message types ] Métodos para cada tipo de mensagem
 */
fullStackPHPClassSession("message types", __LINE__);

echo $message->success("Essa é uma Mensagem de Sucesso!");
echo $message->info("Essa é uma Mensagem de Info!");
echo $message->warning("Essa é uma Mensagem de Warning!");
echo $message->error("Essa é uma Mensagem de Error!");

var_dump([
    $message->getText(),
    $message->getType(),
    $message->render()
]);

/*
 * [ json message ] Mudando o padrão de retorno
 */
fullStackPHPClassSession("json message", __LINE__);

echo $message->warning("Essa é uma Mensagem de Warning!")->json();
echo $message->info($message->error("Essa é uma Mensagem de Error!")->json());


/*
 * [ flash message ] Uma mensagem via sessão para refresh de navegação
 */
fullStackPHPClassSession("flash message", __LINE__);

$session = new \Source\Core\Session();

$message->success("Essa é uma mensagem Flash")->flash();

if ($flash = $session->flash()){
    echo $flash;
}

var_dump($_SESSION, $session->all());




