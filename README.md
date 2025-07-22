# 📰 PHP Modern Blog

A simple and secure blog system built using **pure PHP**, **MySQLi (OOP)**, and a modular folder structure. This training project demonstrates how to convert a static HTML blog template (with admin and frontend sections) into a dynamic, database-driven PHP application.

---

## 🚀 Features

- ✅ Clean folder structure (`public/`, `includes/`, `classes/`, `templates/`)
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
php-modern-blog/
│
├── public/              # Entry point (index, login, dashboard, etc.)
├── templates/           # Common UI parts (header, footer, navbar)
├── includes/            # Core logic (session, auth, db, csrf, etc.)
├── classes/             # OOP Classes (User.php, Article.php, etc.)
├── assets/              # Static assets (CSS, JS, images)
├── uploads/             # Uploaded files (organized by type)
└── config/              # Config files (db connection, etc.)


---

## 🔧 Setup Instructions

**Clone the repo**:
   ```bash
   git clone git@github.com:osa-eg/php-modern-blog.git
   cd php-modern-blog
   ```

