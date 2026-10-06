// Obtention de la référence du formulaire
const form = document.getElementById("id_test");

// Ajout de l'écouteur d'événements sur le formulaire
form.addEventListener("submit", function (event) {
    event.preventDefault(); // Empêche la soumission par défaut du formulaire
    validerNom();
    validerPrenom();
    validerEntre();
    validerDateOfBirth();
});

// Fonction pour valider le nom
function validerNom() {
    const nomInput = document.getElementsByName("nom_entre")[0];
    const nomValeur = nomInput.value.trim();
    const nomRegex = /^[A-Za-z]+$/;
    const erreurNom = document.getElementById("erreurNom");

    if (!nomValeur.match(nomRegex)) {
        erreurNom.innerHTML = "Veuillez entrer un nom valide (lettres uniquement)";
    } else {
        erreurNom.innerHTML = "<span style='color:green'> Correct </span>";
    }
}

// Fonction pour valider le prénom
function validerPrenom() {
    const prenomInput = document.getElementsByName("prenom_entre")[0];
    const prenomValeur = prenomInput.value.trim();
    const prenomRegex = /^[A-Za-z]+$/;
    const erreurPrenom = document.getElementById("errorPrenom");

    if (!prenomValeur.match(prenomRegex)) {
        erreurPrenom.innerHTML =
            "Veuillez entrer un prénom valide (lettres uniquement)";
    } else {
        erreurPrenom.innerHTML = "<span style='color:green'> Correct </span>";
    }
}

// Fonction pour valider le nom d'entreprise
function validerEntre() {
    const entreInput = document.getElementsByName("nom_entreprise_test")[0];
    const entreValeur = entreInput.value.trim();
    const entreRegex = /^[A-Za-z]+$/;
    const erreurEntre = document.getElementById("errorEntre");

    if (!entreValeur.match(entreRegex)) {
        erreurEntre.innerHTML =
            "Veuillez entrer un nom d'entreprise valide (lettres uniquement)";
    } else {
        erreurEntre.innerHTML = "<span style='color:green'> Correct </span>";
    }
}

// Fonction pour valider la date de naissance
function validerDateOfBirth() {
    const dateOfBirthInput = document.getElementsByName("date_entre")[0];
    const dateNaissanceValeur = new Date(dateOfBirthInput.value);
    const aujourdhui = new Date();
    const erreurDOB = document.getElementById("errorDate_naissance");

    if (isNaN(dateNaissanceValeur) || dateNaissanceValeur >= aujourdhui) {
        erreurDOB.innerHTML = "La date de naissance doit être antérieure à la date d'aujourd'hui.";
    } else {
        erreurDOB.innerHTML = "<span style='color:green'> Correct </span>";
    }
}

// Validation de l'e-mail en temps réel
const emailInput = document.getElementsByName("email_test")[0];
const erreurEmail = document.getElementById("erreurEmail");

emailInput.addEventListener("keyup", function () {
    validerEmail();
});

function validerEmail() {
    const emailValeur = emailInput.value.trim();
    const emailRegex = /^\S+@esprit.tn+$/;

    if (!emailValeur.match(emailRegex)) {
        erreurEmail.innerHTML = "Veuillez entrer une adresse email valide";
    } else {
        erreurEmail.innerHTML = "<span style='color:green'> Correct </span>";
    }
}
