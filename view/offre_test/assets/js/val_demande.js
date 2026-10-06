function validateForm() {
    var id_etudiant = document.forms["monFormulaire"]["id_etudiant"].value;
    var nom_d = document.forms["monFormulaire"]["nom_d"].value;
    var prenom_d = document.forms["monFormulaire"]["prenom_d"].value;
    var email_d = document.forms["monFormulaire"]["email_d"].value;
    var telephone_d = document.forms["monFormulaire"]["telephone_d"].value;
    var cv_d = document.forms["monFormulaire"]["cv_d"].value;
    var lettre_motivation = document.forms["monFormulaire"]["lettre_motivation"].value;
    var id_o = document.forms["monFormulaire"]["id_o"].value;
    var date_d = document.forms["monFormulaire"]["date_d"].value;
    var status_d = document.forms["monFormulaire"]["status_d"].value;

    // Vérifier si les champs sont vides
    if (id_etudiant == "" || nom_d == "" || prenom_d == "" || email_d == "" || telephone_d == "" || cv_d == "" || lettre_motivation == "" || id_o == "" || date_d == "" || status_d == "") {
        alert("Veuillez remplir tous les champs");
        return false;
    }

    // Vérifier si id_etudiant contient uniquement des chiffres
    if (!/^\d+$/.test(id_etudiant)) {
        alert("Le champ ID Étudiant doit contenir uniquement des chiffres");
        return false;
    }

    // Vérifier si nom_d et prenom_d contiennent uniquement des lettres
    if (!/^[a-zA-Z]+$/.test(nom_d) || !/^[a-zA-Z]+$/.test(prenom_d)) {
        alert("Les champs Nom et Prénom ne doivent contenir que des lettres");
        return false;
    }

    // Vérifier le format de l'email_d
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email_d)) {
        alert("Le champ Email doit être au format valide");
        return false;
    }

    // Vérifier si telephone_d contient exactement 8 chiffres
    if (!/^\d{8}$/.test(telephone_d)) {
        alert("Le champ Téléphone doit contenir exactement 8 chiffres");
        return false;
    }

    // Vérifier si id_o contient uniquement des chiffres
    if (!/^\d+$/.test(id_o)) {
        alert("Le champ ID Offre doit contenir uniquement des chiffres");
        return false;
    }

    // Vérifier si status_d contient une valeur valide
    if (status_d !== "envoyee" && status_d !== "en_attente" && status_d !== "acceptee" && status_d !== "refusee") {
        alert("Le champ Status doit être une valeur valide");
        return false;
    }

    // Remplacer date_d par la date du système
    var currentDate = new Date().toISOString().slice(0, 10);
    document.forms["monFormulaire"]["date_d"].value = currentDate;

    // Si toutes les validations passent, afficher une alerte pour indiquer que le formulaire a été envoyé avec succès
    swal("Succès !", "Votre offre a été envoyée avec succès.", "success");
    return true;
}
