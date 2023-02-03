<?php
    include("conection.php");
    $pid = $_POST['IdProducto'];
    $pprice = $_POST['Precio'];
    $pquant = $_POST['Cantidad'];
    $pbuyer = $_POST['Comprador'];
    $pbmail = $_POST['Mail'];
    $pbadr = $_POST['Adress'];
    echo $pid;
    $query0 ="SELECT * FROM tablaproductos WHERE 1=1";
    $res0 = mysqli_query($conn,$query0);
    $esxists=0;
    $available=0;
    $stock=0;
    echo $pid.'==';
    if($res0){
        foreach($res0 as $pr){
            
            if ( $pid == $pr['product-id']){
                $thisID=$pr['product-id'];
                $pprice=$pr['product-price'];
                $available=$pr['product-stock'];
                echo "Existe.... ";
                $esxists=1;
                if($available>=$pquant){
                    $updated=$available-$pquant;
                    mysqli_query($conn,"UPDATE `tablaproductos` SET `product-stock` = $updated WHERE `tablaproductos`.`product-id` = $thisID");
                    $stock=1;
                }
                
            }
        }
        if ($esxists){
            if ($stock==1){
                $query = "INSERT INTO `tablaventas` (`sale-id`, `product-id`, `sale-price`, `sale-quantity`, `buyer`, `buyer-mail`, `buyer-adress`) VALUES (NULL, '$pid', '$pprice', '$pquant', '$pbuyer','$pbmail','$pbadr')";
                $res = $conn->query($query);
                if($res){
                    echo "Se insertó";
                }else{
                    echo "NO se insertó";
                }
            }else{
                echo "No hay suficcientes productos en existencia";
            }
        }else{
            echo "NO existe el producto";
        }
        
    }
    else{
        echo "Error";
    }
   
 
    
    mysqli_close($conn);
?>