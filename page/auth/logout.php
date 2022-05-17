<?php

session_unset();
session_destroy();

// redirect to page auth file login.php
header('location: ' . page('auth', 'login'));
