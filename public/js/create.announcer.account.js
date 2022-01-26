'use strict';

const btnRegister = window.document.querySelector('#btnRegister');
const APP_URL = 'http://localhost:8000';

btnRegister.addEventListener('click', () => {
    const name = window.document.querySelector('#name').value;
    const email = window.document.querySelector('#email').value;
    const password = window.document.querySelector('#password').value;

    const requestInfo = {
        method: 'POST',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            'name': name,
            'email': email,
            'password': password
        })
    }

    fetch(`${APP_URL}/api/announcer`, requestInfo)
        .then(response => {
            if (!response.ok) {
                const errorBox = window.document.querySelector('.error-message');
                errorBox.style.display = "block";
                return;
            }
            const successBox = window.document.querySelector('.success-message');
            successBox.style.display = "block";

            setTimeout(() => {
                window.location.href = `${APP_URL}/admin/login/announcer`;
            }, 4000);
        })
        .catch(() => {
            const errorBox = window.document.querySelector('.error-message');
            errorBox.style.display = "block";
        });
});
