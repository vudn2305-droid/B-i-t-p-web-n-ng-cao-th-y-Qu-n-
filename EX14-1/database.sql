CREATE DATABASE IF NOT EXISTS my_guitar_shop1;
USE my_guitar_shop1;

CREATE TABLE IF NOT EXISTS categories (
    categoryID INT NOT NULL AUTO_INCREMENT,
    categoryName VARCHAR(255) NOT NULL,
    PRIMARY KEY (categoryID)
);

CREATE TABLE IF NOT EXISTS products (
    productID INT NOT NULL AUTO_INCREMENT,
    categoryID INT NOT NULL,
    productCode VARCHAR(10) NOT NULL,
    productName VARCHAR(255) NOT NULL,
    productDescription TEXT,
    listPrice DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (productID),
    FOREIGN KEY (categoryID) REFERENCES categories(categoryID)
);

ALTER TABLE products
    ADD COLUMN IF NOT EXISTS productDescription TEXT AFTER productName;

INSERT INTO categories (categoryID, categoryName) VALUES
(1, 'Guitars'),
(2, 'Basses'),
(3, 'Drums')
ON DUPLICATE KEY UPDATE categoryName = VALUES(categoryName);

INSERT INTO products (productID, categoryID, productCode, productName, productDescription, listPrice) VALUES
(1, 1, 'strat', 'Fender Stratocaster', '', 699.00),
(2, 1, 'les_paul', 'Gibson Les Paul', '', 1199.00),
(3, 1, 'sg', 'Gibson SG', '', 2517.00),
(4, 1, 'fg700s', 'Yamaha FG700S', '', 489.99),
(5, 1, 'washburn', 'Washburn D10S', '', 299.00),
(6, 1, 'rodriguez', 'Rodriguez Caballero 11', '', 415.00),
(7, 2, 'precision', 'Fender Precision', '', 799.99),
(8, 2, 'hofner', 'Hofner Icon', '', 499.99),
(9, 3, 'ludwig', 'Ludwig 5-piece Drum Set', '', 699.99),
(10, 3, 'tama', 'Tama 5-Piece Drum Set', '', 799.99)
ON DUPLICATE KEY UPDATE
    categoryID = VALUES(categoryID),
    productCode = VALUES(productCode),
    productName = VALUES(productName),
    productDescription = VALUES(productDescription),
    listPrice = VALUES(listPrice);