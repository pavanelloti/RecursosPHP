<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.10 - Upload de arquivos");

/*
 * [ upload ] sizes | move uploaded | url validation
 * [ upload errors ] http://php.net/manual/pt_BR/features.file-upload.errors.php
 */
fullStackPHPClassSession("upload", __LINE__);

include __DIR__ . DIRECTORY_SEPARATOR . "form.php";

$folder = __DIR__ . DIRECTORY_SEPARATOR . "uploads";
if (!file_exists($folder) || !is_dir($folder)){
    mkdir($folder, 0755);
}

var_dump([
    "filesize"=> ini_get("upload_max_filesize") ,
    "postsize"=> ini_get("post_max_size")
]);

var_dump([
    filetype(__DIR__.DIRECTORY_SEPARATOR."index.php"),
    mime_content_type(__DIR__.DIRECTORY_SEPARATOR."index.php"),
]);
//validade se houve de fato o envio via get
$getPost = filter_input(INPUT_GET, "post", FILTER_VALIDATE_BOOLEAN);

//se existe e nome não for vazio
if($_FILES && !empty($_FILES['file']['name'])){
    
    $fileUpload = $_FILES['file']; 
    var_dump($fileUpload);

    $types = [
        "image/jpg",
        "image/jpeg",
        "image/png",
        "application/pdf",
    ];
    $newFileName = time() . mb_strstr($fileUpload['name'], ".");
    var_dump([$newFileName]);

    if(in_array($fileUpload['type'], $types)){
        if(move_uploaded_file($fileUpload['tmp_name'], $folder.DIRECTORY_SEPARATOR.$newFileName)){
            echo "<p class='trigger accept'>Arquivo enviado com Sucesso</p>";        
        }else{
            echo "<p class='trigger error'>Erro inesperado</p>";    
        }
    }else{
        echo "<p class='trigger error'>Tipo de Arquivo não permitido</p>";    
    }
} elseif ($getPost){
    
    echo "<p class='trigger warning'>Whoops! Parece que o arquivo é muito grande.</p>";

} else {
    
    if($_FILES){
        echo "<p class='trigger warning'>Selecione um arquivo antes de enviar</p>";
    }

}


