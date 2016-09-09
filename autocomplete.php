<?php
    $connection = mysqli_connect("localhost","herasosj_hera","Papa020432","herasosj_hera") or die("Error " . mysqli_error($connection));

    //fetch department names from the department table
    $sql = "select nombre_doctor from tb_doctores";
    $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));

    $dname_list = array();
    while($row = mysqli_fetch_array($result))
    {
        $dname_list[] = $row['nombre_doctor'];
    }
    echo json_encode($dname_list);
?>