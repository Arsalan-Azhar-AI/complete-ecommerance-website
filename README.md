
# Complete E-commerce Website

**Overview:**
A fully functional **E-commerce website** built with **PHP**, **MySQL**, and **HTML/CSS**. Users can browse products, search items, add them to a shopping cart, and contact the site admin. Admins can manage products, categories, brands, and orders. This project demonstrates full-stack web development with dynamic content and responsive design.

**Technologies Used:**

* Backend: PHP
* Database: MySQL
* Frontend: HTML, CSS, Bootstrap
* Session Management & User Authentication

---

## Features

* **Dynamic Product Listings:** Display products with images, names, and prices.
* **Search Functionality:** Users can search products by keyword.
* **Shopping Cart:** Add, update, and remove items; cart tracked using PHP sessions.
* **User Accounts:** Customers can register, log in, view orders, and update their profile.
* **Admin Panel:** Admins can add/edit products, categories, brands, and view/manage orders.
* **Responsive Design:** Mobile-friendly UI using Bootstrap.
* **Contact Form:** Allows users to send inquiries via email.

---

## Setup Instructions (2026)

1. **Clone Repository**

```bash
git clone https://github.com/Arsalan-Azhar-AI/complete-ecommerance-website.git
```

2. **Database Setup**

* Create a MySQL database (e.g., `ecommerce_db`).
* Import provided SQL (if available) or create tables: `products`, `users`, `categories`, `cart`, `orders`, etc.
* Update database credentials in `includes/db.php`.

3. **Configure File Permissions**

* Ensure image upload folders exist: `admin_area/product_images`.
* Make folders writable if needed.

4. **Run Locally**

* Open `index.php` in a browser.
* Register a new user or log in.
* Browse products, add to cart, and test checkout functionality.

---

## Usage

* **Homepage:** View product categories and featured products.
* **Search Products:** Use the search bar to find specific items.
* **Shopping Cart:** Add items, adjust quantities, remove items, and proceed to checkout.
* **User Account:** Manage profile, view orders, and update information.
* **Contact Page:** Send inquiries to the admin.

---

