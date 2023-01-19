## Step 1 - Richiesta

Definiamo l'obiettivo da raggiungere con il progetto.
In questo caso sarà la realizzazione degli oggetti presenti in una lista nozze.

I campi richiesti sono:
- name
- description (facoltativa)
- price

Utilizzeremo la seguente tabella come linea guida:

| name         | description                          | price |
|--------------|--------------------------------------|-------|
| Frullatore   | Frullatore Moulinex 2000X            | 120   |
| Spremiagrumi | Spremiagrumi in plastica trasparente | 10    |
|              |                                      |       |

## Step 2 - Impostazione progetto

Dobbiamo eseguire dei passaggi base per preparare il nostro progetto.
Quali sono?

- installazione Laravel
- aggiunta preset
- creazione DB
- configurazione file .ENV
- avvio del server per testare il tutto

## Step 3 - DB

A questo punto è necessaria una migration per creare la tabella dei vari oggetti, un model che definisca la classe collegata alla nostra tabella e magari anche un seeder per popolare la tabella stessa.

### Migration

Nel creare la migration, quali convenzioni dobbiamo ricordare?
[Migrations](https://laravel.com/docs/9.x/migrations#generating-migrations)

```
php artisan make:migration create_items_table
```

- come si chiama il file della migration?
- come si chiama la tabella?
- quali errori sono comuni durante questa operazione?

#### Come definire i campi della tabella?

A cosa posso fare riferimento quando devo decidere che tipo di campi utilizzare per le colonne della mia tabella?
(Column Types)[https://laravel.com/docs/9.x/migrations#available-column-types]

#### Lanciare la migration

Non basta definire il codice della migration, ma dobbiamo anche utilizzare il comando per lanciare tutte le migration non ancora eseguite:

```
php artisan migrate
```

- quali errori sono comuni durante questa operazione?

*Es. Metodi sbagliati per le colonne, migration lanciata prima di essere stata sviluppata.*

### Model

Nel creare il model, quali convenzioni dobbiamo ricordare?
(Model)[https://laravel.com/docs/9.x/eloquent#generating-model-classes]

```
php artisan make:model Item
```

- come si chiama il file del model?
- come si chiama la classe?

### Seeder

Nel creare il seeder, quali convenzioni dobbiamo ricordare?
(Seeder)[https://laravel.com/docs/9.x/seeding#writing-seeders]

```
php artisan make:seeder ItemSeeder
```

- come si chiama il file del seeder?
- come si chiama la classe?
- cosa dobbiamo scrivere nel seeder affinché possa funzionare?

#### Lanciare il seeder

Non basta definire il codice della migration, ma dobbiamo anche utilizzare il comando per lanciare il nostro seeder:

```
php artisan db:seed --class=ItemSeeder
```

- quali errori sono comuni durante questa operazione?

*Es. Model non importato, nomi delle proprietà sbagliati rispetto ai nomi delle colonne, dati inseriti non coerenti con il tipo di dato della colonna, nessuna chiamata al metodo save() alla fine del ciclo.*


Arrivati a questo punto abbiamo completato il terzo step. La nostra applicazione comunica correttamente con il database.
Nel database sono presenti sia le strutture che i dati di prova necessari per poter passare al prossimo step.

## Step 4 - CRUD

Eccoci finalmente allo step più sostanzioso. La realizzazione delle CRUD.

- cosa significa CRUD?
- come si traduce questo in codice? Di cosa abbiamo bisogno?
- cos'è un *resource controller*?

### Controller

Sfruttando i comandi messi a disposizione da Laravel, creaiamo un resource controller.
(Controller)[https://laravel.com/docs/9.x/controllers#resource-controllers]

```
php artisan make:controller ItemController --resource
```

- come si chiama il controller?
- quali metodi ha già pronti all'uso?

Di cosa si occuperanno questi metodi?

- index
- create
- store
- show
- edit
- update
- destroy

### Route

Dobbiamo ovviamente dire a Laravel di collegare i metodi di questo controller con delle rotte che possiamo visitare.
(Routes)[https://laravel.com/docs/9.x/routing#basic-routing]
(Routes List)[https://laravel.com/docs/9.x/routing#the-route-list]

- come facciamo ad impostare le rotte in modo corretto?
- cosa succede se ho due rotte che puntano a metodi diversi?
- come controllo quali rotte sono disponibili nella mia applicazione?

### Views

Adesso è il momento di gestire le views del progetto, in modo da avere effettivamente qualcosa da mostrare a chi visita la nostra applicazione.
(Views)[https://laravel.com/docs/9.x/views]

Alcune di queste convenzioni non sono specificate dalla documentazione di Laravel, ma sono decisioni che prendiamo noi in autonomia sulla base delle necessità del nostro progetto. Oppure potrebbero essere decisioni già prese per noi dal Project Manager e dobbiamo solo seguirle.

Un esempio è raggruppare tutte le views in una cartella che si chiama come la rotta base che abbiamo definito.
La cartella *items* conterrà tutte le views per gestire quella risorsa:

- index.blade.php
- show.blade.php
- create.blade.php
- edit.blade.php

Avete notato qualcosa di particolare nei nomi di queste views?
Perché le abbiamo create subito, prima di iniziare a lavorare con il controller?

## Step 5 - Ultimi sviluppi

Dopo aver verificato che ogni rotta GET porti effettivamente alla view dedicata, possiamo iniziare a sviluppare i metodi del controller e ad aggiungere elementi nel codice HTML.

## Finito!

A questo punto la nostra applicazione è completa e pronta all'uso!