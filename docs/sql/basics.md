# Simple Query Language

![sql-logo](/docs/img/Sql_data_base_with_logo.png)

Grundlagen

<a class="pf-v5-c-button pf-m-control pf-m-small" href="https://it.treptowkolleg.de/admin" target="_blank">phpMyAdmin</a>

## Grundlagen

Um ein Gefühl für SQL zu bekommen, erstmal eine *Select-Query* üblichen Ausmaßes:
`````sql
SELECT person.name AS Name, election.label AS Wahl, COUNT(*) AS Stimmen
FROM person
    INNER JOIN election_result_person
        ON person.id = election_result_person.person_id
    INNER JOIN election_result_election
        ON election_result_person.election_result_id = election_result_election.election_result_id
    INNER JOIN election
        ON election_result_election.election_id = election.id
GROUP BY election_result_person.person_id;
`````

Unter manchen Konfigurationen gibt das obige Beispiel eine Fehlermeldung aus, da es
sich nicht um ein vollständig qualifiziertes ``GROUP BY`` handelt (ohne ``HAVING``). Die Konfiguration
kann folgendermaßen geändert werden:

````sql
mysql > SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));
````

Um diese Konfiguration auch nach einem Neustart des Datenbankservice zu behalten,
wird folgendes Kommando benötigt:

````sql
mysql > SET PERSIST sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));
````