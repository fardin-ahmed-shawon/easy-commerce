CREATE TABLE admin_info (
    admin_id INT PRIMARY KEY AUTO_INCREMENT,
    admin_username VARCHAR(50) UNIQUE NOT NULL,
    admin_password VARCHAR(255) NOT NULL,
    admin_picture VARCHAR(255)
);

CREATE TABLE user_info (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_fName VARCHAR(50) NOT NULL,
    user_lName VARCHAR(50) NOT NULL,
    user_phone VARCHAR(20) UNIQUE NOT NULL,
    user_email VARCHAR(100) UNIQUE NOT NULL,
    user_gender VARCHAR(20) NOT NULL,
    user_password VARCHAR(255) NOT NULL
);

CREATE TABLE main_category (
    main_ctg_id INT PRIMARY KEY AUTO_INCREMENT,
    main_ctg_name VARCHAR(100) UNIQUE NOT NULL,
    main_ctg_des TEXT,
    main_ctg_img VARCHAR(255)
);

CREATE TABLE sub_category (
    sub_ctg_id INT PRIMARY KEY AUTO_INCREMENT,
    sub_ctg_name VARCHAR(100) NOT NULL,
    main_ctg_name VARCHAR(100) NOT NULL
    FOREIGN KEY (main_ctg_name) REFERENCES main_category(main_ctg_name) ON DELETE CASCADE,
);

CREATE TABLE product_info (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    product_title VARCHAR(255) NOT NULL,
    product_price INT NOT NULL,
    product_main_ctg_name VARCHAR(100) NOT NULL,
    product_sub_ctg_name VARCHAR(100) NOT NULL,
    available_stock INT NOT NULL,
    size_option VARCHAR(50),
    product_keyword VARCHAR(255),
    product_description TEXT,
    product_img1 VARCHAR(255),
    product_img2 VARCHAR(255),
    product_img3 VARCHAR(255),
    product_img4 VARCHAR(255)
);

CREATE TABLE order_info (
    order_no INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    user_phone VARCHAR(20) NOT NULL,
    user_address TEXT NOT NULL,
    invoice_no VARCHAR(50) NOT NULL,
    product_id INT NOT NULL,
    product_quantity INT NOT NULL,
    product_size VARCHAR(50),
    total_price DECIMAL(10,2) NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    order_status VARCHAR(50) DEFAULT 'Pending',
    FOREIGN KEY (user_id) REFERENCES user_info(user_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES product_info(product_id) ON DELETE CASCADE
);

CREATE TABLE payment_info (
    serial_no INT PRIMARY KEY AUTO_INCREMENT,
    invoice_no VARCHAR(50) NOT NULL,
    order_no INT NOT NULL UNIQUE,
    order_status VARCHAR(50) DEFAULT 'Pending',
    payment_method VARCHAR(50) NOT NULL,
    acc_number VARCHAR(50),
    transaction_id VARCHAR(50),
    payment_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    payment_status VARCHAR(50) DEFAULT 'Unpaid',
    FOREIGN KEY (order_no) REFERENCES order_info(order_no) ON DELETE CASCADE
);

CREATE TABLE purchase_history (
    purchase_id INT PRIMARY KEY AUTO_INCREMENT,
    order_no INT NOT NULL,
    user_id INT NOT NULL,
    invoice_no VARCHAR(50) NOT NULL,
    product_id INT NOT NULL,
    product_size VARCHAR(50),
    product_quantity INT NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES user_info(user_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES product_info(product_id) ON DELETE CASCADE
);
