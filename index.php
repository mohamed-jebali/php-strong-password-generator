<?php

include __DIR__ . '/utilities/functions.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> php-strong-password-generator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <style>
        body{
            background-color: #001632;
        }
        h1{
            color: #828c9a;
        }
        h2{
            color: white;
        }
        form{
            background-color:white;
            border-radius:0.5rem;
            padding:1.5rem;
            padding-right:10rem;
        }
        .check-box-container{
            margin-right:7rem;
            margin-bottom:1rem;
        }
    </style>
    <div class="container">
        <div class="row mt-5">
            <div class="col-10 mx-auto">
                      <h1 class='text-center'>
                Strong Password Generator
            </h1>
            <h2 class='text-center'>
                Genera una password sicura
            </h2>
            <?php if (empty($_GET["passwordLenght"]) || (!isset($_GET["passwordLenght"]))){?>
            <div class="alert alert-info" role="alert">
               Nessun parametro valido inserito
            </div>
            <?php } elseif(!is_numeric($_GET["passwordLenght"])){?>
                <div class="alert alert-danger" role="alert">
                    Password errata inserisci un valore numerico
                </div>
            <?php } else {?>
               <?php $generatedPassword = generateStrongPassword($_GET["passwordLenght"]); ?>
                <div class="alert alert-success" role="alert">
                   Password generata correttamente : <?php echo $generatedPassword ;?>
                </div>
            <?php } ?>
        <form method="get">
            <div class="row">
                <div class="col-12 d-flex justify-content-between mb-4">
                    <label class='label-password' for="password">Lughezza password :</label>
                    <input class='p-2' type="text" name='passwordLenght' id='password'>
                </div>
            </div>
             <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <label for="password">Consenti ripetizioni di uno o più caratteri:</label>
                    <div class="check-box-container d-flex flex-column">
                    <div class="form-check">
                          <input class="form-check-input" type="radio" name="RepeteadCharacters" id="flexRadioDefault1">
                         <label class="form-check-label" for="flexRadioDefault1">
                            Si
                         </label>
                    </div>
                    <div class="form-check mb-4">
                       <input class="form-check-input" type="radio" name="RepeteadCharacters" id="flexRadioDefault2" checked>
                       <label class="form-check-label" for="flexRadioDefault2">
                          No
                       </label>
                    </div>
                    <div class="check-box-container d-flex flex-column me-5">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Lettere
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Numeri
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Simboli
                        </label>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        <input class='btn btn-primary' type="submit" value="Invia">
        <input class='btn btn-secondary' type="reset" value="Annulla">
    </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- Esercizio di oggi: :php: PHP Strong Password Generator :chiave:
nome repo: php-strong-password-generator
Descrizione
Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure. L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.
Milestone 1
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente. Scriviamo tutto (logica e layout) in un unico file index.php
Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale
BONUS 1 : Milestone 3
Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente.
BONUS 2: Milestone 4
Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme). Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali. -->
