<h1 align="center">Platonic Club</h1>

<h2 align="center">Online Jewellery Store Website</h2>

<h3 align="center"> Made using PHP, JavaScript, HTML & CSS</h3>

[![License](https://img.shields.io/badge/license-MIT-violet.svg)](LICENSE)

<p align="justify">Platonic Club is a e-commerce web store that sells handmade jewellery to customers. It is a full-stack E-commerce website, with a fully functional admin dashboard, all made using PHP, HTML, CSS, JavaScript and MySQL!</p>

<p align="justify">The website was made to facilitate a handcrafted jewellery business that previously only sold to their customers through social media. It helps to increase the customer traffic for this business and allows the business to market and sell their products in a more organized manner. The website makes lengthy processes such as checkout and searching products more convenient.</p>

<p align="justify">The CRUD admin dashboard will make it easier for the team that creates the jewelry to add and update inventory products, check all placed orders and get a list of all currently registered customers on their website.</p>

## Main Website Features

- Homepage: Features two of the new collections, an easy link to all the earrings and necklaces available on the store, and a section for all the latest products available, followed by the footer.
  
<div align="center">
  <img src="screenshot_images/homepage.png" height="1800" />
</div>

- Shop All Products (filtered by product type): Page where all the products available on the store are present and products can be filtered according to color and/or category. Each product contains a quick view button which directs a user to the 'Product Details' page.

<div align="center">
  <img src="screenshot_images/all-products-filter.png" height="1800" />
</div>

- Product Details: Page where all the details, like the product description are shown for a particular product.

<div align="center">
  <img src="screenshot_images/product-details.png" height="750" />
</div>

- About Us: Contains all information about the store, such as the story of its creation and information about the team and managers that run the store, as well as client reviews etc.

<div align="center">
  <img src="screenshot_images/about-us.png" height="1200" />
</div>

- Search Products: The Search page is accessed through the search bar and allows a customer to search for any product according to a name, color or category.

<div align="center">
  <img src="screenshot_images/search-products1.png" height="650" /> 
  
  <img src="screenshot_images/search-products2.png" height="700" />
</div>

- Shopping Cart: Users can view all the products they have added to their cart and the grand total of all cart products. Includes ability to remove certain products from the cart, update the individual quantity of products in the cart or delete all the products from the cart with one click.
  
<div align="center">
  <img src="screenshot_images/shopping-cart2.png" height="1020" />
</div>

- Checkout Order: Customers will fill out the checkout form and make the payment in case of credit card. They can finalize their order by clicking on the ‘Order Now’ button after the whole form is filled.

<div align="center">
  <img src="screenshot_images/checkout-order.png" height="820" />
</div>

- Your Placed Orders: Customers can review all the orders they have already placed and can check the status of their orders to see if they are still pending or not.

<div align="center">
  <img src="screenshot_images/website-placed-orders.png" height="820" />
</div>

- Custom Order: Page where customers can place custom orders through a form and submit reference images for the store owners to base their design off of.

<div align="center">
  <img src="screenshot_images/custom-order.png" height="650" />
</div>

- Wishlist: Users can view all the products they have added to their wish list while shopping. Allows moving some or all of those products into the shopping cart from the wish list.

<div align="center">
  <img src="screenshot_images/wishlist.png" height="720" />
</div>

## Admin Panel Features

- Dashboard: Overview of all the data related to the store & customers, like completed payments, total pending payments by customers, number of orders placed, total number of products available on the site, total users registered with the store and total number of messages/ custom orders received from customers.

![dashboard](screenshot_images/admin-panel-dashboard.png)

- Custom Order Messages: List of all the custom orders and messages submitted by customers are displayed, along with the reference pictures for the custom orders.

![custom order messages](screenshot_images/messages.png)

- Placed Orders: Details of all the orders placed and ability to update the status of orders by changing it from pending to completed to indicate that the jewelry piece has been made and sent for delivery or the payment has been given by the customer successfully.

![placed orders](screenshot_images/admin-panel-placed-orders.png)

- Add New Products to Inventory: Store administrators can add new products to their store through a form and view a list of all the products currently available on the website. Administrator can choose to update the information of any product from the list or delete the product entirely from the inventory.

<div align="center">
  <img src="screenshot_images/add-new-product-inventory.png" height="1800" />
</div>

- User Accounts: Displays all the users registered with their online store; both customers and administrators. All the relevant details of the users, other than their passwords are present on this page. Administrators can also delete any of the users.
  
![user accounts](screenshot_images/user-accounts.png)  

## Login and Register

<p align="justify">Upon accessing the URL of the website, a user is brought to the login page from where they can login as a customer or administrator, if they already have an account. If not, then a user can click on the 'Register Now' button, directing them to the Register page, where they fill out a form to sign up with the website. When a person logs in as a customer, they are brought to the main website but when an administrator logs in they are directed to the admin dashboard instead.</p>

![login and register](screenshot_images/login.png)

![login and register](screenshot_images/register.png)

## Header

<p align="justify">The header is divided into two parts, vertically stacked on eachother. The top section includes the search bar, user info, wishlist and shopping cart. The bottom section includes the logo, and links to the five main pages namely, Home page, About page, Shop page, Orders page and Account page.</p>

  - The account button shows the customer their account details like username and email etc. and has the logout button too.
  - The Account+ has two sub categories of login and register, which allow a customer to either login with another account if they have one or register a new account with the store.

![header](screenshot_images/header.png)  

## Technology

The project is built using the following technologies:

- Frontend: HTML, CSS, JavaScript
- Backend: PHP, MySQL Database

## MySQL Database Structure

### Name 
#### shop_db

### Tables

#### 1. users 
Attributes -------> id*, name, email, password, user_type

#### 2. products
Attributes -------> id*, name, price, color, category, details, image

#### 3. cart
Attributes -------> id*, customer_id, pid, name, price, color, category, quantity, image

#### 4. wishlist
Attributes -------> id*, customer_id, pid, name, price, color, category, image

#### 5. orders
Attributes -------> id*, customer_id, name, number, email, method, address, total_products, total_price, placed_on_date, payment_status

#### 6. messages
Attributes -------> id*, customer_id, name, email, number, message, image

*KEY: * = primary key*

## License

Platonic Club is licensed under the [MIT License](LICENSE).

## Contact



For questions or suggestions, please reach out to me at [aminawasif20@gmail.com](mailto:aminawasif20@gmail.com).

---
