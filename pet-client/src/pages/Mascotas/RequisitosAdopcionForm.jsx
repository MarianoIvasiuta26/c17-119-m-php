import { useState, useEffect } from "react";
import "../Mascotas/style.css";

const RequisitosAdopcionForm = () => {
 
  const [formData, setFormData] = useState({
    otherAnimals: "Si",
    hasChildren: "Si",
    experienceWithPets: "Si",
    canProvideSpace: "Si",
    canProvideCareAndVetAttention: "Si",
  });

 
const handleInputChange = (e) => {
  const { name, value, type } = e.target;
  if (type === "select-one") {
    
    const selectedValue = e.target.options[e.target.selectedIndex].value;
    setFormData((prevData) => ({
      ...prevData,
      [name]: selectedValue,
    }));
  } else {
    
    setFormData((prevData) => ({
      ...prevData,
      [name]: value,
    }));
  }
};
 
  useEffect(() => {
    localStorage.setItem("adoptionFormData", JSON.stringify(formData));
  }, [formData]);

  
  useEffect(() => {
    const savedFormData = JSON.parse(localStorage.getItem("adoptionFormData"));
    if (savedFormData) {
      setFormData(savedFormData);
    }
  }, []);

  return (
    <div className="max-w-5xl mx-auto md:px-6 p-2 text-left col-span-3">
      <form className="w-full max-w-7xl mx-auto md:px-6 p-2 ">
        <h1 className="top-20 mt-10 pt-16 text-left text-4xl font-normal font-bebas-neue text-green-800 md:text-2xl lg:text-3xl sm:text-xl p-4">
          Datos Personales
        </h1>
        <div className="flex flex-wrap -mx-3 mb-6">
          <div className="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label
              className="block uppercase tracking-wide text-green-800  text-xs font-bold mb-2"
              htmlFor="fullname"
            >
              Nombre Completo
            </label>
            <input
              className="appearance-none block w-full bg-gray-100 text-green-800  border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
              id="fullname"
              type="text"
              name="fullName"
              value={formData.fullName}
              onChange={handleInputChange}
              placeholder="Nombre y Apellidos"
            />
            <p className="text-red-500 text-xs italic">
              Por favor llenar el campo
            </p>
          </div>
          <div className="w-full md:w-1/2 px-3">
            <label
              className="block uppercase tracking-wide text-green-800 text-xs font-bold mb-2"
              htmlFor="phone"
            >
              Teléfono
            </label>
            <input
              className="appearance-none outline-none w-full bg-gray-100 text-green-800  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="phone"
              type="number"
              name="phone"
              value={formData.phone}
              onChange={handleInputChange}
              placeholder="654321"
              autoComplete="on"
            />
          </div>
          <div className="w-full md:w-1/2 px-3">
            <label
              className="block uppercase tracking-wide text-green-800  text-xs font-bold mb-2"
              htmlFor="dni"
            >
              DNI
            </label>
            <input
              className="appearance-none block w-full bg-gray-100 text-green-800 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="dni"
              type="number"
              name="dni"
              placeholder="DNI"
              value={formData.dni}
              onChange={handleInputChange}
              min={6}
            />
          </div>
          <div className="w-full md:w-1/2 px-3">
            <label
              className="block uppercase tracking-wide text-green-800 text-xs font-bold mb-2 "
              htmlFor="email"
            >
              Correo electrónico
            </label>
            <input
              className="appearance-none block w-full bg-gray-100 text-green-800  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="email"
              type="email"
              name="email"
              placeholder="mimail@correo.com"
              value={formData.email}
              onChange={handleInputChange}
              autoComplete="on"
            />
          </div>
          <div className="w-full md:w-1/2 px-3">
            <label
              className="block uppercase tracking-wide text-green-800  text-xs font-bold mb-2"
              htmlFor="address"
            >
              Dirección completa
            </label>
            <input
              className="appearance-none block w-full bg-gray-100 text-green-800  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="address"
              type="text"
              name="address"
              placeholder="Dirección completa"
              value={formData.address}
              onChange={handleInputChange}
              autoComplete="on"
            />
          </div>
        </div>

        <div className="flex flex-wrap -mx-3 mb-2">
          <div className="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label
              className="block uppercase tracking-wide text-green-800  text-xs font-bold mb-2"
              htmlFor="city"
            >
              Ciudad
            </label>
            <input
              className="appearance-none block w-full bg-gray-200 text-green-800  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="city"
              name="city"
              type="text"
              placeholder="Mar de Plata"
              value={formData.city}
              onChange={handleInputChange}
            />
          </div>
          <div className="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label
              className="block uppercase tracking-wide text-green-800  text-xs font-bold mb-2"
              htmlFor="province"
            >
              Provincia
            </label>
            <input
              className="appearance-none block w-full bg-gray-200 text-green-800  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="province"
              name="province"
              type="text"
              placeholder="Buenos Aires"
              value={formData.province}
              onChange={handleInputChange}
            />
          </div>
          <div className="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label
              className="block uppercase tracking-wide text-green-800  text-xs font-bold mb-2"
              htmlFor="grid-zip"
            >
              Zip
            </label>
            <input
              className="appearance-none block w-full bg-gray-200 text-green-800  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-zip"
              type="text"
              name="zip"
              placeholder="90210"
              value={formData.zip}
              onChange={handleInputChange}
            />
          </div>
        </div>
      </form>
      <form className="w-full max-w-7xl mx-auto md:px-6 p-2 ">
        <h1 className="relative top-5 text-left text-4xl font-normal font-bebas-neue text-green-800 md:text-2xl lg:text-4xl sm:text-xl p-2 ">
          Requisitos Adopción
        </h1>

        <div className="flex flex-col md:flex-row">
          {/* Column 1 */}
          <div className="flex-1 md:w-1/3 md:mr-2">
            {/* Content for column 1 */}
            <div>
              <label
                className="block uppercase tracking-wide text-green-800  text-xs font-bold mb-2  p-2 rounded-sm"
                htmlFor="otherAnimals"
              >
                ¿Tienes otros animales en casa?
              </label>
              <div className="relative">
                <select
                  className="block appearance-none w-full bg-gray-200 border border-gray-200 text-green-800  py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="otherAnimals"
                  name="otherAnimals"
                  value={formData.otherAnimals}
                  onChange={handleInputChange}
                >
                  <option>Si</option>
                  <option>No</option>
                </select>
                <div className="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-lime-700">
                  <svg
                    className="fill-current h-4 w-4"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                  >
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                  </svg>
                </div>
              </div>
            </div>
          </div>
          {/* Column 2 */}
          <div className="flex-1 md:w-1/3 md:mr-2">
            {/* Content for column 2 */}
            <div>
              <label
                className="block uppercase tracking-wide text-green-800  text-xs font-bold mb-2  p-2 rounded-sm"
                htmlFor="hasChildren"
              >
                ¿Tiene niñas/os en casa?
              </label>
              <div className="relative">
                <select
                  className="block appearance-none w-full bg-gray-200 border border-gray-200 text-green-800  py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="hasChildren"
                  name="hasChildren"
                  value={formData.hasChildren}
                  onChange={handleInputChange}
                >
                  <option>Si</option>
                  <option>No</option>
                </select>
                <div className="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-lime-700">
                  <svg
                    className="fill-current h-4 w-4"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                  >
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                  </svg>
                </div>
              </div>
            </div>
          </div>
          {/* Column 3 */}
          <div className="flex-1 md:w-1/3">
            {/* Content for column 3 */}

            <div>
              <label
                className="block uppercase tracking-wide text-green-800  text-xs font-bold mb-2  p-2 rounded-sm"
                htmlFor="experienceWithPets"
              >
                ¿Tiene experiencia con mascotas?
              </label>
              <div className="relative">
                <select
                  className="block appearance-none w-full bg-gray-200 border border-gray-200 text-green-800  py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="experienceWithPets"
                  name="experienceWithPets"
                  value={formData.experienceWithPets}
                  onChange={handleInputChange}
                >
                  <option>Si</option>
                  <option>No</option>
                </select>
                <div className="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-lime-700">
                  <svg
                    className="fill-current h-4 w-4"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                  >
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>

        {/* Second Row */}
        <div className="flex flex-col md:flex-row mt-4">
          {/* Column 1 */}
          <div className="flex-1 md:w-1/2 md:mr-2">
            {/* Content for column 1 of the second row */}
            <div>
              <label
                className="block uppercase tracking-wide text-green-800 text-xs font-bold mb-2  p-2 rounded-sm"
                htmlFor="canProvideSpace"
              >
                ¿Tiene un espacio adecuado para la mascota?
              </label>
              <div className="relative">
                <select
                  className="block appearance-none w-full bg-gray-200 border border-gray-200 text-green-800  py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="canProvideSpace"
                  name="canProvideSpace"
                  value={formData.canProvideSpace}
                  onChange={handleInputChange}
                >
                  <option>Si</option>
                  <option>No</option>
                </select>
                <div className="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-lime-700">
                  <svg
                    className="fill-current h-4 w-4"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                  >
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                  </svg>
                </div>
              </div>
            </div>
          </div>
          {/* Column 2 */}
          <div className="flex-1 md:w-1/2">
            {/* Content for column 2 of the second row */}
            <div>
              <label
                className="max-w-full block uppercase tracking-wide text-green-800  text-xs font-bold mb-2 p-2 rounded-sm"
                htmlFor="canProvideCareAndVetAttention"
              >
                ¿Puede brindar cuidados básicos/atención veterinaria?
              </label>
              <div className="relative">
                <select
                  className="block appearance-none w-full bg-gray-200 border border-gray-200 text-green-800  py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="canProvideCareAndVetAttention"
                  name="canProvideCareAndVetAttention"
                  value={formData.canProvideCareAndVetAttention}
                  onChange={handleInputChange}
                >
                  <option>Si</option>
                  <option>No</option>
                </select>
                <div className="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-lime-700">
                  <svg
                    className="fill-current h-4 w-4"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                  >
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>

      <div className="flex flex-col items-center justify-center gap-5 mt-6 md:flex-row">
        <button
          className="inline-block w-auto text-center min-w-[100px] px-10 py-3 m-5 text-white transition-all rounded-md shadow-lg sm:w-auto bg-gradient-to-r from-green-600 to-green-500 hover:bg-gradient-to-b dark:shadow-green-900 shadow-green-200 hover:shadow-lg hover:shadow-green-400 hover:-tranneutral-y-px"
          onClick={() => {
            localStorage.setItem("formData", JSON.stringify(formData));
          }}
        >
          Guardar
        </button>
      </div>
    </div>
  );
};

export default RequisitosAdopcionForm;
