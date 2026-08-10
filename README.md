# Haula Technology

This is the repository for Haula Technology & Enterprises. Developers interested in contributing to the development of this community are welcome!

## About Haula Platform
Haula Enterprises platform includes web interfaces, business portals (TechHub, Trading, Transportation, Security), and Laravel backend services.

## Getting Started

### Prerequisites
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL / MariaDB

### Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/Sempaicassidy/Haula-Technology.git
   cd Haula-Technology
   ```
2. Install PHP dependencies:
   ```bash
   composer install
   ```
3. Setup environment configuration:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Run migrations:
   ```bash
   php artisan migrate
   ```
5. Serve the application:
   ```bash
   php artisan serve
   ```

## License
Licensed under the [MIT license](LICENSE).
