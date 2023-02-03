<?php
    include("conection.php");
    $pname = $_POST['Nombre'];
    $pprice = $_POST['Precio'];
    $pstock = $_POST['Stock'];
    $pimg = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
   
    $query = "INSERT INTO `tablaproductos` (`product-id`, `product-name`, `product-price`, `product-stock`, `product-img`) VALUES (NULL, '$pname', '$pprice', '$pstock', '$pimg')";
    $res = $conn->query($query);
    
    if($res){
        echo "Se insertó";
    }else{
        echo "NO se insertó";
    }
    
    
    mysqli_close($conn);
?>