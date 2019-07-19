<?php
/**
 * Created by PhpStorm.
 * User: jamesskywalker
 * Date: 02/06/2019
 * Time: 19:29
 */

session_start();

$reporting = isset($_SESSION['DEBUG'])? E_ALL : 0;

require_once('globals.php');
require_once('private/LetsGetItOn.php');
new letsGetItOn();