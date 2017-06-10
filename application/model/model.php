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

    /**
     * Get all songs from database
     */
    public function getAllMunicipiosIFDM()
    {
        $sparql = "SELECT ?municipio ?uf ?ifdm 
        WHERE {
           ?obs a qb:Observation .
           ?obs ifdm-prop:municipio ?municipio .
           ?obs ifdm-prop:uf ?uf .
           ?obs ifdm-prop:ano ?ano .
           ?obs ifdm-prop:resultado ?ifdm .
        }
        ORDER BY DESC(?ifdm)
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
