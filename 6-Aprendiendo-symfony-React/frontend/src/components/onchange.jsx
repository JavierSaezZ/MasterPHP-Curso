
import { useState } from "react";

function Saludo() {
  const [nombre, setNombre] = useState("");
const [texto, setTexto] = useState("Hola");
const [mostrarAyuda, setMostrarAyuda] = useState(false);
  function cambiarNombre(evento) {

    setNombre(evento.target.value);
    if (evento.target.value=="Roberto"){
    setTexto("Buenas");
    }
    else{
    setTexto("Hola");
    }
  
  }
  if (mostrarAyuda==true){
         setTexto("Adios");
    }
  return (
    <div>
      <input
        type="text"
        value={nombre}
        onChange={cambiarNombre}
      />

      <p>{texto}, {nombre}</p>


      <div
  onMouseEnter={() => setMostrarAyuda(true)}
  onMouseLeave={() => setMostrarAyuda(false)}
>
  Pasa el ratón por aquí

  {mostrarAyuda && <p>Esta es la explicación.</p>}
</div>
    </div>


    
  );
}

export default Saludo;