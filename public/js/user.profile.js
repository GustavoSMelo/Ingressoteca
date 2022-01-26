'use strict'

const APP_URL = 'http://localhost:8000'

window.addEventListener('load', async () => {
    const userId = localStorage.getItem('id');

    const requestInfo = {
        method: 'GET',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/json',
            'Authorization': localStorage.getItem('Authorization')
        }
    };

    const userInfoResponse = await fetch(`${APP_URL}/api/user/${userId}`, requestInfo);
    const userInfo = await userInfoResponse.json();

    const userInformationTag = window.document.querySelector('.user-information');

    userInformationTag.innerHTML = `
        <h1>${userInfo.first_name} ${userInfo.last_name}</h1>
        <h2>${userInfo.email}</h2>
    `;

    const response = await fetch(`${APP_URL}/api/purchase/${userId}`, requestInfo);
    const jsonData = await response.json();

    const ticketsTag = window.document.querySelector('.tickets');
    ticketsTag.innerHTML += `
        <tr class='ticket-title'>
            <th><h1>Show's name</h1></th>
            <th><h1>Show's key </h1></th>
            <th><h1>Date bought</h1></th>
        </tr>
    `;

    console.log(jsonData);

    jsonData.tickets.forEach(element => {
        ticketsTag.innerHTML += `
            <tr class='ticket'>
                <td><h3>${element[0]}</h3></td>
                <td><h3>${element[1].key}</h3></td>
                <td><h3>${element[1].created_at.slice(0, 10)}</h3><td>
            </tr>
        `;
    })

});
