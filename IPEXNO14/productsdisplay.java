package demo;

import java.sql.*;
import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;

@WebService(serviceName = "ex14")
public class ex14 {

    @WebMethod(operationName = "hello")
    public String hello(@WebParam(name = "name") String txt) {
        return "Hello " + txt + " !";
    }

    @WebMethod(operationName = "searchByCategory")
    public String searchByCategory(@WebParam(name = "category") String category) {
        StringBuilder result = new StringBuilder();
        Connection connection = null;
        Statement statement = null;
        ResultSet resultSet = null;

        try {
            connection = DriverManager.getConnection("jdbc:derby://localhost:1527/product ");

            
            String sql = "SELECT * FROM products WHERE category = '" + category + "'";
            statement = connection.createStatement();
            
            resultSet = statement.executeQuery(sql);

           
            while (resultSet.next()) {
                
                String name = resultSet.getString("name");
                Double price = resultSet.getDouble("price");
                
                result.append(name).append(price);
            }
        } catch (SQLException e) {
            e.printStackTrace();
        } finally {
            
            try {
                if (resultSet != null)
                    resultSet.close();
                if (statement != null)
                    statement.close();
                if (connection != null)
                    connection.close();
            } catch (SQLException e) {
                e.printStackTrace();
            }
        }
        return result.toString();

    }
}