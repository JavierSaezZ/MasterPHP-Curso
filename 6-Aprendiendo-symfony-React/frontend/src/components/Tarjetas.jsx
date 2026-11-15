function Tarjeta({ usuario }) {
  return (
    <article>
      
<p className={usuario.activo ? 'activo' : 'inactivo'}>
  {usuario.activo ? 'Activo' : 'Inactivo'}
</p>
   <p>Hola yo me llamo {usuario.nombre} y vivo en {usuario.ciudad}.</p>
   <p>El año que viene tendrá {2026-usuario.nacimiento } años</p>
    </article>
  );
}



function Caja({ titulo, children }) {
  return (
    <div className="caja">
      <h2>{titulo}</h2>
      {children}
    </div>
  );
}

function App() {
const usuarios = [
  { id: 1, nombre: 'Javier', ciudad: 'Eibar', nacimiento: 1999, activo: true },
  { id: 2, nombre: 'Ana', ciudad: 'Bilbao', nacimiento: 1958, activo: false },
  { id: 3, nombre: 'Luis', ciudad: 'Vitoria', nacimiento: 2008, activo: true },
];
  return (
     

    <main>
          <h1>Mi primer panel en React</h1>
<Caja titulo="Usuarios">
  <p>Aquí aparecerán los usuarios.</p>
</Caja>

<Caja titulo="Configuración">
  <p>Puedes cambiar tus preferencias.</p>
  <button>Guardar</button>
</Caja>
      {usuarios.map(usuariodatos => (
         <div key={usuariodatos.id}>
    <Tarjeta usuario={usuariodatos} />
    <hr />
  </div>
      ))}
    </main>
  );
}

export default App;




// function Tarjeta({ nombre, ciudad }) {
//   return (
//     <article>
//       <h2>{nombre}</h2>
//       <p>Vive en {ciudad}</p>
//       <hr />
//     </article>
//   );
// }

// function PruebaProps() {
//   return (
//     <main>
//       <Tarjeta nombre="Javier" ciudad="Eibar" />
//       <Tarjeta nombre="Ana" ciudad="Bilbao" />
//       <Tarjeta nombre="Luis" ciudad="Vitoria" />
//     </main>
//   );
// }

// export default PruebaProps;