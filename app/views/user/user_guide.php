{% extends 'templates/default.php' %}

{% block title %} User Guide{% endblock %}

{% block content %}
<div class="row">
    <div class="container">

        <div class="page-header">
            <h1>Prečo sa registrovať ?</h1>
        </div>
        <div class="well">
            <p>
                Registrácia slúži na rozdelenie užívateľov stránky a to na registorvaných a neregistrovaných.
                Neregistrovaný užívateľ môže na stránke prezerať len užívateľský manuál a manuál pre prácu s API.
                Výhodou registrovaného užívateľa je možnosť vytvárať a spravovať vlastné zariadenia a tak využívať
                webovú aplikáciu pre vizualizáciu a správu jeho nameraných dát.
            </p>
        </div>

        <div class="page-header">
            <h1>Dashboard</h1>
        </div>
        <div class="well">
            <p>
                Dashboard slúži ako pracovná plocha. Ak si už užívateľ pridal aspoň jedno zariadenie, môže si na
                Dashboarde zobraziť ľubovolnú miniaplikáciu. Ak užívateľ nemá vytvorené žiadne zariadenie, do
                Dashboardu si nebude môcť pridať žiadnu miniaplikáciu.
            </p>
        </div>

        <div class="page-header">
            <h1>Miniaplikácie</h1>
            <div class="well">
                <p>
                    Miniaplikácie slúžia na zobrazenie hodnôt zo zariadenia v preddefinovanej forme. Užívateľ ma na výber
                    zo štyroch typov miniaplikácií.
                </p>
                <ul>
                    <li><strong>Min</strong> - zobrazí minimálnu hodnotu zo zariadenia</li>
                    <li><strong>Max</strong> - zobrazí maximálnu hodnotu zo zariadenia</li>
                    <li><strong>Last</strong> - zobrazí poslednú pridanú hodnotu zo zariadenia</li>
                    <li><strong>Graf</strong> - zobrazí hodnoty zo zariadenia v grafe</li>
                </ul>
                <p>
                    Užívateľ môže výber miniaplikácií kombinovať a na Dashboarde tak zobrazovať miniaplikácie z viacerých zariadení
                </p>
            </div>

            <div class="page-header">
                <h1>Devices</h1>
            </div>
            <div class="well" >
                <h3>Device's table</h3>
                <p>
                    V tabuľke zariadení vidí užívateľ prehľad jeho zariadení. Tabuľka ho informuje o názve, type zariadenia, o čase vytvorenia a aktualizácie.
                    Možnosť <strong>Delete - krížik </strong> slúži na vymazanie zariadenia. Zmeniť názov a typ zariadenia môže užívateľ kliknutím na ikonu
                    <strong>Edit - kľuč</strong>. Tabuľku zariadení môže zoraďovať podľa vybraných parametrov a môže v nej vyhľadávať.
                </p>
                <h3>Add new device</h3>
                <p>
                    Vytvoriť nové zariadenie môže v paneli <strong> Add new device - označené pluskou</strong>. Zadaním mena a typom vytvorí nové zariadenie
                </p>
                <h3>Create new type</h3>
                <p>
                    Pokiaľ chce užívateľ vytvoriť zariadenie s typom, ktorého typ neexistuje, musí vytvoriť typ vorped.
                    Užívateľ vytvorí nový typ vyplnením formulára v paneli <strong>Create new type - lupa</strong>.
                    Zadaním mena typu (zobrazí sa v ponuke typov pri vytváraní zariadenia) a značky ( zobrazí sa ako jednotka na dashboarde
                    alebo v prehľade zariadenia).
                </p>
            </div>

            <div class="page-header">
                <h1>Device overview</h1>
            </div>
            <div class="well">
                <p>
                    Kluknutím na meno zariadenia v tabuľke zariadení, aplikácai presmeruje užívateľa na prehľad daného zariadenia.
                    Je rozdelený na štyri sekcie :


                <ol type="1">
                    <li><strong>Miniaplikácie</strong></li>
                    <li><strong>Graf</strong></li>
                    <li><strong>Informačná sekcia</strong></li>
                    <li><strong>Prehľad hodnôt</strong></li>
                </ol>
                </p>
                <h3>Miniaplikácie</h3>
                <p>
                    Táto sekcia obsahuje miniaplikácie, ktoré môže užívateľ pridávať aj na Dashboard s tým rozdieľom, že ich vidí pokope
                </p>
                <h3>Graf</h3>
                <p>
                    Graf je taktiež súčasťou miniaplikácií Dashboardu, zobrazuje všetky hodnoty, ktoré zariadenie obsahuje.
                </p>
                <h3>Informačná sekcia</h3>
                <p>
                    Je rozdelená do troch častí: <br><br>
                    <strong>Donut chart</strong> je typ koláčového grafu, ktorý zobrazuje tri typy údajov a to:
                    dáta vytvorené dnes, dáta vytvorené posledný týždeň, a ceľkový počet dát, ktoré zariadenie obsahuje.<br>
                    <strong>Info panel</strong> je informačná tabulka zobrazujúca informácie o zariadení, ktoré možno vyčítať z
                    tabuľky <strong>správ zariadení</strong>. Je doplnená o API kľúč užívateľa, meno zariadenia a meno užívateľa,
                    zahŕňa informácie z koľáčového grafu a disponuje údajom o čase vygenerovania. <br>
                    <strong>latest arrived values</strong> je tabuľka zobrazujúca desať posledných hodnôt, ktoré aplikácia obdržala.
                    <br>
                </p>
                <h3>Prehľad hodnôt</h3>
                <p>
                    <strong>Device values</strong> je tabuľka zobrazujúca všetky hodnoty, ktoré zariadenie obsahuje.
                </p>
            </div>

        </div>
    </div>
    {% endblock %}