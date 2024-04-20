import Footer from "./Footer"
import Header from "./Header"
import SomosSuramigo from "./SomosSuramigo"
import Quehacemos from "./Quehacemos"
import PetForm from "../Mascotas/PetForm"
import Navbar from "./Navbar"





const Home = () => {
  return (
    <>
      <Navbar />
      <Header />
      <section id="Quehacemos">
        <Quehacemos />
      </section>
      <section id="SomosSuramigo">     
      <SomosSuramigo />
      </section>
      <PetForm />
      <Footer />
    </>
  );
}

export default Home
