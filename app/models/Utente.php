<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utente
 *
 * @author docente
 */
class Utente {

    private $id;
    private $nome;
    private $cognome;
    private $email;
    private $password;
    private $ruolo;
    
    //costruttore
    public function __construct() {

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


    public function __toString(){
        return $this->nome . ' ' . $this->cognome . ' ' . $this->email.'';
    }
}
