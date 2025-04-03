-- Search by Manufacturer, Item Name, Year, or Storage
SELECT * 
FROM computer_parts_db
WHERE 
    (manufacturer LIKE '%AMD%' OR manufacturer LIKE '%Intel%')
    AND (category = 'CPU' OR category = 'GPU')
    AND (year_made >= 2022) 
    AND (storage_capacity = '1TB' OR storage_capacity IS NULL)
    AND (price BETWEEN 300 AND 1000)
    AND (stock > 0);

-- Search by Exact Model Number
-- Search by Exact Model Number (User Input)
SELECT * 
FROM products 
WHERE model_number = ?; --the ? will be replaced by the user input in java

-- Search for Only In-Stock Items
SELECT * FROM products WHERE stock > 0;

-- Search by Price Range
SELECT * FROM products WHERE price BETWEEN 0 AND 1000;
