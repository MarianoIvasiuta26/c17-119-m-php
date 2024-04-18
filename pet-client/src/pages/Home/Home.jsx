import Footer from "./Footer"
import Header from "./Header"
import SomosSuramigo from "./SomosSuramigo"
import Quehacemos from "./Quehacemos"
import PetForm from "../Mascotas/PetForm"
import Navbar from "./Navbar"
import LoginPage from "../Login/LoginPage"




const Home = () => {
  return (
    <div>
      <Navbar />
      <LoginPage />
      <Header />
      <Quehacemos />
      <SomosSuramigo />
      <PetForm />
      <Footer />
    </div>
  );
}

export default Home
