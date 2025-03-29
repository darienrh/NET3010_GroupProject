import java.sql.*; // Importing SQL package for database operations

public class DatabaseHandler {
    private static final String URL = "jdbc:sqlite:database.db"; // Database connection URL pointing to a relative path for portability
    private static final String USER = ""; // SQLite does not require a username
    private static final String PASSWORD = ""; // SQLite does not require a password

    // Function to search for a product based on filters
    public static void searchProduct(String manufacturer, String category, int yearMade, String storageCapacity, double minPrice, double maxPrice) {
        try (Connection conn = DriverManager.getConnection(URL)) { // Establish database connection
            String query = "SELECT * FROM products WHERE " +
                           "(manufacturer LIKE ? OR manufacturer LIKE ?) " +
                           "AND (category = ? OR category = ?) " +
                           "AND (year_made >= ?) " +
                           "AND (storage_capacity = ? OR storage_capacity IS NULL) " +
                           "AND (price BETWEEN ? AND ?) " +
                           "AND (stock > 0)"; // SQL query to filter products
            try (PreparedStatement stmt = conn.prepareStatement(query)) { // Prepare SQL statement
                stmt.setString(1, "%" + manufacturer + "%"); // Set manufacturer filter
                stmt.setString(2, "%" + manufacturer + "%");
                stmt.setString(3, category); // Set category filter
                stmt.setString(4, category);
                stmt.setInt(5, yearMade); // Set year filter
                stmt.setString(6, storageCapacity); // Set storage capacity filter
                stmt.setDouble(7, minPrice); // Set price range filter
                stmt.setDouble(8, maxPrice);
                ResultSet rs = stmt.executeQuery(); // Execute query
                
                while (rs.next()) { // Iterate through results
                    System.out.println("Product: " + rs.getString("item_name") + ", Price: " + rs.getDouble("price") + ", Stock: " + rs.getInt("stock"));
                }
            }
        } catch (SQLException e) {
            e.printStackTrace(); // Print error if an exception occurs
        }
    }

    // Function to search by model number
    public static void searchByModelNumber(String modelNumber) {
        try (Connection conn = DriverManager.getConnection(URL)) { // Establish database connection
            String query = "SELECT * FROM products WHERE model_number = ?"; // SQL query to find product by model number
            try (PreparedStatement stmt = conn.prepareStatement(query)) { // Prepare statement
                stmt.setString(1, modelNumber); // Set model number parameter
                ResultSet rs = stmt.executeQuery(); // Execute query
                
                while (rs.next()) { // Iterate through results
                    System.out.println("Product: " + rs.getString("item_name") + ", Price: " + rs.getDouble("price") + ", Stock: " + rs.getInt("stock"));
                }
            }
        } catch (SQLException e) {
            e.printStackTrace(); // Print error
        }
    }

    // Function to search for only in-stock items
    public static void searchInStockItems() {
        try (Connection conn = DriverManager.getConnection(URL)) { // Establish database connection
            String query = "SELECT * FROM products WHERE stock > 0"; // SQL query to get available products
            try (PreparedStatement stmt = conn.prepareStatement(query)) { // Prepare statement
                ResultSet rs = stmt.executeQuery(); // Execute query
                
                while (rs.next()) { // Iterate through results
                    System.out.println("Product: " + rs.getString("item_name") + ", Price: " + rs.getDouble("price") + ", Stock: " + rs.getInt("stock"));
                }
            }
        } catch (SQLException e) {
            e.printStackTrace(); // Print error
        }
    }

    // Function to search by price range
    public static void searchByPriceRange(double minPrice, double maxPrice) {
        try (Connection conn = DriverManager.getConnection(URL)) { // Establish database connection
            String query = "SELECT * FROM products WHERE price BETWEEN ? AND ?"; // SQL query to filter by price
            try (PreparedStatement stmt = conn.prepareStatement(query)) { // Prepare statement
                stmt.setDouble(1, minPrice); // Set minimum price
                stmt.setDouble(2, maxPrice); // Set maximum price
                ResultSet rs = stmt.executeQuery(); // Execute query
                
                while (rs.next()) { // Iterate through results
                    System.out.println("Product: " + rs.getString("item_name") + ", Price: " + rs.getDouble("price") + ", Stock: " + rs.getInt("stock"));
                }
            }
        } catch (SQLException e) {
            e.printStackTrace(); // Print error
        }
    }
}
