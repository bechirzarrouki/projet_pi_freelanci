// Affichage du nom du fichier sélectionné
document.getElementById('photo').addEventListener('change', function(e) {
    const fileName = e.target.files[0]?.name || 'No file selected';
    const fileNameDisplay = document.querySelector('.file-name');
    fileNameDisplay.textContent = fileName;
    fileNameDisplay.style.display = 'block';
});

// Indicateur de force du mot de passe
document.getElementById('password').addEventListener('input', function(e) {
    const password = e.target.value;
    const strengthBar = document.querySelector('.password-strength-bar');

    let strength = 0;
    if (password.length >= 8) strength++;
    if (password.match(/[A-Z]/)) strength++;
    if (password.match(/[0-9]/)) strength++;
    if (password.match(/[^A-Za-z0-9]/)) strength++;

    strengthBar.className = 'password-strength-bar strength-' + strength;
});

// Validation du formulaire
document.getElementById('signup-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const errors = [];
    const password = document.getElementById('password').value;
    const confirm = document.getElementById('password_confirmation').value;

    if (password !== confirm) {
        errors.push("Passwords do not match.");
    }

    const errorBox = document.getElementById('error-messages');
    const errorList = document.getElementById('error-list');
    errorList.innerHTML = '';

    if (errors.length > 0) {
        errors.forEach(err => {
            const li = document.createElement('li');
            li.textContent = err;
            errorList.appendChild(li);
        });
        errorBox.style.display = 'block';
    } else {
        errorBox.style.display = 'none';
        alert("Account created (simulation only).");
    }
});
