<div align="center">

# ⚡ FITNES — Pro Athlete Club & Fitness Management Platform

**A Modern, High-Performance Gym Management & Member Fitness Tracking Ecosystem built with Laravel & Tailwind CSS.**

[![PHP Version](https://img.shields.io/badge/PHP-8.2%20%7C%208.3%20%7C%208.5-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Laravel Framework](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-v3.4-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![Vite Bundler](https://img.shields.io/badge/Vite-6.x-646CFF?style=for-the-badge&logo=vite&logoColor=white)](https://vitejs.dev)
[![PHPUnit Tests](https://img.shields.io/badge/Tests-12%20Passed%20(43%20assertions)-38ef7d?style=for-the-badge&logo=githubactions&logoColor=white)](https://phpunit.de)
[![License](https://img.shields.io/badge/License-MIT-e2ff38?style=for-the-badge&logo=open-source-initiative&logoColor=black)](LICENSE)

<br>

<p align="center">
  <a href="#-key-features">Key Features</a> •
  <a href="#-tech-stack--architecture">Tech Stack</a> •
  <a href="#-quick-start--installation">Quick Start</a> •
  <a href="#-demo-credentials">Demo Credentials</a> •
  <a href="#-automated-testing">Testing</a> •
  <a href="#-license">License</a>
</p>

</div>

---

## 🌟 Overview

**FITNES** is an end-to-end, dark-themed fitness club portal engineered for modern gyms, athletes, and coaches. It merges a bold marketing showcase with an advanced athlete member dashboard, personal record tracking, routine builders, e-commerce supplement store, and ultra-fast backend architecture.

---

## ⚡ Key Features

### 🏋️‍♂️ 1. Member Profile & Digital Barcode Pass
* **Simulated Laser RFID Barcode**: High-density 38-line simulated barcode card with dynamic athlete Gym ID (`{{ gym_id }}-SECURE-PASS`).
* **Turnstile Front-Desk Notice**: Built-in reception guidance for instant contactless check-in at Gate A turnstiles.
* **Membership Status**: Real-time package info (Pro Athlete Membership, VIP Locker, Sauna & Cold Plunge Lounge, billing dates, emergency contacts).

### 📝 2. Daily Workout & Set Logger
* **Muscle Group Filter**: Quick filter pills for `Chest`, `Back`, `Legs`, `Shoulders`, `Arms`, and `Core`.
* **Metric Logging**: Log Exercise Name, Target Weight (kg), Sets, and Reps with instant database persistence.
* **Activity Metrics**: Real-time calculation of total visits, monthly attendance vs. targets, active weekly streaks, and recent workout history.

### 📊 3. Weekly Body Composition & Transformation Progress
* **Weigh-in Tracking**: Record body weight (kg), estimated body fat percentage (%), and waist circumference (cm).
* **Transformation Milestones**: Visual transformation cards tracking 8-week progress milestones with interactive logging.

### 🏆 4. Gym Consistency Leaderboard & Heavy Lifter PR Wall
* **Monthly Top 10 Athletes**: Real-time ranking of the most consistent athletes with 🥇 Gold, 🥈 Silver, and 🥉 Bronze medals, attendance days, and streak counters.
* **Heavy Lifters PR Wall**: Official records for **Bench Press** (up to 165 kg), **Barbell Squat** (up to 225 kg), and **Deadlift** (up to 265 kg) with athlete attribution and verification badges.
* **Hall of Fame**: Recognizing long-term athletic discipline and personal bests.

### 🏅 5. Athlete Milestone Badges
* **Century Club**: 100 days gym attendance progress (e.g. 68/100).
* **Iron Warrior**: Unlocked milestone for lifting 100+ kg in a single verified session.
* **Early Bird Striker**: Morning warrior badge for 20 workouts completed before 7:00 AM.
* **Consistency King**: Dynamic badge celebrating active 4+ week consecutive attendance streaks.

### 📋 6. Smart Workout Routine Generator (1-Click Auto Loader)
* **Curated Splits**:
  * **Push / Pull / Legs (PPL)** — 6-Day Hypertrophy periodization.
  * **Upper / Lower Split** — 4-Day Strength & Power split.
  * **Full Body Shred** — 3-Day Conditioning & Functional split.
* **⚡ 1-Click Load**: Clicking `Load` instantly populates the exercise name, target weight, sets, and reps into the tracker form and smooth-scrolls right into the logger with zero manual typing.

### 🛒 7. Athlete Supplement & Gear Pro Shop
* **Uniform Product Grid**: Supplements, gym apparel, and recovery gear with authentic badges (`Best Seller`, `Elite Formula`, `Hot Deal`), star ratings, and prices.
* **Real-Time Interactive Cart**: Flyout drawer cart with live subtotal calculation, discount deduction, and quantity adjustments.
* **Checkout Gateway**: Multi-payment support including **bKash**, **Nagad**, **Card (Visa/Mastercard)**, and **Cash on Reception** with automatic order tracking.

### 🔐 8. Sleek In-Modal Password Reset
* **Zero Browser Popups**: Completely replaces annoying native browser alerts with a polished 3-step in-modal workflow.
* **Auto-Prefill & Synchronization**: Automatically syncs typed email credentials from the login form to the recovery input.
* **Animated Feedback**: Live loading spinner (`Dispatching Link...`), validated confirmation view, and **60-second cooldown timer**.

### ⚡ 9. Full-Stack Performance Engine
* **SQLite Concurrency & WAL**: Powered by Write-Ahead Logging (`WAL`), `synchronous = NORMAL`, and `busy_timeout = 5000` for non-blocking parallel read/write performance.
* **Multi-Worker Local Serving**: Supports multi-threaded parallel asset delivery (`PHP_CLI_SERVER_WORKERS=4`).
* **Image Lazy Loading**: Universal browser-level `loading="lazy"` and `decoding="async"` across all media, saving over **9 MB** on initial page render.
* **CDN Preconnects**: Network preconnect headers for Cloudflare and Font Awesome assets.

---

## 🛠 Tech Stack & Architecture

| Layer | Technologies |
| :--- | :--- |
| **Backend** | **PHP 8.5** / **Laravel 12.x** (Artisan, Eloquent ORM, Seeders, Migrations) |
| **Frontend** | **Tailwind CSS v3.4**, **Blade Templating**, **Font Awesome 6**, **Vanilla JS** |
| **Bundler** | **Vite 6** (CSS/JS minification, Font manifests, Autoprefixer) |
| **Database** | **SQLite (WAL Mode)** / MySQL / PostgreSQL compatible |
| **Testing** | **PHPUnit 11** with custom Feature & Unit test suites |
| **Code Style** | **Laravel Pint** (100% PSR-12 code compliance) |

---

## 🚀 Quick Start & Installation

Follow these steps to set up the project locally:

### 1. Clone the repository
```bash
git clone https://github.com/tanvirahmadrahad/Gym.git
cd Gym
```

### 2. Install PHP & Node dependencies
```bash
composer install
npm install
```

### 3. Environment configuration
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Setup & Seeding
```bash
# Runs all migrations and seeds store products, routines, PR wall, and member profiles
php artisan migrate --seed
```

### 5. Compile frontend assets
```bash
npm run build
```

### 6. Start the local server
```bash
php artisan serve
```
Visit **`http://127.0.0.1:8000`** in your browser.

---

## 👤 Demo Credentials

For quick evaluation, use the pre-configured athlete account:

| Field | Demo Account |
| :--- | :--- |
| **Email** | `tanvir@fitnes.com` |
| **Password** | `password` |
| **Gym ID** | `FIT-010482` |
| **Plan** | Pro Athlete Membership |

---

## 🧪 Automated Testing

Run the automated PHPUnit test suite:

```bash
php artisan test --compact
```

```
PASS  Tests\Feature\ExampleTest
✓ that true is true

PASS  Tests\Feature\FitnessTrackingAndStoreTest
✓ store catalog page loads successfully
✓ store checkout creates order
✓ member profile page loads with fitness tracking
✓ rfid turnstile check in records attendance
✓ workout log creation and deletion
✓ body progress weigh in submission
✓ password reset endpoint handles json submission
✓ password reset requires email
✓ leaderboard page loads with pr wall

PASS  Tests\Unit\ExampleTest
✓ that true is true

Tests:    12 passed (43 assertions)
Duration: 1.27s
```

Format code according to PSR-12:
```bash
vendor/bin/pint --format agent
```

---

## 📄 License

This project is open-source software licensed under the **[MIT License](LICENSE)**.

<div align="center">
  <sub>Crafted with passion by <a href="https://github.com/tanvirahmadrahad">Tanvir Ahmad Rahad</a>. Built for athletes who strive for greatness.</sub>
</div>
