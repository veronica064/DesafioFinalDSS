<?php
session_start();
if(!isset($_SESSION['user_id']) || $_SESSION['tipo'] != 'admin') {
    header("Location: index.php");
    exit();
}

require_once 'config/database.php';
require_once 'models/Estudiante.php';
require_once 'controllers/ReporteController.php';

$database = new Database();
$db = $database->getConnection();
$controller = new ReporteController($db);
$controller->index();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reportes - Panel Futurista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #6e00ff;
            --secondary: #00f7ff;
            --dark: #0a0a1a;
            --light: #e0e0ff;
            --accent: #ff00aa;
        }
        
        body {
            font-family: 'Orbitron', sans-serif;
            background: radial-gradient(circle at center, #1a0033, #0a0a1a);
            color: var(--light);
            min-height: 100vh;
        }

        .navbar {
            background-color: rgba(30, 0, 60, 0.8) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--primary);
        }

        .navbar-brand {
            color: var(--secondary) !important;
            text-shadow: 0 0 10px var(--secondary);
            font-weight: 700;
            letter-spacing: 1px;
        }

        .nav-link {
            color: var(--light) !important;
            transition: all 0.3s;
        }

        .nav-link:hover {
            color: var(--accent) !important;
            text-shadow: 0 0 8px var(--accent);
        }

        .container-main {
            background: rgba(20, 10, 40, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid var(--primary);
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(110, 0, 255, 0.3);
            padding: 2rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        h1 {
            color: var(--secondary);
            text-shadow: 0 0 8px var(--secondary);
            font-weight: 700;
            border-bottom: 1px solid var(--primary);
            padding-bottom: 1rem;
        }

        .form-label {
            color: var(--secondary);
            font-weight: 600;
        }

        .form-control, .form-select {
            background-color: rgba(10, 5, 20, 0.8);
            border: 1px solid var(--primary);
            color: var(--light);
            transition: all 0.3s;
        }

        .form-control:focus, .form-select:focus {
            background-color: rgba(20, 10, 40, 0.9);
            border-color: var(--secondary);
            box-shadow: 0 0 10px var(--secondary);
            color: var(--light);
        }

        .btn-primary {
            background-color: var(--primary) !important;
            border: none;
            font-weight: bold;
            letter-spacing: 1px;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: var(--accent) !important;
            box-shadow: 0 0 15px var(--accent);
            transform: translateY(-2px);
        }

        .table {
            color: var(--light);
            margin-top: 2rem;
        }

        .table thead {
            background-color: rgba(110, 0, 255, 0.3);
            border-bottom: 1px solid var(--primary);
        }

        .table th {
            color: var(--secondary);
            font-weight: 600;
        }

        .table tbody tr {
            border-bottom: 1px solid rgba(110, 0, 255, 0.2);
            transition: all 0.3s;
        }

        .table tbody tr:hover {
            background-color: rgba(110, 0, 255, 0.1);
        }

        footer {
            background-color: rgba(30, 0, 60, 0.8);
            color: var(--secondary);
            border-top: 1px solid var(--primary);
            padding: 1.5rem 0;
            text-align: center;
            backdrop-filter: blur(10px);
        }

        footer div {
            text-shadow: 0 0 5px var(--secondary);
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">ACADEMIA FUTURISTA</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
                <a class="nav-link" href="logout.php">Cerrar Sesión</a>
            </div>
        </div>
    </nav>

    <div class="container container-main">
        <h1 class="mb-4">REPORTES DE ASISTENCIA</h1>
        
        <form method="post" class="mb-5">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="codigo_estudiante" class="form-label">Estudiante</label>
                    <select class="form-select" id="codigo_estudiante" name="codigo_estudiante" required>
                        <option value="">Seleccionar estudiante...</option>
                        <?php foreach($estudiantes as $est): ?>
                            <option value="<?= $est['codigo'] ?>">
                                <?= $est['nombres'] . ' ' . $est['apellidos'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="trimestre" class="form-label">Trimestre</label>
                    <select class="form-select" id="trimestre" name="trimestre" required>
                        <option value="1">Primer Trimestre</option>
                        <option value="2">Segundo Trimestre</option>
                        <option value="3">Tercer Trimestre</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Generar PDF</button>
                </div>
            </div>
        </form>
    </div>

    <footer class="mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-md-6">Gabriela Abigail Chávez</div>
                <div class="col-md-6">Veronica Elizabeth Rodriguez</div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>