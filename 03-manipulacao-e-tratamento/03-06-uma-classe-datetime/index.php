<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.06 - Uma classe DateTime");

/*
 * [ DateTime ] http://php.net/manual/en/class.datetime.php
 */
fullStackPHPClassSession("A classe DateTime", __LINE__);

define("DATE_BR", "d/m/Y H:i:s");

$dateNow = new DateTime();
//$dateNiver = new DateTime("1987-05-26");
//$dateStatic = DateTime::createFromFormat(DATE_BR, "10/03/2010 12:00:00");

var_dump(
    $dateNow,
    //$dateNiver,
    //$dateStatic
);

var_dump([
    $dateNow->format(DATE_BR),
    $dateNow->format("Y-m-d")
]);
echo "<p>Hoje é dia {$dateNow->format("d")} do {$dateNow->format("m")}, de {$dateNow->format("Y")}</p>";

/*
 * [ DateInterval ] http://php.net/manual/en/class.dateinterval.php
 * [ interval_spec ] http://php.net/manual/en/dateinterval.construct.php
 */
fullStackPHPClassSession("A classe DateInterval", __LINE__);

$dateInterval = new DateInterval("P10Y2MT10M");
var_dump($dateInterval);

$dateTime = new DateTime("now");
//$dateTime->add($dateInterval);
$dateTime->sub($dateInterval);

var_dump($dateTime);

$dateNiver = new DateTime(date("Y")."-05-26");
$dateNow = new DateTime("now");

$diff = $dateNow->diff($dateNiver);

var_dump($dateNiver, $diff);
//var_dump($diff->d,$diff->m,$diff->y,$diff->h,$diff->i,$diff->s,);

$dateResources = new DateTime("now");

var_dump([
    $dateResources->format(DATE_BR),
    $dateResources->sub(DateInterval::createFromDateString("10days"))->format(DATE_BR),
    $dateResources->add(DateInterval::createFromDateString("100days"))->format(DATE_BR)
]);

/**
 * [ DatePeriod ] http://php.net/manual/pt_BR/class.dateperiod.php
 */
fullStackPHPClassSession("A classe DatePeriod", __LINE__);

$start = new DateTime("now");
$interval = new DateInterval("P2M");
$end = new DateTime("2024-01-28");

$periodo = new DatePeriod($start, $interval, $end);

var_dump([
    $start->format(DATE_BR),
    $interval,
    $end->format(DATE_BR)
],$periodo);

echo "<h1> Sua Assinatura:</h1>";
foreach ($periodo as $recurrences) {
    echo "<p>Próximo Vencimento {$recurrences->format(DATE_BR)} </p>";
}
