<?php 

if (session_status() === PHP_SESSION_NONE) {
   session_start();
}

require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/Database.php';
require_once 'core/Flasher.php';

require_once 'core/config/config.php';