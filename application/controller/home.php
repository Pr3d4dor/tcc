<?php

// Classe home
// Controla a página inicial e usa a classe
// HomeModel para pegar os dados do virtuoso
// para exibir as tabelas IDHM e IFDM da view index
// gerencia:{url}/home
class Home
{
    // O modelo utilizado pelo controller
    public $model = null;

    // Toda vez que um controlador for instanciado, estabelecer conexão ao virtuoso
    // e carregar o modelo
    function __construct()
    {
        $this->loadModel();
    }

    // Método que carrega o modelo
    public function loadModel()
    {
        require APP . 'model/home.php';
        $this->model = new HomeModel();
    }

    // Método index, quando o usuário acessar {url}/home/ ou {url}/home/index/
    public function index()
    {
        // Pegar as observaçõs dos anos mais recente possíveis para exibir na tabela da view index
        $municipiosIFDM = $this->model->getAllMunicipiosIFDM();
        $municipiosIDHM = $this->model->getAllMunicipiosIDHM();

        // Carregar as views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

    // Método index, quando o usuário acessar {url}/home/sobre/
    public function sobre()
    {
        // Carregar as views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/sobre.php';
        require APP . 'view/_templates/footer.php';
    }

    // Método index, quando o usuário acessar {url}/home/contato/
    public function contato()
    {
        // Carregar as views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/contato.php';
        require APP . 'view/_templates/footer.php';
    }
}
