'use strict';

const btnRegister = window.document.querySelector('#btnRegister');
const APP_URL = 'http://localhost:8000';

btnRegister.addEventListener('click', () => {
    const show_name = window.document.querySelector('#show_name').value;
    const show_date = window.document.querySelector('#show_date').value;
    const start_time = window.document.querySelector('#start_time').value;
    const end_time = window.document.querySelector('#end_time').value;
    const description = window.document.querySelector('#description').value;
    const category = window.document.querySelector('#category').value;
    const person_limit = window.document.querySelector('#person_limit').value;

    const requestInfo = {
        method: 'POST',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            show_name,
            show_date,
            start_time,
            end_time,
            description,
            category,
            person_limit,
            announcer_id: localStorage.getItem('Aid')
        })
    }

    fetch(`${APP_URL}/api/show`, requestInfo)
        .then(response => {
            if (!response.ok) {
                const errorBox = window.document.querySelector('.error-message');
                errorBox.style.display = "block";
                return;
            }
            const successBox = window.document.querySelector('.success-message');
            successBox.style.display = "block";

            setTimeout(() => {
                window.location.href = `${APP_URL}/admin/home`;
            }, 4000);
        })
        .catch(() => {
            const errorBox = window.document.querySelector('.error-message');
            errorBox.style.display = "block";
        });
});
