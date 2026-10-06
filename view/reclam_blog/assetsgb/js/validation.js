function validateForm() {
    var nomEntreprise = document.forms["monFormulaire"]["nomEntreprise"].value;
    var adresse = document.forms["monFormulaire"]["adresse"].value;
    var telephone1 = document.forms["monFormulaire"]["telephone1"].value;
    var telephone2 = document.forms["monFormulaire"]["telephone2"].value;
    var email = document.forms["monFormulaire"]["email"].value;
    var dateCreation = document.forms["monFormulaire"]["dateCreation"].value;
    var idCategorie = document.forms["monFormulaire"]["idCategorie"].value;

    // Vérification du nom d'entreprise (doit être unique)
    if (nomEntreprise.trim() === "") {
        swal("Oops...", "Veuillez saisir le nom de l'entreprise.", "error");
        return false;
    }

    // Vérification de l'adresse (doit être unique)
    if (adresse.trim() === "") {
        swal("Oops...", "Veuillez saisir l'adresse de l'entreprise.", "error");
        return false;
    }

    // Vérification des numéros de téléphone (doivent être uniques et ne contenir que des chiffres)
    var phoneNumbers = /^\d{8}$/;
    if (!phoneNumbers.test(telephone1) || !phoneNumbers.test(telephone2)) {
        swal("Oops...", "Les numéros de téléphone doivent contenir exactement 8 chiffres.", "error");
        return false;
    }

    // Vérification du format de l'email (doit être unique et de la forme "k@k")
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        swal("Oops...", "Veuillez saisir une adresse email valide.", "error");
        return false;
    }

    // Vérification de la date de création (doit être inférieure à la date d'aujourd'hui)
    var currentDate = new Date();
    var selectedDate = new Date(dateCreation);
    if (selectedDate >= currentDate) {
        swal("Oops...", "La date de création doit être inférieure à la date d'aujourd'hui.", "error");
        return false;
    }

    // Vérification de la catégorie (peut être personnalisée selon vos besoins)
    if (idCategorie.trim() === "") {
        swal("Oops...", "Veuillez sélectionner une catégorie.", "error");
        return false;
    }

    // Si toutes les validations passent, afficher une alerte pour indiquer que le formulaire a été envoyé avec succès
    swal("Succès !", "Votre demande a été envoyée avec succès.", "success");
    return true;
}
