<?php

require_once '../app/pdo/connessione.php';
require_once '../app/models/Studente.php';

class StudentiDAO
{

    public $database = null;
    public $connessione = null;

    public function __construct()
    {
        $this->connetti();
    }
    
    public function connetti()
    {
        $this->database = new Connessione();
        $this->connessione = $this->database->getConnessione();
        
    }

    public function disconnetti()
    {
        $this->database->closeConnessione();
        $database = null;
        $connessione = null;
        
    }

    

    public function findAll()
    {

        try {

            $query = "SELECT * FROM studenti ";

            $elencoStudenti = $this->connessione->prepare($query);

            $elencoStudenti->execute();

            $elencoStudenti->setFetchMode(PDO::FETCH_CLASS, "Studente");

            $studenti = array();

            while ($studente = $elencoStudenti->fetch()) {
                $studenti[] = $studente;
            }
            return $studenti;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function findOne($id)
    {

        try {

            $query = "SELECT * FROM studenti where id = :id ";

            $elencoStudenti = $this->connessione->prepare($query);

            $elencoStudenti->bindParam(":id", $id, PDO::PARAM_INT);

            $elencoStudenti->execute();

            //$elencoStudenti->setFetchMode(PDO::FETCH_OBJ);

            $elencoStudenti->setFetchMode(PDO::FETCH_CLASS, "Studente");

            $studenti = array();
            $studenti[] = $elencoStudenti->fetch();

            return $studenti;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {

        try {

            $query = "DELETE FROM studenti where id = :id ";

            $elencoStudenti = $this->connessione->prepare($query);

            $elencoStudenti->bindParam(":id", $id, PDO::PARAM_INT);

            $elencoStudenti->execute();

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }

    public function insert($studente)
    {
        try {
            $stmt = $this->connessione->prepare("INSERT INTO studenti (nome,cognome) VALUES(:nome , :cognome)");

            $nome = $studente->nome;
            $cognome = $studente->cognome;
            

            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            $stmt->bindParam(":cognome", $cognome, PDO::PARAM_STR);

            if ($stmt->execute()) {

                echo "Inserita la riga con id : " . $this->connessione->lastInsertId();

            }


        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}
