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
    public $id;
    public $nome;
    public $cognome;
    public $matricola;
    public $data;
    public $email;
    public $eta=10;
    
    public function __construct() {
        echo "studente costruito...";
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
