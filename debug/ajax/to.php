<?php
include_once 'lib/include.php';

$userid = $_SESSION['userid'];
$message = $_GET['message'];

$charInsertResult = $mysql->query("INSERT INTO chat (userid, message_text) VALUES ('$userid', '$message')");

if ($charInsertResult) {
  echo 'inserted to DB';
} else {
  echo 'error inserting to DB';
}
