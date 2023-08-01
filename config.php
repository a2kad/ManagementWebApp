<?php
define('HOST', 'localhost');
define('DATABASE', 'web_app');
define('USER_DATABASE', 'root');
define('PASSWORD_DATABASE', '');
define('REGEX_NAME', '/^[a-zA-ZÀ-ÖØ-öø-ÿ\' -]+$/');
define('REGEX_TEL', '/\d{10}/');
define('REGEX_EMAIL', '/^[a-zA-Z0-9.!#$%&’*+=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/');
define('REGEX_PASSWORD', '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/');
define('RECAPTCHA_URL', 'https://www.google.com/recaptcha/api/siteverify');
define('RECAPTCHA_KEY', '6LcBfW0nAAAAAJpA4Kl98PHnzNW7Z96hZbR3wVjh');