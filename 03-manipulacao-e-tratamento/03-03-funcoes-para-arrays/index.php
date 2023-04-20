<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.03 - Funções para arrays");
/*
 * [ criação ] https://php.net/manual/pt_BR/ref.array.php
 */
fullStackPHPClassSession("manipulação", __LINE__);
$index = [
    "",
    "AC/DC",
    "Nirvana",
    "Alter Bridge"  
  ];
  
  $assoc = [
    "Banda1"=>"AC/DC",
    "Banda2"=>"Nirvana",
    "Banda3"=>"Alter Bridge"  
  ];
  
  // ADD UM VALUE NO COMEÇO DO ARRAY
  array_unshift($index, '', 'Peral Jam'); 
  $assoc = ["Banda4"=> "Pearl Jam", "Banda5"=>''] + $assoc;
  
  // ADD UM VALUE NO FINAL DO ARRAY
  array_push($index, '');
  $assoc = $assoc + ["Banda6"=>''];
  
  // REMOVER O PRIMEIRO VALOR DO ARRAY
  array_shift($index);
  array_shift($assoc);
  
  // REMOVER O ULTIMO VALOR DO ARRAY
  array_pop($index);
  array_pop($assoc);
  
  //REMOVENDO VALOR NÃO PREENCHIDOS NO ARRAY
  $index = array_filter($index);
  $assoc = array_filter($assoc);
    
  var_dump(
      $index,
      $assoc
  );

/*
 * [ ordenação ] reverse | asort | ksort | sort
 */
fullStackPHPClassSession("ordenação", __LINE__);

//INVERTER ORDENS DOS VALUES 
$index = array_reverse($index);
$assoc = array_reverse($assoc);

var_dump(
    $index,
    $assoc
);

//ORDERNAR POR CRESCENTE EM VALUE
asort($index);
asort($assoc);

var_dump(
    $index,
    $assoc
);

//ORDERNAR POR CRESCENTE EM KEY
ksort($index);

//ORDERNAR POR DESC EM KEY
krsort($index);

//ORDERNAR E REINDEXAR POR CRESCENTE EM KEY E VALUES 
sort($index);
//ORDERNAR E REINDEXAR POR DESC EM VALUES E CRESCENTE EM KEY
rsort($index);

var_dump(
    $index,
    $assoc
);

/*
 * [ verificação ]  keys | values | in | explode
 */
fullStackPHPClassSession("verificação", __LINE__);
var_dump(
    $index,
    $assoc
);

// SEPARANDO OS KEYS E VALUES EM ARRAYS DIFERENTES
var_dump(
   [
    array_keys($assoc),
    array_values($assoc)

   ]
);
// VERIFICAR UM VALUE OU KEY DENTRO DO ARRAY
if(in_array("AC/DC", $assoc)){
    echo "<p>Cause I`m Back!</p>";
}

// TRANSFORMANDO ARRAY EM STRING
$arrToString = implode(", ", $assoc);
    echo "<p>Eu Curto {$arrToString} e muitas outras.</p>";
// TRANSFORMANDO STRING EM ARRYA
$stringToArray = explode(", ", $arrToString);
var_dump($stringToArray);
/**
 * [ exemplo prático ] um template view | implode
 */
fullStackPHPClassSession("exemplo prático", __LINE__);

$profile = [
    "name"=>"Robson",
    "company"=>"UpInside",
    "mail"=>"cursos@upinside.com.br"
];

$template = <<<TPL
    <article>
        <h1>{{name}}</h1>
        <p>{{company}}<br>
        <a href="mailto::{{mail}}" title="Enviar e-mail para {{mail}}">Enviar Email</a></p>
    </article>
TPL;

echo $template;

echo str_replace(
    array_keys($profile), array_values($profile), $template
);

$replaces ="{{".implode("}}&{{", array_keys($profile))."}}";

echo $replaces;
echo str_replace(
    explode("&",$replaces),
    array_values($profile),
    $template
);