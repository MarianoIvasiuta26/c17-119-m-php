import React from 'react'
import ReactDOM from 'react-dom/client'
import Router from './router.jsx'
import './index.css'


ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
      <Router />
  </React.StrictMode>,
)


//import { ClerkProvider } from '@clerk/clerk-react'
// const PUBLISHABLE_KEY = import.meta.env.VITE_CLERK_PUBLISHABLE_KEY;
// if (!PUBLISHABLE_KEY) {
//   throw new Error("Missing Publishable Key");
// }