## Overview

A simple API-based service booking system built with Laravel, developed for the **Mid-Level Laravel Developer Task**.


## Features

- Customer and admin authentication (Laravel Sanctum)
- View and manage services
- Book services (no past-date bookings)
- Admin: create, update, delete services, view all bookings
- User: view services and own bookings
- Input validation using FormRequest
- Database seeder with services and admin user
- Postman collection included(Project Folder) with environment variable support


## Setup Instructions

1.  **Clone the repository:**

    ```bash
    git clone <repository_url>
    cd <project_directory>
    ```

2.  **Install Composer dependencies:**

    ```bash
    composer install
    ```

3.  **Copy the `.env.example` file to `.env` and configure your database:**

    ```bash
    cp .env.example .env
    # Edit the .env file with your database credentials
    ```

4.  **Generate the application key:**

    ```bash
    php artisan key:generate
    ```

5.  **Run database migrations and seed:**
    ```bash
    php artisan migrate:fresh --seed
    ```
6.  **Serve the application:**
    ```bash
    php artisan serve
    ```
7.  **Admin Login Credentials:**
    Admin Email: admin@example.com
    Password: 12345678
8.  **user Login Credentials:**
    user Email: customer@example.com
    Password: 12345678

## Accessing the Application

### 1. Admin Users

**Login Page:**  
Admins can log in via the `/login` route using the pre-seeded credentials.

**After Login:**  
They are redirected to the **Admin Panel**, where they can:

- Create new services  
- Update or delete existing services  
- View all service bookings made by customers  

 **Note:** Admin must be authenticated using a token (via **Laravel Sanctum**) to access booking-related API routes.

---

### 2. Users

**Register Page:**  
New users can register via the `/register` endpoint or page.

**Login Page:**  
Existing customers can log in via the `/login` route.

**After Login:**  
They are redirected to the **User Panel**, where they can:

- Browse available services  
- Book a service for a specific date  
- View and manage their own bookings  

**Note:** Customers must be authenticated using a token (via **Laravel Sanctum**) to access booking-related API routes.
