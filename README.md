# Kids Learning Backend

A comprehensive educational platform backend designed specifically for children's learning experiences. This Laravel-based backend supports interactive learning modules, progress tracking, and engaging educational content delivery.

## 🚀 Features

- Interactive Learning Modules
  - Age-appropriate content delivery
  - Progress tracking and achievements
  - Parent/Teacher dashboard integration
  - Learning path customization

- Educational Content Management
  - Course and lesson management
  - Multimedia content support
  - Assessment and quiz system
  - Learning analytics

- User Management
  - Student profiles and progress tracking
  - Parent/Teacher accounts
  - Role-based access control
  - Secure authentication

- Technical Features
  - Laravel 12.x backend framework
  - Modern frontend build with Vite
  - Tailwind CSS for responsive design
  - Bootstrap 5 components
  - RESTful API architecture
  - SQLite database (default)
  - Comprehensive testing setup with PHPUnit
  - Development tools including Laravel Sail and Laravel Pail

## 📋 Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js and npm
- SQLite (or your preferred database)

## 🛠️ Installation

1. Clone the repository:
```bash
git clone [repository-url]
cd kids-learning-backend
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install JavaScript dependencies:
```bash
npm install
```

4. Create environment file:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Create database:
```bash
touch database/database.sqlite
```

7. Run migrations:
```bash
php artisan migrate
```

## 🚀 Development

Start the development server:
```bash
composer dev
```

This will start:
- Laravel development server
- Queue listener
- Log watcher
- Vite development server

## 🧪 Testing

Run the test suite:
```bash
composer test
```

## 📦 Production Build

Build the frontend assets for production:
```bash
npm run build
```

## 🔧 Configuration

- Environment variables are stored in `.env` file
- Database configuration can be modified in `.env`
- Frontend configuration is in `vite.config.js`
- Tailwind CSS configuration can be found in `tailwind.config.js`

## 📁 Project Structure

```
├── app/              # Application core
├── bootstrap/        # Framework bootstrap files
├── config/          # Configuration files
├── database/        # Database migrations and seeders
├── public/          # Publicly accessible files
├── resources/       # Frontend resources
├── routes/          # Application routes
├── storage/         # Application storage
├── tests/           # Test files
└── vendor/          # Composer dependencies
```



This project is licensed under the MIT License - see the LICENSE file for details.

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

For support, please open an issue in the repository or contact the maintainers.
