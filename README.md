
# Urban Brew Coffee Shop - Phase One

Aarif - Second Semester Computer Programming

## Project Overview
This repository contains Phase One of a coffee shop website built for PHP and CSS courses. The site presents static placeholder products with focus on layout, visual design, and responsive behavior. Header and footer are shared using PHP includes. Database schema is prepared for Phase Two.

## Technologies Used
* PHP for simple templating with includes
* HTML5 for semantic structure  
* CSS3 for custom styling with grid-based layout
* MySQL for relational schema (will power dynamic content in Phase Two)

## Phase One Features
* Home page with featured drinks section
* Menu catalog listing all coffee products
* About page describing cafe story and values
* Locations page with cafe info and hours (unique feature)
* Contact form with basic client-side validation
* Admin portal with combined login/register (sessions coming in Phase Two)
* Responsive design for mobile, tablet, and desktop
* Shared header and footer across all pages

## File Structure
```
urban-brew/
│
├── home.php              # landing page
├── products.php          # menu catalog
├── story.php             # about page
├── locations.php         # cafe locations
├── contact.php           # contact form
├── admin.php             # login & register
│
├── css/
│   └── main.css          # all custom styles
│
├── includes/
│   ├── nav.php           # navigation header
│   └── foot.php          # footer section
│
├── assets/
│   └── img/              # product photos
│
└── database.sql          # schema for Phase Two
```

## Design System
* **Color Palette**
  * Espresso: #4E342E
  * Cream: #F9F3E8
  * Charcoal: #212121
  * Teal Accent: #26A69A
* **Typography**
  * Headings: Poppins
  * Body: Source Serif Pro
* **Layout**
  * CSS Grid for product displays
  * Flexbox for navigation and footer
* **Effects**
  * Hover transformations
  * Soft shadows
  * Focus states on forms

## Database Schema
Create a MySQL database and import `database.sql`. The file defines tables for users, products, categories, and product specs (origin, roast, grind, size stored as key-value pairs).

**Tables:**
* `admin_users` - for future admin authentication
* `categories` - for organizing drinks vs beans
* `products` - menu items and retail products
* `product_specs` - key-value attributes for products

## Local Setup
1. Clone the repository
```
git clone https://github.com/your-username/urban-brew.git
cd urban-brew
```

2. Serve with PHP or place in your local web server
```
php -S localhost:8000 -t .
```

3. Set up the database
* Open phpMyAdmin
* Create database named `urban_brew`
* Import `database.sql`

4. Add product images to `assets/img/`

5. Visit `http://localhost:8000` or your local server path

## Phase One Checklist
- [x] All customer-facing pages completed with HTML/CSS
- [x] Header and footer template system with PHP
- [x] Custom CSS only (no frameworks)
- [x] Two fonts loaded and applied
- [x] Consistent color palette throughout
- [x] Responsive behavior for all screen sizes
- [x] Database schema created
- [x] Static placeholder content in place

## Coming in Phase Two
* MySQL connection and dynamic product rendering
* Session-based authentication with password hashing
* Admin dashboard with CRUD operations
* Image upload functionality
* Server-side validation
* Shopping cart feature (if time permits)

## Notes
All content is currently hardcoded in arrays. The project uses only custom CSS as required by assignment brief.

---

**Course:** Intro to Web Programming (PHP) & Interface Design (CSS)  
**Due Dates:** Phase One - November 11, 2025 | Phase Two - December 12, 2025  
**Student:** Aarif
