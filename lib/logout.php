<?php
  include_once 'lib/include.php';

session_unset();

session_destroy();

header('Location: /index.php');