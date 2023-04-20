<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.10 - Model bootstrap e cadastro");

require __DIR__ . "/../source/autoload.php";

/*
 * [ bootstrap ] Inicialização de dados
 */
fullStackPHPClassSession("bootstrap", __LINE__);
use \Source\Models\UserModel;

$model = new UserModel();

$user = $model->bootstrap(
    "Alex",
    "Pavanello<>",
    "email@pavanelloti.com",
    "01008061980"
);

var_dump($user);
/*
 * [ save create ] Salvar o usuário ativo (Active Record)
 */
fullStackPHPClassSession("save create", __LINE__);

//$user->id = 10;
//$user->created_at = date("Y-m-d H:i");
//$user->ola = "fdsfsf";

if (!$model->find($user->email)){
    echo "<p class='trigger warning'>Cadastro</p>";
    $user->save();
}else {
    echo "<p class='trigger accept'>Read</p>";
}



var_dump($user);