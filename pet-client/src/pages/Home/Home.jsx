import Footer from "./Footer"
import Header from "./Header"
import Navbar from "./Navbar"
import Section from "./Section";



  const backgroundStyle = {
    backgroundColor: "#22543d",
    backgroundSize: "cover",
    backgroundPosition: "center",
    backgroundRepeat: "no-repeat",
    opacity: 0.5, // Adjust the opacity value as needed
    position: "fixed", // or 'absolute' depending on your layout
    top: 0,
    left: 0,
    width: "100%",
    height: "100%",
    zIndex: -1, // Ensure it's behind other elements
    loading: "lazy",
  };


const Home = () => {
  return (
    <>
      <div style={backgroundStyle}></div>
      <Navbar />
      <Header />
      <Section />
      <Footer />
    </>
  );
}

export default Home
