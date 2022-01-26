'use strict';

const APP_URL = 'http://localhost:8000';
const list = window.document.querySelector('.show-grid-ul');

window.addEventListener('load', () => {
    const requestInfo = {
        method: 'GET',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/json',
            'Authorization': localStorage.getItem('Authorization'),
            'user_id': localStorage.getItem('id')
        }
    }

    fetch(`${APP_URL}/api/show`, requestInfo)
        .then(response => response.json())
        .then(show => {
            show.forEach(element => {
                list.innerHTML += `
                    <li>
                        <span>
                            <h2>${element.show_name}</h2>
                            <p>
                                ${element.description}
                            </p>
                            <h3>Show date: ${element.show_date}</h3>
                            <h4>Start with: ${element.start_time}</h4>
                            <h4>End with: ${element.end_time}</h4>
                            <button type="button" onclick="purchaseTicket(${element.id})">Purchase</button>
                        </span>
                    </li>
                `
            });
        })
        .catch(error => console.error(error));
});

async function purchaseTicket (id) {
    const token = localStorage.getItem('Authorization');
    const requestInfo = {
        method: 'POST',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/json',
            'Authorization': token,
            'user_id': localStorage.getItem('id')
        },
        body: JSON.stringify({
           'show_id': id
        })
    }

    try {
        const result = await fetch(`${APP_URL}/api/ticket`, requestInfo);
        const data = await result.json();

        purchase(data.ticketId, result.ok);
    } catch (err) {
        console.error(err);
        throw new Error('Already bought this show');
    }

}

function purchase (ticketId, alreadyBought) {
    if (!alreadyBought) {
        return;
    }

    const userId = localStorage.getItem('id');

    console.log(ticketId);
    const requestInfo = {
        method: 'POST',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/json',
            'Authorization': localStorage.getItem('Authorization')
        },
        body: JSON.stringify({
           'ticket_id': ticketId,
           'user_id': userId
        })
    }

    fetch(`${APP_URL}/api/purchase`, requestInfo)
        .then(response => response.json)
        .then(data => window.document.location = `${APP_URL}/user/profile`)
        .catch(error => console.error(error));
}

async function filterCategory (category) {
    const requestInfo = {
        method: 'GET',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/json',
            'Authorization': localStorage.getItem('Authorization'),
            'user_id': localStorage.getItem('id')
        }
    }

    const showsCategory = await fetch(`${APP_URL}/api/show/category/${category}`, requestInfo);
    const data = await showsCategory.json();

    list.innerHTML = "";
    data.forEach(element => {
        list.innerHTML += `
            <li>
                <span>
                    <h2>${element.show_name}</h2>
                    <p>
                        ${element.description}
                    </p>
                    <h3>Show date: ${element.show_date}</h3>
                    <h4>Start with: ${element.start_time}</h4>
                    <h4>End with: ${element.end_time}</h4>
                    <button type="button" onclick="purchaseTicket(${element.id})">Purchase</button>
                </span>
            </li>
        `
    });
}
