document.addEventListener('DOMContentLoaded', function() {
    // Variable Declaration
    const testBtn = document.querySelector("#test");
    const entretienBtn = document.querySelector("#entretien");
    const loginForm = document.querySelector(".login-form");
    const registerForm = document.querySelector(".register");

    // Check if elements exist before adding event listeners
    if (testBtn && entretienBtn && loginForm && registerForm) {
        // Login button function
        testBtn.addEventListener('click', () => {
            testBtn.style.backgroundColor = "#03a4ed";
            entretienBtn.style.backgroundColor = "rgba(255,255,255,0.2)";

            loginForm.style.left = "50%";
            registerForm.style.left = "-150%"; // Change from "-50%" to "-150%" to hide the register form offscreen
            loginForm.style.opacity = 1;
            registerForm.style.opacity = 0;

            document.querySelector(".col-1").style.borderRadius = "0 30% 20% 0";
        });

        // Register button function
        entretienBtn.addEventListener('click', () => {
            testBtn.style.backgroundColor = "rgba(255,255,255,0.2)";
            entretienBtn.style.backgroundColor = "#03a4ed";

            loginForm.style.left = "-150%"; // Change from "0%" to "-150%" to hide the login form offscreen
            registerForm.style.left = "50%";
            loginForm.style.opacity = 0;
            registerForm.style.opacity = 1;

            document.querySelector(".col-1").style.borderRadius = "0 20% 30% 0";
        });
    }
});
