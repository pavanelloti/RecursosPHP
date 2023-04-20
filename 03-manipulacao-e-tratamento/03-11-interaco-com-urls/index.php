<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.11 - Interação com URLs");

/*
 * [ argumentos ] ?[&[&][&]]
 */
fullStackPHPClassSession("argumentos", __LINE__);

echo "<h1><a href='index.php'>Clear</a></h1>";
echo "<p><a href='index.php?arg1=true&arg2=true'>Argumentos</a></p>";
//var_dump($_GET);

###############################################################################

$dados = [
    "name"=> "Alex Pavanello",
    "company"=>"PavanelloTI",
    "email"=>"email@email.com.br"
];

$arguments = http_build_query($dados);
echo "<p><a href='index.php?{$arguments}'>Argumentos2</a></p>";


$object = (object)$dados;
var_dump($object );

//var_dump([$arguments]);
var_dump($_GET);




/*
 * [ segurança ] get | strip | filters | validation
 * [ filter list ] https://php.net/manual/en/filter.filters.php
 */
fullStackPHPClassSession("segurança", __LINE__);

$dados = http_build_query([
    "name"=> "Alex Pavanello",
    "company"=>"PavanelloTI",
    "email"=>"emailemail.com.br",
    "site"=>"https://pavanelloti.com.br",
    "script"=>"<script>alert('ok')</script>"
]);

echo "<p><a href='index.php?{$dados}'>Argumentos3</a></p>";

$dataUrl = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if($dataUrl){
    if (in_array("", $dataUrl)){
        echo "<p class='trigger warning'> Faltam Dados </p> ";
        
    } elseif (empty($dataUrl['email'])) {
        echo "<p class='trigger warning'> Falta o E-mail </p> ";
        
    } elseif (!filter_var($dataUrl['email'], FILTER_VALIDATE_EMAIL)){
        echo "<p class='trigger warning'> E-mail Invalido </p> ";
        
    } else {
        echo "<p class='trigger accept'> Tudo Certo</p> ";
       
    }
}else{
    var_dump(false);
}

parse_str($dados, $arrayDados);
var_dump([$dados], $arrayDados);

//var_dump($dataUrl);

$dadosPreFiltro = [
    "name"=>FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    "company"=>FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    "email"=>FILTER_VALIDATE_EMAIL,
    "site"=>FILTER_VALIDATE_URL,
    "script"=>FILTER_SANITIZE_FULL_SPECIAL_CHARS
];
echo "<p class='trigger accept'> Filtrado </p> ";
var_dump(filter_var_array($arrayDados, $dadosPreFiltro));





















