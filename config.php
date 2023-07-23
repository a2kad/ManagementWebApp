<?php
define('HOST', 'localhost');
define('DATABASE', 'web_app');
define('USER_DATABASE', 'root');
define('PASSWORD_DATABASE', '');
define('REGEX_NAME', '/^[a-zA-ZÀ-ÖØ-öø-ÿ\' -]+$/');
define('REGEX_TEL', '/\d{10}/');
define('REGEX_EMAIL', '/^[a-zA-Z0-9.!#$%&’*+=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/');
define('REGEX_PASSWORD', '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/');