<h3>Sobre o projeto</h3>
<hr>
<p>Muitas informações estão presentes na Internet e muitas delas são difíceis de serem entendidas por computadores e por
    pessoas devido à falta de padronização na sua publicação. Quando as informações são publicadas utilizando o conceito
    de Dados Abertos Conectados, com um vocabulário comum, é possível usar definições e conceitos de forma padronizada.
    O Consórcio W3C recomenda a utilização do RDF Data Cube Vocabulary para a publicação de dados estatísticos na
    Internet. O uso das características multidimensionais do Vocabulário RDF Data Cube facilita a apresentação visual
    destes dados. Nesse contexto, este protótipo de interface tem como objetivo facilitar a utilização, análise e
    entendimento destes dados por usuários não especialistas. </p>

<p> Como estudo de caso esse protótipo utilizou as bases de dados sobre o IDHM e o Índice FIRJAN dos munícipios do
    Brasil. Essas bases de dados podem ser encontadas nos links adicionais abaixo. </p>

<p> A quantidade de dados disponíveis na Web tem aumentado consideravelmente devido ao sucesso das iniciativas para
    Dados Abertos. No Brasil a Lei da Transparência rege a Gestão Fiscal determinando a disponibilização, em tempo real,
    de informações pormenorizadas sobre a execução orçamentária e financeira da União, dos Estados, do Distrito Federal
    e dos Municípios.</p>

</p> Os dados do Governo Brasileiro estão disponíveis no Portal Brasileiro de Dados Abertos. Nesse portal podem ser
encontrados conjuntos de dados sobre diferentes domínios, tais como:</p>

<ul>
    <li>Lixo: Destinação do lixo domiciliar, percentual de domicílios particulares permanentes com lixo coletado em
        caçamba de serviço de limpeza.
    </li>
    <li>Saúde: Unidades Básicas de Saúde - UBS, indicadores sobre saúde da família, distribuição de Agentes Comunitários
        de Saúde – ACS.
    </li>
    <li>Finanças: Indicadores sobre Finanças Públicas Anuais, Índice Nacional de Preços ao Consumidor – INPC.</li>
</ul>

<p>Entretanto, estes dados, assim como a maioria dos Dados Abertos disponíveis na Web, ainda precisam ser tratados para
    serem considerados como Dados Abertos Conectados (Linked Open Data - LOD). Vocabulários são usados em Dados Abertos
    Conectados para definir conceitos e promover a interoperabilidade semântica. A iniciativa Linked Open Vocabulary
    (LOV) tem como objetivo analisar e avaliar a qualidade de vocabulários, assim como disponibilizar um compilado
    on-line de vocabulários abertos para serem reutilizados na Web.</p>

<p> Os vocabulários indexados no LOV são associados a instituições de renome como por exemplo, World Wide Web Consortium
    (W3C), dando credibilidade às definições usadas. Por isso, deve ser escolhido o vocabulário que descreve os dados da
    forma mais fiel possível, sendo que tais vocabulários são reutilizados por meio de seus prefixos. </p>

<p> Dentre os vocabulários disponíveis em LOV, utilizou-se nesta pesquisa o Vocabulário RDF Data Cube. Esse vocabulário
    fornece um modelo para publicação de dados multidimensionais, como por exemplo, dados estatísticos, no formato de
    Dados Abertos Conectados. Dados multidimensionais são informações que possuem relações com vários atributos, como
    por exemplo, a previsão meteorológica de uma região, na qual cada dado sobre a quantidade de chuva estaria
    relacionado a uma cidade e a data da medição. </p>

<p> Embora o uso de Dados Abertos Conectados esteja transformando a Web tradicional (Web de dados) em Web Semântica,
    para usuários não especialistas, estes dados ainda são difíceis de analisar e reusar. Por exemplo, quando o acesso
    aos dados é feito por meio de endpoints (pontos de consulta), utilizando uma linguagem de consulta como SPARQL
    Protocol and RDF Query Language (SPARQL). </p>

<p> As bases de dados no formato de grafos RDF com o Vocabulário Data Cube e o código deste projeto estão disponíveis
    nos links adicionais. O endpoint onde esses grafos RDF podem ser consultados diretaente através da linguagem SPARQL
    também está nos links adicionais.</p>

<p> Este protótipo de interface é o Trabalho de Conclusão de Curso do aluno Gianluca Bine para o curso de Ciência da
    Computação na Universidade Estadual do Centro-Oeste (UNICENTRO). Este trabalho foi orientado pela Prof. Dr. Josiane
    M. H. Dall' Agnol. </p>

<h3>Currículos Lattes</h3>
<hr>
<ul>
    <li>Gianluca Bine: <a href="http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K8584641Z1">http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K8584641Z1</a>
    </li>
    <li>Josiane M. H. Dall' Agnol: <a href="http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4708854H4">http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4708854H4</a>
    </li>
</ul>

<h3>Links adicionais</h3>
<hr>
<ul>
    <li><a href="https://www.w3.org/standards/semanticweb/">Web Semântica</a></li>
    <li><a href="https://www.w3.org/standards/semanticweb/data">Dados Conectados</a></li>
    <li><a href="https://www.w3.org/TR/vocab-data-cube/">Vocabulário RDF Data Cube</a></li>
    <li><a href="https://lov.okfn.org/dataset/lov/about">LOV</a></li>
    <li><a href="http://www.atlasbrasil.org.br/2013/pt/consulta/">Base de dados IDHM</a></li>
    <li><a href="http://www.firjan.com.br/ifdm/downloads/">Base de dados IFDM</a></li>
    <li><a href="https://www.w3.org/TR/rdf-sparql-query/">Linguagem SPARQL</a></li>
    <li><a href="https://github.com/Pr3d4dor/tcc/tree/master/grafos">Grafos RDF das bases de dados</a></li>
    <li><a href="">Endpoint do virtuoso dos grafos RDF</a></li>
    <li><a href="https://github.com/Pr3d4dor/tcc">Código fonte deste projeto</a></li>
</ul>