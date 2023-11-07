<?php

// Ripetere l’esercizio del controllo password visto a lezione (da soli o rivedendo il video)
// Extra n.1: Inserire un contatore che interrompa il ciclo nel caso l’utente sbagli l’inserimento dopo x tentativi (es. 5 tentativi)
// Extra n.2: Visualizzare in console quale regola non e’ stata rispettata
// (PHPFUNZIONANTE)

function checkLenght($password){ //(stiamo controllando se la lunghezza di 8 caratteri venga rispettata)
    if(strlen($password) >=8){
        return true;
    }else{
        echo ("La password deve contenere minimo 8 caratteri \n");
        return false; 
    }
}

function checkNumber($password){
    for ($i = 0; $i < strlen($password) ; $i++) { 
        if(is_numeric($password[$i]));
        return true;
    }
        echo ("La password deve contenere almeno un numero \n");
    return false;
}

function checkUpper($password){
    for ($i = 0; $i < strlen($password) ; $i++) { 
        if(ctype_upper($password[$i]));
        return true;
    }
        echo ("La password deve contenere almeno un carattere in maiuscolo \n");
    return false;
    
}

function checkSpecial($password){
    $specialChar = ["?", "!", "*", "ç", "£", "+"];
    foreach($specialChar as $char){
        if (str_contains($password, $char)) {
            return true;
        }
    }
    echo ("La password deve contenere almeno un carattere speciale \n");
    return false;
}

function checkPassword(){
    $password = readline ("Inserisci la password: \n");
    if (checkLenght($password) && checkNumber($password) && checkSpecial($password) && checkUpper($password)){
        echo ("La password è stata inserita nel modo corretto \n");
        return true;
    }
        echo ("Errore: la password inserita non rispetta i parametri richiesti \n");
        return false;
}

$maxTentativi = 3;
$tentativi = 0;
do {
    $pass = checkPassword();
    $tentativi++;

    if ($tentativi >= $maxTentativi) {
        echo "Hai esaurito i tentativi massimi. Accesso negato.\n";
        break;
    }
} while ($pass == false);

