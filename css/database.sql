-- urban brew coffee shop database

CREATE DATABASE IF NOT EXISTS urban_brew;
USE urban_brew;

-- admin users table
CREATE TABLE admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- categories for organizing products
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT
);

-- products table
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category_id INT,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    img VARCHAR(255),
    stock INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

-- product specs for additional attributes
CREATE TABLE product_specs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    spec_key VARCHAR(100) NOT NULL,
    spec_value VARCHAR(255) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- sample categories
INSERT INTO categories (name, description) VALUES
('Hot Drinks', 'Hot coffee beverages'),
('Cold Drinks', 'Iced coffee and cold brew'),
('Beans', 'Whole bean coffee for home');

-- sample products
INSERT INTO products (name, category_id, price, description, img, stock) VALUES
('House Espresso', 1, 3.25, 'Double shot of rich espresso', 'espresso.jpg', 60),
('Vanilla Latte', 1, 5.00, 'Espresso with vanilla and steamed milk', 'latte.jpg', 45),
('Iced Americano', 2, 4.25, 'Espresso over ice with water', 'americano.jpg', 40),
('Cappuccino', 1, 4.50, 'Italian style cappuccino', 'cappuccino.jpg', 50),
('Caramel Macchiato', 1, 5.50, 'Sweet layered espresso drink', 'macchiato.jpg', 35),
('Origin Blend', 3, 18.00, 'Our signature roast 12oz bag', 'beans.jpg', 25);

-- sample specs for beans
INSERT INTO product_specs (product_id, spec_key, spec_value) VALUES
(6, 'origin', 'Colombia'),
(6, 'roast', 'Medium'),
(6, 'grind', 'Whole Bean'),
(6, 'size', '12oz');