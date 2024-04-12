import backgroundImage from "/gatoyperro.jpg";

const Quehacemos = () => {
  const backgroundStyle = {
    backgroundImage: `url(${backgroundImage})`,
    backgroundSize: "cover",
    backgroundPosition: "center",
    backgroundRepeat: "no-repeat",
    opacity: 0.4, 
    position: "fixed", 
    top: 0,
    left: 0,
    width: "100%",
    height: "100%",
    zIndex: -1, 
    loading: "lazy",
  };

return (
  <div className="p-40 m-auto flex items-center justify-center">
    <div style={backgroundStyle}></div>
    <div className="max-w-3xl font-normal gap-2 p-40 text-black">
      <h1 className="text-3xl lg:text-4xl xl:text-5xl font-bold mb-6">
        ¿Qué hacemos en SurAmigo?
      </h1>
      <p className="text-lg mb-8 text-clip overflow-hidden ...">
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
