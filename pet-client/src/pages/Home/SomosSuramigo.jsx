
const SomosSuramigo = () => {
  return (
    
      <div
        className="min-h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat"
        style={{
          backgroundImage: "url('gatonegro.jpg')",
          backgroundSize: "cover",
          backgroundPosition: "center",
          backgroundRepeat: "no-repeat",
        }}
      >
   
        <div className="max-w-5xl px-4 text-center text-green-600 ">
          <h1 className="text-4xl md:text-3xl lg:text-4xl xl:text-5xl">
            Somos SurAmigo
          </h1>
          <p className="mt-4 text-base text-left md:text-lg lg:text-xl xl:text-2xl">
            Somos un equipo de desarrolladores de frontend y backend
            provenientes de diversas partes del mundo, unidos por un propósito
            común: facilitar el proceso de adopción de mascotas y fomentar el
            amor y la compasión hacia los animales. Nuestro equipo, conformado
            por talentosos individuos de diferentes nacionalidades y culturas,
            enfrenta desafíos diarios que van más allá del código.
          </p>
          <p className="mt-4 text-base text-left md:text-lg lg:text-xl xl:text-2xl">
            Nos desafiamos mutuamente a pensar de manera creativa y a encontrar
            soluciones innovadoras para mejorar continuamente nuestra plataforma
            y brindar una experiencia excepcional a nuestros usuarios. En
            SurAmigo, no solo construimos una aplicación; construimos puentes
            entre personas de diferentes partes del mundo y animales que
            necesitan un hogar amoroso. Cada línea de código que escribimos es
            un paso hacia adelante en nuestro compromiso de hacer del mundo un
            lugar mejor para todas las criaturas vivientes.
          </p>
          <a
            href="/"
            className="mt-4 mb-4 inline-block bg-lime-500 px-8 py-2 rounded-md font-semibold text-black hover:bg-gray-300 transition duration-300"
          >
            Explorar más
          </a>
        </div>
      </div>
    
  );
};

export default SomosSuramigo;