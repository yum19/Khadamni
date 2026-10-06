function validateForm() {
    var nomEvenement = document.forms["monFormulaire"]["nomEvenement"].value;
    var adresseEVN = document.forms["monFormulaire"]["adresseEVN"].value;
    var dateEVN = document.forms["monFormulaire"]["dateEVN"].value;

    var errorMessage = ""; // Variable pour stocker les messages d'erreur

    // Vérifier si le champ nomEvenement est vide
    if (nomEvenement == "") {
        errorMessage += "Le nom de l'événement est obligatoire.\n";
        document.getElementById("nomEvenementError").innerText = "Le nom de l'événement est obligatoire.";
    } else {
        // Vérifier si le nom d'événement existe dans la base de données (vous devez implémenter cette vérification côté serveur)
        // Si le nom n'existe pas dans la base de données, afficher un message d'erreur
        document.getElementById("nomEvenementError").innerText = "";
    }

    // Vérifier si le champ adresseEVN est vide
    if (adresseEVN == "") {
        errorMessage += "L'adresse de l'événement est obligatoire.\n";
        document.getElementById("adresseEVNError").innerText = "L'adresse de l'événement est obligatoire.";
    } else {
        document.getElementById("adresseEVNError").innerText = "";
    }

    // Vérifier si le champ dateEVN est vide
    if (dateEVN == "") {
        errorMessage += "La date de l'événement est obligatoire.\n";
        document.getElementById("dateEVNError").innerText = "La date de l'événement est obligatoire.";
    } else {
        // Vérifier si la date de l'événement est supérieure à la date actuelle
        var currentDate = new Date();
        var eventDate = new Date(dateEVN);
        if (eventDate <= currentDate) {
            errorMessage += "La date de l'événement doit être supérieure à la date actuelle.\n";
            document.getElementById("dateEVNError").innerText = "La date de l'événement doit être supérieure à la date actuelle.";
        } else {
            document.getElementById("dateEVNError").innerText = "";
        }
    }

    // Vérifier si une erreur s'est produite
    if (errorMessage !== "") {
        // Afficher une alerte avec les messages d'erreur
        alert(errorMessage);
        // Annuler l'envoi du formulaire
        return false;
    } else {
        // Si toutes les validations passent, afficher une alerte pour indiquer que le formulaire a été envoyé avec succès
        alert("Succès !", "Votre demande a été envoyée avec succès.", "success");
        return true;
    }
}
