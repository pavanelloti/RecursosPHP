<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <?php
    require __DIR__ . "/../vendor/autoload.php";

    $seo = new \Source\Support\Seo();
    echo $seo->render(
        "Formação Full Stack PHP Developer",
        "A melhor e mais completa formação php do Brasil para você que quer ser um expert tanto para o mercado de trabalho quanto para empreender seu negócio como um desenvolvedor web full stack... mesmo que você esteja começando do absoluto zero com php!",
        "https://www.upinside.com.br/fsphp",
        "https://www.upinside.com.br/fsphp/images/cover.jpg"
    );
    ?>
</head>
<body>

<h1><?= $seo->title; ?></h1>
<p><?= $seo->description; ?></p>

<?= "<pre>", print_r($seo->data(), true), "</pre>"; ?>

</body>
</html>