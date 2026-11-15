const main = document.getElementById('user-page');
const id = main.dataset.userId;

async function getUser() {
    const response = await fetch(`/api/user/${id}`);

    const user = await response.json();

    console.log(user);

    document.getElementById('user-id').textContent = user.id;
    document.getElementById('user-email').textContent = user.email ?? 'Sin email';
}

getUser();