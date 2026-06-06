<!DOCTYPE html>
<html lang="Es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Panel de Administración</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">

    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<?php include __DIR__ . '/../layouts/sidebar-dashboard.php'; ?>

<!-- CONTENIDO PRINCIPAL -->
<main>
    <nav class="breadcrumb">
        <span>Inicio</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span id="breadcrumb-page">Dashboard</span>
    </nav>

    <div class="main-content">

        <!-- TARJETAS -->
        <div class="cards">
            <div class="card">
                <i class="fas fa-users"></i>
                <div>
                   <h2><?= $totalEmpleados['total']; ?></h2>
                    <p>Empleados</p>
                </div>
            </div>

            <div class="card">
                <i class="fas fa-check-circle"></i>
                <div>
                    <h2><?= $totalAsistencias['total']; ?></h2>
                    <p>Asistencias</p>
                </div>
            </div>

            <div class="card">
                <i class="fas fa-times-circle"></i>
                <div>
                    <h2><?= $totalAusentes['total']; ?></h2>
                    <p>Ausentes</p>
                </div>
            </div>

            <div class="card">
                <i class="fas fa-clock"></i>
                <div>
                    <h2><?= $totalTardanzas['total']; ?></h2>
                    <p>Tardanzas</p>
                </div>
            </div>
        </div>

        <!-- GRAFICOS -->
        <div class="grid">
            <div class="box">
                <h3>Asistencias por semana</h3>
                <canvas id="graficoSemana"></canvas>
            </div>

            <div class="box">
                <h3>Resumen</h3>
                <canvas id="graficoPorcentaje"></canvas>
            </div>
        </div>

    </div>
</main>

<script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>
</body>

</html>