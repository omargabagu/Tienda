<html>
    <head>
    <title>
        Tienda Omar
    </title>
</head>
    <body>
        <h1 style="color: green;">
            Ver inventario
        </h1>
    <div class="container-inventory">
        <?php
			    include("conection.php");
			    $res = mysqli_query($conn,"SELECT * FROM tablaproductos WHERE 1");
                foreach($res as $pr){
                    echo '<div class="item">';
                    
                    echo '<div class="info-product">';
                    echo '<h2 class ="pid">ID: '.$pr['product-id'].'</h2>';
                    echo '<p>Nombre del producto:'.$pr['product-name'].'</p>';
                    echo '<p class="price">Precio: $'.$pr['product-price'].'</p>';
                    echo '<id class ="pid">Stock: '.$pr['product-stock'].'</id>';
                    echo '</div>';
                	echo '</div>';
                }
               
            ?>
            <h1 style="color: green;">
                Editar inventario
            </h1>
            <form action="update.php" method="POST" enctype="multipart/form-data">
                <input type="number"    name="ID" placeholder="ID...."step="0.01" required><br/>
                <input type="text"      name="Nombre" placeholder="Nombre...." value=""required/><br/>
                <input type="number"    name="Precio" placeholder="Precio...."step="0.01" required><br/>
                <input type="number"    name="Stock" placeholder="Stock...."step="1" required><br/>
                <input type="file"      name="Imagen"/>
                <input type="submit" nombre="Actualizar"/>


    </form>
			
			
            
			<?php mysqli_close($conn);?>
		</div>
	</body>
</html>