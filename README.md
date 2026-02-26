# Tourist Management System

A web-based Tourist Management System(TMS) developed in PHP that allows users to browse, book, and manage their tours online. It provides a user-friendly interface for browsing available tours, viewing details, making bookings, and managing personal profiles. The system also allows administrators to manage tours, bookings, and user information.

## Features

- **User Management**: Users can register, log in, and manage their profiles.
- **Tour Management**: Admins can add, update, and manage tour packages.
- **Booking System**: Users can book tours, view booking history, and issue tickets.
- **Enquiries**: Users can send enquiries for more information about tours.
- **Password Management**: Users can reset their passwords and manage security settings.

## Tech Stack

- **Frontend**: HTML5, CSS3 (Bootstrap), JavaScript
- **Backend**: PHP
- **Database**: MySQL (used for storing user data, bookings, tour packages, etc.)
- **Version Control**: GitHub for repository management

## Installation

### Prerequisites

- PHP (version 7.4 or higher)
- MySQL (or any relational database for backend storage)

### Setup

1. **Clone the repository**:
   ```bash
   git clone https://github.com/aniruddhasahaa/Tourist-Management-System.git
   ```

2. **Configure the Database**:

   * Create a new MySQL database and import the database schema (found in the `db.sql` file if provided, or create your own schema as per the needs).
   * Update the database credentials in the `conf.php` file.

   Example:

   ```php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'password');
   define('DB_DATABASE', 'tourism_db');
   ```

3. **Run the Application**:

   * After setting up the database and configurations, you can run the project by opening the `index.php` file in your web browser. Ensure you have a local PHP server running (e.g., using XAMPP, WAMP, or PHP built-in server).

4. **Access the Project**:

   * The home page can be accessed by navigating to `localhost/Tourist-Management-System/index.php`.

## Files and Directories

* **index.php**: The landing page of the website.
* **package-list.php**: Displays the list of available tour packages.
* **package-details.php**: Shows details for a selected tour package.
* **profile.php**: Displays and allows the user to manage their profile.
* **forgot-password.php**: Provides password recovery options.
* **enquiry.php**: Allows users to send queries or requests.
* **conf.php**: Contains the configuration for the database connection.
* **vendor/**: Contains dependencies (if any).

## User Features

* **User Registration**: Users can register for an account with basic information.
* **User Login**: Registered users can log in to access the tour booking system.
* **Tour Booking**: Users can browse tour packages, view details, and book tours.
* **Booking History**: Users can view their previous bookings.
* **Profile Management**: Users can update their profile and change their password.
* **Password Recovery**: Users can recover their forgotten password via email.

## Admin Features

* **Tour Management**: Admins can add, edit, and delete tour packages.
* **Booking Management**: Admins can view and manage all bookings made by users.
* **User Management**: Admins can view user profiles and manage user information.

## Future Enhancements

* **Multi-language Support**: Add support for multiple languages for a more global reach.
* **Payment Integration**: Add payment gateways for online booking payments.
* **Advanced Search**: Implement advanced search options based on categories like location, price range, and dates.
--

---

Feel free to reach out for any queries or improvements to this system!
