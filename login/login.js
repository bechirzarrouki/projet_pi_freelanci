document.addEventListener('DOMContentLoaded', function () {
    const loginBtn = document.getElementById('loginBtn');
    const errorContainer = document.getElementById('error-container');
    const errorList = document.getElementById('error-list');

    loginBtn.addEventListener('click', function () {
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();
        errorList.innerHTML = '';
        errorContainer.classList.add('d-none');

        let errors = [];

        if (!email) {
            errors.push("Email is required.");
        }
        if (!password) {
            errors.push("Password is required.");
        }

        if (errors.length > 0) {
            errorContainer.classList.remove('d-none');
            errors.forEach(err => {
                const li = document.createElement('li');
                li.textContent = err;
                errorList.appendChild(li);
            });
        } else {
            alert("Login simulation: Email = " + email + ", Password = " + password);
        }
    });
});
