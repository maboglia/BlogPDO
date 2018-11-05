<?php

require_once '../app/pdo/connessione.php';
require_once '../app/models/Utente.php';

class UtentiDAO extends Connessione
{


    public function findAll()
    {

        try {

            $query = "SELECT * FROM utenti ";

            $elencoUtenti = parent::getConnessione()->prepare($query);

            $elencoUtenti->execute();

            $elencoUtenti->setFetchMode(PDO::FETCH_CLASS, "Utente");

            $Utenti = array();

            while ($stente = $elencoUtenti->fetch()) {
                $Utenti[] = $stente;
            }
            return $Utenti;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function findOne($id)
    {

        try {

            $query = "SELECT * FROM utenti where id = :id ";

            $elencoUtenti = parent::getConnessione()->prepare($query);

            $elencoUtenti->bindParam(":id", $id, PDO::PARAM_INT);

            $elencoUtenti->execute();

            //$elencoUtenti->setFetchMode(PDO::FETCH_OBJ);

            $elencoUtenti->setFetchMode(PDO::FETCH_CLASS, "Utente");

            $Utenti = array();
            $Utenti[] = $elencoUtenti->fetch();

            return $Utenti;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {

        try {

            $query = "DELETE FROM utenti where id = :id ";

            $elencoUtenti = parent::getConnessione()->prepare($query);

            $elencoUtenti->bindParam(":id", $id, PDO::PARAM_INT);

            $elencoUtenti->execute();

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }

    public function insert($stente)
    {
        try {
            $stmt = parent::getConnessione()->prepare("INSERT INTO Utenti (nome,cognome) VALUES(:nome , :cognome)");

            $nome = $stente->nome;
            $cognome = $stente->cognome;
            

            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            $stmt->bindParam(":cognome", $cognome, PDO::PARAM_STR);

            if ($stmt->execute()) {

                echo "Inserita la riga con id : " . parent::getConnessione()->lastInsertId();

            }


        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}
