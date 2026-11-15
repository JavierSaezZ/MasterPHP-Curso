<?php
require_once 'header.php';

// session_start();

// Carrito desde la sesión
$carrito = $_SESSION['carrito'] ?? [];

// Calcular subtotal
$subtotal = 0;
foreach ($carrito as $item) {
    $precio = isset($item['precio']) ? (float) $item['precio'] : 0;
    $unidades = isset($item['unidades']) ? (int) $item['unidades'] : 0;
    $subtotal += $precio * $unidades;
    $_SESSION['datos_temp']['coste']=$subtotal;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <!-- Tu CSS base -->
    <link rel="stylesheet" href="productoseditar.css">
    <!-- CSS específico del carrito -->
    <link rel="stylesheet" href="view/general.css">
    <link rel="stylesheet" href="view/carrito.css">

</head>





<body>

<?php
 // ——— TOASTS (arriba-derecha)
if (isset($_SESSION['pedidosok']) || isset($_SESSION['pedidoserror'])): ?>
  <div class="toasts">
    <?php if (isset($_SESSION['pedidosok'])):
      $id = 'toastok_'.uniqid(); ?>
      <div class="toast-wrap">
        <input id="<?= $id ?>" class="toast__chk" type="checkbox" aria-hidden="true">
        <div class="toast toast--ok" role="status">
          <span class="toast__icon">✅</span>
          <span class="toast__msg"><?= htmlspecialchars($_SESSION['pedidosok'], ENT_QUOTES) ?></span>
          <label class="toast__close" for="<?= $id ?>" aria-label="Cerrar">×</label>
        </div>
      </div>
      <?php unset($_SESSION['pedidosok']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['pedidoserror'])):
      $id = 'toasterr_'.uniqid(); ?>
      <div class="toast-wrap">
        <input id="<?= $id ?>" class="toast__chk" type="checkbox" aria-hidden="true">
        <div class="toast toast--error" role="alert">
          <span class="toast__icon">⚠️</span>
          <span class="toast__msg"><?= htmlspecialchars($_SESSION['pedidoserror'], ENT_QUOTES) ?></span>
          <label class="toast__close" for="<?= $id ?>" aria-label="Cerrar">×</label>
        </div>
      </div>
      <?php unset($_SESSION['pedidoserror']); ?>
    <?php endif; ?>

  </div>
<?php endif;?> 

    <h1>Tu Carrito</h1>

    <div class="cart-shell">
        <!-- COLUMNA IZQUIERDA: LISTA DE PRODUCTOS -->
        <section class="cart-panel cart-panel--items">
            <header class="cart-header">
                <span class="cart-header__title">SHOPPING CART</span>
                <span class="cart-header__count">
                    <?php echo count($carrito); ?> productos
                </span>
            </header>

            <?php if (empty($carrito)): ?>
                <div class="cart-empty">
                    <p>Tu carrito está vacío.</p>
                    <a href="productos.php" class="btn--primary">Volver a la tienda</a>
                </div>
            <?php else: ?>
                <ul class="cart-list">
                    <?php foreach ($carrito as $i => $item): ?>
                        <?php
                        $conteo = $i;
                        $id = $item['id_producto'] ?? '';
                        $precio = isset($item['precio']) ? (float) $item['precio'] : 0;
                        $unidades = isset($item['unidades']) ? (int) $item['unidades'] : 1;
                        $imagen = $item['imagen'] ?? 'sin-imagen.png';
                        $nombre = isset($item['nombre']) ? $item['nombre'] : "Producto #{$id}";
                        $lineTotal = $precio * $unidades;
                        ?>
                        <li class="cart-item">
                            <div class="cart-item__media">
                                <img src="images/<?php echo htmlspecialchars($imagen); ?>"
                                    alt="<?php echo htmlspecialchars($nombre); ?>">
                            </div>

                            <div class="cart-item__info">
                                <h2 class="cart-item__name">
                                    <?php echo htmlspecialchars($nombre); ?>
                                </h2>
                                <p class="cart-item__ref">
                                    Ref. <?php echo htmlspecialchars($id); ?>
                                </p>
                            </div>

                            <div class="cart-item__qty">
                                <a href="carrito/unidades&operacion=restar&conteo=<?php echo $conteo ?>" class="qty-btn">−</a>
                                <span class="qty-value"><?php echo $unidades; ?></span>
                                <a href="carrito/unidades&operacion=sumar&conteo=<?php echo $conteo ?>" class="qty-btn">+</a>
                            </div>

                            <div class="cart-item__price">
                                <?php echo number_format($lineTotal, 2, ',', '.'); ?> €
                            </div>

                            <div class="cart-item__remove">
                                <a href="carrito/borrar&conteo=<?php echo $conteo; ?>" class="remove-btn">×</a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <footer class="cart-footer">
                    <a href="productos.php" class="cart-footer__back">← Volver a la tienda</a>
                    <div class="cart-footer__subtotal">
                        <span>Subtotal</span>
                        <strong><?php echo number_format($subtotal, 2, ',', '.'); ?> €</strong>
                    </div>
                </footer>
            <?php endif; ?>
        </section>
<!-- COLUMNA DERECHA: CHECKOUT CON 3 PANTALLAS -->
<aside class="cart-panel cart-panel--checkout">

    <input type="radio" name="checkout-step" id="checkout-step-1" class="checkout-step-radio" checked>
    <input type="radio" name="checkout-step" id="checkout-step-2" class="checkout-step-radio">
    <input type="radio" name="checkout-step" id="checkout-step-3" class="checkout-step-radio">

    <div class="checkout-layout">
        <ol class="checkout-steps">
            <li class="checkout-step" data-step="1">
                <label for="checkout-step-1" class="checkout-step-label">
                    <span class="step-dot">1</span><span class="step-label">Dirección</span>
                </label>
            </li>
            <li class="checkout-step" data-step="2">
                <label for="checkout-step-2" class="checkout-step-label">
                    <span class="step-dot">2</span><span class="step-label">Tarjeta</span>
                </label>
            </li>
            <li class="checkout-step" data-step="3">
                <label for="checkout-step-3" class="checkout-step-label">
                    <span class="step-dot">3</span><span class="step-label">Resumen</span>
                </label>
            </li>
        </ol>

        <form class="checkout-card" action="pedidos/add" method="POST" novalidate>
    <div class="checkout-contents">
        
        <div class="checkout-block" id="block-address">
            <h3 class="checkout-title">Dirección de envío</h3>
            <div class="form-row">
                <label>Nombre completo</label>
                <input type="text" name="nombre" placeholder="Javier Sáez" 
                       value="<?php echo $_SESSION['datos_temp']['nombre'] ?? ''; ?>" required>
            </div>
            <div class="form-row">
                <label>Dirección</label>
                <input type="text" name="direccion" placeholder="Calle, número..." 
                       value="<?php echo $_SESSION['datos_temp']['direccion'] ?? ''; ?>" required>
            </div>
            <div class="form-row form-row--2col">
                <div>
                    <label>Ciudad</label>
                    <input type="text" name="ciudad" placeholder="Ciudad" 
                           value="<?php echo $_SESSION['datos_temp']['ciudad'] ?? ''; ?>" required>
                </div>
                <div>
                    <label>Código postal</label>
                    <input type="text" name="cp" placeholder="00000" 
                           value="<?php echo $_SESSION['datos_temp']['cp'] ?? ''; ?>" required>
                </div>
            </div>
            <div class="nav-buttons">
                <label for="checkout-step-2" class="checkout-submit">Siguiente</label>
            </div>
        </div>

        <div class="checkout-block" id="block-payment">
            <h3 class="checkout-title">Método de pago</h3>
            
            <div class="card-type-row">
                <button type="button" class="card-type card-type--active">••••</button>
                <button type="button" class="card-type">VISA</button>
                <button type="button" class="card-type">MasterCard</button>
            </div>

            <div class="form-row">
                <label>Número de tarjeta</label>
                <input type="text" name="tarjeta" placeholder="•••• •••• •••• ••••"
                       value="<?php echo $_SESSION['datos_temp']['tarjeta'] ?? ''; ?>">
            </div>

            <div class="form-row form-row--3col">
                <div>
                    <label>Caducidad</label>
                    <input type="text" name="caducidad" placeholder="MM/AA"
                           value="<?php echo $_SESSION['datos_temp']['caducidad'] ?? ''; ?>">
                </div>
                <div>
                    <label>CVV</label>
                    <input type="text" name="cvv" placeholder="***"
                           value="<?php echo $_SESSION['datos_temp']['cvv'] ?? ''; ?>">
                </div>
                <div>
                    <label>Nombre</label>
                    <input type="text" name="tarjeta_nombre" placeholder="Nombre Apellido"
                           value="<?php echo $_SESSION['datos_temp']['tarjeta_nombre'] ?? ''; ?>">
                </div>
            </div>
            
            <div class="nav-buttons">
                <label for="checkout-step-3" class="checkout-submit">Siguiente</label>
            </div>
        </div>

        <div class="checkout-block" id="block-summary">
            <div class="checkout-group">
                <h4 class="checkout-subtitle">Resumen del pedido</h4>
                <div class="summary-row">
                    <span>Productos</span>
                    <span><?php echo number_format($subtotal, 2, ',', '.'); ?> €</span>
                </div>
                <div class="summary-row">
                    <span>Envío</span>
                    <span>Gratis</span>
                </div>
                <div class="summary-row summary-row--total">
                    <span>Total a pagar</span>
                    <span><?php echo number_format($subtotal, 2, ',', '.'); ?> €</span>
                </div>
            </div>
            
            <button class="checkout-submit btn-final" type="submit">
                Confirmar y Pagar
            </button>
        </div>

    </div>
</form>

<?php 
// Opcional: Limpiar los datos temporales al final del archivo 
// para que si recarga la página manualmente aparezca vacía de nuevo.
// unset($_SESSION['datos_temp']); 
?>
    </div>

</aside>

    <!-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            const steps = document.querySelectorAll('.checkout-step');
            const panes = document.querySelectorAll('.checkout-pane');

            steps.forEach(step => {
                step.addEventListener('click', () => {
                    const stepId = step.dataset.step;

                    steps.forEach(s => s.classList.toggle('is-active', s === step));
                    panes.forEach(p => p.classList.toggle('is-active', p.dataset.step === stepId));
                });
            });
        });
    </script> -->

</body>

</html>