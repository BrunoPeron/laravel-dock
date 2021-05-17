<?php


namespace App\Classes;



use App\Http\Controllers\LogsController;

class Criptografia
{
    CONST CIFRA = "AES-256-CBC";
    private $controller;

    public function __construct()
    {
        $this->controller = new LogsController();
    }

    private function decriptOriginal($msg)
    {
        return $msg;

    }

    private function encriptOriginal($msg)
    {
        return $msg;

    }

    public function revelar($msg){
        if (auth()->check()){
            $this->controller->criar($msg);
            return $this->encriptOriginal($msg);
        } else {
            return false;
        }
    }

    public function embaralhar(){

    }
}

