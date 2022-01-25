'use strict';

const btnLogin = window.document.querySelector('#btnLogin');
const APP_URL = 'http://localhost:8000';

btnLogin.addEventListener('click', () => {
    const email = window.document.querySelector('#email').value;
    const password = window.document.querySelector('#password').value;

    const responseInfo = {
        method: 'POST',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            email,
            password
        })
    };

    fetch(`${APP_URL}/api/user/login`, responseInfo)
        .then(response => {
            if (!response.ok){
                const boxError = window.document.querySelector('.error-message');
                boxError.style.display = 'block';
            }

            return response.json();
        })
        .then(data => {
            localStorage.setItem('Authorization', `Bearer ${data.token}`);
            localStorage.setItem('id', data.id);

            window.document.location = `${APP_URL}/home`;
        })
        .catch(error => {
            const boxError = window.document.querySelector('.error-message');
            boxError.style.display = 'block';
        });
});
