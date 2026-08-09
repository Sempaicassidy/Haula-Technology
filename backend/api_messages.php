<?php
require_once __DIR__ . '/db.php';

$action = $_GET['action'] ?? $_POST['action'] ?? 'list';

switch ($action) {
    // 1. Submit New Contact Inquiry from Website
    case 'submit':
        $raw = file_get_contents('php://input');
        $input = json_decode($raw, true) ?? $_POST;

        $name = trim($input['name'] ?? '');
        $email = trim($input['email'] ?? '');
        $dept = trim($input['dept'] ?? 'General');
        $msg = trim($input['msg'] ?? '');

        if (!$name || !$email || !$msg) {
            jsonResponse(['status' => 'error', 'message' => 'Please provide name, email, and message.'], 400);
        }

        $stmt = $pdo->prepare("INSERT INTO `contact_messages` (`name`, `email`, `dept`, `msg`) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $dept, $msg]);

        jsonResponse([
            'status' => 'success',
            'message' => 'Inquiry submitted successfully! Our leadership team will contact you shortly.',
            'id' => $pdo->lastInsertId()
        ]);
        break;

    // 2. Delete Message by ID
    case 'delete':
        $id = intval($_GET['id'] ?? $_POST['id'] ?? 0);
        if ($id > 0) {
            $stmt = $pdo->prepare("DELETE FROM `contact_messages` WHERE `id` = ?");
            $stmt->execute([$id]);
            jsonResponse(['status' => 'success', 'message' => 'Message deleted successfully.']);
        }
        jsonResponse(['status' => 'error', 'message' => 'Invalid message ID.'], 400);
        break;

    // 3. Clear All Inbox Messages
    case 'clear':
        $pdo->exec("TRUNCATE TABLE `contact_messages`");
        jsonResponse(['status' => 'success', 'message' => 'All inbox messages cleared successfully.']);
        break;

    // 4. List Messages with Optional Live Search Filter
    case 'list':
    default:
        $search = trim($_GET['search'] ?? '');
        if ($search !== '') {
            $stmt = $pdo->prepare("
                SELECT * FROM `contact_messages`
                WHERE `name` LIKE ? OR `email` LIKE ? OR `dept` LIKE ? OR `msg` LIKE ?
                ORDER BY `id` DESC
            ");
            $like = "%{$search}%";
            $stmt->execute([$like, $like, $like, $like]);
        } else {
            $stmt = $pdo->query("SELECT * FROM `contact_messages` ORDER BY `id` DESC");
        }
        $messages = $stmt->fetchAll();
        jsonResponse(['status' => 'success', 'data' => $messages, 'count' => count($messages)]);
        break;
}
