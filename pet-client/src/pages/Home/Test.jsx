

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
