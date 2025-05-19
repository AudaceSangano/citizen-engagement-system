# 🏛️ Citizen Engagement System (MVP)

This is a Minimum Viable Product (MVP) for a **Citizen Engagement System**, designed to streamline how citizens submit complaints or feedback about public services and how government institutions respond.

## Project Overview

Currently, complaints are often handled through fragmented channels, resulting in delayed responses and poor citizen satisfaction. This system provides a centralized platform to:

- Submit complaints or feedback online
- Automatically categorize and route complaints to the appropriate agency
- Track complaint status
- Enable institutions to respond via an admin interface

## Key Features

- **Complaint Submission** via a simple web form
- **Categorization and Auto-Routing** to relevant government agencies
- **Status Tracking** so users can follow up on their complaint
- **Admin Dashboard** to manage complaints and respond
- **Authentication System** for both Citizens and Admins

## 🛠 Tech Stack

| Layer       | Technology          |
|-------------|---------------------|
| Backend     | Laravel 11          |
| Frontend    | Blade (Laravel Views) |
| Database    | MySQL  |
| Auth        | Laravel Breeze      |
| Optional    | Chart.js (for admin analytics) |


## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/AudaceSangano/citizen-engagement-system.git
cd citizen-engagement-system
```
### 2. Install Dependencies

```bash
composer install
npm install && npm run dev
```
### 3. Setup Environment

```bash
cp .env.example .env
php artisan key:generate
```
### 4. Configure Database

```bash

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=citizen_system
DB_USERNAME=root
DB_PASSWORD=yourpassword
```
### 5. Serve the Application

```bash

php artisan migrate
php artisan serve
