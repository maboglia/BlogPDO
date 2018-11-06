# BlogPDO

![schema](blog_database.png)
![schema](blog_view.jpg)

## Laboratorio PHP e MySQL - Sviluppare un blog

### Il progetto permette di sperimentare le API php - PDO

### Blog - step 1

1. database: crea le tabelle utenti, post, categorie
    1. vedi esempio allegato ([dump mysql](./app/dao))
2. personalizza i file .htaccess, core/config, core/App
3. collega il framework bootstrap o simili per gestire il layout
    1. personalizza view/main/header e footer
4. requirements del progetto, implementare:
    1. home page che mostri i post ordinati per data, a partire dal post più recente, con paginazione
    2. menu di navigazione
    3. pagina categorie che mostri i post afferenti alla categoria selezionata,
    4. pagina che mostri il dettaglio del singolo post selezionato
    5. metodi e interfaccia per inserire, aggiornare ed eliminare post
    6. riconoscimento degli utenti e ruoli, p.es.: 
        1. ruolo admin può amministrare il blog
        2. redattore può inserire post
        3. lettore può solo leggere

### Blog - step 2

1. aggiungere al database la tabella commenti ed eventuali tabelle relazionali
2. implementare model, DAO, controller e view per gestire i commenti
3. implementare modulo di registrazione e login per gli utenti

### Blog - step 3

1. implementare interfaccia amministrativa del blog
2. implementare la logica per moderare/pubblicare i commenti dopo revisione
3. implementare sistema di email per la gestione del blog 
    1. nuovi post, 
    2. gestione commenti, 
    3. ...

### Blog - step 4
    
    Usa WordPress :)