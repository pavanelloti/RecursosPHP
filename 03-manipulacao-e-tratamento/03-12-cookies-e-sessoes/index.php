<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.12 - Cookies e sessões");

/*
 * [ cookies ] http://php.net/manual/pt_BR/features.cookies.php
 */
fullStackPHPClassSession("cookies", __LINE__);

//setcookie("fsphp", "esse é meu Cookie", time() + 60);
//setcookie ("fslogin", '', time() - 60);
//setcookie ("fsphp", '', time() - 60);

$cookie = filter_input_array(INPUT_COOKIE, FILTER_DEFAULT);

$time = time() + 60 * 60 * 24 * 7;
$user = [
    "user"=> "root",
    "passwd"=> "123",
    "expire"=> $time
];

var_dump($_COOKIE, $cookie, [$user], [time()], [$time]);


setcookie(
    "fslogin",
    http_build_query($user),
    $time,
    "www.localhost"
);

$login = filter_input(INPUT_COOKIE, "fslogin",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    var_dump([
        $login
    ]);
/*
 * [ sessões ] http://php.net/manual/pt_BR/ref.session.php
 */
fullStackPHPClassSession("sessões", __LINE__);
$caminho = __DIR__ . DIRECTORY_SEPARATOR . "ses";
if(!file_exists($caminho) || !is_dir($caminho)){
    mkdir($caminho, 0755);
}
session_save_path(__DIR__ . DIRECTORY_SEPARATOR . "ses");
session_name("FSPHPSESSID");
session_start([
    "cookie_lifetime" => (60 * 60 * 24)
]);

var_dump($_SESSION,
[
    "id"=>session_id(),
    "name"=>session_name(),
    "status"=>session_status(),
    "save_path"=>session_save_path(),
    "cookie"=> session_get_cookie_params()
]);

