<?php
include('db.php');
if($_POST)
{
    $q = mysqli_real_escape_string($connection,$_POST['search']);
    $strSQL_Result = mysqli_query($connection,"select id_doctor,nombre_doctor,ciudad_doctor from tb_doctores where nombre_doctor like '%$q%' or ciudad_doctor like '%$q%' order by nombre_doctor LIMIT 5");
    while($row=mysqli_fetch_array($strSQL_Result))
    {
        $nombre_doctor   = $row['nombre_doctor'];
        $ciudad_doctor      = $row['ciudad_doctor'];
        $b_nombre_doctor = '<strong>'.$q.'</strong>';
        $b_ciudad_doctor    = '<strong>'.$q.'</strong>';
        $final_nombre_doctor = str_ireplace($q, $b_nombre_doctor, $nombre_doctor);
        $final_email = str_ireplace($q, $b_ciudad_doctor, $ciudad_doctor);
        ?>
            <div class="show" align="left">
                <img src="27301_312848892150607_553904419_n.jpg" style="width:50px; height:50px; float:left; margin-right:6px;" /><span class="name"><?php echo $final_username; ?></span>&nbsp;<br/><?php echo $final_email; ?><br/>
            </div>
        <?php
    }
}
?>