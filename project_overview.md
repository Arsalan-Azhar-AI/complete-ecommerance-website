complete-ecommerance-website
Overview: A complete E-commerce website built with PHP, MySQL, and HTML/CSS. Users can browse products, search, add items to a shopping cart, and contact the site owner. There is an Admin area (not shown) for managing products and orders. It’s a classic online-store tutorial project enhanced with Bootstrap and PHP.

Features:

Product Listings: Dynamic display of products on index.php with images, names, and prices.
Search: search_product.php lets users search products by keywords (search queries go to MySQL).
Shopping Cart: cart.php shows items added to cart with quantity and total. Users can update quantities or remove items. Cart state is tracked via PHP sessions.
User Accounts: Separate users_area for customers (login, registration, account page). Customers can log in, view orders, update profile.
Admin Area: In admin_area, admins can log in, add/edit products, categories, brands, and view orders (improving site content).
Checkout/Contact: There’s a contact.php form (handled via send_email.php) to allow customers to ask questions.
Design: Uses Bootstrap and custom CSS (style.css) for a mobile-responsive layout.
Setup Instructions (2026):

Clone Repository. Place it in your PHP server directory.
Database: Create a MySQL database (e.g. ecommerce_db). Import the provided SQL (if available) or create tables: products, users, categories, cart, orders, etc. The includes/db.php file contains connection parameters.
Configure: Edit includes/db.php (or similar) with your DB host/user/password. Ensure image upload folders exist (ecom/admin_area/product_images, etc).
Run: Navigate to index.php. Register as a new user or log in. Browse products, add to cart, and test the checkout process.
Usage: Visit the homepage to see product categories. Use “All Products” to view everything. Click a product for details (product_details.php). Use the search bar to find items. Add to cart and view cart.php to manage orders. Use contact.php for inquiries.
