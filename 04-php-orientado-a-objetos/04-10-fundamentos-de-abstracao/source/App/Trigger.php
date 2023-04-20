<?php

namespace Source\App;

class Trigger
{

    private const TRIGGER   = "trigger";
    public const ACCEPT     = "accept";
    public const WARNING    = "warning";
    public const ERROR      = "error";

    private static $message;
    private static $errorType;
    private static $error;
    //somente mostra na tela, na hora da operaão
    public static function show($message, $errorType = null)
    {
        self::setError($message, $errorType);
        echo self::$error;
    }
    //retorna e pode ser utiliza com variavel
    public static function push($message, $errorType = null)
    {
        self::setError($message, $errorType);
        return self::$error;
    }

    //Metodo que monta a mensagem de erro
    private static function setError($message, $errorType)
    {
                        //função nativa php que verifica as const da classe
        $reflection = new \ReflectionClass(__CLASS__);
        $errorTypes = $reflection->getConstants();

        self::$message = filter_var($message, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        self::$errorType = (!empty($errorType) || in_array($errorType, $errorTypes) ? "{$errorType}" : "");
        self::$error = "<p class='" . self::TRIGGER ." ". self::$errorType . "'>".self::$message."</p>";

    }




}
