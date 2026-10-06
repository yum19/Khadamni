document.addEventListener("DOMContentLoaded", function() {
    var form = document.querySelector(".login100-form");

    form.addEventListener("submit", function(event) {
        event.preventDefault();

        var nomEntreprise = document.querySelector('input[name="nom_entreprise"]').value;
        var adresse = document.querySelector('input[name="adresse"]').value;
        var email = document.querySelector('input[name="email"]').value;
        var dateCreation = document.querySelector('input[name="dateCreation"]').value;

        // Vérification du champ nom
        if (nomEntreprise.trim() === "") {
            swal("Oops...", "Veuillez saisir le nom de l'entreprise.", "error");
            return;
        }

        // Vérification du champ adresse
        if (adresse.trim() === "") {
            swal("Oops...", "Veuillez saisir l'adresse de l'entreprise.", "error");
            return;
        }

        // Vérification du champ email
        if (email.trim() === "") {
            swal("Oops...", "Veuillez saisir l'adresse email de l'entreprise.", "error");
            return;
        }

        // Vérification du format de l'email
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            swal("Oops...", "Veuillez saisir une adresse email valide.", "error");
            return;
        }

        // Vérification du champ date de création
        var currentDate = new Date();
        var selectedDate = new Date(dateCreation);

        if (currentDate < selectedDate) {
            swal("Oops...", "La date de création ne peut pas être supérieure à la date d'aujourd'hui.", "error");
            return;
        }

        // Toutes les validations ont réussi, vous pouvez envoyer le formulaire
        swal("Succès !", "Votre demande a été envoyée avec succès.", "success");
        form.reset(); // Réinitialiser le formulaire après l'envoi
    });
});