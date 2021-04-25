<?php
    $conn = mysqli_connect("localhost", "student", "gkrtod123", "study");

    echo mysqli_error($conn);

    print_r($conn);
    

?>