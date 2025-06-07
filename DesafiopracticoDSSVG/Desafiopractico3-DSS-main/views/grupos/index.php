<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Grupos</title>
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

        .navbar {
            background-color: rgba(30, 0, 60, 0.8);
            height: 80px;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--primary);
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--secondary);
            text-shadow: 0 0 10px var(--secondary);
        }

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

        .grupos-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 2rem auto;
            max-width: 1200px;
        }

        .grupos-header h3 {
            color: var(--secondary);
            text-shadow: 0 0 5px var(--secondary);
        }

        .btn-success {
            background-color: var(--primary);
            border: none;
            font-weight: bold;
            color: white;
            letter-spacing: 1px;
            transition: all 0.3s;
        }

        .btn-success:hover {
            background-color: var(--accent);
            box-shadow: 0 0 15px var(--accent);
            transform: translateY(-2px);
        }

        .table-container {
            max-width: 1200px;
            margin: auto;
            background: rgba(20, 10, 40, 0.7);
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(110, 0, 255, 0.3);
            backdrop-filter: blur(10px);
            border: 1px solid var(--primary);
            overflow: hidden;
        }

        .table {
            color: var(--light);
            margin-bottom: 0;
        }

        .table th {
            background-color: rgba(110, 0, 255, 0.3);
            color: var(--secondary);
            border-bottom: 1px solid var(--primary);
        }

        .table td {
            border-bottom: 1px solid rgba(110, 0, 255, 0.2);
        }

        .table tr:hover {
            background-color: rgba(110, 0, 255, 0.1);
        }

        .btn-sm {
            transition: all 0.3s;
        }

        .btn-sm:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 10px currentColor;
        }

        .btn-warning {
            background-color: #ff9900;
            border: none;
        }

        .btn-danger {
            background-color: #ff3366;
            border: none;
        }

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

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">ACADEMIA</a>
            <div class="d-flex">
                <a class="nav-link text-white" href="dashboard.php">Dashboard</a>
                <a class="nav-link text-white" href="logout.php">Cerrar Sesión</a>
            </div>
        </div>
    </nav>

    <div class="section-title-bar">
        GESTIÓN DE GRUPOS
    </div>

    <div class="main-content">
        <div class="grupos-header container">
            <h3 class="mb-0">Lista de Grupos</h3>
            <a href="grupos.php?action=crear" class="btn btn-success">+ Crear Grupo</a>
        </div>

        <div class="table-container table-responsive">
            <table class="table table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tutor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($grupos as $grupo): ?>
                    <tr>
                        <td><?= $grupo['id'] ?></td>
                        <td><?= $grupo['nombre'] ?></td>
                        <td><?= $grupo['nombres'] . ' ' . $grupo['apellidos'] ?></td>
                        <td>
                            <a href="grupos.php?action=asignar&id=<?= $grupo['id'] ?>" class="btn btn-sm btn-warning">Asignar Estudiantes</a>
                            <a href="grupos.php?action=eliminar&id=<?= $grupo['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar grupo?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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