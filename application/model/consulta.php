<?php

class ConsultaModel
{
    // Conexão com o endpoint
    private $db = null;

    // SPARQL referentes aos parâmetros que o usuário escolheu na interface
    private $sparqlIDHM = null;
    private $sparqlIFDM = null;

    // Resultados IDHM e IFDM
    private $resultadosIDHM = array();
    private $resultadosIFDM = array();

    // Media IDHM e IFDM da consulta que o usuário fez
    private $mediaIDHM = array();
    private $mediaIFDM = array();

    // URL para consultar o endpoint através de GET para salvar nos formatos (JSON, CSV, Turle e XML)
    private $sparqlFormatos = array();

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

    // Método que retorna todos os anos disponíveis no endpoint
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

    // Método que retorna todas as UF's disponíveis no endpoint
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

    // Método que retorna todos as observações do data cube IDHM com os parâmetros escolhidos pelo usuário
    // na interface
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
        $totalIDHM = 0.0;
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

            $totalIDHM += $idhm;

            array_push($resultados, $x);
        }

        if (count($resultados) > 0) {
            $mediaIDHM['valor'] = floatval($totalIDHM / count($resultados));

            if ($mediaIDHM['valor'] < 0.5) {
                $mediaIDHM['cor'] = "red";
            } else if ($mediaIDHM['valor'] >= 0.5 && $mediaIDHM['valor'] < 0.6) {
                $mediaIDHM['cor'] = "orange";
            } else if ($mediaIDHM['valor'] >= 0.6 && $mediaIDHM['valor'] < 0.7) {
                $mediaIDHM['cor'] = "yellow";
            } else if ($mediaIDHM['valor'] >= 0.7 && $mediaIDHM['valor'] < 0.8) {
                $mediaIDHM['cor'] = "green";
            } else {
                $mediaIDHM['cor'] = "blue";
            }

            $this->mediaIDHM = $mediaIDHM;
        }

        $this->resultadosIDHM = $resultados;

        return $resultados;
    }

    // Método que retorna todos as observações do data cube IFDM com os parâmetros escolhidos pelo usuário
    // na interface
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
        $totalIFDM = 0.0;
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

            $totalIFDM += $ifdm;

            array_push($resultados, $x);
        }

        if (count($resultados) > 0) {
            $mediaIFDM['valor'] = floatval($totalIFDM / count($resultados));

            if ($mediaIFDM['valor'] < 0.4) {
                $mediaIFDM['cor'] = "red";
            } else if ($mediaIFDM['valor'] >= 0.4 && $mediaIFDM['valor'] < 0.6) {
                $mediaIFDM['cor'] = "orange";
            } else if ($mediaIFDM['valor'] >= 0.6 && $mediaIFDM['valor'] < 0.8) {
                $mediaIFDM['cor'] = "yellow";
            } else {
                $mediaIFDM['cor'] = "blue";
            }

            $this->mediaIFDM = $mediaIFDM;
        }

        $this->resultadosIFDM = $resultados;

        return $resultados;
    }

    // Método que cria as URL que serão passadas ao virtuoso com os parâmetros escolhis pelo usuário na interface
    // e exibidas na interface para que o usuário possa salvar nos formatos (JSON, CSV, Turle e XML).
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

    // Getters e setters

    public function getGraficoIDHM()
    {
        if (count($this->resultadosIDHM) > 0) {

            // Instânciando o objeto que representa o gráfico
            $p = new chartphp();

            // Ver quantos municipios estão nos resultados da consulta para poder exibir o gráfico
            $municipios = array();
            foreach ($this->resultadosIDHM as $resultado) {
                $municipio = $resultado['municipio'];

                if (!in_array($municipio, $municipios)) {
                    array_push($municipios, $resultado['municipio']);
                }
            }

            // Gerando os pontos do gráfico
            $pontos = array();
            for ($i = 0; $i < count($municipios); $i++) {
                $municipio = $municipios[$i];

                $ponto = array();
                foreach ($this->resultadosIDHM as $resultado) {
                    if ($resultado['municipio'] == $municipio) {
                        $dimensoes = array();
                        array_push($dimensoes, intval($resultado['ano']));
                        array_push($dimensoes, floatval($resultado['idhm']));
                        array_push($ponto, $dimensoes);
                    }
                }
                array_push($pontos, $ponto);
            }

            // Configurações do gráfico
            $p->data = $pontos;
            $p->chart_type = "line";
            if (count($municipios) > 1) {
                $p->legend_show = false;
            } else {
                $p->legend_show = true;
            }
            $p->title = "Evolução IDHM";
            $p->ylabel = "IDHM";
            $p->xlabel = "Ano";
            $p->height = "300px";
            $p->width = "500px";
            $p->series_label = $municipios;

            // Renderizando o gráfico (código HTML)
            $out = $p->render('c1');
        } else {
            $out = "";
        }

        // Retornando o código HTML
        return $out;
    }

    public function getGraficoIFDM()
    {
        if (count($this->resultadosIFDHM) > 0) {
            // Instânciando o objeto que representa o gráfico
            $p = new chartphp();

            // Ver quantos municipios estão nos resultados da consulta para poder exibir o gráfico
            $municipios = array();
            foreach ($this->resultadosIFDM as $resultado) {
                $municipio = $resultado['municipio'];

                if (!in_array($municipio, $municipios)) {
                    array_push($municipios, $resultado['municipio']);
                }
            }

            // Gerando os pontos do gráfico
            $pontos = array();
            for ($i = 0; $i < count($municipios); $i++) {
                $municipio = $municipios[$i];

                $ponto = array();
                foreach ($this->resultadosIFDM as $resultado) {
                    if ($resultado['municipio'] == $municipio) {
                        $dimensoes = array();
                        array_push($dimensoes, intval($resultado['ano']));
                        array_push($dimensoes, floatval($resultado['ifdm']));

                        array_push($ponto, $dimensoes);

                    }
                }
                array_push($pontos, $ponto);
            }

            // Configurações do gráfico
            $p->data = $pontos;
            $p->chart_type = "line";
            if (count($municipios) > 1) {
                $p->legend_show = false;
            } else {
                $p->legend_show = true;
            }
            $p->title = "Evolução IFDM";
            $p->ylabel = "IFDM";
            $p->xlabel = "Ano";
            $p->height = "400px";
            $p->width = "500px";
            $p->series_label = $municipios;

            // Renderizando o gráfico (código HTML)
            $out = $p->render('c2');
        } else {
            $out = "";
        }

        // Retornando o código HTML
        return $out;
    }

    public function getMediaIDHM()
    {
        return $this->mediaIDHM;
    }

    public function setMediaIDHM($mediaIDHM)
    {
        $this->mediaIDHM = $mediaIDHM;
    }

    public function getMediaIFDM()
    {
        return $this->mediaIFDM;
    }


    public function setMediaIFDM($mediaIFDM)
    {
        $this->mediaIFDM = $mediaIFDM;
    }

}
