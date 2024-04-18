import { useState } from "react";
import { TEInput, TERipple } from "tw-elements-react";
import axios from "axios";

const LoginPage = () => {
  const [username, setUsername] = useState(""); 
  const [password, setPassword] = useState(""); 

  
  const handleLogin = async () => {
    try {      
      const response = await axios.post("/login", { username, password });     
      console.log("Login successful:", response.data);
    } catch (error) {
      
      console.error("Login failed:", error);
    }
  };

  return (
    <section className="h-auto max-w-full bg-neutral-100 dark:bg-neutral-100 flex justify-center items-center">
      <div className="container h-full p-10">
        <div className="gap-6 flex h-full flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200">
          <div className="w-full">
            <div className="block rounded-lg bg-white shadow-lg dark:bg-green-800">
              <div className="g-0 lg:flex lg:flex-wrap">
                {/* Left column container */}
                <div className="px-4 md:px-0 lg:w-6/12">
                  <div className="md:mx-6 md:p-12">
                    <div className="text-center">
                      <img
                        className="mx-auto w-48"
                        src="/suramigo-logo.png"
                        alt="logo"
                      />
                      <h4 className="mb-12 mt-1 pb-1 text-xl font-semibold">
                        Somos el equipo SurAmigo
                      </h4>
                    </div>

                    <form onSubmit={handleLogin}>
                      {" "}
                      {/* Add onSubmit to the form */}
                      <p className="mb-4">Por favor accede a tu cuenta</p>
                      {/* Username input */}
                      <TEInput
                        id="username"
                        name="username"
                        type="text"
                        label="Username"
                        className="mb-4"
                        autoComplete="on"
                        value={username} // Bind value to username state
                        onChange={(e) => setUsername(e.target.value)} // Update username state on change
                      />
                      {/* Password input */}
                      <TEInput
                        id="password"
                        name="password"
                        type="password"
                        label="Password"
                        className="mb-4"
                        autoComplete="on"
                        value={password} // Bind value to password state
                        onChange={(e) => setPassword(e.target.value)} // Update password state on change
                      />
                      {/* Submit button */}
                      <div className="mb-12 pb-1 pt-1 text-center">
                        <div className="w-full">
                          <button
                            className="inline-block w-auto text-center min-w-[50px] px-10 py-3 m-5 text-white transition-all rounded-md shadow-lg sm:w-auto bg-gradient-to-r from-green-600 to-green-500 hover:bg-gradient-to-b dark:shadow-green-900 shadow-green-200 hover:shadow-lg hover:shadow-green-400 hover:-tranneutral-y-px"
                            type="submit" // Change type to submit
                          >
                            Log in
                          </button>
                        </div>

                        <a href="#!">Olvidaste la contraseña?</a>
                      </div>
                      {/* Register button */}
                      <div className="flex items-center justify-between pb-6">
                        <p className="mb-0 mr-2">No tienes cuenta?</p>
                        <TERipple rippleColor="light">
                          <button
                            type="button"
                            className="inline-block rounded border-2 border-danger px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-danger-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-danger-600 focus:border-danger-600 focus:text-danger-600 focus:outline-none focus:ring-0 active:border-danger-700 active:text-danger-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                          >
                            Registrarse
                          </button>
                        </TERipple>
                      </div>
                    </form>
                  </div>
                </div>

                {/* Right column container with background and description */}
                <div
                  className="flex flex-grow items-center rounded-b-lg lg:w-6/12 lg:rounded-r-lg lg:rounded-bl-none"
                  style={{
                    backgroundImage: "url('perronegro.jpg')",
                    backgroundSize: "cover",
                    backgroundPosition: "center",
                    backgroundRepeat: "no-repeat",
                    backgroundColor: "wheat",
                  }}
                >
                  <div className="px-4 py-6 text-green-800 md:mx-6 md:p-10 mb-40 top-0">
                    <h3 className="mb-6 text-xl font-semibold ">
                      Más que una web.
                    </h3>
                    <p className="text-lg pb-40">
                      Creamos un espacio inclusivo donde gatos y perros buscan
                      amor y hogar, mientras que las familias encuentran un
                      nuevo miembro peludo para llenar sus vidas de alegría y
                      compañerismo. ¡Únete a nosotros y haz la diferencia! 🐾
                      #AdoptaNoCompres
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default LoginPage;
