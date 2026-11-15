import { useState } from "react";

function Formulario() {
    const [usuario, setUsuario] = useState ("");
       const [estudiante, setEstudiante] = useState(false);

  function enviarFormulario(evento) {
    evento.preventDefault();

    const datos = new FormData(evento.currentTarget);

const estudiatrabaja = estudiante ? "Estudia" : "Trabaja";

const formaciondatos = estudiante
    ? datos.get("formacion")
    : null;

    const nuevoUsuario = {
        nombre: datos.get("nombre"),
        apellido: datos.get("apellido"),
        edad: Number(datos.get("edad")),
        nacimiento: new Date().getFullYear() - Number(datos.get("edad")),
        estudiatrabaja:estudiatrabaja,
        formacion: formaciondatos
    };

    console.log(nuevoUsuario);

    setUsuario(nuevoUsuario);
}

    return (
        <div>
        <form onSubmit={enviarFormulario}>
            <label htmlFor="nombre">Nombre</label>

            <input
                id="nombre"
                type="text"
                name="nombre"
            />

               <input
                id="apellido"
                type="text"
                name="apellido"
            />

<label htmlFor="edad">Edad</label>
<input
    id="edad"
    name="edad"
    type="number"
/>

<label htmlFor="estudiante">
    <input
        id="estudiante"
        name="estudiante"
        type="checkbox"
         onChange={(e) => setEstudiante(e.target.checked)}
    />
    ¿Eres estudiante?
</label>
  {estudiante && (
<select name="formacion" id="formaciones">
    <option value="Primaria">Primaria</option>
    <option value="Secundaria">Secundaria</option>
    <option value="Bachiller">Bachiller</option>
    <option value="Universidad">Universidad</option>
</select>
)}

            <button type="submit">
                Enviar
            </button>
        </form>
       <p>
        {/* Hola, {nombre} {apellido}, tienes {edad} años de edad naciste aproximadamente en el año {fechancimiento}  */}
        </p> 

        </div>
    );
}
export default Formulario;