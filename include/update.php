<?php
    include("conection.php");
    $pID = $_POST['ID'];
    $pname = $_POST['Nombre'];
    $pprice = $_POST['Precio'];
    $pstock = $_POST['Stock'];
    $pimg = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
    $sql="UPDATE `tablaproductos` SET `product-name` = '$pname', `product-price` = '$pprice', `product-stock` = '$pstock', `product-img` = '$pimg' WHERE `tablaproductos`.`product-id` = $pID ;";
    
    $res = $conn->query($sql);
    
    if($res){
        echo "Se insertó";
    }else{
        echo "NO se insertó";
    }
    
    
    mysqli_close($conn);
?>