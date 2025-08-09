<?php
$con = mysqli_connect("localhost", "root", "", "agmsdb", 3307); // Using custom port 3307
if(mysqli_connect_errno()){
    echo "Connection Fail: " . mysqli_connect_error();
}
?>