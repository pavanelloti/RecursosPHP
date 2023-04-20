<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.09 - Fornecedor de otimização");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ optimizer ] https://packagist.org/packages/coffeecode/optimizer
 */
fullStackPHPClassSession("optimizer", __LINE__);

$seo = new \Source\Support\Seo();
$seo->render(
    "Formação Full Stack PHP Developer",
    "A melhor e mais completa formação php do Brasil para você que quer ser um expert tanto para o mercado de trabalho quanto para empreender seu negócio como um desenvolvedor web full stack... mesmo que você esteja começando do absoluto zero com php!",
    "https://www.upinside.com.br/fsphp",
    "https://www.upinside.com.br/fsphp/images/cover.jpg"
);

var_dump($seo->optimizer()->debug(), $seo->optimizer()->data());