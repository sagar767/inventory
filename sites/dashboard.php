<?php
header('Content-Type: application/json');

$con = mysqli_connect("localhost","root","personal12345","inventory");

 // Check connection
if (mysqli_connect_errno($con))
{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
}else
{
    $data_points = array();
    
    $result = mysqli_query($con, "SELECT * FROM product");
    
    while($row = mysqli_fetch_array($result))
    {        
        $point = array("label" => $row['prd_name'] , "y" => $row['prd_base_price']);
        
        array_push($data_points, $point);        
    }
    
    echo json_encode($data_points, JSON_NUMERIC_CHECK);
}
mysqli_close($con);

?>
