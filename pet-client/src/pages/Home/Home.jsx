import Footer from "./Footer"
import Header from "./Header"
import Navbar from "./Navbar"


  const backgroundStyle = {
    backgroundColor: "#22543d",
    backgroundSize: "cover",
    backgroundPosition: "center",
    backgroundRepeat: "no-repeat",
   
    position: "absolute", 
    top: 0,
    left: 0,
    width: "100%",
    height: "100%",
    zIndex: -1, 
  };


const Home = () => {
  return (
    
      <div style={backgroundStyle}>

      <Navbar />
      <Header />      
      <Footer />
      </div>
    
  );
}

export default Home
