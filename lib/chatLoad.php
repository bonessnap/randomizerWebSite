<?php
include_once 'lib/include.php';


$messagesQuery = $mysql->query("SELECT * FROM chat JOIN users ON users.userid = chat.userid ORDER BY message_id LIMIT 50");
$messages = $messagesQuery->fetch_all(MYSQLI_ASSOC);

echo json_encode($messages);