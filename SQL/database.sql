CREATE DATABASE computer_parts_db;
USE computer_parts_db;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    manufacturer VARCHAR(100), -- exmples: Intel, AMD, NVIDIA, etc.
    brand VARCHAR(100), -- examples : ASUS, MSI, Gigabyte, Corsair, etc.
    item_name VARCHAR(255), -- examples: "Ryzen 9 7950X", "GeForce RTX 4080"
    model_number VARCHAR(100), -- examples: Exact model like "BX8071513700K"
    category VARCHAR(100), -- exampls: CPU, GPU, SSD, RAM, etc.
    year_made YEAR NOT NULL,
    storage_capacity VARCHAR(50), --examples:  "1TB", "16GB", NULL for CPUs
    socket_type VARCHAR(50), -- examples: "AM5", "LGA 1700", "PCIe 4.0"
    form_factor VARCHAR(50), -- examples: "ATX", "M.2 2280", "DIMM"
    price DECIMAL(10,2),
    description TEXT,
    stock INT NOT NULL DEFAULT 0 --examples: Available quantity
);

--user table

--points, name, address, email, phone, password, is_admin, purchases, wishlist, cart, reviews, ratings, orders, returns, exchanges, support_tickets, messages, notifications
--user_id, product_id, quantity, status, order_date, delivery_date, return_date, exchange_date, support_ticket_id, message_id, notification_id


-- Sample Data so I know how to insert data into the table
-- INSERT INTO products (manufacturer, brand, item_name, model_number, category, year_made, storage_capacity, socket_type, form_factor, price, description, stock)
--VALUES 
 --   ('Intel', 'Intel', 'Core i7-13700K', 'BX8071513700K', 'CPU', 2023, NULL, 'LGA 1700', NULL, 399.99, '13th Gen Intel CPU', 15),
 --   ('AMD', 'AMD', 'Ryzen 9 7950X', '100-100000514WOF', 'CPU', 2023, NULL, 'AM5', NULL, 589.99, 'High-end AMD processor', 10),
 --   ('Samsung', 'Samsung', '970 Evo Plus', 'MZ-V7S1T0B/AM', 'SSD', 2022, '1TB', 'PCIe 3.0', 'M.2 2280', 129.99, 'Fast NVMe SSD', 25),
 --   ('Western Digital', 'WD', 'WD Black SN850', 'WDS200T1X0E', 'SSD', 2023, '2TB', 'PCIe 4.0', 'M.2 2280', 229.99, 'High-performance SSD', 20),
 --   ('NVIDIA', 'ASUS', 'GeForce RTX 4080', 'TUF-RTX4080-16G-GAMING', 'GPU', 2023, NULL, NULL, 'ATX', 1199.99, 'ASUS TUF Gaming RTX 4080', 8);
