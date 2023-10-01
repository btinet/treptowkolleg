# HTML
## Tabellen
Tabellen können nicht nur Inhalte sortieren. Früher wurden sie auch für die Website-Gestaltung verwendet.

###Allgemeiner Aufbau
Allgemein gliedert sich eine Tabelle in Zeilen (rows) und Spalten (columns). Zusätzlich unterscheiden wir zwischen:

- Tabellenkopf
- Tabellenkörper
- Tabellenfuß
- 
Jedoch finden wir nicht immer all diese Bereiche vor. Insbesondere der Tabellenfuß wird häufig weggelassen.

<table>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

````html
<table class="pf-v5-c-table pf-m-grid-lg"
role="grid"
aria-label="This is a sortable table example"
id="table-sortable">
  <thead  class="pf-v5-c-table__thead">
    <tr class="pf-v5-c-table__tr" role="row">
      <th class="pf-v5-c-table__th pf-v5-c-table__sort pf-m-selected"
          role="columnheader"
          aria-sort="ascending"
          scope="col">#</th>
      <th class="pf-v5-c-table__th pf-v5-c-table__sort pf-m-help"
          role="columnheader"
          aria-sort="none"
          scope="col">First</th>
      <th class="pf-v5-c-table__th pf-v5-c-table__sort pf-m-help"
          role="columnheader"
          aria-sort="none"
          scope="col">Last</th>
      <th class="pf-v5-c-table__th pf-v5-c-table__sort pf-m-help"
          role="columnheader"
          aria-sort="none"
          scope="col">Handle</th>
    </tr>
  </thead>
  <tbody class="pf-v5-c-table__tbody" role="rowgroup">
    <tr class="pf-v5-c-table__tr" role="row">
      <th scope="row">1</th>
      <td class="pf-v5-c-table__td"
        role="cell">Mark</td>
      <td class="pf-v5-c-table__td"
          role="cell">Otto</td>
      <td class="pf-v5-c-table__td"
          role="cell">@mdo</td>
    </tr>
    <tr class="pf-v5-c-table__tr" role="row">
      <th class="pf-v5-c-table__td"
          role="cell" scope="row">2</th>
      <td class="pf-v5-c-table__td"
          role="cell">Jacob</td>
      <td class="pf-v5-c-table__td"
          role="cell">Thornton</td>
      <td class="pf-v5-c-table__td"
          role="cell">@fat</td>
    </tr>
    <tr class="pf-v5-c-table__tr" role="row">
      <th class="pf-v5-c-table__td"
          role="cell" scope="row">3</th>
      <td class="pf-v5-c-table__td"
          role="cell" colspan="2">Larry the Bird</td>
      <td class="pf-v5-c-table__td"
          role="cell">@twitter</td>
    </tr>
  </tbody>
</table>
````