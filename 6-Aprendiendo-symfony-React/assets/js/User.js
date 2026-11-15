const usersGrid = document.querySelector('#users-grid');
const usersStatus = document.querySelector('#users-status');
const experiencia = document.getElementById('experiencia');

const botonAñadir = document.getElementById('btnAñadir');
const botonGuardar = document.getElementById('btnGuardar');

let userId=null;
let  enviarDatos=""

console.log(experiencia);

function escapeHTML(value) {
    return String(value ?? '').replace(/[&<>"']/g, character => ({
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    })[character]);
}

function formatDate(value) {
    if (!value) {
        return 'Sin fecha';
    }

    const date = new Date(value);

    if (Number.isNaN(date.getTime())) {
        return 'Sin fecha';
    }

    return date.toLocaleDateString('es-ES', {
        day: '2-digit',
        month: 'long',
        year: 'numeric'
    });
}

function createUserCard(user) {
    const nick = user.nick ?? 'Sin nombre';
    const initial = nick.charAt(0).toUpperCase();

    const activeClass = user.activo
        ? 'user-badge--active'
        : 'user-badge--inactive';

    const activeText = user.activo
        ? 'Activo'
        : 'Inactivo';

    const adminBadge = user.esAdmin
        ? `
            <span class="user-badge user-badge--admin">
                Administrador
            </span>
        `
        : '';

    return `
        <article class="user-card">
            <div class="user-card__top">
                <div class="user-card__avatar">
                    ${escapeHTML(initial)}
                </div>

                <div class="user-card__identity">
                    <h2>${escapeHTML(nick)}</h2>

                    <a
                        class="user-card__email"
                        href="mailto:${escapeHTML(user.email)}"
                    >
                        ${escapeHTML(user.email)}
                    </a>
                </div>
            </div>

            <div class="user-card__badges">
                <span class="user-badge ${activeClass}">
                    ${activeText}
                </span>

                ${adminBadge}
            </div>

            <div class="user-card__details">
                <div class="user-detail">
                    <span class="user-detail__label">
                        ID
                    </span>

                    <span class="user-detail__value">
                        #${escapeHTML(user.id)}
                    </span>
                </div>

                <div class="user-detail">
                    <span class="user-detail__label">
                        Género
                    </span>

                    <span class="user-detail__value">
                        ${escapeHTML(user.genero ?? 'Sin indicar')}
                    </span>
                </div>

                <div class="user-detail">
                    <span class="user-detail__label">
                        Edad
                    </span>

                    <span class="user-detail__value">
                        ${escapeHTML(user.edad ?? 'Sin indicar')} años
                    </span>
                </div>

                <div class="user-detail">
                    <span class="user-detail__label">
                        Experiencia
                    </span>

                    <span class="user-detail__value">
                        ${escapeHTML(user.experienciaAnios ?? 0)} años
                    </span>
                </div>

                <div class="user-detail user-detail--wide">
                    <span class="user-detail__label">
                        Puesto
                    </span>

                    <span class="user-detail__value">
                        ${escapeHTML(user.puesto ?? 'Sin indicar')}
                    </span>
                </div>

                <div class="user-detail user-detail--wide">
                    <span class="user-detail__label">
                        Ciudad
                    </span>

                    <span class="user-detail__value">
                        ${escapeHTML(user.ciudad ?? 'Sin indicar')}
                    </span>
                </div>
            </div>

            <p class="user-card__footer">
                Registrado el ${formatDate(user.fechaRegistro)}
            </p>

            <div class="user-card__actions">
                <button
                    type="button"
                    class="button button--edit js-edit-user"
                    data-user-id="${escapeHTML(user.id)}"
                    commandfor="user-modal"
                    command="show-modal"
                >
                    Editar
                </button>

                <button
                    type="button"
                    class="button button--delete js-delete-user"
                    data-user-id="${escapeHTML(user.id)}"
                >
                    Eliminar
                </button>
            </div>
        </article>
    `;
}

async function getUsers() {
    if (!usersGrid || !usersStatus) {
        return;
    }

    const experienciaValor = experiencia.value;

    const usersUrl =
        `${experiencia.dataset.usersUrl}?valor=${experienciaValor}`;

    console.log('Valor seleccionado:', experienciaValor);
    console.log('URL enviada:', usersUrl);

    try {
        const response = await fetch(usersUrl, {
            headers: {
                Accept: 'application/json'
            }
        });

        if (!response.ok) {
            throw new Error(`Error HTTP: ${response.status}`);
        }

        const users = await response.json();

        console.log(users);

        if (!Array.isArray(users)) {
            throw new Error(
                'La respuesta no contiene una lista'
            );
        }

        usersGrid.innerHTML = users
            .map(createUserCard)
            .join('');

        usersStatus.textContent =
            `${users.length} usuarios encontrados`;
    } catch (error) {
        console.error(error);

        usersStatus.textContent =
            'No se pudieron cargar los usuarios';

        usersStatus.classList.add(
            'users-status--error'
        );
    }
}



 
async function rellenarModalEditar(userId) {
    try {
        const response = await fetch(`/api/user/${userId}`, {
            headers: {
                Accept: 'application/json'
            }
        });

        if (!response.ok) {
            throw new Error(`Error HTTP: ${response.status}`);
        }

        const user = await response.json();

        console.log('Usuario que se editará:', user);

        const modal = document.querySelector('#user-modal');

        // Guardamos el ID para utilizarlo posteriormente al actualizar
        modal.dataset.userId = user.id;

        const campos = [
            'nick',
            'email',
            'edad',
            'genero',
            'experienciaAnios',
            'puesto',
            'ciudad'
        ];

        campos.forEach((campo) => {
            const input = modal.querySelector(
                `[name="${campo}"]`
            );

            if (input) {
                input.value = user[campo] ?? '';
            }
        });

        // Los checkbox utilizan checked, no value
        const inputActivo =
            modal.querySelector('[name="activo"]');

        if (inputActivo) {
            inputActivo.checked = Boolean(user.activo);
        }

        const inputAdmin =
            modal.querySelector('[name="esAdmin"]');

        if (inputAdmin) {
            inputAdmin.checked = Boolean(user.esAdmin);
        }

        // Los input date necesitan el formato YYYY-MM-DD
        const inputFecha =
            modal.querySelector('[name="fechaRegistro"]');
            console.log(user.fechaRegistro)
        if (inputFecha && user.fechaRegistro) {
inputFecha.value =
    user.fechaRegistro.substring(0, 16);
        }
            console.log(inputFecha.value)

    } catch (error) {
        console.error(
            'No se pudo obtener el usuario:',
            error
        );
    }
}


function eliminarCamposModal(){
         const modal = document.querySelector('#user-modal'); 
      const campos = [
            'nick',
            'email',
            'edad',
            'genero',
            'experienciaAnios',
            'puesto',
            'ciudad'
        ];
        console.log(campos)
        campos.forEach((campo) => {
            const input = modal.querySelector(
                `[name="${campo}"]`
            )
          if (input) {
                input.value = '';
            }
        })
}


async function guardarUsuario(event) {
    event.preventDefault();

    const modal = document.querySelector('#user-modal');

    const campos = [
        'nick',
        'email',
        'edad',
        'genero',
        'experienciaAnios',
        'puesto',
        'ciudad',
        'fechaRegistro',
        'activo',
        'esAdmin'
    ];

    const datos = {};

    campos.forEach((campo) => {
        const input = modal.querySelector(
            `[name="${campo}"]`
        );

        if (input.type === 'checkbox') {
            datos[campo] = input.checked;
        } else if (input.type === 'number') {
            datos[campo] = Number(input.value);
        } else {
            datos[campo] = input.value;
        }
    });

    let url = '/api/user';
    let metodo = 'POST';

    if (enviarDatos === 'editar') {
 

        url = `/api/user/${userId}`;
        metodo = 'PUT';
    }

        if (enviarDatos === 'delete') {
    console.log("eliminar")
 

        url = `/api/user/delete/${userId}`;
        metodo = 'DELETE';
    }

    try {
        const response = await fetch(url, {
            method: metodo,
            headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(datos)
        });

        const resultado = await response.json();

        if (!response.ok) {
            throw new Error(
                resultado.error ??
                `Error HTTP: ${response.status}`
            );
        }

        console.log(resultado);

        modal.close();
        getUsers();
    } catch (error) {
        console.error('Error al guardar:', error);
    }
}




experiencia.addEventListener('change', getUsers);
getUsers();


usersGrid.addEventListener('click', (event) => {
    const boton = event.target.closest('.js-edit-user');
    
    if (!boton) {
        return;
    }
    enviarDatos="editar";

     userId = boton.dataset.userId;

    rellenarModalEditar(userId);
});



usersGrid.addEventListener('click', (event) => {
    const boton = event.target.closest('.js-delete-user');
    if (!boton) {
        return;
    }
    enviarDatos="delete";

     userId = boton.dataset.userId;
guardarUsuario(event);
    
});





botonAñadir.addEventListener('click', () => {
    enviarDatos = 'añadir';
    eliminarCamposModal();

    console.log(enviarDatos);
});




botonGuardar.addEventListener('click', (guardarUsuario));