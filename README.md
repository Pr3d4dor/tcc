# IDHM (Índice de Desenvolvimento Humano por Município) e IFDM (Índice FIRJAN)

Muitas informações estão presentes na Internet e muitas delas são difíceis de serem entendidas por computadores e por pessoas devido à falta de padronização na sua publicação. Quando as informações são publicadas utilizando o conceito de Dados Abertos Conectados, com um vocabulário comum, é possível usar definições e conceitos de forma padronizada. O Consórcio W3C recomenda a utilização do RDF Data Cube Vocabulary para a publicação de dados estatísticos na Internet.  O uso das características multidimensionais do Vocabulário RDF Data Cube facilita a apresentação visual destes dados. Nesse contexto, este protótipo de interface tem como objetivo facilitar a utilização, análise e entendimento destes dados por usuários não especialistas.

Como estudo de caso esse protótipo utilizou as bases de dados sobre o IDHM e o Índice FIRJAN dos munícipios do Brasil. Essas bases de dados podem ser encontadas nos links adicionais abaixo.

A quantidade de dados disponíveis na Web tem aumentado consideravelmente devido ao sucesso das iniciativas para Dados Abertos. No Brasil a Lei da Transparência rege a Gestão Fiscal determinando a disponibilização, em tempo real, de informações pormenorizadas sobre a execução orçamentária e financeira da União, dos Estados, do Distrito Federal e dos Municípios.

Os dados do Governo Brasileiro estão disponíveis no Portal Brasileiro de Dados Abertos. Nesse portal podem ser encontrados conjuntos de dados sobre diferentes domínios, tais como:
* Lixo: Destinação do lixo domiciliar, percentual de domicílios particulares permanentes com lixo coletado em caçamba de serviço de limpeza.
* Saúde: Unidades Básicas de Saúde - UBS, indicadores sobre saúde da família, distribuição de Agentes Comunitários de Saúde – ACS.
* Finanças: Indicadores sobre Finanças Públicas Anuais, Índice Nacional de Preços ao Consumidor – INPC.

Entretanto, estes dados, assim como a maioria dos Dados Abertos disponíveis na Web, ainda precisam ser tratados para serem considerados como Dados Abertos Conectados (Linked Open Data - LOD). Vocabulários são usados em Dados Abertos Conectados para definir conceitos e promover a interoperabilidade semântica. A iniciativa Linked Open Vocabulary (LOV) tem como objetivo analisar e avaliar a qualidade de vocabulários, assim como disponibilizar um compilado on-line de vocabulários abertos para serem reutilizados na Web. 

Os vocabulários indexados no LOV são associados a instituições de renome como por exemplo, World Wide Web Consortium (W3C), dando credibilidade às definições usadas. Por isso, deve ser escolhido o vocabulário que descreve os dados da forma mais fiel possível, sendo que tais vocabulários são reutilizados por meio de seus prefixos.

Dentre os vocabulários disponíveis em LOV, utilizou-se nesta pesquisa o Vocabulário RDF Data Cube. Esse vocabulário fornece um modelo para publicação de dados multidimensionais, como por exemplo, dados estatísticos, no formato de Dados Abertos Conectados. Dados multidimensionais são informações que possuem relações com vários atributos, como por exemplo, a previsão meteorológica de uma região, na qual cada dado sobre a quantidade de chuva estaria relacionado a uma cidade e a data da medição.

Embora o uso de Dados Abertos Conectados esteja transformando a Web tradicional (Web de dados) em Web Semântica, para usuários não especialistas, estes dados ainda são difíceis de analisar e reusar. Por exemplo, quando o acesso aos dados é feito por meio de endpoints (pontos de consulta), utilizando uma linguagem de consulta como SPARQL Protocol and RDF Query Language (SPARQL). 

As bases de dados no formato de grafos RDF com o Vocabulário Data Cube estão disponíveis dentro da pasta grafos no repositório. O endpoint onde esses grafos podem ser consultados está disponível no link: http://ec2-34-211-46-34.us-west-2.compute.amazonaws.com:8890/sparql/ e o protótipo de interface disponível neste repositório está disponível para uso no link: https://tcc-pr3d4dor.c9users.io/tcc/.

Este protótipo de interface é o Trabalho de Conclusão de Curso do aluno Gianluca Bine para o curso de Ciência da Computação na Universidade Estadual do Centro-Oeste (UNICENTRO). Este trabalho foi orientado pela Prof. Dr. Josiane M. H. Dall' Agnol.

# Currículos Lattes:
* Gianluca Bine: http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K8584641Z1
* Josiane M. H. Dall' Agnol: http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K4708854H4

# Links adicionais:
* [Web Semântica](https://www.w3.org/standards/semanticweb/)
* [Dados Conectados](https://www.w3.org/standards/semanticweb/data)
* [Vocabulário RDF Data Cube](https://www.w3.org/TR/vocab-data-cube/)
* [LOV](https://lov.okfn.org/dataset/lov/about)
* [Base de dados IDHM](http://www.atlasbrasil.org.br/2013/pt/consulta/)
* [Base de dados IFDM](http://www.firjan.com.br/ifdm/downloads/)
* [Linguagem SPARQL](https://www.w3.org/TR/rdf-sparql-query/)
