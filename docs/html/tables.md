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

<table
  class="pf-v5-c-table pf-m-grid-lg"
  role="grid"
  aria-label="This is a sortable table example"
  id="table-sortable"
>
  <thead class="pf-v5-c-table__thead">
    <tr class="pf-v5-c-table__tr" role="row">
      <th
        class="pf-v5-c-table__th pf-v5-c-table__sort pf-m-selected"
        role="columnheader"
        aria-sort="ascending"
        scope="col"
      >
        <button class="pf-v5-c-table__button">
          <div class="pf-v5-c-table__button-content">
            <span class="pf-v5-c-table__text">Repositories</span>
            <span class="pf-v5-c-table__sort-indicator">
              <i class="fas fa-long-arrow-alt-up"></i>
            </span>
          </div>
        </button>
      </th>
      <th
        class="pf-v5-c-table__th pf-v5-c-table__sort pf-m-help"
        role="columnheader"
        aria-sort="none"
        scope="col"
      >
        <div class="pf-v5-c-table__column-help">
          <button class="pf-v5-c-table__button">
            <div class="pf-v5-c-table__button-content">
              <span class="pf-v5-c-table__text">Branches</span>
              <span class="pf-v5-c-table__sort-indicator">
                <i class="fas fa-arrows-alt-v"></i>
              </span>
            </div>
          </button>
          <span class="pf-v5-c-table__column-help-action">
            <button
              class="pf-v5-c-button pf-m-plain"
              type="button"
              aria-label="More info"
            >
              <i class="pf-v5-pficon pf-v5-pficon-help" aria-hidden="true"></i>
            </button>
          </span>
        </div>
      </th>
      <th
        class="pf-v5-c-table__th pf-v5-c-table__sort"
        role="columnheader"
        aria-sort="none"
        scope="col"
      >
        <button class="pf-v5-c-table__button">
          <div class="pf-v5-c-table__button-content">
            <span class="pf-v5-c-table__text">Pull requests</span>
            <span class="pf-v5-c-table__sort-indicator">
              <i class="fas fa-arrows-alt-v"></i>
            </span>
          </div>
        </button>
      </th>
      <th class="pf-v5-c-table__th" role="columnheader" scope="col">Workspaces</th>
      <th class="pf-v5-c-table__th pf-m-help" role="columnheader" scope="col">
        <div class="pf-v5-c-table__column-help">
          <span class="pf-v5-c-table__text">Last commit</span>
          <span class="pf-v5-c-table__column-help-action">
            <button
              class="pf-v5-c-button pf-m-plain"
              type="button"
              aria-label="More info"
            >
              <i class="pf-v5-pficon pf-v5-pficon-help" aria-hidden="true"></i>
            </button>
          </span>
        </div>
      </th>
    </tr>
  </thead>

  <tbody class="pf-v5-c-table__tbody" role="rowgroup">
    <tr class="pf-v5-c-table__tr" role="row">
      <td
        class="pf-v5-c-table__td"
        role="cell"
        data-label="Repository name"
      >Repository 1</td>
      <td class="pf-v5-c-table__td" role="cell" data-label="Branches">10</td>
      <td class="pf-v5-c-table__td" role="cell" data-label="Pull requests">25</td>
      <td class="pf-v5-c-table__td" role="cell" data-label="Workspaces">5</td>
      <td
        class="pf-v5-c-table__td"
        role="cell"
        data-label="Last commit"
      >2 days ago</td>
    </tr>

    <tr class="pf-v5-c-table__tr" role="row">
      <td
        class="pf-v5-c-table__td"
        role="cell"
        data-label="Repository name"
      >Repository 2</td>
      <td class="pf-v5-c-table__td" role="cell" data-label="Branches">10</td>
      <td class="pf-v5-c-table__td" role="cell" data-label="Pull requests">25</td>
      <td class="pf-v5-c-table__td" role="cell" data-label="Workspaces">5</td>
      <td
        class="pf-v5-c-table__td"
        role="cell"
        data-label="Last commit"
      >2 days ago</td>
    </tr>

    <tr class="pf-v5-c-table__tr" role="row">
      <td
        class="pf-v5-c-table__td"
        role="cell"
        data-label="Repository name"
      >Repository 3</td>
      <td class="pf-v5-c-table__td" role="cell" data-label="Branches">10</td>
      <td class="pf-v5-c-table__td" role="cell" data-label="Pull requests">25</td>
      <td class="pf-v5-c-table__td" role="cell" data-label="Workspaces">5</td>
      <td
        class="pf-v5-c-table__td"
        role="cell"
        data-label="Last commit"
      >2 days ago</td>
    </tr>

    <tr class="pf-v5-c-table__tr" role="row">
      <td
        class="pf-v5-c-table__td"
        role="cell"
        data-label="Repository name"
      >Repository 4</td>
      <td class="pf-v5-c-table__td" role="cell" data-label="Branches">10</td>
      <td class="pf-v5-c-table__td" role="cell" data-label="Pull requests">25</td>
      <td class="pf-v5-c-table__td" role="cell" data-label="Workspaces">5</td>
      <td
        class="pf-v5-c-table__td"
        role="cell"
        data-label="Last commit"
      >2 days ago</td>
    </tr>
  </tbody>
</table>


````html
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
````