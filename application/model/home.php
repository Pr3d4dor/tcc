<?php

class HomeModel
{
    // Conexão com o endpoint
    private $db = null;

    // Toda vez que um modelo for instanciado, estabelecer a conexao com o endpoint
    function __construct()
    {
        self::openDatabaseConnection();
    }

    // Método que estabece a conexão com o endpoint usando a configuração definida em config.php
    private function openDatabaseConnection()
    {
        $this->db = sparql_connect(DB_ENDPOINT);
    }

    // Método que pega as observacoes do data cube IDHM
    // e as dimensoes municipio, uf e a medida para exibir
    // na view index
    public function getAllMunicipiosIDHM()
    {
        $sparql = "
            SELECT ?municipio ?uf ?idhm 
            WHERE {
               ?obs a qb:Observation .
               ?obs idhm-prop:municipio ?municipio .
               ?obs idhm-prop:uf ?uf .
               ?obs idhm-prop:ano \"2010\" .
               ?obs idhm-prop:resultado ?idhm .
            }
            ORDER BY DESC(?idhm)
            LIMIT 10
        ";

        $result = sparql_query($sparql);

        // Pegar todas as linhas da query
        $resultados = array();
        while ($x = sparql_fetch_array($result)) {
            array_push($resultados, $x);
        }

        return $resultados;
    }

    // Método que pega as observacoes do data cube IFDM
    // e as dimensoes municipio, uf e a medida para exibir
    // na view index
    public function getAllMunicipiosIFDM()
    {
        $sparql = "
            SELECT ?municipio ?uf ?ifdm 
            WHERE {
               ?obs a qb:Observation .
               ?obs ifdm-prop:municipio ?municipio .
               ?obs ifdm-prop:uf ?uf .
               ?obs ifdm-prop:ano \"2013\" .
               ?obs ifdm-prop:resultado ?ifdm .
            }
            ORDER BY DESC(?ifdm)
            LIMIT 10
        ";

        $result = sparql_query($sparql);

        // Pegar todas as linhas da query
        $resultados = array();
        while ($x = sparql_fetch_array($result)) {
            array_push($resultados, $x);
        }

        return $resultados;
    }
}