<?php

session_start();
session_destroy();
header('location:../homePage/home_page.php');
