<?php 
// require_once '../app/dao/UtentiDAO.php';

class users extends Controller{
	
	
	/**  azione index viene renderizzata di default
	* @param $nome inserire argomenti da passare alla vista 
	    */
	    public function index($nome = '')
	    {
            //NB: la chiamata al metodo model("classe") del controller (che estendo) include la "classe" e ritorna un oggetto del tipo richiesto 
            //alternativamente includo la classe (nei vari modi in cui si può fare) e creo una nuova istanza dell'oggetto 

            $utenti = $this->model("UtentiDAO");
		// 		$utenti = getAll();
		
		$this->view('main/header');
		$this->view('users/index', ['utenti'=>$utenti->findAll()]);
		$this->view('main/footer');
		
	}
	
	/** azione vista - stampa il dettaglio dell'utente passato in argomento
	*   @param $id - id dell'utente
    */
    public function vista($id = 1)
    {
           $utenti = $this->model("UtentiDAO");
            $this->view('main/header');
            $this->view('users/view', ['utenti'=>$utenti->findOne($id)]);
            $this->view('main/footer');
    }
    /** azione delete - stampa il dettaglio dell'utente passato in argomento
	    *   @param $id - id dell'utente
    */
    public function delete($id)
    {
           $utenti = $this->model("UtentiDAO");
           $messaggio = "non ha funzionato, riprova!";
            //elimina utente
            if ( $utenti->delete($id) ) $messaggio="utente eliminato" ; 
            //torna all'indice
	            $this->view('main/header');
	$this->view('users/index', ['utenti'=>[], 'messaggio'=>$messaggio]);
	$this->view('main/footer');
	
}


/** azione insert - stampa il dettaglio dell'utente passato in argomento
*   @param $id - id dell'utente
    */
    public function insert()
    {
           $utenti = $this->model("UtentiDAO");
           $messaggio = "crea nuovo utente";
        //se ci sonoi valori post allora crea utente
           if (isset($_POST['nome']) && isset($_POST['cognome'])){
                $utente = new utente();
                $utente->nome = filter_var($_POST['nome'], FILTER_SANITIZE_URL);
                $utente->cognome = filter_var($_POST['cognome'], FILTER_SANITIZE_URL);
                //inserisci utente
                if ( $utenti->insert($utente) ) $messaggio="utente inserito" ; 
                //torna all'indice
}
$this->view('main/header');
$this->view('users/put', ['messaggio'=>$messaggio]);
$this->view('main/footer');

}


public function json($id=1)
    {
                // $utenti = $this->model("UtentiDAO");

                // $data = $utenti->findAll();
                // /** whatever you're serializing **/;
                $utenti = $this->model("UtentiDAO");
                $data = $utenti->findOne($id);
                 header('Content-Type: application/json');
                 echo json_encode($data[0]->nome);

            //echo $data[0]->nome;


}
}
