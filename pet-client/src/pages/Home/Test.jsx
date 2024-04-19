

const Test = () => {
  return (
    <div
      className="min-h-screen flex items-center justify-center bg-cover bg-center"
      style={{ backgroundImage: "url('dos_cachorros.jpg')" }}
    >
      <div className="max-w-sm px-4 text-center text-white">
        <h1 className="text-2xl md:text-3xl lg:text-4xl xl:text-5xl">
          Responsive Text
        </h1>
        <p className="mt-4 text-base md:text-lg lg:text-xl xl:text-2xl">
          This text is responsive and will adjust to fit various screen sizes.
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

export default Test;


   
      {
        /* <div className="pt-4 flex flex-wrap -mx-3 mb-2">
        {Object.entries(formData).map(([fieldName, fieldValue]) => (
          <div key={fieldName} className="max-w-lg md:w-1/3 px-3 mb-6 md:mb-0 ">
            <label
              className="block uppercase tracking-wide text-green-800  text-xs font-bold mb-2 "
              htmlFor={fieldName}
            >
              {fieldName}
            </label>
            <div className="relative">
              <select
                className="block appearance-none w-full  bg-gray-200 border border-gray-200 text-green-800  py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id={fieldName}
                name={fieldName}
                value={fieldValue}
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
        ))}
      </div>
      <div className="flex flex-col items-center justify-center m-8 md:flex-row">
        <button
          className="inline-block text-center  min-w-[100px] px-10 py-3 text-white transition-all rounded-md shadow-lg sm:w-auto bg-gradient-to-r from-green-600 to-green-500 hover:bg-gradient-to-b dark:shadow-green-900 shadow-green-200 hover:shadow-2xl hover:shadow-green-400 hover:-tranneutral-y-px"
          onClick={() => {
            localStorage.setItem("adoptionFormData", JSON.stringify(formData));
          }}
        >
          Guardar
        </button>
      </div> */
      }