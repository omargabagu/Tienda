<html>
    <head>
    <title>
        Tienda Omar
    </title>
</head>
    <body>
        <h1 style="color: green;">
            Lista de ventas
        </h1>
    <div class="container-sales">
			
			<?php
			    include("conection.php");
			    $res = mysqli_query($conn,"SELECT * FROM tablaventas WHERE 1");
                foreach($res as $pr){
                    echo '<div class="sale">';
                    echo '<div class="info-sale">';
                    echo '<h2 class="saleID">Folio de venta: '.$pr['sale-id'].'</h2>';
                    echo '<p class="productID">Codigo del producto: '.$pr['product-id'].'</p>';
                    echo '<p class="salePrice">Pago por unidad: $'.$pr['sale-price'].'</p>';
                    echo '<p class="saleCuantity">Unidades: '.$pr['sale-quantity'].'</p>';
                    echo '<p class="saleCuantity">Correo del comprador: '.$pr['buyer-mail'].'</p>';
                    echo '<p class="saleCuantity">Dirección de entrega: '.$pr['buyer-adress'].'</p>';
                    echo '<p class="saleCuantity">A nombre de: '.$pr['buyer'].'</p>';
                    echo '</div>';	
                	echo '</div>';	
                }
                mysqli_close($conn);
            ?>
            
			
		</div>
	</body>
</html>