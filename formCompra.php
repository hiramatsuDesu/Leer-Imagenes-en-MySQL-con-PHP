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
        <div class="card">
            <div class="card-body">
                <h2>Tu Carrito</h2>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <a href="index.php">
                <button type="button" class="btn btn-outline-success">Seguir Comprando</button></a>
                
                <a href="#">
                <button type="button" class="btn btn-outline-danger">Cancelar Compra</button></a>
            </div>
        </div>
    
        <?php
                include("recursos.php");
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

    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h2>Complete sus datos</h2>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                
                <?php
                    $total=0;
                    for ($i=0; $i <count($listado) ; $i++) {
                        $total += $listado[$i]['total'];
                    }
                ?>
                <h4>Total $: <?php echo $total; ?></h4>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <form action="fpdf/factura.php" method="POST">
                    <label>Nombre: </label><br>
                    <input type="text" name="nombre" maxlength="100"><br>

                    <label>Apellido: </label><br>
                    <input type="text" name="apellido" maxlength="100"><br>

                    <label>Cel: (sin el cero y sin el 15)</label><br>
                    <input type="number" name="tel" maxlength="10"><br><br>

                    <input type="submit" value="enviar">
                   
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">
                        Enviar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Importante..!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        Para finalizar la compra haga click en "Generar factura". Si no desea continuar con la compra puede seleccionar "Cerrar".
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <!--
                    <a href="fpdf/factura.php" target="_blank"><button type="button" class="btn btn-primary">Generar factura</button></a>
                -->
                <input type="submit" value="enviar" target="_blank">
                    </div>
                    </div>
                    </div>
                    </div>
                   
                
                </form>
            </div>
        </div>

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