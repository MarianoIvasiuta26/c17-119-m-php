

const Quehacemos = () => {
  return (
    <div className="relative">
      <img
        className="w-full h-auto mt-1"
        loading="lazy"
        src="./gatoyperro.jpg"
        alt="Gato y perro"
      />

      <div className="max-w-3xl font-normal gap-2 p-40 text-black">
        <h1 className="text-xl md:text-3xl lg:text-4xl xl:text-5xl font-bold mb-6 text-center">
          ¿Qué hacemos en SurAmigo?
        </h1>
        <p className="text-base md:text-lg lg:text-lg xl:text-lg mb-8 text-clip overflow-hidden text-center">
          En SurAmigo, nos dedicamos a facilitar el proceso de adopción de
          mascotas, conectando a personas que desean adoptar con animales que
          necesitan un hogar amoroso. Nuestra plataforma proporciona una
          experiencia intuitiva y segura para encontrar tu compañero peludo
          perfecto.
        </p>
        <a
          href="/"
          className="text-black absolute items-center justify-center bg-lime-500 px-11 py-1 rounded-md font-semibold hover:bg-gray-300 transition duration-300"
        >
          Explorar más
        </a>
      </div>
    </div>
  );

};

export default Quehacemos;
