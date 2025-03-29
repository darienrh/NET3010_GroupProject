-- This SQL script creates a database named 'mydatabase' and a table named 'users' within that database.
USE mydatabase;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,-- Defines a column 'id' as an integer, automatically incremented for each new row, and sets it as the primary key.
    first_name VARCHAR(255) NOT NULL,-- Defines a column 'first_name' to store variable-length strings up to 255 characters. It cannot be null.
    last_name VARCHAR(255) NOT NULL,-- Defines a column 'last_name' to store variable-length strings up to 255 characters. It cannot be null.
    phone VARCHAR(15) NOT NULL,-- Defines a column 'phone' to store variable-length strings up to 15 characters. It cannot be null.
    email VARCHAR(255) UNIQUE NOT NULL,-- Defines a column 'email' to store variable-length strings up to 255 characters. It must be unique and cannot be null.
    postal_code VARCHAR(10) NOT NULL, -- Defines a column 'postal_code' to store variable-length strings up to 10 characters. It cannot be null.
    password VARCHAR(255) NOT NULL -- Defines a column 'password' to store variable-length strings up to 255 characters. It cannot be null.
);
