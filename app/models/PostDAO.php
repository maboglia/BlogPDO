<?php

require_once '../app/pdo/connessione.php';
require_once '../app/models/Post.php';

class PostDAO extends Connessione
{


    public function findAll()
    {

        try {

            $query = "SELECT * FROM post ";

            $elencoPost = parent::getConnessione()->prepare($query);

            $elencoPost->execute();

            $elencoPost->setFetchMode(PDO::FETCH_CLASS, "Post");

            $Post = array();

            while ($post = $elencoPost->fetch()) {
                $Post[] = $post;
            }
            return $Post;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function findOne($id)
    {

        try {

            $query = "SELECT * FROM post where id = :id ";

            $elencoPost = parent::getConnessione()->prepare($query);

            $elencoPost->bindParam(":id", $id, PDO::PARAM_INT);

            $elencoPost->execute();

            //$elencoPost->setFetchMode(PDO::FETCH_OBJ);

            $elencoPost->setFetchMode(PDO::FETCH_CLASS, "Post");

            $Post = array();
            $Post[] = $elencoPost->fetch();

            return $Post;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {

        try {

            $query = "DELETE FROM post where id = :id ";

            $elencoPost = parent::getConnessione()->prepare($query);

            $elencoPost->bindParam(":id", $id, PDO::PARAM_INT);

            $elencoPost->execute();

            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }

    public function insert($post)
    {
        try {
            $stmt = parent::getConnessione()->prepare("INSERT INTO post (titolo,sottotitolo, testo, id_autore) VALUES(:titolo , :sottotitolo, :testo, :id_autore)");

            $titolo = $post->titolo;
            $sottotitolo = $post->sottotitolo;
            $testo = $post->testo;
            $id_autore = $post->id_autore;
            

            $stmt->bindParam(":titolo", $titolo, PDO::PARAM_STR);
            $stmt->bindParam(":sottotitolo", $sottotitolo, PDO::PARAM_STR);
            $stmt->bindParam(":testo", $testo, PDO::PARAM_STR);
            $stmt->bindParam(":id_autore", $id_autore, PDO::PARAM_STR);

            if ($stmt->execute()) {

                $id_post = parent::getConnessione()->lastInsertId();
                //aggiorna la tabella realazionale (si può fare in altro modo...)
                $stmt2 = parent::getConnessione()->prepare("INSERT INTO r_post_categorie (id_post,id_categoria) VALUES(:id_post , :id_categoria)");
                $stmt2->bindParam(":id_post", $id_post , PDO::PARAM_INT);
                $stmt2->bindParam(":id_categoria", $post->id_categoria, PDO::PARAM_INT);

                if ($stmt2->execute()) {

                echo "Inserito il post id : " . $id_post;

                } else throw new Exception("Error Processing relazione", 1);
                


            } else throw new Exception("Error Processing posr", 1);
                


        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}
