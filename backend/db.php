<?php
/* ==========================================================================
   HAULA ENTERPRISES — PRODUCTION BACKEND ENGINE (PHP 8.3 + LARAVEL ARCHITECTURE)
   DATABASE CONNECTION & AUTOMATIC MIGRATION DISPATCHER
   ========================================================================== */

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$dbHost = '127.0.0.1';
$dbPort = '3306';
$dbName = 'haula_db';
$dbUser = 'root';
$dbPass = '';

try {
    $pdo = new PDO("mysql:host={$dbHost};port={$dbPort};dbname={$dbName};charset=utf8mb4", $dbUser, $dbPass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Database Connection Failed: ' . $e->getMessage()
    ]);
    exit();
}

/**
 * Automatically run schema migrations if tables do not exist.
 */
function runMigrations($pdo) {
    // 1. Contact Messages Table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `contact_messages` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `name` VARCHAR(191) NOT NULL,
            `email` VARCHAR(191) NOT NULL,
            `dept` VARCHAR(100) NOT NULL,
            `msg` TEXT NOT NULL,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");

    // 2. Divisions Table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `divisions` (
            `key` VARCHAR(50) PRIMARY KEY,
            `title` VARCHAR(191) NOT NULL,
            `icon` VARCHAR(20) DEFAULT '🏢',
            `status` ENUM('live', 'loader', 'disabled') DEFAULT 'loader',
            `subtitle` TEXT NULL,
            `is_custom` TINYINT(1) DEFAULT 0,
            `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");

    // 3. Software Products Table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `software_products` (
            `key` VARCHAR(50) PRIMARY KEY,
            `title` VARCHAR(191) NOT NULL,
            `icon` VARCHAR(20) DEFAULT '⚡',
            `status` ENUM('live', 'disabled') DEFAULT 'live',
            `description` TEXT NULL,
            `specs_json` LONGTEXT NULL,
            `is_custom` TINYINT(1) DEFAULT 0,
            `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");

    // 4. Strategic Partners Table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `strategic_partners` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `icon` VARCHAR(20) NOT NULL,
            `name` VARCHAR(191) NOT NULL,
            `scope` VARCHAR(191) NOT NULL,
            `sort_order` INT DEFAULT 0
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");

    // 5. Corporate Settings Table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `corporate_settings` (
            `setting_key` VARCHAR(50) PRIMARY KEY,
            `setting_value` TEXT NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");
}

runMigrations($pdo);

function jsonResponse($data, $statusCode = 200) {
    http_response_code($statusCode);
    echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit();
}
