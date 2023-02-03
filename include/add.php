<html>
<head>
    <title>
        Tienda Omar
    </title>
</head>
<body>
    <h1 style="color: green;">
            Añadir un producto
        </h1>
    <form action="save.php" method="POST" enctype="multipart/form-data">
        <input type="text"      name="Nombre" placeholder="Nombre...." value="" required/><br/>
        <input type="number"    name="Precio" placeholder="Precio...."step="0.01" required ><br/>
        <input type="number"    name="Stock" placeholder="Stock...."step="1"required ><br/>
        <input type="file"      name="Imagen"/>
        <input type="submit" nombre="Aceptar"/>


    </form>
</body>
</html>