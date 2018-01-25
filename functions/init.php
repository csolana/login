<?php
//start output buffering, mainly used for redirection
ob_start();

//start session so its available in all our application, so we must start it in init.php
session_start();

include ("functions.php");
include("db/db.php");













?>