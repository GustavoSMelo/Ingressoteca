'use strict';

const APP_URL = 'http://localhost:8000';

window.addEventListener('load', async () => {
    const admin_id = localStorage.getItem('Aid');

    const requestInfo = {
        method: 'GET',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/json',
            'Authorization': localStorage.getItem('Authorization'),
            'user_id': admin_id
        }
    };

    const response = await fetch(`${APP_URL}/api/announcer/${admin_id}`, requestInfo);
    const data = await response.json();

    const userInformationTag = window.document.querySelector('.user-information');

    userInformationTag.innerHTML = `
        <h1>${data.name}</h1>
        <h2>${data.email}</h2>
    `;

    const responseShowAnnouncer = await fetch(`${APP_URL}/api/show/announcer/${admin_id}`, requestInfo);
    const responseShow = await responseShowAnnouncer.json();

    const tableTag = window.document.querySelector('#tablebody');

    responseShow.shows.forEach(element => {
        tableTag.innerHTML += `
            <tr>
                <td>${element.show_name}</td>
                <td>${element.show_date}</td>
                <td>${element.start_time}</td>
                <td>${element.end_time}</td>
                <td>${element.description}</td>
                <td>${element.category}</td>
                <td>${element.person_limit}</td>
            </tr>
        `
    });

});
