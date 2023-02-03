<div class="container-items">
			
			<?php
			    include("include/conection.php");
			    $res = mysqli_query($conn,"SELECT * FROM tablaproductos WHERE 1");
                foreach($res as $pr){
                    echo '<div class="item">';
                    
                    echo '<figure>';
                    echo '<img';
                    echo '  src="data:image/png;base64,'.base64_encode($pr['product-img']).'"';
                    echo '  alt="producto"';
                    echo '/>';
                    echo '</figure>';
                    echo '<div class="info-product">';
                    echo '<h2>'.$pr['product-name'].'</h2>';
                    echo '<p class="price">$'.$pr['product-price'].'</p>';
                    echo '<button class="btn-add-cart">Añadir al carrito</button>';
                    echo '<id class hidden="pid">'.$pr['product-id'].'</id>';
                    echo '</div>';	
                	echo '</div>';	
                }
                mysqli_close($conn);
            ?>
            
			
		</div>
		<script src="index.js"></script>
	</body>
</html>
