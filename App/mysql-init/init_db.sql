CREATE TABLE raw_materials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    code VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    quantity FLOAT NOT NULL,
    value FLOAT NOT NULL,
    date DATE NOT NULL
);

INSERT INTO
    raw_materials (name, code, description, quantity, value, date)
VALUES
    (
        'Acero',
        'ACR123',
        'Acero de alta calidad',
        100.5,
        5000.75,
        '2024-09-05'
    );