-- Search by Manufacturer, Item Name, Year, or Storage
SELECT * 
FROM my_website_db
WHERE 
    (manufacturer LIKE '%AMD%' OR manufacturer LIKE '%Intel%')
    AND (category = 'CPU' OR category = 'GPU')
    AND (year_made >= 2022) 
    AND (storage_capacity = '1TB' OR storage_capacity IS NULL)
    AND (price BETWEEN 300 AND 1000)
    AND (stock > 0);