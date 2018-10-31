<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Studente
 *
 * @author docente
 */
class Studente {

    private $id;
    private $nome;
    private $cognome;
    private $matricola;
    private $data;
    private $email;
    private $eta=10;
    
    private static $numeroMatricola = 0;

    //costruttore
    public function __construct() {
        self::$numeroMatricola = self::$numeroMatricola + 1;
        //echo "studente inserito, numero di matricola: ". self::$numeroMatricola;

    }

    //metodi getter e setter generici
    public function __get($nomeAttributo)
    {
        return $this->$nomeAttributo;
    }

    public function __set($nomeAttributo, $value)
    {
        if (isset($value)) $this->$nomeAttributo = $value;
    }


    public function getEta()
    {
        $datetime1 = new DateTime($this->data);
        $datetime2 = new DateTime("now");
        $interval = $datetime1->diff($datetime2);
        return $interval->format('%R%a days');
    }

    public function __toString(){
        return $this->id . ' ' . $this->nome . ' ' . $this->cognome . ' ' . $this->matricola . ' ' . $this->getEta() . ' ';
    }
}
