
const Test = () => {
  return (
    <div
      className="min-h-screen flex items-center justify-center bg-cover bg-center"
      style={{
        backgroundImage: "url('two_cubs.jpg')",
        backgroundSize: "cover",
        backgroundPosition: "center",
        backgroundRepeat: "no-repeat",
      }}
    >
      <div className="max-w-full px-4 text-center text-white mt-4">
        <h1 className="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full text-center text-4xl font-normal font-bebas-neue text-green-800 md:text-6xl lg:text-9xl sm:text-xl">
          AYUDAMOS A ADOPTAR
        </h1>
      </div>
    </div>
  );
};

export default Test;