import { Outlet } from "react-router-dom"
import SiteHeader from "../components/site-layouts/SiteHeader"

export default function AppLayout() {
  return (
    <div className="flex-1 w-full flex flex-col min-h-screen">
      <SiteHeader/>
       <main className="flex-grow">
          <Outlet/>
        </main>
    </div>
  )
}
{/* <main className="flex-1 w-full flex flex-col items-center min-h-screen"></main> */}