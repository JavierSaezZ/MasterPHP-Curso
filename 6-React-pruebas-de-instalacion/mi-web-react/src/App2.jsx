import { useState, useRef } from 'react';
import reactLogo from './assets/react.svg'
import viteLogo from './assets/vite.svg'
import heroImg from './assets/hero.png'
import './App.css'

export default function LectorTexto() {
  // MODO 1: Al estilo React (Vigilancia en tiempo real)
  const [textoEnVivo, setTextoEnVivo] = useState("");

  // MODO 2: Al estilo clásico (Cogerlo solo cuando pulsas un botón)
  const miInputRef = useRef(null); 
  const [textoAtrapado, setTextoAtrapado] = useState("");

  // Esta función simula el clásico "document.getElementById().value"
  const cogerTextoAhora = () => {
    // Así es como "coges" el texto exacto que hay en el input en este milisegundo
    const elTexto = miInputRef.current.value; 
    
    // Lo guardamos en el estado para poder mostrarlo abajo en rojo
    setTextoAtrapado(elTexto);
  };

  return (
    <div className="p-8 bg-gray-50 min-h-screen font-sans">
      <h2 className="text-2xl font-bold mb-6">¿Cómo coger texto en React?</h2>

      {/* --- MODO 1: MODO REACT (Tiempo real) --- */}
      <div className="bg-white p-6 rounded-lg shadow-md mb-8 border-l-4 border-blue-500">
        <h3 className="font-bold text-blue-600 mb-2">Modo 1: En tiempo real (El estándar)</h3>
        <p className="text-sm text-gray-600 mb-4">React lee cada letra según la escribes.</p>
        
        <input 
          type="text" 
          placeholder="Escribe algo aquí..."
          // Cada vez que tecleas, guardamos el texto en la variable
          onChange={(evento) => setTextoEnVivo(evento.target.value)}
          className="border p-2 rounded w-full mb-4 bg-gray-100"
        />
        
        <p className="font-mono text-gray-800">
          Texto atrapado en vivo: <span className="font-bold text-blue-500">{textoEnVivo}</span>
        </p>
      </div>

      {/* --- MODO 2: MODO CLÁSICO (Con botón y useRef) --- */}
      <div className="bg-white p-6 rounded-lg shadow-md border-l-4 border-red-500">
        <h3 className="font-bold text-red-600 mb-2">Modo 2: Usando useRef (Como getElementById)</h3>
        <p className="text-sm text-gray-600 mb-4">No leemos nada hasta que pulsas el botón.</p>
        
        <input 
          type="text" 
          // ¡Aquí le ponemos la "etiqueta" invisible para poder buscarlo luego!
          ref={miInputRef} 
          placeholder="Escribe y pulsa el botón..."
          className="border p-2 rounded w-full mb-4 bg-gray-100"
        />
        
        <button 
          onClick={cogerTextoAhora}
          className="bg-red-500 text-white px-4 py-2 rounded shadow hover:bg-red-600 transition"
        >
          ¡Coger texto del input!
        </button>

        <p className="font-mono text-gray-800 mt-4">
          Resultado al pulsar: <span className="font-bold text-red-500">{textoAtrapado}</span>
        </p>
      </div>

    </div>
  );
}