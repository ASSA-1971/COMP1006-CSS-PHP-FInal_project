# Urban Brew — PHP & CSS Solo Project

Aarif • Second‑semester Computer Programming

## 1) Project Overview
Urban Brew is a small coffee shop website built as a solo Option A project. All public pages are fully laid out with custom CSS and placeholder content. Header and footer are PHP includes used on every page. The relational database is designed and tested locally for future dynamic content.

**Public pages completed and styled**
- Home
- About
- Shop
- Contact
- Register and Login

**Templating**
- `templates/header.php` and `templates/footer.php` included on all pages with `include`.

> Note: This readme follows the same course requirements but is my own project and structure. It is not a group repo.

## 2) Tech Stack
- **Frontend:** HTML, CSS (single bundled stylesheet), two web fonts
- **Backend:** PHP 8+ (basic templating, sessions planned)
- **Database:** MySQL (schema completed and test‑seeded)
- **Tools:** Git and GitHub, phpMyAdmin, XAMPP or MAMP

## 3) Visual Design
- **Fonts:**
  - Headings: Poppins
  - Body: Source Serif Pro
- **Color scheme:** Espresso brown `#4E342E`, cream `#F9F3E8`, charcoal `#212121`, accent teal `#26A69A`
- **Responsiveness:** Mobile first with fluid grids and utility classes
- **Accessibility:** Semantic tags, focus styles, sufficient contrast, labeled form controls

## 4) Repository Structure
```
urban-brew/
│
├── public/
│   ├── index.php           # Home
│   ├── about.php
│   ├── shop.php
│   ├── contact.php
│   ├── register.php
│   └── login.php
│
├── templates/
│   ├── header.php
│   └── footer.php
│
├── assets/
│   ├── css/
│   │   └── style.css       # All styling in one file
│   ├── img/
│   └── js/                 # Reserved (not required for Option A)
│
├── includes/
│   ├── config.php          # App constants
│   ├── database.php        # PDO connection helper
│   └── helpers.php         # Tiny utilities (e.g., active nav)
│
├── sql/
│   └── schema.sql          # DDL and seed rows
│
└── README.md
```

## 5) Database Design (Completed & Tested)
Minimal schema to power users and products when dynamic content is added later.

### Table: `users`
| Field       | Type           | Constraints                      | Notes                |
|-------------|----------------|----------------------------------|----------------------|
| id          | INT            | PK, AUTO_INCREMENT               |                      |
| name        | VARCHAR(100)   | NOT NULL                         |                      |
| email       | VARCHAR(120)   | UNIQUE, NOT NULL                 | login                |
| password    | VARCHAR(255)   | NOT NULL                         | hashed               |
| created_at  | TIMESTAMP      | DEFAULT CURRENT_TIMESTAMP        |                      |

### Table: `products`
| Field       | Type           | Constraints                      | Notes                |
|-------------|----------------|----------------------------------|----------------------|
| id          | INT            | PK, AUTO_INCREMENT               |                      |
| title       | VARCHAR(150)   | NOT NULL                         | coffee or gear       |
| description | TEXT           | NULL                             |                      |
| price       | DECIMAL(10,2)  | NOT NULL                         |                      |
| image_path  | VARCHAR(255)   | NULL                             | local path or URL    |
| created_at  | TIMESTAMP      | DEFAULT CURRENT_TIMESTAMP        |                      |

**Testing**
- Created schema in phpMyAdmin
- Inserted 3 demo users and 6 demo products
- Verified constraints and simple selects

## 6) CSS Requirements (Met)
- All styling lives in `assets/css/style.css`
- Two different fonts loaded and applied (headings vs body)
- Color palette above applied across pages
- Reusable components: buttons, cards, nav, footer, forms
- Media queries: 375px, 768px, 1024px breakpoints

## 7) How to Run Locally
1. Clone the repo
   ```bash
   git clone https://github.com/<your-username>/urban-brew.git
   cd urban-brew
   ```
2. Start a local PHP server (or use XAMPP/MAMP htdocs)
   ```bash
   php -S localhost:8000 -t public
   ```
3. Create database and import schema
   - Create a MySQL database named `urban_brew`
   - Import `sql/schema.sql` via phpMyAdmin
   - Update `includes/config.php` with your DB credentials
4. Visit `http://localhost:8000`

## 8) Commit Strategy
- Small, frequent commits that tell the story
- Conventional messages, for example:
  - `feat: build base templates`
  - `style: add color tokens and type scale`
  - `db: add users and products schema`
  - `docs: update setup steps`

## 9) Milestones and Proof of Work
- **Phase 1 — Checkpoint (Nov 11)**
  - Repo created with structure above
  - All public pages built and styled with placeholder text
  - Header and footer includes working across pages
  - Database schema created and tested locally
- **Phase 2 — Final (Dec 12)**
  - Session login and registration wired up
  - Admin only page for simple product CRUD
  - Shop pulls products from database
  - README updated with screenshots and final notes

## 10) Notes
- Images are placeholder stock assets stored under `assets/img`
- No external CSS frameworks; custom CSS only as required by the brief
- Future enhancement: category filter for shop page and contact form mailer

---

© 2025 Aarif — Urban Brew
