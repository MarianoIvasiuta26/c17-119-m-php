
const Navbar = () => {
  return (
    <div>
      <nav className="bg-white dark:bg-green-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
        <div className="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
          <a
            href="/"
            className="flex items-center space-x-3 rtl:space-x-reverse"
          >
            <img
              src="/suramigo-logo.png" // Adjusted image source path
              className="h-14 w-auto"
              alt="SurAmigo Logo"
            />
            <span className="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
              SURAMIGO
            </span>
          </a>
          <div className="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button
              type="button"
              className="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-10 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
              aria-label="Open main menu" // Added aria-label for accessibility
            >
              <svg
                className="w-5 h-5"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 17 14"
              >
                <path
                  stroke="currentColor"
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth="2"
                  d="M1 1h15M1 7h15M1 13h15"
                />
              </svg>
            </button>
          </div>
          <div
            className="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
            id="navbar-sticky"
          >
            <ul className="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:border-gray-700">
              <li>
                <a
                  href="/"
                  className="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-yellow-300 md:p-0 md:dark:hover:text-yellow-300 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                >
                  Somos SURAMIGO
                </a>
              </li>
              <li>
                <a
                  href="/"
                  className="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-yellow-300 md:p-0 md:dark:hover:text-yellow-300 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                >
                  ¿Qué Hacemos?
                </a>
              </li>
              <li>
                <a
                  href="/"
                  className="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-yellow-300 md:p-0 md:dark:hover:text-yellow-300 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                >
                  Contacto
                </a>
              </li>
            </ul>
          </div>
          <div
            className="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse" // Adjusted flex properties
          >
            <button
              type="button"
              className="text-yellow-300 hover:text-white border border-yellow-300 hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg  text-sm px-3 py-1 text-center me-1 mb-2 dark:border-yellow-500 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-500 dark:focus:ring-yellow-600"
            >
              Log-in
            </button>
            <button
              type="button"
              className="relative text-yellow-300 hover:text-white border border-yellow-300 hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-yellow-500 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-500 dark:focus:ring-yellow-600"
            >
              Sign-in
              <span className="absolute top-0 right-0 -mt-1 -mr-1 flex h-2 w-2">
                <span className="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-200 opacity-75"></span>
                <span className="relative inline-flex rounded-full h-2 w-2 bg-yellow-200"></span>
              </span>
            </button>
          </div>
        </div>
      </nav>
    </div>
  );
}

export default Navbar;
