<?php

class ConsultaModel
{
    /**
     * @var null Database Connection
     */
    private $db = null;

    private $sparqlIDHM = null;
    private $sparqlIFDM = null;
    private $sparqlFormatos = array();

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


        // Salvar a query no modelo e substituir os espaços por + para usar a query no virtuoso
        // Através do GET para exibir nos botões na interface para salvar nos formatos (JSON, CSV, TTL, XML)
        $this->sparqlIDHM = trim(preg_replace('/[\s\t\n\r\s]+/', ' ', $sparql));
        $this->sparqlIDHM = str_replace(" ", "+", $this->sparqlIDHM);

        $result = sparql_query($sparql);

        // Pegar todas as linhas da query e setar a cor de acordo com o IDHM
        $resultados = array();
        while ($x = sparql_fetch_array($result)) {
            $idhm = floatval($x['idhm']);

            if ($idhm < 0.5) {
                $x['cor'] = "red";
            } else if ($idhm >= 0.5 && $idhm < 0.6) {
                $x['cor'] = "orange";
            } else if ($idhm >= 0.6 && $idhm < 0.7) {
                $x['cor'] = "yellow";
            } else if ($idhm >= 0.7 && $idhm < 0.8) {
                $x['cor'] = "green";
            } else {
                $x['cor'] = "blue";
            }

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
        // Salvar a query no modelo e substituir os espaços por + para usar a query no virtuoso
        // Através do GET para exibir nos botões na interface para salvar nos formatos (JSON, CSV, TTL, XML)
        $this->sparqlIFDM = trim(preg_replace('/[\s\t\n\r\s]+/', ' ', $sparql));
        $this->sparqlIFDM = str_replace(" ", "+", $this->sparqlIFDM);

        $result = sparql_query($sparql);

        // Pegar todas as linhas da query e setar a cor de acordo com o IFDM
        $resultados = array();
        while ($x = sparql_fetch_array($result)) {
            $ifdm = floatval($x['ifdm']);

            if ($ifdm < 0.4) {
                $x['cor'] = "red";
            } else if ($ifdm >= 0.4 && $ifdm < 0.6) {
                $x['cor'] = "orange";
            } else if ($ifdm >= 0.6 && $ifdm < 0.8) {
                $x['cor'] = "yellow";
            } else {
                $x['cor'] = "blue";
            }

            array_push($resultados, $x);
        }

        return $resultados;
    }

    public function getUrlConsultaFormatos()
    {
        // Consulta SPARQL com os valores escolhids pelo usuário e com os espaços substituídos por +
        // Para passar para o endpoint no virtuoso através de GET para permitir o usuário salvar os resultados
        // em JSON, CSV, Turtle e XML
        $sparqlIDHM = $this->getSparqlIDHM();
        $sparqlIFDM = $this->getSparqlIFDM();

        $this->sparqlFormatos['jsonIDHM'] = DB_ENDPOINT . "?default-graph-uri=&query={$sparqlIDHM}&format=application%2Fsparql-results%2Bjson&timeout=0&debug=on";
        $this->sparqlFormatos['csvIDHM'] = DB_ENDPOINT . "?default-graph-uri=&query={$sparqlIDHM}&format=text%2Fcsv&timeout=0&debug=on";
        $this->sparqlFormatos['turtleIDHM'] = DB_ENDPOINT . "?default-graph-uri=&query={$sparqlIDHM}&format=text%2Fturtle&timeout=0&debug=on";
        $this->sparqlFormatos['xmlIDHM'] = DB_ENDPOINT . "?default-graph-uri=&query={$sparqlIDHM}&format=application%2Fsparql-results%2Bxml&timeout=0&debug=on";

        $this->sparqlFormatos['jsonIFDM'] = DB_ENDPOINT . "?default-graph-uri=&query={$sparqlIFDM}&format=application%2Fsparql-results%2Bjson&timeout=0&debug=on";
        $this->sparqlFormatos['csvIFDM'] = DB_ENDPOINT . "?default-graph-uri=&query={$sparqlIFDM}&format=text%2Fcsv&timeout=0&debug=on";
        $this->sparqlFormatos['turtleIFDM'] = DB_ENDPOINT . "?default-graph-uri=&query={$sparqlIFDM}&format=text%2Fturtle&timeout=0&debug=on";
        $this->sparqlFormatos['xmlIFDM'] = DB_ENDPOINT . "?default-graph-uri=&query={$sparqlIFDM}&format=application%2Fsparql-results%2Bxml&timeout=0&debug=on";

        return $this->sparqlFormatos;
    }

    public function getSparqlIDHM()
    {
        return $this->sparqlIDHM;
    }


    public function setSparqlIDHM($sparqlIDHM)
    {
        $this->sparqlIDHM = $sparqlIDHM;
    }


    public function getSparqlIFDM()
    {
        return $this->sparqlIFDM;
    }


    public function setSparqlIFDM($sparqlIFDM)
    {
        $this->sparqlIFDM = $sparqlIFDM;
    }

}
