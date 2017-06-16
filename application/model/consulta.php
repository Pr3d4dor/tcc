<?php

class ConsultaModel
{
    /**
     * @var null Database Connection
     */
    private $db = null;

    /**
     * Whenever model is created, open a database connection.
     */
    function __construct()
    {
        self::openDatabaseConnection();
    }

    /**
     * Open the database connection with the credentials from application/config/config.php
     */
    private function openDatabaseConnection()
    {
        $this->db = sparql_connect(DB_ENDPOINT);
    }

    public static function getAllAno()
    {
        $sparql = "
            SELECT DISTINCT ?ano WHERE {
              ?obs a qb:Observation .
              ?anoV a qb:DimensionProperty .
              ?anoV rdfs:label \"Ano\"@pt-br .
              ?obs ?anoV ?ano .
            }
            ORDER BY ?ano
        ";

        $result = sparql_query($sparql);

        // Pegar todas as linhas da query
        $resultados = array();
        while ($x = sparql_fetch_array($result)) {
            array_push($resultados, $x);
        }

        return $resultados;
    }

    public function getAllUF()
    {
        $sparql = "
            SELECT DISTINCT ?uf {
              ?obs a qb:Observation .
              ?obs idhm-prop:uf ?uf .
            }
        ";

        $result = sparql_query($sparql);

        // Pegar todas as linhas da query
        $resultados = array();
        while ($x = sparql_fetch_array($result)) {
            array_push($resultados, $x);
        }

        return $resultados;
    }

    public function getResultadosIDHM()
    {
        $codigo = $_POST['codigo'];
        $municipio = $_POST['municipio'];
        $uf = $_POST['uf'];
        $ano = $_POST['ano'];

        if ($codigo == "") {
            $codigo = "?codigo";
        } else {
            $codigo = "\"" . $codigo . "\"";
        }

        if ($municipio == "") {
            $municipio = "?municipio";
        } else {
            $municipio = "\"" . $municipio . "\"";
        }
        if ($uf == "*") {
            $uf = "?uf";
        } else {
            $uf = "\"" . $uf . "\"";
        }

        if ($ano == "*") {
            $ano = "?ano";
        } else {
            $ano = "\"" . $ano . "\"";
        }

        $sparql = "
            SELECT ?codigo ?municipio ?uf ?ano ?idhm {
              
              ?obs a qb:Observation . 
              ?obs idhm-prop:codigo {$codigo} .
              ?obs idhm-prop:municipio {$municipio} .
              ?obs idhm-prop:uf {$uf} .
              ?obs idhm-prop:ano {$ano} .
              
              ?obs idhm-prop:codigo ?codigo .
              ?obs idhm-prop:municipio ?municipio .
              ?obs idhm-prop:uf ?uf .
              ?obs idhm-prop:ano ?ano .
              
              ?obs idhm-prop:resultado ?idhm .
            }
        ";

        $result = sparql_query($sparql);

        // Pegar todas as linhas da query
        $resultados = array();
        while ($x = sparql_fetch_array($result)) {
            array_push($resultados, $x);
        }

        return $resultados;
    }

    public function getResultadosIFDM()
    {

        $codigo = $_POST['codigo'];
        $municipio = $_POST['municipio'];
        $uf = $_POST['uf'];
        $ano = $_POST['ano'];

        if ($codigo == "") {
            $codigo = "?codigo";
        } else {
            $codigo = "\"" . $codigo . "\"";
        }

        if ($municipio == "") {
            $municipio = "?municipio";
        } else {
            $municipio = "\"" . $municipio . "\"";
        }
        if ($uf == "*") {
            $uf = "?uf";
        } else {
            $uf = "\"" . $uf . "\"";
        }

        if ($ano == "*") {
            $ano = "?ano";
        } else {
            $ano = "\"" . $ano . "\"";
        }

        $sparql = "
            SELECT ?codigo ?municipio ?uf ?ano ?ifdm {
              
              ?obs a qb:Observation . 
              ?obs ifdm-prop:codigo {$codigo} .
              ?obs ifdm-prop:municipio {$municipio} .
              ?obs ifdm-prop:uf {$uf} .
              ?obs ifdm-prop:ano {$ano} .
              
              ?obs ifdm-prop:codigo ?codigo .
              ?obs ifdm-prop:municipio ?municipio .
              ?obs ifdm-prop:uf ?uf .
              ?obs ifdm-prop:ano ?ano .
              
              ?obs ifdm-prop:resultado ?ifdm .
            }
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
