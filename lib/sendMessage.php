<?php
include_once 'lib/include.php';

$userid = $_SESSION['userid'];
$message = $_GET['message'];
$type = 0;
if(str_starts_with($message, "/roll"))
{
    $message = rand(0, 100);
    $type = 1;
}

$charInsertResult = $mysql->query("INSERT INTO chat (userid, message_text, message_type) VALUES ('$userid', '$message', '$type')");
