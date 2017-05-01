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
            <table class="table table-striped table-hover table-responsive table-bordered">
                <thead>
                <tr>
                    <th>Cesta</th>
                    <th>Parameter</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><a href="#get-device-info"><code>http://localhost/IoT-applications/api/device/<strong>id</strong></code></a></td>
                    <td><strong>id</strong> zariadenia</td>
                </tr>
                <tr>
                    <td><a href="#get-all-values"><code>http://localhost/IoT-applications/api/value/<strong>id</strong></code></a></td>
                    <td><strong>id</strong> zariadenia</td>
                </tr>
                <tr>
                    <td><a href="#types"><code>http://localhost/IoT-applications/api/device/type/</code></a></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="#info-all-devices"><code>http://localhost/IoT-applications/api/device</code></a></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
            <h3>POST</h3>
            <table class="table table-striped table-hover table-responsive table-bordered">
                <thead>
                <tr>
                    <th>Cesta</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><a href="#post-dev-value"><code>http://localhost/IoT-applications/api/value</code></a></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="page-header">
            <h1>GET</h1>
        </div>
        <div class="well">
            <strong id="get-device-info">Vráti informácie o konkrétnom zariadení:</strong>
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
            <strong id="get-all-values">Vráti všetky hodnoty zariadenia:</strong>
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
            <strong id="types">Vráti všetky dostupné typy zariadení:</strong>
            <p>
                Po zadaní požiadavky GET na danú adresu server vracia typy zariadení,
             ktoré boli zatiaľ vytvorené aj s príslušným ID daného typu.
            <pre>http://localhost/IoT-applications/api/device/type/</pre>
            <strong>Príkald odpovede:</strong><br>
            <pre>{
  "error": false,
  "tasks": [
    {
      "id_type": 1,
      "device_name": "thermometer"
    },
    {
      "id_type": 2,
      "device_name": "hygrometer"
    }
 ]
}</pre>
            <br>
            </p>
            <strong id="info-all-devices">Vráti všetky dostupné informácie o  zariadeniach:</strong>
            <p>
                Po zadaní požiadavky GET na danú adresu server vracia všetky dostupné informácie
             o zariadeniach vo webovej aplikácii.
            <pre>http://localhost/IoT-applications/api/device</pre>
            <strong>Príkald odpovede:</strong><br>
            <pre>{
  "error": false,
  "tasks": [
    {
      "id_device": 15,
      "id_type": 1,
      "device_name": "Teplomer vonku",
      "updated_at": "2017-04-13 22:55:14",
      "created_at": "2017-04-13 22:55:14"
    },
    {
      "id_device": 33,
      "id_type": 1,
      "device_name": "Teplomer1",
      "updated_at": "2017-04-24 16:28:47",
      "created_at": "2017-04-29 11:39:27"
    }
 ]
}</pre>
            <br>
            </p>
        </div>

        <div class="page-header">
            <h1>POST</h1>
        </div>
        <div class="well">
            <strong id="post-dev-value">Pridanie novej hodnoty:</strong>
            <p>
                Po zadaní požiadavky POST na danú adresu v platnom tvare, môže zariadenie
            alebo užívateľ pridávať hodnotu danému zariadeniu.
            <pre>http://localhost/IoT-applications/api/value</pre>
            <br>
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Atribút</th>
                    <th>Hodnota</th>
                    <th>Typ</th>
                </tr>
                </thead>
                <tbody>
                <tr class="alert-info">
                    <td><strong>Authorization</strong></td>
                    <td>API kľúč</td>
                    <td>Headers</td>
                </tr>
                <tr class="alert-success">
                    <td><strong>id</strong></td>
                    <td>id zariadenia</td>
                    <td>Body</td>
                </tr>
                <tr class="alert-success">
                    <td><strong>value</strong></td>
                    <td>nameraná hodnota</td>
                    <td>Body</td>
                </tr>
                </tbody>
            </table>

            <strong>Príkald odpovede:</strong><br>
            <pre>{
  "error": false,
  "message": "Value successfully added"
}</pre>
            <br>
            </p>

            <strong id="post-add-device">Pridanie nového zariadenia:</strong>
            <p>
                Po zadaní požiadavky POST na danú adresu v platnom tvare, môže byť pomocou API rozhrania
            pridané nové zariadenie.
            <pre>http://localhost/IoT-applications/api/device</pre>
            <br>
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Atribút</th>
                    <th>Hodnota</th>
                    <th>Typ</th>
                </tr>
                </thead>
                <tbody>
                <tr class="alert-info">
                    <td><strong>Authorization</strong></td>
                    <td>API kľúč</td>
                    <td>Headers</td>
                </tr>
                <tr class="alert-success">
                    <td><strong>name</strong></td>
                    <td>meno zariadenia</td>
                    <td>Body</td>
                </tr>
                <tr class="alert-success">
                    <td><strong>type</strong></td>
                    <td>typ zariadenia</td>
                    <td>Body</td>
                </tr>
                </tbody>
            </table>

            <strong>Príkald odpovede:</strong><br>
            <pre>{
  "error": false,
  "message": "Device successfully created"
}</pre>
            <br>
            </p>



    </div>
    </div>
</div>
{% endblock %}