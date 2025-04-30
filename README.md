# Kids Learning Backend

A comprehensive educational platform backend designed specifically for children's learning experiences. This Laravel-based backend supports interactive learning modules, progress tracking, and engaging educational content delivery.

## 🚀 Features

- Interactive Learning Games
  - Letter recognition and pronunciation games
  - Number counting and matching games
  - Color identification and matching activities
  - Interactive lessons with difficulty levels (1-5)
  - Progress tracking and achievements

- Admin Dashboard & Content Management
  - Comprehensive admin dashboard
  - User management and role assignment
  - Content moderation tools
  - Media file management (voice recordings)
  - Lesson creation and editing
  - Content categorization system
  - Analytics and user tracking

- User Authentication & Management
  - Secure user registration
  - Email verification system
  - Password reset functionality
  - Role-based access control
  - User profile management
  - Session management

- Educational Content
  - Voice-based learning for letters
  - Number recognition with star ratings
  - Color learning with visual aids
  - Interactive lessons
  - Progress tracking system
  - Category-based content organization

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
