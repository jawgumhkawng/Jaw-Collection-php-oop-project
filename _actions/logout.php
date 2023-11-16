<?php
session_start();

unset( $_SESSION['user'] );

header('location: ../sign_in.php');