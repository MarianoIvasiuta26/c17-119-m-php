import backgroundImage from "../../../public/gatonegro.jpg";

const Nosotros = () => {
  const backgroundStyle = {
    backgroundImage: `url(${backgroundImage})`,
    backgroundSize: "cover",
    backgroundPosition: "center",
    backgroundRepeat: "no-repeat",
    opacity: 0.7, // Adjust the opacity value as needed
    position: "fixed", // or 'absolute' depending on your layout
    top: 0,
    left: 0,
    width: "100%",
    height: "100%",
    zIndex: -1, // Ensure it's behind other elements
    loading: "lazy",
  };

  return (
    <div className="p-40 m-auto flex items-center justify-center">
      <div style={backgroundStyle}></div>
      <div className="max-w-4xl text-center font-bebas-neue gap-6 p-40 text-black">
        <h1 className="text-4xl font-bold mb-6">¿Qué hacemos en SurAmigo?</h1>
        <p className="text-lg mb-8">
          En SurAmigo, nos dedicamos a facilitar el proceso de adopción de
          mascotas, conectando a personas que desean adoptar con animales que
          necesitan un hogar amoroso. Nuestra plataforma proporciona una
          experiencia intuitiva y segura para encontrar tu compañero peludo
          perfecto.
        </p>
        <a
          href="/"
          className="text-black bg-lime-600 px-6 py-3 rounded-md font-semibold hover:bg-gray-300 transition duration-300"
        >
          Explorar más
        </a>
      </div>
    </div>
  );
};

export default Nosotros;
