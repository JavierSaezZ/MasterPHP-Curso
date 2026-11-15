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
   <>
   <div className='flex justify-center items-center   h-screen w-full'>
   <input type="text"   placeholder="Escribe y pulsa el botón..." className="border-b-2 border-black p-1  w-100 mb-4 bg-white-100 focus:border-blue-500 outline-none "></input>
   </div>
   </>
  );
}