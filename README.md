# MyBlog — PHP Blog with MVC Architecture

A fully functional blog application built with **pure PHP**, following the **MVC (Model-View-Controller)** design pattern. No frameworks — everything is built from scratch using only the PHP standard library, **Smarty** template engine, and **MySQL** database.

---

## 🎯 Features

- **Homepage** — displays all categories with their latest 3 posts each
- **Category pages** — full post listing with sorting (by date / by views) and pagination (9 posts per page)
- **Post pages** — full article view with view counter, category badges, and similar posts
- **Admin panel** — create new posts with image upload via a simple login form
- **Image upload** — file validation (type, size), unique filename generation, stored in `public/uploads/posts/`
- **Similar posts** — algorithmically finds posts sharing the most categories with the current post
- **View counter** — increments automatically on each page visit
- **Responsive design** — works on desktop and mobile

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| Language | PHP 8.1 |
| Database | MySQL 8.0 |
| Template Engine | Smarty 4.x |
| Web Server | Nginx |
| Containerization | Docker & Docker Compose |
| Styles | SCSS → CSS (compiled via Sass) |
| Dependency Management | Composer (PHP), npm (Node.js) |

---

## 📁 Project Structure

```
myBlog/
├── config/
│   └── database.php            # Database connection settings
├── database/
│   └── schema.sql              # MySQL schema (categories, posts, post_categories)
├── docker/
│   └── nginx/
│       └── default.conf        # Nginx server configuration
├── public/                     # Web root (served by Nginx)
│   ├── css/
│   │   └── style.css           # Compiled CSS
│   ├── scss/
│   │   ├── _variables.scss     # SCSS variables (colors, spacing)
│   │   └── style.scss          # Main SCSS file
│   ├── uploads/
│   │   └── posts/              # Uploaded post images (generated at runtime)
│   └── index.php               # Application entry point
├── seeds/
│   └── seed.php                # Database seeder (5 categories, 75 posts)
├── src/                        # PHP source code (PSR-4 autoloaded under App\)
│   ├── Controllers/
│   │   ├── AdminController.php # Admin panel: login, dashboard, post creation
│   │   ├── CategoryController.php # Category listing with pagination & sorting
│   │   ├── HomeController.php  # Homepage logic
│   │   └── PostController.php  # Single post view, view counter, similar posts
│   ├── Database/
│   │   └── Database.php        # Singleton PDO wrapper (prepared statements)
│   ├── Helpers/
│   │   ├── FileUploader.php    # Image upload: validation, unique naming, storage
│   │   └── Router.php          # URL router with regex-based parameter matching
│   ├── Repositories/           # Repository Pattern - Data Access Layer
│   │   ├── CategoryRepositoryInterface.php
│   │   ├── CategoryRepository.php # Category database operations
│   │   ├── PostRepositoryInterface.php
│   │   └── PostRepository.php  # Post database operations (CRUD, pagination, similar)
│   └── Services/               # Service Layer - Business Logic
│       └── PostService.php     # Post business logic with transactions
├── templates/                  # Smarty templates
│   ├── admin/
│   │   ├── dashboard.tpl       # Admin post list
│   │   ├── login.tpl           # Admin login form
│   │   └── post-create.tpl     # New post form with image upload
│   ├── layout.tpl              # Base layout (header, nav, footer)
│   ├── home.tpl                # Homepage template
│   ├── category.tpl            # Category page (sorting, pagination)
│   └── post.tpl                # Single post (content, categories, similar posts)
├── templates_c/                # Smarty compiled templates (auto-generated)
├── cache/                      # Smarty cache (auto-generated)
├── vendor/                     # Composer dependencies (auto-generated)
├── node_modules/               # npm dependencies (auto-generated)
├── docker-compose.yml          # Docker services: PHP, Nginx, MySQL, phpMyAdmin
├── Dockerfile                  # PHP 8.1-FPM image with extensions
├── composer.json               # PHP dependencies (Smarty, PSR-4 autoloading)
├── composer.lock               # Locked dependency versions
├── package.json                # npm scripts (SCSS compilation)
└── package-lock.json           # Locked npm dependency versions
```

---

## 🚀 Getting Started

### Prerequisites

Make sure you have the following installed:

- [Docker](https://docs.docker.com/get-docker/) & [Docker Compose](https://docs.docker.com/compose/install/)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) & npm

---

### Step 1 — Clone the repository

```bash
git clone <your-repo-url>
cd myBlog
```

---

### Step 2 — Install dependencies

```bash
# PHP dependencies (Smarty)
composer install

# Node.js dependencies (Sass compiler)
npm install
```

---

### Step 3 — Compile CSS

```bash
npm run scss
```

---

### Step 4 — Start Docker containers

```bash
docker compose up -d
```

This starts four containers:

| Container | Service | Port |
|---|---|---|
| `my_blog_php` | PHP 8.1-FPM | 9000 (internal) |
| `my_blog_nginx` | Nginx web server | **8080** |
| `my_blog_mysql` | MySQL 8.0 database | 3306 |
| `my_blog_phpmyadmin` | phpMyAdmin GUI | **8081** |

---

### Step 5 — Set up the database

```bash
# Create tables
docker compose exec -T mysql mysql -u blog_user -pblog_pass blog_db < database/schema.sql

# Populate with test data (5 categories, 75 posts)
docker compose exec php php seeds/seed.php
```

---

### Step 6 — Open in browser

| URL | Page |
|---|---|
| `http://localhost:8080` | Homepage |
| `http://localhost:8080/category/1` | Category page (Technology) |
| `http://localhost:8080/post/1` | Single post |
| `http://localhost:8080/admin/login` | Admin login |
| `http://localhost:8081` | phpMyAdmin |

---

## 🔐 Admin Panel

The admin panel allows you to create new posts with image upload.

**Login credentials (development only):**

| Field | Value |
|---|---|
| Username | `admin` |
| Password | `admin123` |

**URLs:**

| URL | Page |
|---|---|
| `/admin/login` | Login form |
| `/admin/dashboard` | List of all posts |
| `/admin/post/create` | Create a new post with image upload |

---

## 🗄️ Database

**Connection settings** (defined in `config/database.php`, can be overridden via environment variables):

| Parameter | Default Value | Environment Variable |
|---|---|---|
| Host | `mysql` | `DB_HOST` |
| Port | `3306` | `DB_PORT` |
| Database | `blog_db` | `DB_NAME` |
| Username | `blog_user` | `DB_USER` |
| Password | `blog_pass` | `DB_PASS` |

**Tables:**

| Table | Purpose |
|---|---|
| `categories` | Stores blog categories |
| `posts` | Stores blog posts (title, content, image URL, view count) |
| `post_categories` | Many-to-many relationship between posts and categories |

---

## 🏗️ Architecture

### Design Patterns Used

This project implements **modern PHP architecture patterns** following SOLID principles:

| Pattern | Implementation | Purpose |
|---|---|---|
| **MVC** | Controllers, Repositories, Templates | Separation of concerns |
| **Repository Pattern** | `src/Repositories/` | Abstract data access layer |
| **Service Layer** | `src/Services/` | Business logic isolation |
| **Dependency Injection** | Constructor injection | Loose coupling, testability |
| **Interface Segregation** | Repository interfaces | Contract-based programming |
| **Singleton** | Database class | Single DB connection |

### Architecture Layers

| Layer | Location | Responsibility |
|---|---|---|
| **Repository** | `src/Repositories/` | Data access - all database queries |
| **Service** | `src/Services/` | Business logic - transactions, complex operations |
| **Controller** | `src/Controllers/` | HTTP handling - request/response |
| **View** | `templates/` | Presentation - Smarty templates |

### Request Flow

```
User Request
    ↓
Nginx → index.php
    ↓
Router (regex matching)
    ↓
Controller (dependency injection)
    ↓
Repository (data access) ←→ Database
    ↓              ↑
Service (business logic)
    ↓
Controller
    ↓
Smarty Template
    ↓
HTML Response
```

### Key Design Patterns

| Pattern | Where | Why |
|---|---|---|
| **Repository Pattern** | `PostRepository`, `CategoryRepository` | Abstracts data access, enables testing with mocks |
| **Service Layer** | `PostService` | Encapsulates business logic and transactions |
| **Dependency Injection** | All Controllers, Services | Testability, loose coupling, SOLID principles |
| **Interface Segregation** | `PostRepositoryInterface` | Contract-based development, flexibility |
| **Singleton** | `Database.php` | Single PDO connection shared across the app |
| **MVC** | Controllers / Repositories / Templates | Separation of concerns |
| **Transaction** | `PostService::createPostWithCategories()` | Atomic post + categories insert |

---

## 📦 Useful Commands

```bash
# Start containers
docker compose up -d

# Stop containers
docker compose down

# Restart a specific service
docker compose restart nginx

# View logs
docker compose logs php
docker compose logs nginx

# Access PHP container shell
docker compose exec php bash

# Recompile CSS
npm run scss

# Re-seed database (clears existing data first)
docker compose exec mysql mysql -u blog_user -pblog_pass blog_db -e "
SET FOREIGN_KEY_CHECKS=0;
TRUNCATE TABLE post_categories;
TRUNCATE TABLE posts;
TRUNCATE TABLE categories;
SET FOREIGN_KEY_CHECKS=1;
"
docker compose exec php php seeds/seed.php
```

---

---

## 🎓 Architecture Improvements

This project was **refactored** to implement professional architecture patterns based on technical feedback:

### What Was Improved

| Before (Initial) | After (Refactored) | Benefit |
|---|---|---|
| Direct database calls in Models | Repository Pattern with interfaces | Abstraction, testability, SOLID |
| Business logic in Controllers | Service Layer | Single Responsibility |
| `new Model()` in Controllers | Dependency Injection | Loose coupling |
| No interfaces | Repository interfaces | Contract-based development |
| No .gitignore | Proper .gitignore | Clean repository |

### Code Quality Enhancements

- ✅ **Repository Pattern** — All database operations abstracted
- ✅ **Service Layer** — Business logic (transactions) separated
- ✅ **Interface Segregation** — Repository contracts defined
- ✅ **Dependency Injection** — Constructor injection throughout
- ✅ **SOLID Principles** — Single Responsibility, Open/Closed
- ✅ **Clean Git History** — No `vendor/`, `node_modules/` in repo

### Future Improvements Roadmap

- [ ] Dependency Injection Container (PSR-11)
- [ ] Unit Tests with PHPUnit
- [ ] Integration Tests
- [ ] DTO (Data Transfer Objects)
- [ ] Request Validation Layer
- [ ] API Endpoints (RESTful)

---

## ⚠️ Notes

- The `templates_c/` and `cache/` directories must be writable by PHP. If you encounter Smarty write errors, run: `chmod -R 777 templates_c cache`
- The `public/uploads/posts/` directory must also be writable: `chmod -R 777 public/uploads`
- Admin credentials are hardcoded for development. Do **not** deploy this to production without implementing proper authentication (password hashing, session security, etc.)
- Post images in the seeder use external Unsplash URLs. Uploaded images via the admin panel are stored locally in `public/uploads/posts/`