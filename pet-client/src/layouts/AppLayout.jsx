import { Outlet } from "react-router-dom"

export default function AppLayout() {
  return (
    <div className="flex flex-col min-h-screen w-full">
       <main className="flex-grow">
          <Outlet/>
        </main>
    </div>
  )
}
