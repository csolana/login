<?php

$con = mysqli_connect('localhost', 'carlos', 'general12345', 'login_db');

//this is to count the records inside a table
function row_count($result) {
    return mysqli_num_rows($result);
}


//a function so we can clean our data, we pass the $string and $con
function escape($string) {
    global $con;
    mysqli_real_escape_string($con, $string);
}

//pass the query on $query
function query($query) {
    //global function so don't type $con and $query every time
    global $con;
    return mysqli_query($con, $query);
}

function confirm($result) {
global $con;

if(!$result) {

    die("QUERY FAILED". mysqli_error($con));
}


}


//to fetch data
function fetch_array($result) {
    global $con;

    return mysqli_fetch_array($result);
}























?>