const form = document.getElementById('test-form');
const email = document.getElementById('email');

form.addEventListener('submit', e => {
    e.preventDefault();
    validateInputs();
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
};

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
};

const validateInputs = () => {
    const username = document.getElementById('entreprise').value.trim();
    const emailValue = email.value.trim();

    if(username === '') {
        setError(username, 'Nom de l\'entreprise est requis');
    } else if (!isNaN(username)) {
        setError(username, 'Le nom de l\'entreprise ne peut pas être un nombre');
    } else {
        setSuccess(username);
    }

    if(emailValue === '') {
        setError(email, 'Email est requis');
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Veuillez fournir une adresse email valide');
    } else {
        setSuccess(email);
    }
};
