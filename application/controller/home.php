<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home
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
        require APP . 'model/home.php';
        // create new "model" (and pass the database connection)
        $this->model = new HomeModel();
    }

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        $municipiosIFDM = $this->model->getAllMunicipiosIFDM();
        $municipiosIDHM = $this->model->getAllMunicipiosIDHM();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: sobre
     * This method handles what happens when you move to http://yourproject/home/exampleone
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function sobre()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/sobre.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: contato
     * This method handles what happens when you move to http://yourproject/home/exampletwo
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function contato()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/contato.php';
        require APP . 'view/_templates/footer.php';
    }
}
