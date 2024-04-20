const Quehacemos = () => {
  return (
    <div
      className="min-h-screen flex items-center justify-center relative overflow-hidden"
      style={{
        backgroundImage: "url('gatoyperro.jpg')",
        backgroundSize: "cover",
        backgroundPosition: "center",
        backgroundRepeat: "no-repeat",
      }}
    >
      <div className="absolute inset-0 bg-gray-200 opacity-50 "></div>

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
