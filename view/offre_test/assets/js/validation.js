function validateForm() {
    var id_dom = document.forms["monFormulaire"]["id_dom"].value;
    var titre = document.forms["monFormulaire"]["titre"].value;
    var description_o = document.forms["monFormulaire"]["description_o"].value;
    var type_o = document.forms["monFormulaire"]["type_o"].value;
    var entreprise = document.forms["monFormulaire"]["entreprise"].value;
    var lieu = document.forms["monFormulaire"]["lieu"].value;
    var date_publication = document.forms["monFormulaire"]["date_publication"].value;
    var date_limite = document.forms["monFormulaire"]["date_limite"].value;
    var contact = document.forms["monFormulaire"]["contact"].value;
    var status_o = document.forms["monFormulaire"]["status_o"].value;

    // Vérifier si les champs sont vides
    if (id_dom == "" || titre == "" || description_o == "" || type_o == "" || entreprise == "" || lieu == "" || date_publication == "" || date_limite == "" || contact == "" || status_o == "") {
        alert("Veuillez remplir tous les champs");
        return false;
    }

    // Vérifier si titre contient seulement des lettres
    if (!/^[a-zA-Z]+$/.test(titre)) {
        alert("Le champ Titre doit contenir uniquement des lettres");
        return false;
    }

    // Vérifier si description contient seulement des lettres
    if (!/^[a-zA-Z]+$/.test(description_o)) {
        alert("Le champ Description doit contenir uniquement des lettres");
        return false;
    }

    // Vérifier si type contient seulement des lettres
    if (!/^[a-zA-Z]+$/.test(type_o)) {
        alert("Le champ Type doit contenir uniquement des lettres");
        return false;
    }

    // Vérifier si datePub est égale à la date du système
    var currentDate = new Date().toISOString().slice(0, 10);
    if (date_publication !== currentDate) {
        alert("La date de publication doit être égale à la date du système");
        return false;
    }

    // Vérifier si dateLimite est différente de la date du système
    if (date_limite === currentDate) {
        alert("La date limite ne peut pas être la même que la date du système");
        return false;
    }

    // Vérifier si contact contient seulement 8 chiffres
    if (!/^\d{8}$/.test(contact)) {
        alert("Le champ Contact doit contenir exactement 8 chiffres");
        return false;
    }

    // Si toutes les validations passent, afficher une alerte pour indiquer que le formulaire a été envoyé avec succès
    alert("Votre offre a été envoyée avec succès.");
    return true;
}
