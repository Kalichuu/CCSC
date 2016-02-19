<?php
/**
 * Created by PhpStorm.
 * User: Kali
 * Date: 19/02/2016
 * Time: 13:44
 */

ini_set('display_errors', true);
error_reporting(-1); // show all errors

session_start();

include_once('classes/dbConnection.php');

$dbConn = pdoDB::getConnection();

include_once('classes/user.php');

$user = new User ($dbConn);

