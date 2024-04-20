import RequisitosAdopcionForm from "./RequisitosAdopcionForm";
import "../Mascotas/style.css";

const PetForm = () => {
  return (
    <div className="relative">
      <h1 className="absolute top-0 left-1/2 transform -translate-x-1/2 mt-10 w-full text-center text-4xl font-normal font-bebas-neue text-green-800 md:text-6xl lg:text-6xl sm:text-4xl">
        FORMULARIO ADOPTANTE
      </h1>
      <div
        // className="min-h-screen flex items-center justify-center bg-cover bg-center"
        // style={{
        //   backgroundImage: "url('perronegro.jpg')",
        //   backgroundSize: "cover",
        //   backgroundPosition: "center",
        //   backgroundRepeat: "no-repeat",          
        // }}
      >
        <div >
          <RequisitosAdopcionForm />
        </div>
      </div>
    </div>
  );
};

export default PetForm;
