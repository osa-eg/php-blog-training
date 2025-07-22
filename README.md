# 📰 PHP Modern Blog

A simple and secure blog system built using **pure PHP**, **MySQLi (OOP)**, and a modular folder structure. This training project demonstrates how to convert a static HTML blog template (with admin and frontend sections) into a dynamic, database-driven PHP application.

---

## 🚀 Features

- ✅ Clean folder structure (`public/`, `includes/`, `classes/`, `templates/`, `assets/`)
- ✅ User authentication system (Login, Logout, Session)
- ✅ Secure password handling using `password_hash` and `password_verify`
- ✅ CSRF protection for all forms
- ✅ MySQLi OOP with Prepared Statements
- ✅ File upload system with validation and organized storage
- ✅ Admin dashboard for managing articles and users
- ✅ Reusable layout components (header, footer, navbar)
- ✅ Flash messaging system (coming soon)

---

## 📁 Folder Structure
modern_blog/
│
├── public/              # Entry point (index, login, dashboard, etc.)
│   ├── admin/           # Admin dashboard pages
│   ├── about.php        # About page
│   ├── article.php      # Article display page
│   ├── contact.php      # Contact page
│   ├── index.php        # Homepage
│   └── login.php        # Login page
├── templates/           # Common UI parts (header, footer, navbar)
├── includes/            # Core logic (session, auth, db, csrf, etc.)
├── classes/             # OOP Classes (User.php, Article.php, etc.)
└── assets/              # Static assets
    ├── admin/           # Admin-specific assets
    └── website/         # Frontend website assets

---

## 🔧 Setup Instructions

**Clone the repo**:
   ```bash
   git clone https://github.com/yourusername/modern_blog.git
   cd modern_blog
   ```

