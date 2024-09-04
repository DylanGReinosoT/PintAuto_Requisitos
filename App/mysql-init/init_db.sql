CREATE TABLE raw_materials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    quantity FLOAT NOT NULL,
    unit VARCHAR(50) NOT NULL
);
