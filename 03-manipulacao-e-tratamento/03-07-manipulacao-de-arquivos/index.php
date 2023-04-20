<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.07 - Manipulação de arquivos");

/*
 * [ verificação de arquivos ] file_exists | is_file | is_dir
 */
fullStackPHPClassSession("verificação", __LINE__);
$file = __DIR__ . "/file.txt";
//VERIFICANDO SE EXISTE E SE É UM ARQUIVO EM VEZ DE UM DIRETÓRIO
if(file_exists($file) && is_file($file)){
    echo "<p>Existe</p>";
}else{
    echo "<p>Não existe</p>";
}

/*
 * [ leitura e gravação ] fopen | fwrite | fclose | file
 */
fullStackPHPClassSession("leitura e gravação", __LINE__);

if(!file_exists($file) || !is_file($file)){
                //criando "W"->abrindo para leitura e gravação
    $fileOpen = fopen($file, "w");
    fwrite($fileOpen, "Linha 01".PHP_EOL);
    fwrite($fileOpen, "Linha 02".PHP_EOL);
    fwrite($fileOpen, "Linha 03".PHP_EOL);
    fwrite($fileOpen, "Lorem Ipsum is simply dummy text of the printing and typesetting industry.".PHP_EOL);
    fclose($fileOpen);

}else{
    var_dump(
        file($file),
        pathinfo($file)
    );
}

echo "<p>",file($file)[3],"</p>";
        //abrindo para leitura
$open = fopen($file, "r");
     //enquanto não chegar no final do arquivo
while(!feof($open)){
    echo "<p>". fgets($open) . "</p>";
}
fclose($open);

/*
 * [ get, put content ] file_get_contents | file_put_contents
 */
fullStackPHPClassSession("get, put content", __LINE__);

$getContents = __DIR__."/teste2.html";
if(file_exists($getContents) && is_file($getContents)){
    echo file_get_contents($getContents);
}else{
    $dados = "<article><h1>Robson</h1><p>CEO UpInside<br>cursos@upinside.com.br</p></article>";
    file_put_contents($getContents, $dados);
    echo file_get_contents($getContents);
}

//remover arquivos
//unlink($file);
//unlink($getContents);

if(file_exists(__DIR__."/teste3.html") && is_file(__DIR__."/teste3.html")){
    unlink(__DIR__."/teste3.html");
}