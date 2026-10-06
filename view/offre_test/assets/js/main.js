document.addEventListener('DOMContentLoaded', function() {
    // Variable Declaration
    const OffreBtn = document.querySelector("#Offre");
    const DemandeBtn = document.querySelector("#Demande");
    const loginForm = document.querySelector(".login-form");
    const registerForm = document.querySelector(".register-form");

    // Check if elements exist before adding event listeners
    if (OffreBtn && DemandeBtn && loginForm && registerForm) {
        // Login button function
        OffreBtn.addEventListener('click', () => {
            OffreBtn.style.backgroundColor = "#03a4ed";
            DemandeBtn.style.backgroundColor = "rgba(255,255,255,0.2)";

            loginForm.style.left = "50%";
            registerForm.style.left = "-150%"; // Change from "-50%" to "-150%" to hide the register form offscreen
            loginForm.style.opacity = 1;
            registerForm.style.opacity = 0;

            document.querySelector(".col-1").style.borderRadius = "0 30% 20% 0";
        });

        // Register button function
        DemandeBtn.addEventListener('click', () => {
            OffreBtn.style.backgroundColor = "rgba(255,255,255,0.2)";
            DemandeBtn.style.backgroundColor = "#03a4ed";

            loginForm.style.left = "-150%"; // Change from "0%" to "-150%" to hide the login form offscreen
            registerForm.style.left = "50%";
            loginForm.style.opacity = 0;
            registerForm.style.opacity = 1;

            document.querySelector(".col-1").style.borderRadius = "0 20% 30% 0";
        });
    }
});
