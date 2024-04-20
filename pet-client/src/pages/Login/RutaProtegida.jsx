import { Route, Redirect } from "react-router-dom";
import PropTypes from "prop-types";

const ProtectedRoute = ({ component: Component, ...rest }) => {
  const isAuthenticated = !!localStorage.getItem("token"); // Check if user is authenticated

  return (
    <Route
      {...rest}
      render={(props) =>
        isAuthenticated ? <Component {...props} /> : <Redirect to="/login" />
      }
    />
  );
};

ProtectedRoute.propTypes = {
  component: PropTypes.elementType.isRequired, 
};

export default ProtectedRoute;
