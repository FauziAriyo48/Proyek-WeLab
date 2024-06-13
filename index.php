<?php

if (isset($_SESSION['log'])) {
} else {
    header('location:homePage/home_page.php');
}