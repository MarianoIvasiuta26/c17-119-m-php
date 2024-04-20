import { useState } from 'react'
import { useForm } from 'react-hook-form';
import { Link, useNavigate } from "react-router-dom";
import { toast } from "react-toastify";
import ErrorMessage from '../../components/ErrorMessage';
export default function LoginView() {

  const initialValues = {
    email: '',
    password: '',
  }
  const { register, handleSubmit, formState: { errors } } = useForm({ defaultValues: initialValues })
  const navigate = useNavigate()

  const [isLoading, setIsLoading] = useState(false)

  const handleLogin = (data) => {
    
  }
  return (
    <div className="flex items-center justify-center p-12">
      <div className="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h1 className="text-3xl font-semibold text-center mb-8">Iniciar sesión</h1>
        <form onSubmit={handleSubmit(handleLogin)}  className="space-y-6" noValidate>
          <div className="flex flex-col gap-5 mb-4">
            <label
              className="font-normal text-2xl"
              htmlFor="email"
            >
              Email
            </label>
            <input
              id="email"
              type="email"
              placeholder="Email de Registro"
              className="w-full p-3  border-gray-300 border"
              {...register("email", {
                required: "El Email es obligatorio",
                pattern: {
                  value: /\S+@\S+\.\S+/,
                  message: "E-mail no válido",
                },
              })}
            />
            {errors.email && (
              <ErrorMessage>{errors.email.message}</ErrorMessage>
            )}
          </div>
          <div className="flex flex-col gap-5">
            <label htmlFor="password" className="font-normal text-2xl">
              Password 
            </label>
            <input
              id="password"
              type="password"
              placeholder="Password de Registro"
              className="w-full p-3  border-gray-300 border"
              {...register("password", {
                required: "El Password es obligatorio",
              })}
            />
            {errors.password && (
              <ErrorMessage>{errors.password.message}</ErrorMessage>
            )}
          </div>
          <button
            type="submit"
            className="bg-orange-600 hover:bg-orange-700 w-full p-3  text-white font-black  text-xl cursor-pointer"
            disabled={isLoading}
          >
            {isLoading ? "Loading..." : "Iniciar Sesión"}
          </button>
        </form>
        <nav className="mt-10 flex flex-col space-y-4">
          <Link
              to={'/auth/register'}
              className="text-center  font-normal"
            >
              ¿No tienes cuenta? Registrate</Link>
        </nav>
      </div>
    </div>
  )
}
