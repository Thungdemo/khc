# Gauhati High Court Kohima Bench - Portal System

A comprehensive web portal system for Gauhati High Court Kohima Bench built with Laravel and Vite.

## Features

- **Notice Management**: Categorized notices, circulars, and announcements
- **Activity Management**: Court activities and events with photo galleries
- **Calendar System**: Holiday calendar with national and restricted holidays
- **User Management**: Admin panel for content management

## Technology Stack

- **Backend**: Laravel 12.x
- **Frontend**: Blade Templates, Bootstrap 5, Alpine.js
- **Build Tool**: Vite
- **Database**: MySQL
- **Package Manager**: Composer, NPM

## Production Deployment Guide (One time)

Follow these step-by-step instructions to deploy the application to production.

### Server Requirements

Ensure your production server meets these requirements:

- **PHP**: 8.2 or higher
- **Composer**: Latest version
- **Node.js**: 18.x or higher
- **NPM**: 9.x or higher
- **Database**: MySQL 8.0+ or PostgreSQL 13+
- **Web Server**: Apache or Nginx

### Clone and Setup

```bash
# Clone the repository
git clone ssh://u421469512@185.232.14.209:65002/home/u421469512/REPO/khc.git
cd khc
# Install PHP dependencies
composer install --optimize-autoloader --no-dev
# Install Node.js dependencies
npm install
```

### Environment Configuration

```bash
# Copy environment file
cp .env.example .env
# Generate application key
php artisan key:generate
```
Edit `.env` file with production settings:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

# Database Configuration
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Cache Configuration
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync

# Mail Configuration (if needed)
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-server
MAIL_PORT=587
MAIL_USERNAME=your-email
MAIL_PASSWORD=your-password
```

### Database Setup

```bash
# Run database migrations
php artisan migrate --force
# Seed the database (optional)
php artisan db:seed --force
```
### Build Assets for Production (Required every time you change css and js)
```bash
# Build and optimize assets
npm run build
```

### Storage and Permissions

```bash
# Create symbolic link for storage
php artisan storage:link
# Set proper permissions
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### Cron Jobs (Optional)

Add Laravel scheduler to crontab:

```bash
# Edit crontab
crontab -e
# Add this line
* * * * * cd /path/to/khc && php artisan schedule:run >> /dev/null 2>&1
```
Replace `/path/to/khc` to the full path to your actual project in the server

### Create an Admin User (via Tinker)

To create an admin user manually, use Laravel Tinker:

```bash
cd /path/to/project
php artisan tinker
```

Then run the following in the Tinker shell:

```php
$user = new \App\Models\User();
$user->name = 'Admin';
$user->email = 'admin@example.com';
$user->password = bcrypt('yourpassword'); // Change to a secure password
$user->save();
$user->roles()->attach(1);
```

Adjust the fields as needed for your user model and roles.

## Security TODO LIST

- Hide powered by php in production server
- Use strong server and database passwords
- Implement proper backup policies. Backup folder `storage/app` and database at least weekly.

### Increase PHP Upload Limit (50MB)

To allow uploads up to 50MB, update your `php.ini` file:

1. Find your `php.ini` file location. You can run:

	```bash
	php --ini
	```

2. Edit `php.ini` and set:

	```ini
	upload_max_filesize = 50M
	post_max_size = 50M
	```

3. Restart your Apache web server:

	```bash
	sudo systemctl restart apache2
	```

This will allow file uploads up to 50MB in your Laravel application.
