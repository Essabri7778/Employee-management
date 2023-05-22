<?php
session_start();
//require_once('./bootstrap.php');

spl_autoload_register(function ($class_name) {
   require 'database/'.$class_name .'.php';
});