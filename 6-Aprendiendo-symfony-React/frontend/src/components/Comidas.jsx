import { useState, createContext, useContext , useRef, useEffect } from "react";

const RecetasContext = createContext(null);

function App() {

    // ==================== RECETAS ====================
    const [comidas, setComidas] = useState([
        {
            id: 1,
            nombre: "Pollo al curry",
            ingredientes: ["Pollo", "Arroz", "Cebolla", "Leche de coco", "Curry"],
            receta: "Cuece el arroz. Sofríe la cebolla, añade el pollo y cocínalo bien. Incorpora el curry y la leche de coco, deja reducir y sirve con el arroz.",
            minutos: 30,
            dificultad: "Fácil",
            vegetariana: false,
            favorita: true,
        },

        {
            id: 2,
            nombre: "Lasaña de espinacas",
            ingredientes: ["Placas de lasaña", "Espinacas", "Ricota", "Bechamel", "Queso rallado"],
            receta: "Cocina las espinacas y mézclalas con la ricota. Monta capas de pasta y relleno. Cubre con bechamel y queso y hornea siguiendo las indicaciones de la pasta.",
            minutos: 50,
            dificultad: "Media",
            vegetariana: true,
            favorita: false,
        },

        {
            id: 3,
            nombre: "Macarrones con tomate",
            ingredientes: ["Macarrones", "Tomate triturado", "Ajo", "Aceite de oliva", "Orégano"],
            receta: "Cuece los macarrones. Sofríe el ajo, añade el tomate y deja cocinar. Mezcla con la pasta y añade orégano.",
            minutos: 20,
            dificultad: "Fácil",
            vegetariana: true,
            favorita: true,
        },

        {
            id: 4,
            nombre: "Tortilla de patatas",
            ingredientes: ["Patatas", "Huevos", "Cebolla", "Aceite de oliva", "Sal"],
            receta: "Cocina las patatas y la cebolla en aceite. Escúrrelas, mézclalas con los huevos batidos y cuaja la tortilla por ambos lados.",
            minutos: 40,
            dificultad: "Media",
            vegetariana: true,
            favorita: true,
        },

        {
            id: 5,
            nombre: "Pavo con verduras",
            ingredientes: ["Pechuga de pavo", "Calabacín", "Zanahoria", "Pimiento", "Aceite de oliva"],
            receta: "Corta el pavo y las verduras en tiras. Saltea las verduras, incorpora el pavo y cocina hasta que esté completamente hecho.",
            minutos: 25,
            dificultad: "Fácil",
            vegetariana: false,
            favorita: false,
        },

        {
            id: 6,
            nombre: "Ensalada de garbanzos",
            ingredientes: ["Garbanzos cocidos", "Tomate", "Pepino", "Aceite de oliva", "Limón"],
            receta: "Enjuaga los garbanzos y corta las verduras. Mezcla todo y aliña con aceite de oliva y zumo de limón.",
            minutos: 10,
            dificultad: "Fácil",
            vegetariana: true,
            favorita: false,
        },

        {
            id: 7,
            nombre: "Pizza margarita",
            ingredientes: ["Masa de pizza", "Tomate", "Mozzarella", "Albahaca", "Aceite de oliva"],
            receta: "Extiende la masa, añade el tomate y la mozzarella. Hornea hasta que esté dorada y termina con albahaca fresca.",
            minutos: 25,
            dificultad: "Fácil",
            vegetariana: true,
            favorita: true,
        },

        {
            id: 8,
            nombre: "Hamburguesa casera",
            ingredientes: ["Carne picada", "Pan de hamburguesa", "Lechuga", "Tomate", "Queso"],
            receta: "Forma las hamburguesas, cocínalas a la plancha y monta el pan con las verduras y el queso.",
            minutos: 20,
            dificultad: "Fácil",
            vegetariana: false,
            favorita: false,
        },

        {
            id: 9,
            nombre: "Lasaña de carne",
            ingredientes: ["Placas de lasaña", "Carne picada", "Tomate", "Bechamel", "Queso rallado"],
            receta: "Prepara la carne con tomate. Monta capas de pasta, carne y bechamel. Añade queso y hornea hasta gratinar.",
            minutos: 60,
            dificultad: "Difícil",
            vegetariana: false,
            favorita: true,
        },

        {
            id: 10,
            nombre: "Crema de calabaza",
            ingredientes: ["Calabaza", "Patata", "Cebolla", "Caldo de verduras", "Aceite de oliva"],
            receta: "Sofríe la cebolla, añade la calabaza y la patata. Cocina con caldo hasta ablandar y tritura.",
            minutos: 35,
            dificultad: "Fácil",
            vegetariana: true,
            favorita: false,
        },

        {
            id: 11,
            nombre: "Arroz con pollo",
            ingredientes: ["Arroz", "Pollo", "Pimiento rojo", "Cebolla", "Caldo de pollo"],
            receta: "Dora el pollo y sofríe las verduras. Añade el arroz y el caldo, y cocina hasta que el arroz esté hecho.",
            minutos: 45,
            dificultad: "Media",
            vegetariana: false,
            favorita: true,
        },

        {
            id: 12,
            nombre: "Ensalada caprese",
            ingredientes: ["Tomate", "Mozzarella", "Albahaca", "Aceite de oliva", "Sal"],
            receta: "Corta el tomate y la mozzarella en rodajas. Alterna las capas, añade albahaca y aliña.",
            minutos: 10,
            dificultad: "Fácil",
            vegetariana: true,
            favorita: false,
        },

        {
            id: 13,
            nombre: "Salmón al horno",
            ingredientes: ["Salmón", "Limón", "Patatas", "Ajo", "Aceite de oliva"],
            receta: "Hornea las patatas cortadas. Incorpora el salmón con ajo y limón y continúa horneando hasta que esté hecho.",
            minutos: 40,
            dificultad: "Media",
            vegetariana: false,
            favorita: true,
        },

        {
            id: 14,
            nombre: "Risotto de setas",
            ingredientes: ["Arroz arborio", "Setas", "Cebolla", "Caldo de verduras", "Parmesano"],
            receta: "Sofríe la cebolla y las setas. Añade el arroz e incorpora caldo caliente poco a poco mientras remueves. Termina con parmesano.",
            minutos: 40,
            dificultad: "Media",
            vegetariana: true,
            favorita: false,
        },

        {
            id: 15,
            nombre: "Tacos de pollo",
            ingredientes: ["Tortillas de trigo", "Pollo", "Pimiento", "Cebolla", "Especias"],
            receta: "Saltea el pollo con las verduras y especias. Calienta las tortillas y rellénalas con la mezcla.",
            minutos: 25,
            dificultad: "Fácil",
            vegetariana: false,
            favorita: true,
        },

        {
            id: 16,
            nombre: "Berenjenas rellenas",
            ingredientes: ["Berenjenas", "Tomate", "Cebolla", "Champiñones", "Queso rallado"],
            receta: "Asa las berenjenas, retira parte de la pulpa y mézclala con las verduras salteadas. Rellena, añade queso y gratina.",
            minutos: 50,
            dificultad: "Media",
            vegetariana: true,
            favorita: false,
        },

        {
            id: 17,
            nombre: "Croquetas de jamón",
            ingredientes: ["Jamón serrano", "Leche", "Harina", "Mantequilla", "Pan rallado", "Huevo"],
            receta: "Prepara una bechamel espesa con jamón. Enfría la masa, forma croquetas, pásalas por huevo y pan rallado y fríelas.",
            minutos: 90,
            dificultad: "Difícil",
            vegetariana: false,
            favorita: true,
        },

        {
            id: 18,
            nombre: "Espaguetis carbonara",
            ingredientes: ["Espaguetis", "Guanciale", "Huevos", "Pecorino romano", "Pimienta negra"],
            receta: "Cuece la pasta y dora el guanciale. Mezcla huevos y queso. Fuera del fuego, combina todo con un poco de agua de cocción hasta formar una salsa cremosa.",
            minutos: 25,
            dificultad: "Media",
            vegetariana: false,
            favorita: true,
        },

        {
            id: 19,
            nombre: "Wok de verduras",
            ingredientes: ["Brócoli", "Zanahoria", "Pimiento", "Calabacín", "Salsa de soja"],
            receta: "Corta las verduras en tiras y saltéalas a fuego fuerte. Añade salsa de soja y cocina brevemente para mantenerlas crujientes.",
            minutos: 20,
            dificultad: "Fácil",
            vegetariana: true,
            favorita: false,
        },

        {
            id: 20,
            nombre: "Pollo al horno con patatas",
            ingredientes: ["Muslos de pollo", "Patatas", "Cebolla", "Romero", "Aceite de oliva"],
            receta: "Coloca las patatas y la cebolla en una bandeja, añade el pollo y condimenta. Hornea hasta que el pollo esté bien cocinado y dorado.",
            minutos: 65,
            dificultad: "Fácil",
            vegetariana: false,
            favorita: false,
        },
    ]);



    // ==================== INGREDIENTES (PRUEBAS) ====================
    const [ingredientesmodal, setIngredientesmodal] = useState([]);

    // ==================== ESTADO DEL MODAL ====================
    // Guarda si estamos añadiendo o editando y cuál es la receta seleccionada.
    const [modal, setModal] = useState(null);





    // ==================== ELIMINAR RECETA ====================

    function eliminarReceta(recetasId) {
        const eliminar = comidas.filter(receta => receta.id !== recetasId);
        setComidas(eliminar);
    }
    function AñadirIngredientes(evento) {
        const nuevoingrediente = evento.currentTarget.form.elements.ingredientes.value
        console.log(ingredientesmodal)
        if (!ingredientesmodal.includes(nuevoingrediente)){
        setIngredientesmodal([...ingredientesmodal, nuevoingrediente])
        }
        evento.currentTarget.form.elements.ingredientes.value = "";
    }
function eliminarIngrediente(ingrediente) {
    setIngredientesmodal(anterior =>
        anterior.filter(item => item !== ingrediente)
    );
}
    // ==================== ABRIR Y CERRAR MODALES ====================

    function abrirañadir() {
        setIngredientesmodal([]);
        setModal({ tipo: "añadir", receta: null });
    }

function abrirEditar(receta) {
    setIngredientesmodal([...receta.ingredientes]);
    setModal({ tipo: "editar", receta });
}
    function cerrarModal() {
        setModal(null);
    }

    // ==================== PÁGINA PRINCIPAL ====================
    return (
        <RecetasContext.Provider value={{
            comidas,
            setComidas,
            ingredientesmodal,
            setIngredientesmodal,
            eliminarIngrediente,
            AñadirIngredientes

        }}>
            <div>
                <div className="recetas-toolbar">
                    <button type="button" className="receta-boton-añadir" onClick={abrirañadir}>+ Añadir receta</button>
                </div>

                {/* Tarjetas generadas desde el array de comidas */}
                <main className="recetas" aria-label="Recetas">
                    {comidas.map(unareceta => (
                        <div key={unareceta.id}>
                            <Tarjeta recetas={unareceta} eliminarReceta={eliminarReceta} editarReceta={abrirEditar} />
                            <hr />
                        </div>
                    ))}
                </main>

                {/* El modal solo aparece cuando 'modal' tiene un valor */}
                {modal && <ModalReceta modal={modal} onCerrar={cerrarModal} />}
            </div>
        </RecetasContext.Provider>
    );
}

// ==================== TARJETAS ====================

function Tarjeta({ recetas, eliminarReceta, editarReceta }) {
    const [favorito, setFavorito] = useState(recetas.favorita);
    const [mostrarRecetaCompleta, setMostrarRecetaCompleta] = useState(false);
    const LIMITE_VISTA_RECETA = 260;
    const textoReceta = recetas.receta ?? "";
    const recetaLarga = textoReceta.length > LIMITE_VISTA_RECETA;
    const textoVisible = recetaLarga && !mostrarRecetaCompleta
        ? `${textoReceta.slice(0, LIMITE_VISTA_RECETA).trimEnd()}…`
        : textoReceta;

    // ==================== FAVORITOS / LIKE ====================

    function like() {
        setFavorito(anterior => !anterior);
    }

    return (
        <article className="receta" aria-labelledby={`nombre-receta-${recetas.id}`}>

            {/* Botones para editar y eliminar */}
            <div className="receta-acciones">
                <button type="button" className="receta-accion" onClick={() => editarReceta(recetas)} aria-label={`Editar ${recetas.nombre}`} title="Editar receta">✏️</button>
                <button type="button" className="receta-accion receta-accion-eliminar" onClick={() => eliminarReceta(recetas.id)} aria-label={`Eliminar ${recetas.nombre}`} title="Eliminar receta">🗑️</button>
            </div>
            <h2 id={`nombre-receta-${recetas.id}`}>{recetas.nombre}</h2>

            {/* Ingredientes de esta tarjeta */}
            <section aria-labelledby={`titulo-ingredientes-${recetas.id}`}>
                <h3 id={`titulo-ingredientes-${recetas.id}`}>Ingredientes</h3>
                <ul className="receta-ingredientes">
                    {recetas.ingredientes.map(ingrediente => (
                        <li key={ingrediente}>{ingrediente}</li>
                    ))}
                </ul>
            </section>

            {/* Preparación */}
            <section aria-labelledby={`titulo-receta-${recetas.id}`}>
                <h3 id={`titulo-receta-${recetas.id}`}>Receta</h3>
                <p className="receta-texto">{textoVisible}</p>
                {recetaLarga && (
                    <button type="button" className="receta-ver-mas" aria-expanded={mostrarRecetaCompleta} onClick={() => setMostrarRecetaCompleta(anterior => !anterior)}>
                        {mostrarRecetaCompleta ? "Ver menos" : "Ver receta completa"}
                    </button>
                )}
            </section>

            {/* Tiempo, dificultad y etiquetas */}
            <dl className="receta-datos">
                <div>
                    <dt>Tiempo</dt>
                    <dd>{recetas.minutos}</dd>
                </div>
                <div>
                    <dt>Dificultad</dt>
                    <dd>{recetas.dificultad}</dd>
                </div>
                <div className="receta-iconos">
                    <svg onClick={like} className={'like ' + (favorito ? 'receta-favorita' : 'receta-nofavorita')} viewBox="0 0 24 24" fill="currentColor" role="img" aria-label="Favorita">
                        <title>Favorita</title>
                        <path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0l-1 1-1-1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.8-8.6a5.5 5.5 0 0 0 0-7.8Z" />
                    </svg>
                    {recetas.vegetariana && (
                        <svg className="receta-vegetariana" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.7" strokeLinecap="round" strokeLinejoin="round" role="img" aria-label="Vegetariana">
                            <title>Vegetariana</title>
                            <path d="M20 4C13 3 6 6 6 13a6 6 0 0 0 6 6c7 0 10-8 8-15Z" />
                            <path d="m4 21 10-10" />
                            <path d="m3 3 18 18" />
                        </svg>
                    )}
                </div>
            </dl>
        </article>
    );
}

// ==================== ENVÍO DEL FORMULARIO ====================
// De momento solo recoge y muestra los datos; no crea ni edita recetas aún.

function enviarFormulario(evento, contexto,editarid, tipo) {
    evento.preventDefault();
    const { ingredientesmodal, setComidas } = contexto;
    const datos = new FormData(evento.currentTarget);
    const nombre = datos.get("nombre");
    const nuevacomida = {
        nombre: datos.get("nombre"),
        ingredientes: ingredientesmodal,
        receta: datos.get("receta"),
        minutos: Number(datos.get("minutos")),
        dificultad: datos.get("dificultad"),
        vegetariana: datos.has("vegetariana"),
        favorita: false
    };

    if(tipo==="editar"){
        console.log("editando usuario numero "+ editarid) 
    setComidas(anterior =>
        anterior.map(receta =>
           receta.id === editarid
                ? { ...receta, ...nuevacomida }
                : receta
        )
    );


    } 
    if(tipo==="añadir"){

        setComidas(anterior => {
            const nuevoId = Math.max(0, ...anterior.map(receta => receta.id)) + 1;
            return [...anterior, { id: nuevoId, ...nuevacomida }];
        });
        console.log(nuevacomida);
    }
}

// ==================== MODAL DE AÑADIR / EDITAR ====================
// Solo la interfaz: los campos todavía no se rellenan automáticamente ni guardan.

function ModalReceta({ modal, onCerrar }) {

    const contexto = useContext(RecetasContext);
    const { ingredientesmodal, AñadirIngredientes, eliminarIngrediente } = contexto;
    const formularioRef = useRef(null);
    const editarId=modal.receta?.id

useEffect(() => {
    if (!modal.receta) return;
    Object.entries(modal.receta).forEach(([nombre, valor]) => {
        const input = formularioRef.current.elements.namedItem(nombre);

        if (!input || nombre === "ingredientes") return;

        if (input.type === "checkbox") {
            input.checked = valor;
        } else {
            input.value = valor ?? "";
        }
    });

}, [modal.receta]);
    
    const editando = modal.tipo === "editar";
    return (
        <div className="modal-receta-fondo" onClick={evento => {
            if (evento.target === evento.currentTarget) onCerrar();
        }}>
            <section className="modal-receta" role="dialog" aria-modal="true" aria-labelledby="modal-receta-titulo" onKeyDown={evento => {
                if (evento.key === "Escape") onCerrar();
            }}>

                {/* Cabecera del modal */}
                <div className="modal-receta-cabecera">
                    <div>
                        <span className="modal-receta-etiqueta">MI RECETARIO</span>
                        <h2 id="modal-receta-titulo">{editando ? "Editar receta" : "Añadir receta"}</h2>
                        <p>{editando ? "Actualiza los datos de tu receta." : "Prepara tu próxima receta."}</p>
                    </div>
                    <button type="button" className="modal-receta-cerrar" onClick={onCerrar} aria-label="Cerrar modal">×</button>
                </div>

                {/* Campos del formulario */}
                <form ref={formularioRef} className="modal-receta-form" onSubmit={evento => enviarFormulario(evento, contexto, editarId, editando ? "editar":"añadir") }>
                    <label className="modal-receta-campo">
                        <span>Nombre de la receta</span>
                        <input name="nombre" type="text" autoFocus />
                    </label>
                    <section aria-labelledby={`titulo-ingredientes`}>
                        <h3>Ingredientes</h3>
                        <ul className="receta-ingredientes">
                            {ingredientesmodal != "" && ingredientesmodal.map(ingrediente => (
                                <li key={ingrediente}>{ingrediente} <span onClick={() => eliminarIngrediente(ingrediente)}>X</span></li>
                            ))}
                        </ul>
                    </section>
                    <label className="modal-receta-campo ingredientes-campo">
                        <input name="ingredientes" className="modal-receta-ingredientes" />
                        <button type="button" className="modal-receta-guardar modal-receta-ingredientes-añadir" onClick={AñadirIngredientes}> Añadir Ingrediente</button>
                    </label>

                    <label className="modal-receta-campo">
                        <span>Preparación</span>
                        <textarea name="receta" rows={4} maxLength={1500} />
                        <small>Máximo 1500 caracteres</small>
                    </label>
                    <div className="modal-receta-fila">
                        <label className="modal-receta-campo">
                            <span>Tiempo (minutos)</span>
                            <input name="minutos" type="number" min="1" />
                        </label>

                        <label className="modal-receta-campo">
                            <span>Dificultad</span>
                            <select name="dificultad">
                                <option value="" disabled>Selecciona una dificultad</option>
                                <option value="Fácil">Fácil</option>
                                <option value="Media">Media</option>
                                <option value="Difícil">Difícil</option>
                            </select>
                        </label>
                    </div>

                    {/* Opciones de la receta */}
                    <div className="modal-receta-opciones">
                        <label className="modal-receta-checkbox">
                            <input name="vegetariana" type="checkbox" />
                            <span>Vegetariana</span>
                        </label>
                    </div>

                    {/* Botones inferiores */}
                    <div className="modal-receta-pie">
                        <button type="button" className="modal-receta-cancelar" onClick={onCerrar}>Cancelar</button>
                        <button type="submit" className="modal-receta-guardar">{editando ? "Guardar cambios" : "Crear receta"}</button>
                    </div>
                </form>
            </section>
        </div>
    );
}

export default App;
