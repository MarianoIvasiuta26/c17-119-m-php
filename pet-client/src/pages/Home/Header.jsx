const Header = () => {
  return (
    <div className="relative">
      <h1 className="absolute top-40 left-0 w-full text-center text-3xl font-normal font-bebas-neue text-green-800 shadow-slate-200 md:text-6xl lg:text-9xl sm:text-2xl">
        AYUDAMOS A ADOPTAR
      </h1>      
      <img
        loading="lazy"
        src="./two_cubs.jpg"
        alt="Two Dogs"
        className="w-full h-auto mt-1"
      />
        <div className="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-black-400 bg-fixed opacity-30"></div>
    </div>
  );
};

export default Header;
