// import { useEffect } from 'react'
import useSWR from 'swr'
import {useNavigate} from 'react-router-dom'
import clienteAxios from "../config/axios";

export const useAuth = ({middleware, url}) => {

    const token = localStorage.getItem('AUTH_TOKEN')
    const navigate = useNavigate();

    const { data: user, error, mutate } = useSWR('', () =>
        clienteAxios('', {
            headers: {
                Authorization: `Bearer ${token}`
            }
        })
        .then(res => res.data)
        .catch(error => {
            throw Error(error?.response?.data?.errors)
        })
    )

     const login = async (datos, setErrores) => {
        try {
            const {data} = await clienteAxios.post('', datos)
            localStorage.setItem('AUTH_TOKEN', data.token);
            setErrores([])
            await mutate()
        } catch (error) {
            setErrores(Object.values(error.response.data.errors) )
        }
     }

     const registro = async (datos, setErrores) => {
        try {
            const {data} = await clienteAxios.post('', datos)
            localStorage.setItem('AUTH_TOKEN', data.token);
            setErrores([])
            await mutate()
        } catch (error) {
            setErrores(Object.values(error.response.data.errors) )
        }
     }

     const logout = async () => {
        try {
            await clienteAxios.post('', null, {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            })
            localStorage.removeItem('AUTH_TOKEN')
            await mutate(undefined)
        } catch (error) {
            throw Error(error?.response?.data?.errors)
        }
     }

    //  useEffect(() => {
    //     if(middleware === '' && url && user) {
    //         navigate(url)
    //     }

    //     if(middleware === '' && user && user.admin) {
    //         navigate('/admin');
    //     }

    //     if(middleware === '' && user && !user.admin) {
    //         navigate('/')
    //     }

    //     if(middleware === '' && error) {
    //         navigate('/auth/login')
    //     }
    //  }, [user, error]) 

     return {
        login,
        registro, 
        logout,
        user,
        error
     }
    
}