import Footer from "./Footer"
import Header from "./Header"
import Navbar from "./Navbar"
import SomosSuramigo from "./SomosSuramigo"
import Quehacemos from "./Quehacemos"
import PetForm from "../Mascotas/PetForm"



const Home = () => {
  return (
    <div>
      <Navbar />
      <Header />
      <Quehacemos />
      <SomosSuramigo />
      <PetForm />

      <Footer />
    </div>
  );
}

export default Home
