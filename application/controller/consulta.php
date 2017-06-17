<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Consulta
{
    /**
     * @var null model
     */
    public $model = null;

    /**
     * Whenever controller is created, open a database connection too and load "the model".
     */
    function __construct()
    {
        $this->loadModel();
    }

    /**
     * Loads the "model".
     * @return object model
     */
    public function loadModel()
    {
        require APP . 'model/consulta.php';
        // create new "model" (and pass the database connection)
        $this->model = new ConsultaModel();
    }

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        $ufs = $this->model->getAllUF();
        $anos = $this->model->getAllAno();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/consulta/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: resultado
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
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

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/consulta/resultado.php';
        require APP . 'view/_templates/footer.php';
    }
}
