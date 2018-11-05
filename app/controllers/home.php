<?php 

class home extends Controller
{


    /**  azione index viene renderizzata di default
     * @param $nome inserire argomenti da passare alla vista 
     */
    public function index($nome = '')
    {
        $this->view('main/header');
        echo "<h1>Benvenuto nel Blog</h1>";
        $this->view('main/footer');
    }
}