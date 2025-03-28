-- Search by Manufacturer, Item Name, Year, or Storage
SELECT * 
FROM products
WHERE 
    (manufacturer LIKE '%AMD%' OR manufacturer LIKE '%Intel%')
    AND (category = 'CPU' OR category = 'GPU')
    AND (year_made >= 2022) 
    AND (storage_capacity = '1TB' OR storage_capacity IS NULL)
    AND (price BETWEEN 300 AND 1000)
    AND (stock > 0);

-- Search by Exact Model Number
SELECT * FROM products WHERE model_number = 'TUF-RTX4080-16G-GAMING';

-- Search for Only In-Stock Items
SELECT * FROM products WHERE stock > 0;

-- Search by Price Range
SELECT * FROM products WHERE price BETWEEN 100 AND 500;
