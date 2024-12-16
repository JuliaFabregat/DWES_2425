<!-- Ejemplo: funciones numéricas (Pag 78) -->

<?php 
Class Hamburgueseria {
    private $nombre = "HamburPHPuesa";
    private $ventasArray = [];
    private $carta = [
        "Hamburguesa Clásica" => 5.50,
        "Hamburguesa con Queso" => 6.75,
        "Hamburguesa BBQ" => 7.25,
        "Hamburguesa Vegetariana" => 6.00,
    ];

    // GETTERS
    public function getNombre(): string {
        return $this->nombre;
    }

    public function getVentasArray(): array {
        return $this->ventasArray;
    }

    public function getCarta(): array {
        return $this->carta;
    }


    // MÉTODOS

    // 1. Generar ventas aleatorias:
    public function generarVentasAleatorias(): int {
        return mt_rand(50, 100);
    }

    // 2. Asignar hamburguesas y cantidades:
    public function asignarHamburYCantidad() {
        $ventas = $this->generarVentasAleatorias();
        $carta = $this->getCarta();

        for ($i = 0; $i < $ventas; $i++) {
            $hamburguesa = array_rand($carta);
            $cantidad = mt_rand(1, 5);

            if (isset($this->ventasArray[$hamburguesa])) {
                $this->ventasArray[$hamburguesa] += $cantidad;
            } else {
                $this->ventasArray[$hamburguesa] = $cantidad;
            }
        }
    }

    // 3. Calcular el total de cada venta:
    public function calcularTotalVenta(): array {
        $carta = $this->getCarta();
        $ventas = $this->getVentasArray();
        $totales = [];

        foreach ($ventas as $hamburguesa => $cantidad) {
            $totales[$hamburguesa] = round($carta[$hamburguesa] * $cantidad, 2);
        }

        return $totales;
    }

    // 4. Calcular el total del día:
    public function calcularTotalDia(): string {
        $totalesPorVenta = $this->calcularTotalVenta();
        $total = array_sum($totalesPorVenta);

        return number_format($total, 2, ',', ' ');
    }
    

    // 5. Estadísticas:
    public function calcularEstadisticas(): string {
        // Variables
        $totalFormateado = $this->calcularTotalDia();
    
        // Eliminar formato de número para convertirlo a flotante
        $total = (float)str_replace(',', '.', str_replace(' ', '', $totalFormateado));
    
        // Calcular la raíz cuadrada del total de ventas
        $raizCuadrada = sqrt($total);
    
        // Elevar el total a la potencia de 2
        $potencia = pow($total, 2);
    
        // Redondear el total hacia arriba y hacia abajo
        $redondearArriba = ceil($total);
        $redondearAbajo = floor($total);
    
        // Mostrar resultados
        $mostrarEstadisticas = "
        <ul>
            <li><b>Total del día:</b> $totalFormateado €</li>
            <li><b>Raíz cuadrada del total de ventas:</b> $raizCuadrada</li>
            <li><b>Total elevado a la potencia de 2:</b> $potencia</li>
            <li><b>Total redondeado hacia arriba:</b> $redondearArriba</li>
            <li><b>Total redondeado hacia abajo:</b> $redondearAbajo</li>
        </ul>";

        return $mostrarEstadisticas;
    }
}
?>

<?php 
    // Crear una instancia de Hamburgueseria
    $hamburgueseria = new Hamburgueseria();
    $hamburgueseria->asignarHamburYCantidad();
    $totalesPorVenta = $hamburgueseria->calcularTotalVenta();
    $totalDia = $hamburgueseria->calcularTotalDia();
    // Calcular estadísticas
    $hamburgueseria->calcularEstadisticas();
?>

<!-- HTML -->
<?php include './includes/header.php'; ?>

    <!-- Mostrar el nombre de la hamburguesería -->
    <h1><?= $hamburgueseria->getNombre() ?></h1>

    <!-- Mostrar el total del día -->
    <h2>Total del día: <?= $totalDia ?> €</h2>

    <!-- Mostrar las ventas individuales -->
    <h3>Ventas por hamburguesa:</h3>
    <ul>
        <?php foreach ($hamburgueseria->getVentasArray() as $hamburguesa => $cantidad): ?>
            <li>
                <b><?= $hamburguesa ?>:</b> <?= $cantidad ?> unidades vendidas | Total: <?= $totalesPorVenta[$hamburguesa] ?> €
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Mostrar estadísticas -->
    <h3>Estadísticas:</h3>
    <?= $hamburgueseria->calcularEstadisticas() ?>

<?php include './includes/footer.php'; ?>
