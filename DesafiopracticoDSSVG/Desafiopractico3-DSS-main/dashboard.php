<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['tipo'] != 'admin') {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #6e00ff;
            --secondary: #00f7ff;
            --dark: #0a0a1a;
            --light: #e0e0ff;
            --accent: #ff00aa;
        }
        
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Orbitron', 'Segoe UI', sans-serif;
            background-color: var(--dark);
            color: var(--light);
            overflow-x: hidden;
        }

        body {
            background: radial-gradient(circle at center, #1a0033, #0a0a1a);
        }

        .page-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .main-content {
            flex: 1;
        }

        /* NAVBAR */
        .navbar {
            background-color: rgba(30, 0, 60, 0.8) !important;
            color: white;
            height: 80px;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--primary);
        }

        .navbar-brand {
            font-size: 1.6rem;
            font-weight: bold;
            color: var(--secondary) !important;
            text-shadow: 0 0 10px var(--secondary);
        }

        .navbar-nav .nav-link {
            color: var(--light) !important;
            transition: all 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: var(--accent) !important;
            text-shadow: 0 0 8px var(--accent);
        }

        /* TÍTULO PRINCIPAL */
        .section-title-bar {
            background: linear-gradient(90deg, rgba(110,0,255,0.2), rgba(0,247,255,0.2));
            color: var(--secondary);
            padding: 2rem 1rem;
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            width: 100%;
            border-bottom: 1px solid var(--primary);
            text-shadow: 0 0 8px var(--secondary);
            letter-spacing: 1px;
        }

        /* TARJETAS */
        .card {
            border-radius: 15px;
            background: rgba(20, 10, 40, 0.7);
            border: 1px solid var(--primary);
            box-shadow: 0 0 20px rgba(110, 0, 255, 0.3);
            transition: all 0.3s ease;
            color: var(--light);
            backdrop-filter: blur(5px);
            overflow: hidden;
            position: relative;
        }

        .card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
            transform: rotate(45deg);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 30px var(--primary);
            border-color: var(--secondary);
        }

        .card-title {
            color: var(--secondary);
            font-weight: bold;
            text-shadow: 0 0 5px var(--secondary);
        }

        /* BOTONES PERSONALIZADOS */
        .btn {
            background-color: var(--primary) !important;
            color: white !important;
            border: none;
            font-weight: bold;
            letter-spacing: 1px;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .btn::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%);
            transform: rotate(45deg);
            transition: all 0.5s;
        }

        .btn:hover {
            background-color: var(--accent) !important;
            box-shadow: 0 0 15px var(--accent);
            transform: translateY(-2px);
        }

        .btn:hover::after {
            transform: rotate(45deg) translate(20px, 20px);
        }

        /* FOOTER */
        .footer {
            background-color: rgba(30, 0, 60, 0.8);
            color: var(--secondary);
            padding: 2rem 0;
            text-align: center;
            backdrop-filter: blur(10px);
            border-top: 1px solid var(--primary);
        }

        .footer .row > div {
            font-size: 1.1rem;
            font-weight: 500;
            text-shadow: 0 0 5px var(--secondary);
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="page-container">

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">ACADEMIA</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="logout.php">Cerrar Sesión</a>
            </div>
        </div>
    </nav>

    <div class="section-title-bar">PANEL DE ADMINISTRACIÓN</div>
    
    <div class="main-content container py-5">
        <div class="row justify-content-center g-4">
            <div class="col-md-5">
                <div class="card text-center p-4">
                    <h5 class="card-title">Gestión de Grupos</h5>
                    <p class="card-text">Crear y administrar grupos de estudiantes</p>
                    <a href="grupos.php" class="btn">Ir a Grupos</a>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card text-center p-4">
                    <h5 class="card-title">Reportes</h5>
                    <p class="card-text">Generar reportes trimestrales</p>
                    <a href="reportes.php" class="btn">Ver Reportes</a>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="footer mt-auto">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">Gabriela Abigail Chávez</div>
                <div class="col-md-4">Veronica Elizabeth Rodriguez</div>
            </div>
        </div>
    </footer>

</div>
</body>
</html>