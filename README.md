# DDCD Project informatie


## Structuur
De source bestaat uit een aantal mappen met doordachte structuur.

* doc - Projectdocumentatie zoals EER
* framework - Yii framework, hoeft niets aan gewijzigd te worden
* src - DDCD source code
  * protected/config/ - Configuratie bestanden
  * protected/data/ - SQL bestanden

## Installatie

### Minimale eisen
Yii heeft een aantal minimale eisen waaraan je moet voldoen wil Yii kunnen werken.

* PHP-5.1 of hoger
* PHP met MYSQL-PDO
* MySQL met innodb

## Configuratie

Om deze applicatie te kunnen deployen dienen er wel wat aanpassingen gemaakt te worden.

### Schrijfbare map

De webserver gebruiker heeft schrijfrechten nodig op de map 'src/protected/runtime/'

### Database

De bestanden die in het database geladen moeten worden staan in de map 'src/protected/data/'. Voor een kale installatie zal het script create.sql, yum_translation.sql en rights.sql in het database geladen moeten worden.
Om een verbinding naar het database tot stand te laten komen zal het bestand src/protected/config/sql.inc.php.sample gecopieerd worden als src/protected/config/sql.inc.php. Vul hierbij de juiste gegevens in.
