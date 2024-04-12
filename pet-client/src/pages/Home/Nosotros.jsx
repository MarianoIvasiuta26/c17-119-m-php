

const Nosotros = () => {
  
return (
  <div className="relative">
    <img
      className="w-full h-auto"
      loading="lazy"
      src="/gatonegro.jpg"
      alt="gatonegro"
    />
    <div className="absolute inset-0 flex items-center justify-center">
      <div>
        <h2 className="text-lg md:text-2xl lg:text-xl xl:text-2xl text-center font-bold mb-2">
          Somos SurAmigo
        </h2>

        <div className="max-w-4xl text-left font-normal gap-6 text-black">
          <p>
            Somos un equipo de desarrolladores de frontend y backend
            provenientes de diversas partes del mundo, unidos por un propósito
            común: facilitar el proceso de adopción de mascotas y fomentar el
            amor y la compasión hacia los animales. Nuestro equipo, conformado
            por talentosos individuos de diferentes nacionalidades y culturas,
            enfrenta desafíos diarios que van más allá del código.
          </p>

          <p>
            En SurAmigo, nuestra pasión por la adopción de mascotas va más allá
            de solo ofrecer una plataforma; representa una comunidad diversa y
            comprometida.
          </p>
          <p>
            Nos desafiamos mutuamente a pensar de manera creativa y a encontrar
            soluciones innovadoras para mejorar continuamente nuestra plataforma
            y brindar una experiencia excepcional a nuestros usuarios. En
            SurAmigo, no solo construimos una aplicación; construimos puentes
            entre personas de diferentes partes del mundo y animales que
            necesitan un hogar amoroso. Cada línea de código que escribimos es
            un paso hacia adelante en nuestro compromiso de hacer del mundo un
            lugar mejor para todas las criaturas vivientes.
          </p>
        </div>
        <a
          href="/"
          className="text-black absolute items-center text-center ml-60 mr-auto bg-lime-500 px-8 py-1 mt-6 rounded-md font-semibold hover:bg-gray-300 transition duration-300"
        >
          Explorar más
        </a>
      </div>
    </div>
  </div>
);



};

export default Nosotros;
