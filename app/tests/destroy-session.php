<?php
$config = require '../config/config.php';
require_once '../classes/connectDb.php';
require_once '../classes/SessionManager.php';

$session = new SessionManager();

if($session->isValid())
{
  session_destroy();
}

