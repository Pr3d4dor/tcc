<?php

// Classe consulta
// Toda vez que o usuário tentar acessar uma url
// que não existe ou um método que não existe em
// um controller, redirecionar para esse controller
// e exibir a view de erro
class Problem
{
    // Método index, quando o usuário acessar {url}/problem/ ou {url}/problemindex/
    public function index()
    {
        // Carregar as views
        require APP . 'view/_templates/header.php';
        require APP . 'view/problem/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
