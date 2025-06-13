# ETamu - Guest Reservation and Management System

ETamu is a guest reservation and management system designed to streamline the visit management process in government institutions. The system allows guests to make online reservations and provide feedback through questionnaires after their visits.

## Technology Stack

- **Backend**: PHP 8.x, Laravel 10.x
- **Frontend**: HTML, Tailwind CSS, JavaScript
- **Database**: MySQL
- **Authentication**: Laravel Breeze

## System Requirements

- PHP >= 8.1
- Composer
- MySQL >= 8.0
- Node.js & NPM
- Web Server (Apache/Nginx)

## Installation

1. Clone repository
```bash
git clone https://github.com/Mifaki/ETamu.git
cd etamu
```

2. Install dependencies
```bash
composer install
npm install
```

3. Setup environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure database in `.env` file
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=etamu
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. Run migrations and seeders
```bash
php artisan migrate --seed
```

6. Compile assets
```bash
npm run dev
```

7. Start development server
```bash
php artisan serve
```

8. Access the application
- Open your browser and navigate to `http://localhost:8000`
  
## Database Structure

### Main Tables
- `users` - System users data
- `reservations` - Visit reservation data
- `questionnaires` - Questionnaire and feedback data
- `guest_categories` - Guest categories
- `guest_purposes` - Visit purposes
- `field_purposes` - Field purposes
- `regional_devices` - Regional devices

## Usage

### Reservation Process
1. Guest accesses the main page
2. Fills out the reservation form with complete data
3. Selects visit time
4. Uploads supporting documents (ID Card/Organization Document)
5. Waits for admin confirmation

### Questionnaire
1. After the visit, guests can fill out the questionnaire
2. Provide ratings for:
   - Staff service
   - Facility cleanliness
   - Facility availability
3. Provide suggestions and feedback

### Admin Dashboard
1. Login as admin
2. Manage reservations
3. View and analyze questionnaires
4. Manage master data (categories, purposes, etc.)

### Users and Roles
The system includes three roles with different permissions:

1. **Super Admin**
   - Email: superadmin@example.com
   - Username: superadmin
   - Password: password123

2. **Admin OPD** (Regional Device Admin)
   - Email: adminopd1@opd.com
   - Username: adminopd1
   - Password: password123
   - Email: operator1@opd.com
   - Username: operator1
   - Password: password123

3. **Pengunjung** (Guest)
   - Email: pengunjung@example.com
   - Username: pengunjung1
   - Password: password123