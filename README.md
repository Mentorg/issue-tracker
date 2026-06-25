# 📌 Issue Tracker

A lightweight issue tracking system built with Laravel. It allows users to manage projects, issues, tags, comments, and user assignments with a clean AJAX-powered interface.

---

## ✨ Features

### 🗂 Projects

* Create, update, and delete projects
* Projects include: name, description, start date, and deadline
* Each project belongs to a user (author)
* Authorization handled via Laravel policies

---

### 📝 Issues

* Create and manage issues within projects
* Fields: title, description, status, priority, due date
* Each issue belongs to a project
* Supports:

  * 💬 Comments
  * 🏷 Tags (many-to-many)
  * 👥 User assignments (many-to-many via pivot table)

---

### 🏷 Tags

* Create and manage tags
* Attach/detach tags to issues via AJAX (no page reload)
* Color-coded tags for better visualization

---

### 💬 Comments

* Add comments to issues
* Paginated comment loading via AJAX
* Real-time comment creation without page reload

---

### 👥 User Assignment

* Assign multiple users to an issue
* Attach/detach users dynamically via AJAX
* UI updates instantly without refresh

---

### 🔐 Authentication & Authorization

* Login/logout system
* Auth middleware protects all routes
* Policies ensure only authorized users can modify resources

---

## ⚙️ Tech Stack

* Laravel
* MySQL
* Blade templates
* JavaScript (Fetch API for AJAX)
* Tailwind CSS

---

## ⚙️ Requirements

* PHP 8+
* Composer
* Node.js & npm
* MySQL (ensure it is running locally via DBngin, XAMPP, or native MySQL)

---

## 🚀 Setup Instructions

### 1. Clone the repository

```bash
git clone https://github.com/Mentorg/issue-tracker.git
cd issue-tracker
```

---

### 2. Install dependencies

```bash
composer install
npm install
```

---

### 3. Environment setup

```bash
cp .env.example .env
php artisan key:generate
```

Configure your database in `.env`:

```env
DB_DATABASE=your_db
DB_USERNAME=your_user
DB_PASSWORD=your_password
```

---

### 4. Start MySQL

Ensure your MySQL server is running (DBngin, XAMPP, or native MySQL).

---

### 5. Run migrations and seeders

```bash
php artisan migrate:fresh --seed
```

---

### 6. Start frontend assets

```bash
npm run dev
```

---

### 7. Start Laravel server

```bash
php artisan serve
```

---

## 🌐 Access the application

Default:
```
http://127.0.0.1:8000
```
or:
```
http://project-name.test
```
---

## 👤 Default Login (if seeded)

```
Email: test@example.com
Password: password
```

---

## 🧠 Architecture Notes

* Service layer used for issue loading logic
* Form Requests handle validation
* Policies enforce authorization rules
* Many-to-many relationships:

  * issues ↔ tags
  * issues ↔ users
* AJAX used for:

  * tag attach/detach
  * user assignment
  * comment creation
  * comment pagination
* Eager loading used to prevent N+1 query issues
