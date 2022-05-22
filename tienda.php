<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="shop-online, carrito de compras">
    <meta name="author" content="Hiramatsu Maria Jose">
    <meta name="copyright" content="Hiramatsu Maria Jose">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="template/estilo.css">

    <!--bootstrap-->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Bootstrap 4</title>

</head>
<body>
    <?php
    include("header.php");
    ?>
<section class="container">
    <div class="row">
       <div class="col-sm-12">
            <?php
                include("recursos.php");
                $listar = $producto->seleccionarProductos();
                    for($i=0; $i<count($listar); $i++){
            ?>
            <div class="card mb-10 bg-light text-dark">
                <div class="row no-gutters bg-light text-dark">
                    <div class="col-md-4 bg-light text-dark">
                        <img src="vista.php?id=<?php echo $listar[$i]['id_producto']; ?>" alt="..." width="50%">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body bg-light text-dark">
                            <h5 class="card-title bg-light text-dark">Producto Disponible: </h5>
                            <p class="card-text bg-light text-dark">
                                <?php
                                    echo $listar[$i]['detalle'];
                                ?>
                            </p>
                            <p class="card-text bg-light text-dark">
                                Precio por Unidad: $
                                <?php
                                echo $listar[$i]['precioUnitario'];
                                ?>
                            </p>
                            <a href="carritoCompras.php">
                            <button type="button" class="btn btn-outline-info">Ir a la tienda
                            </button>
                            </a>
                            <p class="card-text bg-light text-dark"><small class="text-muted ">
                                Cantidad disponibles: 
                                <?php
                                    echo $listar[$i]['cantidad'];
                                ?>
                            </small></p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <?php
            }
            ?>
        </div>
    </div>
</section>
<?php
include("footer.php");
?>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
</body>
</html>