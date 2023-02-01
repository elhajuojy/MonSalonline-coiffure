<?php 


// destroy the cookie and redirect to login page

// set the expiration date to one hour ago
setcookie("user", "", time() - 3600);
