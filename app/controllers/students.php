<?php 
require_once '../app/dao/studentiDAO.php';          

class Students extends Controller{
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
    public function delete($id = 1)
    {
            
           $studenti = new StudentiDAO();
           $messaggio = "non ha funzionato, riprova!";
            //elimina utente
            if ( $studenti->delete($id) ) $messaggio="studente eliminato" ; 
            //torna all'indice
            $this->view('main/header');
            $this->view('students/index', ['studenti'=>$studenti->findAll(), 'messaggio'=>$messaggio]);
            $this->view('main/footer');

    }

}