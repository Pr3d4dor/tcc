<?php

// Classe consulta
// Recebe os resultados do formulário de consulta e
// usa a classe ConsultaModel para fazer a lógica
// para exibir os resultados
// na página resultados
// gerencia:{url}/consulta
class Consulta
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
        require APP . 'model/consulta.php';
        $this->model = new ConsultaModel();
    }

    // Método index, quando o usuário acessar {url}/consulta/ ou {url}/consulta/index/
    public function index()
    {
        // Pegar as ufs e anos disponiveis no virtuoso para exibir no formulário da view consulta
        $ufs = $this->model->getAllUF();
        $anos = $this->model->getAllAno();

        // Carregar as views
        require APP . 'view/_templates/header.php';
        require APP . 'view/consulta/index.php';
        require APP . 'view/_templates/footer.php';
    }

    // Método resultado, quando o usuário acessar {url}/consulta/resultado/
    public function resultado()
    {
        // Resultados obtidos com os valores escolhidos pelo usuário no formulário
        $resultadosIDHM = $this->model->getResultadosIDHM();
        $resultadosIFDM = $this->model->getResultadosIFDM();

        // Resultados obtidos com os valores escolhidos pelo usuário nos formatos (JSON, CSV, Turle e XML)
        $sparqlFormatos = $this->model->getUrlConsultaFormatos();

        // Graficos obtidos com os valores escolhidos pelo usuário
        $graficoIDHM = $this->model->getGraficoIDHM();
        $graficoIFDM = $this->model->getGraficoIFDM();

        // Medias
        $mediaIDHM = $this->model->getMediaIDHM();
        $mediaIFDM = $this->model->getMediaIFDM();

        // Carregar as views
        require APP . 'view/_templates/header.php';
        require APP . 'view/consulta/resultado.php';
        require APP . 'view/_templates/footer.php';
    }
}
