<?php 

class categories extends Controller{
	
	
	/**  azione index viene renderizzata di default
	* @param $nome inserire argomenti da passare alla vista 
	    */
	    public function index($nome = '')
	    {
		$categorie = $this->model("CategorieDAO");
		// 		$categorie = getAll();
		
		$this->view('main/header');
		$this->view('categories/index', ['categorie'=>$categorie->findAll()]);
		$this->view('main/footer');
		
	}

    
    /** azione delete - stampa il dettaglio dell'utente passato in argomento
	    *   @param $id - id dell'utente
    */
    public function delete($id)
    {
           $categorie = $this->model("CategorieDAO");
           $messaggio = "non ha funzionato, riprova!";
            //elimina utente
            if ( $categorie->delete($id) ) 
            {
                $messaggio="utente eliminato" ; 
                //torna all'indice
                $this->index("test");
            }
            else echo "non eliminato";
	
}


/** azione insert - stampa il dettaglio dell'utente passato in argomento
*   @param $id - id dell'utente
    */
    public function insert()
    {
           $categorie = $this->model("CategorieDAO");
           $messaggio = "crea nuovo cat";
        //se ci sonoi valori post allora crea utente
           if (isset($_POST['categoria'])){
                $categoria = new categoria();
                $categoria->categoria = filter_var($_POST['categoria'], FILTER_SANITIZE_URL);
                //inserisci utente
                if ( $categorie->insert($categoria) ) $messaggio="categoria inserito" ; 
                //torna all'indice
            $this->index("test");

            }else
            {
            $this->view('main/header');
            $this->view('categories/put', ['messaggio'=>$messaggio]);
            $this->view('main/footer');
            }
}


public function json($id=1)
    {
                // $categorie = $this->model("CategorieDAO");

                // $data = $categorie->findAll();
                // /** whatever you're serializing **/;
                $categorie = $this->model("CategorieDAO");
                $data = $categorie->findOne($id);
                 header('Content-Type: application/json');
                 echo json_encode($data[0]->nome);

            //echo $data[0]->nome;


}
}
