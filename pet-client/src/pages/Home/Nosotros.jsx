import backgroundImage from "../../../public/gatonegro.jpg";

const Nosotros = () => {
  const backgroundStyle = {
    backgroundImage: `url(${backgroundImage})`,
    backgroundSize: "cover",
    backgroundPosition: "center",
    backgroundRepeat: "no-repeat",
    opacity: 0.4, // Adjust the opacity value as needed
    position: "fixed", // or 'absolute' depending on your layout
    top: 0,
    left: 0,
    width: "100%",
    height: "100%",
    zIndex: -1, // Ensure it's behind other elements
    loading: "lazy",
  };

return (
  <div className="p-2 md:p-4 lg:p-10 mx-auto flex items-center justify-center">
    <div style={backgroundStyle}></div>
    <div className="w-full max-w-xl text-center font-normal gap-6 text-black">
      <h1 className="text-3xl md:text-4xl lg:text-5xl font-bold mb-8">
        ¿Qué hacemos en SurAmigo?
      </h1>
      <div className="text-base md:text-lg lg:text-lg mb-12 text-left">
        <p>
          En SurAmigo, nuestra pasión por la adopción de mascotas va más allá de
          solo ofrecer una plataforma; representa una comunidad diversa y
          comprometida.
        </p>
        <p>
          Somos un equipo de desarrolladores de frontend y backend provenientes
          de diversas partes del mundo, unidos por un propósito común: facilitar
          el proceso de adopción de mascotas y fomentar el amor y la compasión
          hacia los animales. Nuestro equipo, conformado por talentosos
          individuos de diferentes nacionalidades y culturas, enfrenta desafíos
          diarios que van más allá del código.
        </p>
        <p>
          Desde la diferencia de zonas horarias hasta las barreras tecnológicas,
          cada obstáculo nos brinda la oportunidad de crecer y aprender juntos.
          A pesar de las dificultades inherentes a trabajar en un equipo
          internacional, nos enorgullece el hecho de que nuestras diferencias
          culturales y lingüísticas enriquecen nuestra experiencia y
          perspectiva.
        </p>
        <p>
          Nos desafiamos mutuamente a pensar de manera creativa y a encontrar
          soluciones innovadoras para mejorar continuamente nuestra plataforma y
          brindar una experiencia excepcional a nuestros usuarios. En SurAmigo,
          no solo construimos una aplicación; construimos puentes entre personas
          de diferentes partes del mundo y animales que necesitan un hogar
          amoroso. Cada línea de código que escribimos es un paso hacia adelante
          en nuestro compromiso de hacer del mundo un lugar mejor para todas las
          criaturas vivientes.
        </p>
      </div>
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
