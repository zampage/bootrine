<?php

unset($_SESSION['user']);
header('location:'.ROOT.'home');
exit();