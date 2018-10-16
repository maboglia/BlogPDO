<?php 
require_once '../app/models/Studente.php';          
require_once '../app/dao/studentiDAO.php';          

class Students extends Controller{
        const URL_BASE = "http ://localhost/coding/Studente_PDO/public/";

    /**  azione index viene renderizzata di default
    * @param $nome inserire argomenti da passare alla vista 
    */
    public function index($nome = '')
    {
           $studenti = new StudentiDAO();
            // $studenti = getAll();

            $this->view('main/header');
            $this->view('students/index', ['studenti'=>$studenti->findAll()]);
            $this->view('main/footer');

    }
    /** azione vista - stampa il dettaglio dell'utente passato in argomento
    *   @param $id - id dell'utente
    */
    public function vista($id = 1)
    {
            
           $studenti = new StudentiDAO();

            $this->view('main/header');
            $this->view('students/view', ['studenti'=>$studenti->findOne($id)]);
            $this->view('main/footer');

    }
    /** azione delete - stampa il dettaglio dell'utente passato in argomento
    *   @param $id - id dell'utente
    */
    public function delete($id)
    {
            
           $studenti = new StudentiDAO();
           $messaggio = "non ha funzionato, riprova!";
            //elimina utente
            if ( $studenti->delete($id) ) $messaggio="studente eliminato" ; 
            //torna all'indice
            $this->view('main/header');
            $this->view('students/index', ['studenti'=>[], 'messaggio'=>$messaggio]);
            $this->view('main/footer');

    }

    /** azione insert - stampa il dettaglio dell'utente passato in argomento
    *   @param $id - id dell'utente
    */
    public function insert()
    {
            
           $studenti = new StudentiDAO();
           $messaggio = "crea nuovo studente";
        //se ci sonoi valori post allora crea studente
           if (isset($_POST['nome']) && isset($_POST['cognome'])){
                $studente = new Studente();
                $studente->nome = filter_var($_POST['nome'], FILTER_SANITIZE_URL);
                $studente->cognome = filter_var($_POST['cognome'], FILTER_SANITIZE_URL);
                //inserisci utente
                if ( $studenti->insert($studente) ) $messaggio="studente inserito" ; 
                //torna all'indice
           }
            $this->view('main/header');
            $this->view('students/put', ['messaggio'=>$messaggio]);
            $this->view('main/footer');

    }

}