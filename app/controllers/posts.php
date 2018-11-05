<?php 
// require_once '../app/dao/PostDAO.php';

class posts extends Controller{
	
	
	/**  azione index viene renderizzata di default
	* @param $titolo inserire argomenti da passare alla vista 
	    */
	    public function index($titolo = '')
	    {
            //NB: la chiamata al metodo model("classe") del controller (che estendo) include la "classe" e ritorna un oggetto del tipo richiesto 
            //alternativamente includo la classe (nei vari modi in cui si può fare) e creo una nuova istanza dell'oggetto 

            $post = $this->model("PostDAO");
		// 		$post = getAll();
		
		$this->view('main/header');
		$this->view('posts/index', ['posts'=>$post->findAll()]);
		$this->view('main/footer');
		
	}
	
	/** azione vista - stampa il dettaglio del post passato in argomento
	*   @param $id - id del post
    */
    public function vista($id = 1)
    {
           $post = $this->model("PostDAO");
            $this->view('main/header');
            $this->view('posts/view', ['posts'=>$post->findOne($id)]);
            $this->view('main/footer');
    }
    /** azione delete - stampa il dettaglio del post passato in argomento
	    *   @param $id - id del post
    */
    public function delete($id)
    {
           $post = $this->model("PostDAO");
           $messaggio = "non ha funzionato, riprova!";
            //elimina post
            if ( $post->delete($id) ) $messaggio="post eliminato" ; 
            //torna all'indice
	            $this->view('main/header');
	$this->view('posts/index', ['posts'=>[], 'messaggio'=>$messaggio]);
	$this->view('main/footer');
	
}


/** azione insert - stampa il dettaglio del post passato in argomento
*   @param $id - id del post
    */
    public function insert()
    {
           $posts = $this->model("PostDAO");
           $utenti = $this->model("UtentiDAO");
           $categorie = $this->model("CategorieDAO");
           $messaggio = "crea nuovo post";
        //se ci sonoi valori post allora crea post
           if (isset($_POST['titolo']) && isset($_POST['sottotitolo'])){
                $post = new post();
                $post->titolo = filter_var($_POST['titolo'], FILTER_SANITIZE_URL);
                $post->sottotitolo = filter_var($_POST['sottotitolo'], FILTER_SANITIZE_URL);
                $post->testo = filter_var($_POST['testo'], FILTER_SANITIZE_URL);
                $post->id_categoria = filter_var($_POST['id_categoria'], FILTER_SANITIZE_URL);
                $post->id_autore = filter_var($_POST['id_autore'], FILTER_SANITIZE_URL);
                //inserisci post
                if ( $posts->insert($post) ) $messaggio="post inserito" ; 
                //torna all'indice
                $this->index("test");

            }
            else 
            {
                $this->view('main/header');
                $this->view('posts/put', ['messaggio'=>$messaggio, 'utenti' => $utenti->findAll(), 'categorie' => $categorie->findAll()]);
                $this->view('main/footer');
            }
}


public function json($id=1)
    {
                // $post = $this->model("PostDAO");

                // $data = $post->findAll();
                // /** whatever you're serializing **/;
                $post = $this->model("PostDAO");
                $data = $post->findAll();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
                 header('Content-Type: application/json');
                 echo json_encode($data);

            //echo $data[0]->titolo;


}
}
