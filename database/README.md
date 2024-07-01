# DumbBell 
## Online Jewellery Store Website
## Made using PHP, JavaScript, HTML & CSS

# Project's MySQL Database

## Name 
### shop_db

## Tables

### 1. users 
#### Attributes -------> id*, name, email, password, user_type

### 2. products
#### Attributes -------> id*, name, price, color, category, details, image

### 3. cart
#### Attributes -------> id*, customer_id, pid, name, price, color, category, quantity, image

### 4. wishlist
#### Attributes -------> id*, customer_id, pid, name, price, color, category, image

### 5. orders
#### Attributes -------> id*, customer_id, name, number, email, method, address, total_products, total_price, placed_on_date, payment_status

### 6. messages
#### Attributes -------> id*, customer_id, name, email, number, message, image


*KEY: * = primary key*