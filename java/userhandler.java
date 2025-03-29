import java.sql.*; // Import SQL package for database operations

public class UserAuthHandler {
    private static final String URL = "jdbc:sqlite:/c:/Users/ramir/groupprojectwebprogramming/NET3010_GroupProject/sql/users.sql"; // Database connection URL pointing to users.sql file

    // Function to sign up a new user
    public static boolean signUpUser(String firstName, String lastName, String phoneNumber, String email, String postalCode, String password) {
        try (Connection conn = DriverManager.getConnection(URL)) { // Establish database connection
            // Check if email already exists
            String checkQuery = "SELECT COUNT(*) FROM users WHERE email = ?";
            try (PreparedStatement checkStmt = conn.prepareStatement(checkQuery)) {
                checkStmt.setString(1, email);
                ResultSet rs = checkStmt.executeQuery();
                if (rs.next() && rs.getInt(1) > 0) {
                    System.out.println("Email is already taken.");
                    return false; // Email already exists
                }
            }

            // Insert new user
            String insertQuery = "INSERT INTO users (first_name, last_name, phone_number, email, postal_code, password) VALUES (?, ?, ?, ?, ?, ?)";
            try (PreparedStatement insertStmt = conn.prepareStatement(insertQuery)) {
                insertStmt.setString(1, firstName);
                insertStmt.setString(2, lastName);
                insertStmt.setString(3, phoneNumber);
                insertStmt.setString(4, email);
                insertStmt.setString(5, postalCode);
                insertStmt.setString(6, password); // Store password as plain text (consider hashing it for security)
                insertStmt.executeUpdate();
                System.out.println("User registered successfully.");
                return true;
            }
        } catch (SQLException e) {
            e.printStackTrace();
            return false;
        }
    }

    // Function to log in a user
    public static boolean loginUser(String email, String password) {
        try (Connection conn = DriverManager.getConnection(URL)) { // Establish database connection
            String query = "SELECT * FROM users WHERE email = ? AND password = ?"; // SQL query to check user credentials
            try (PreparedStatement stmt = conn.prepareStatement(query)) {
                stmt.setString(1, email);
                stmt.setString(2, password);
                ResultSet rs = stmt.executeQuery();
                
                if (rs.next()) { // User found
                    System.out.println("Login successful. Welcome, " + rs.getString("first_name") + "!");
                    return true;
                } else {
                    System.out.println("Invalid email or password.");
                    return false;
                }
            }
        } catch (SQLException e) {
            e.printStackTrace();
            return false;
        }
    }
}
