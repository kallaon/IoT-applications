{% extends 'templates/default.php' %}

{% block title %} API Guide{% endblock %}

{% block content %}
<div class="row">
    <div class="container">

        <div class="page-header">
            <h1>Načo slúži API ?</h1>
        </div>
        <div class="well">
            <p>
                Rozhranie API slúži na komunikáciu so zariadeniami. Poskytuje dáta tretím stranám
                a umožňuje zariadeniam pridávať ich namerané hodnoty. Užívateľovi umožňuje pridávanie
                nových zariadení. <br>

                Podporované HTTP metódy:
            <ul>
                <li><strong>GET</strong>  - pre získanie informácií zo serveru</li>
                <li><strong>POST</strong> - pre nahranie informácií na server</li>
            </ul>
            </p>
        </div>

        <div class="page-header">
            <h1>Autentifikácia</h1>
        </div>
        <div class="well">
            <p>
                Autentifikácia slúži pre overenie identity. Je vykonávaná pomocou API kľúču, ktorý
                užívateľ obdrží pri registrácií do webovej aplikácie. API kľúč môže nájsť v <strong>profile</strong>
                alebo <strong>info paneli </strong>zariadenia. <br>
                API kľúč je vyžadovaný pri niektorých metodách typu <strong>POST</strong>, tie sú bližšie opísané nižšie.
            </p>
            <h3>Ako sa autentifikovať ?</h3>
            <p>
                Pre autentifikáciu je nutné zahrnúť do sekcie hlavičky požiadavky atribút <strong>Authorization</strong>.
                Ako hodnota sa do tohto atribútu vkľadá vygenerovaný užívateľský API kľúč. <br> <br>
                <strong>Príklad:</strong> <br>

            <pre>POST /IoT-applications/api/value HTTP/1.1
Host: localhost
Authorization: 4fdd43292b7f6d49d6908f28ae892ef2</pre>

            </p>
        </div>

        <div class="page-header">
            <h1>Prehľad ciest</h1>
        </div>
        <div class="well">
            <h3>GET</h3>
            <strong>Zobrazenie informácií o konkrétnom zariadení:</strong>
            <p>
                Po zadaní požiadavky GET na danú adresu s použitím platného ID zariadenia,
                server vráti informácie o danom zariadení.
            <pre>http://localhost/IoT-applications/api/device/<strong>ID</strong></pre>
            <strong>Príkald odpovede:</strong><br>
            <pre>{
  "error": false,
  "tasks": [
    {
      "id_device": 56,
      "id_type": 3,
      "device_name": "Barometer",
      "created_at": "2017-04-28 11:35:21",
      "updated_at": "2017-04-26 16:43:07",
      "unit": "bar"
    }
  ]
}</pre>
            <br>
            </p>

            <strong>Zobrazenie všetkých hodnôt zariadenia:</strong>
            <p>
                Po zadaní požiadavky GET na danú adresu s použitím platného ID zariadenia,
                server vráti všetky hodnoty zariadenia.
            <pre>http://localhost/IoT-applications/api/value/<strong>ID</strong></pre>
            <strong>Príkald odpovede:</strong><br>
            <pre>{
  "error": false,
  "tasks": [
    {
      "device_val": "50",
      "created_at": "2017-04-26 00:00:00",
      "updated_at": "2017-04-26 00:00:00"
    },
    {
      "device_val": "20",
      "created_at": "2017-04-27 00:00:00",
      "updated_at": "2017-04-27 00:00:00"
    }
  ]
}</pre>
            <br>
            </p>
        </div>



    </div>
</div>
{% endblock %}