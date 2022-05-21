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
    
<section class="container">
<div class="row">
<div class="col-10">
    <h1>Carrito de Compras<h1>
</div>
<div class="col-2">
    <img src="template/icono.webp" width="50%">
</div>
</div>
</section>


<section class="container">
<div class="row">
    <div class="col-8">
        
        <h3>Seleccione el producto</h3>
        <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae, explicabo reprehenderit, maxime architecto, repudiandae veniam odio harum mollitia ipsa aliquid atque dolor! Veniam libero iure eos reprehenderit nostrum quaerat quis.
        </p>

        <?php
            include("recursos.php");
            $listar = $producto->seleccionarProductos();
            for($i=0; $i<count($listar); $i++){
        ?>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">
                        <?php
                            echo $listar[$i]['detalle'];
                        ?>
                    </h5>
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
            </div>
        </div>
        <?php
            }
        ?>
  
    </div>
    
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h2>Tu Carrito</h2>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <a href="formCompra.php">
                <button type="button" class="btn btn-outline-success">Finalizar Compra</button></a>
                
                <a href="#">
                <button type="button" class="btn btn-outline-danger">Cancelar Compra</button></a>
            </div>
        </div>
    
        <?php
                $listado = $operacion->mostrarVenta();
                if($listado){
                    for ($i=0; $i <count($listado) ; $i++) { 
            ?>
        <div class="card">
            <div class="card-header">
                Nro Operacion: 
                <?php
                    echo $listado[$i]['id_operacion'];
                ?>
            </div>
            <div class="card-body">
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



<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
</body>
</html>