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
        <div class="col-12">
        <p>
            Simulación de una tienda virtual con PHP y conexión a la base de datos en MySQL, trae los productos disponibles para venderse. A la derecha de la pantalla se va sumando el total de los productos que se van seleccinando y al finalizar la compra solicitará que se cargue los datos del usuario en un formulario que mas tarde emitirá en una factura de tipo PDF con librería FPDF. 
        </p>
        </div>

    </div>
</section>


<section class="container">
<div class="row">
    <div class="col-md-8">
        <div class="card bg-transparent text-dark">
            <div class="card-body bg-transparent text-dark">
            <h3>Seleccione el producto</h3>
            </div>
        </div>
    

        <?php
            include("recursos.php");
            $listar = $producto->seleccionarProductos();
            for($i=0; $i<count($listar); $i++){
        ?>

        <div class="row">
            <br>
            <div class="col-sm-12">
            <br>
                <div class="card bg-light text-dark">
                    <div class="card-body bg-transparent text-dark">
                        <h5 class="card-title">
                            <?php
                                echo $listar[$i]['detalle'];
                            ?>
                        </h5>
                        <img src="vista.php?id=<?php echo $listar[$i]['id_producto'] ?>" class="rounded float-right" width="30%">
                        <p class="card-text">
                            Código Producto: 
                                <?php
                                    echo $listar[$i]['id_producto'];
                            ?>
                        </p>
                        <p class="card-text">
                            Precio por Unidad: $
                                <?php
                                    echo $listar[$i]['precioUnitario'];
                                ?>
                        </p>
                        <a href="carrito.php?id=<?php echo $listar[$i]['id_producto'] ?>" class="btn btn-primary">Agregar al carrito</a>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
    
    <div class="col-md-4">
        <div class="col-sm-12">
        <div class="card bg-transparent text-dark">
            <div class="card-body bg-transparent text-dark">
                <h2>Tu Carrito</h2>
            </div>
        </div>
        <br>
        <div class="card bg-light text-dark">
            <div class="card-body bg-light text-dark">
                <p>
                <a href="formCompra.php">
                <button type="button" class="btn btn-outline-success">Finalizar Compra</button></a></p>
        
                <p>
                <a href="tienda.php">
                <button type="button" class="btn btn-outline-danger">Cancelar Compra</button></a>
                </p>
            </div>
        </div>
    
        <?php
                $listado = $operacion->mostrarVenta();
                if($listado){
                    for ($i=0; $i <count($listado) ; $i++) { 
            ?>
            <br>
        <div class="card bg-light text-dark">
            <div class="card-header bg-light text-dark">
                Nro Operacion: 
                <?php
                    echo $listado[$i]['id_operacion'];
                ?>
            </div>
            <div class="card-body bg-transparent text-dark">
                <h5 class="card-title">
                <?php
                    echo $listado[$i]['detalle'];
                ?>
                </h5>
                <p class="card-text">
                    Precio: $
                    <?php
                        echo $listado[$i]['total'];
                    ?>
                </p>
                <a href="eliminarCarrito.php?clave=<?php echo $listado[$i]['id_operacion'] ?>" class="btn btn-primary">Eliminar</a>
            </div>
        </div>
        <?php
        }
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