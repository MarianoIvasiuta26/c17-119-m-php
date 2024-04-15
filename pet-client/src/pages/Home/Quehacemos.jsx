

// const Quehacemos = () => {
//   return (
//     <div className="relative">
//       <img
//         className="w-full h-auto mt-1"
//         loading="lazy"
//         src="./gatoyperro.jpg"
//         alt="Gato y perro"
//       />

//       <div className="max-w-3xl font-normal gap-2 p-40 text-black">
//         <h1 className="text-xl md:text-3xl lg:text-4xl xl:text-5xl font-bold mb-6 text-center">
//           ¿Qué hacemos en SurAmigo?
//         </h1>
//         <p className="text-base md:text-lg lg:text-lg xl:text-lg mb-8 text-clip overflow-hidden text-center">
//           En SurAmigo, nos dedicamos a facilitar el proceso de adopción de
//           mascotas, conectando a personas que desean adoptar con animales que
//           necesitan un hogar amoroso. Nuestra plataforma proporciona una
//           experiencia intuitiva y segura para encontrar tu compañero peludo
//           perfecto.
//         </p>
//         <a
//           href="/"
//           className="text-black absolute items-center justify-center bg-lime-500 px-11 py-1 rounded-md font-semibold hover:bg-gray-300 transition duration-300"
//         >
//           Explorar más
//         </a>
//       </div>
//     </div>
//   );

// };

// export default Quehacemos;





const Quehacemos = () => {
  return (
    <div
      className="min-h-screen flex items-center justify-center relative"
      style={{
        backgroundImage: "url('gatoyperro.jpg')",
        backgroundSize: "cover",
        backgroundPosition: "center",
        backgroundRepeat: "no-repeat",
      }}
    >
      {/* Grayscale filter */}
      <div className="absolute inset-0 bg-gray-300 opacity-70 "></div>
      {/* Content */}
      <div className="max-w-5xl px-4 text-center text-gray-900 relative z-10">
        <h1 className="text-5xl md:text-3xl lg:text-5xl xl:text-5xl sm:text-3xl">
          ¿Qué Hacemos?
        </h1>
        <p className="mt-4 text-left font-semibold md:text-lg lg:text-xl xl:text-2xl">
          En SurAmigo, nos dedicamos a facilitar el proceso de adopción de
          mascotas, conectando a personas que desean adoptar con animales que
          necesitan un hogar amoroso. Nuestra plataforma proporciona una
          experiencia intuitiva y segura para encontrar tu compañero peludo
          perfecto.
        </p>
        <a
          href="/"
          className="mt-4 inline-block bg-lime-500 px-8 py-2 rounded-md font-semibold text-black hover:bg-gray-300 transition duration-300"
        >
          Explorar más
        </a>
      </div>
    </div>
  );
};

export default Quehacemos;
