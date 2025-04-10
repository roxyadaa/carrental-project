
# Car Rental System - Laravel Web Application

Welcome to the Car Rental System! This is a web application built with the Laravel framework, designed to provide a smooth experience for managing car rentals. Whether you're a user looking to book a car or an admin managing rentals, this application has all the necessary features to simplify the process.

![alt text](/public/git-image.png)

## Key Features

-   User Registration & Authentication
    Users can sign up, log in, and manage their account details with a secure authentication system.

-   Car Listings & Management
    Users can browse through a variety of cars, view details, and make bookings. Admins have the ability to add, edit, or remove cars from the inventory.

-   Rental Booking & Management
    Users can book cars for specific dates, while admins can manage booking details, view users' booking history, and handle car availability.

-   Admin Dashboard
    Admins can manage users, cars, and bookings through an easy-to-use backend interface.

## Installation Guide

1. Clone the repository: `git clone https://github.com/roxyadaa/carrental-project.git`

2. Navigate to the project directory: `cd carrental-project`

3. Install the dependencies using Composer: `composer install`

4. Create a copy of the `.env.example` file and rename it to `.env`. Configure the database settings in the `.env` file.

<!-- 5. Generate an application key: `php artisan key:generate` -->

5. Run the database migrations: `php artisan migrate`

6. Seed database cars table: `php artisan db:seed --class=CarSeeder`

7. Seed the database users table with a Demo admin: `php artisan db:seed --class=adminDemo` (login as admin at '/admin')

8. `npm install` && `npm run dev`

9. Create the symbolic link: `php artisan storage:link`

10. Start the development server: `php artisan serve`

11. Visit `http://localhost:8000` in your browser to access the application.

## Usage

-   User:
-   Register a new user or log in with your existing credentials.
-   Explore the available cars and their details.
-   Make a booking by selecting a car and providing the required information.

-   Admin:
-   Admin users can access the admin panel by visiting `http://localhost:8000/admin` and using their credentials.
-   Admins can manage cars, bookings, and users through the admin panel.

## Contributing

Contributions are welcome! If you encounter any issues or have suggestions, feel free to open an issue or submit a pull request.
