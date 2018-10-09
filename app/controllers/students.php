<?php 

class Students extends Controller{

    public function index($nome = '')
    {

            $studente = $this->model('Studente');
            echo $studente->nome = $nome;
            
            
            
            $this->view('students/index', ['nome'=>$studente->nome]);

    }
}