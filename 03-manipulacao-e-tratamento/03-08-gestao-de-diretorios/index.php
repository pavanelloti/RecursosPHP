<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.08 - Gestão de diretórios");

/*
 * [ verificar, criar e abrir ] file_exists | is_dir | mkdir  | scandir
 */
fullStackPHPClassSession("verificar, criar e abrir", __LINE__);
$folder = __DIR__."/upload";
if(!file_exists($folder) || !is_dir($folder)){
    mkdir($folder, 0755);
}else{
    var_dump(scandir($folder));
}

/*
 * [ copiar e renomear ] copy | rename
 */
fullStackPHPClassSession("copiar e renomear", __LINE__);

$file = __DIR__."/file.txt";
var_dump(
    pathinfo($file),
    scandir($folder),
    scandir(__DIR__)
);
if(!file_exists($file) || !is_file($file)){
    fopen($file, 'w');
}else{
    //copy($file, $folder."/".basename($file));
    rename($file, __DIR__ . "/upload/".time().".".pathinfo($file)["extension"]);
}
/*
 * [ remover e deletar ] unlink | rmdir
 */
fullStackPHPClassSession("remover e deletar", __LINE__);

//rmdir(__DIR__ . DIRECTORY_SEPARATOR . "remove");

$dirRemove = __DIR__ . DIRECTORY_SEPARATOR . "remove";
//if(!file_exists($dirRemove) && !is_dir($dirRemove)){
//    mkdir($dirRemove, 0755);
//}
$dirfiles = array_diff(scandir($dirRemove), ['.','..']);
//var_dump($dirfiles);
$dirCount = count($dirfiles);

if($dirCount >= 1){
    var_dump($dirfiles);
    foreach ($dirfiles as $fileItem) {
        $fileItem = __DIR__ . DIRECTORY_SEPARATOR . "remove".DIRECTORY_SEPARATOR."{$fileItem}";
        if(file_exists($fileItem) && is_file($fileItem)){
            unlink($fileItem);
        }           
    }
}else{
    echo "AQUi!!!";
    if(!file_exists($dirRemove) || !is_dir($dirRemove)){
        mkdir($dirRemove, 0755);
        echo "aqui";
    }else{
        rmdir($dirRemove);
        echo "não aqui";
    }
}
//var_dump($dirfiles);