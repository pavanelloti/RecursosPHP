<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.05 - Sintetizando e abstraindo");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ synthesize ]
 */
fullStackPHPClassSession("synthesize", __LINE__);

$email = (new \Source\Core\Email())->bootstrap(
    "Olá mundo, esse é meu e-mail!",
    "<h1>Olá mundo!</h1><p>Essa é uma mensagem via rotina da aplicação</p>",
    "robsonvleite@gmail.com",
    "Robson Leite"
);

$email->attach(__DIR__ . "/../../../upinside/fsphp/images/cover.jpg", "FSPHP");
$email->attach(__DIR__ . "/../../../upinside/laradev/images/cover.jpg", "LARADEV");

if ($email->send()) {
    echo message()->success("E-mail enviado com sucesso!");
} else {
    echo $email->message();
}