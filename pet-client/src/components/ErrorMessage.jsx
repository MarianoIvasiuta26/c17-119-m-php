export default function ErrorMessage({children}) {
  return (
   <div className="text-center  bg-red-100 text-red-600 font-bold p-3 uppercase text-sm">
      {children}
   </div>
  )
}
