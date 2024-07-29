<?php


// Set secure session cookie attributes (HTTPS only, HttpOnly flag)
ini_set('session.cookie_secure', true);
ini_set('session.cookie_httponly', true);

// Set garbage collection max lifetime (1 hour of inactivity)
ini_set('session.gc_maxlifetime', 3600);

// Regenerate session ID after a certain time (mitigate session hijacking)
ini_set('session.regenerate_freq', 1800); // Regenerate every 30 minutes

// Use cookies only for session storage (prevent alternative methods)
ini_set('session.use_only_cookies', true);

session_start();

if (!isset($_SESSION['LoginEmail'])) {
    header("Location: auth-login.php");
    exit;
}