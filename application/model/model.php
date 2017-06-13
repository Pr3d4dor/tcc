<?php

class Model
{
    /**
     * @param object $db A virtuoso database connection
     */
    function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllMunicipiosIFDM()
    {
        $sparql = "
        PREFIX qb: <http://purl.org/linked-data/cube#>
        PREFIX ifdm-prop: <http://lod.unicentro.br/dc/ifdm/prop/>
        
        SELECT ?municipio ?uf ?ifdm 
        WHERE {
           ?obs a qb:Observation .
           ?obs ifdm-prop:municipio ?municipio .
           ?obs ifdm-prop:uf ?uf .
           ?obs ifdm-prop:ano \"2013\" .
           ?obs ifdm-prop:resultado ?ifdm .
        }
        ORDER BY DESC(?ifdm)
        LIMIT 10";

        $result = sparql_query($sparql);

        // Pegar todas as linhas da query
        $resultados = array();
        while ($x = sparql_fetch_array($result)) {
            array_push($resultados, $x);
        }

        return $resultados;
    }


    public function getAllMunicipiosIDHM()
    {
        $sparql = "
        PREFIX qb: <http://purl.org/linked-data/cube#>
        PREFIX idhm-prop: <http://lod.unicentro.br/dc/idhm/prop/>
        
        SELECT ?municipio ?uf ?idhm 
        WHERE {
           ?obs a qb:Observation .
           ?obs idhm-prop:municipio ?municipio .
           ?obs idhm-prop:uf ?uf .
           ?obs idhm-prop:ano \"2010\" .
           ?obs idhm-prop:resultado ?idhm .
        }
        ORDER BY DESC(?idhm)
        LIMIT 10";

        $result = sparql_query( $sparql );

        // Pegar todas as linhas da query
        $resultados = array();
        while ($x = sparql_fetch_array($result)) {
            array_push($resultados, $x);
        }

        return $resultados;
    }
}
