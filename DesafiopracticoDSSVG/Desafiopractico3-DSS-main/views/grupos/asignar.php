<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Asignar Estudiantes</title>
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

        .assign-card {
            max-width: 800px;
            margin: 2rem auto;
            background: rgba(20, 10, 40, 0.7);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(110, 0, 255, 0.3);
            backdrop-filter: blur(10px);
            border: 1px solid var(--primary);
        }

        .form-check-input {
            background-color: rgba(10, 5, 20, 0.8);
            border: 1px solid var(--primary);
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--secondary);
            box-shadow: 0 0 10px var(--secondary);
        }

        .form-check-label {
            color: var(--light);
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

        .btn-secondary {
            background-color: rgba(20, 10, 40, 0.8);
            border: 1px solid var(--primary);
            color: var(--light);
            transition: all 0.3s;
        }

        .btn-secondary:hover {
            background-color: rgba(30, 15, 60, 0.9);
            border-color: var(--secondary);
            box-shadow: 0 0 10px var(--secondary);
        }

        .alert {
            background-color: rgba(20, 10, 40, 0.9);
            border: 1px solid var(--primary);
            color: var(--light);
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
                <a class="nav-link text-white" href="grupos.php">Grupos</a>
                <a class="nav-link text-white" href="logout.php">Cerrar Sesión</a>
            </div>
        </div>
    </nav>

    <div class="section-title-bar">
        ASIGNAR ESTUDIANTES AL GRUPO
    </div>

    <div class="main-content">
        <div class="assign-card">
            <?php if (empty($estudiantes)): ?>
                <div class="alert alert-info text-center">
                    Todos los estudiantes ya han sido asignados a este grupo.
                </div>
                <div class="text-center mt-3">
                    <a href="grupos.php" class="btn btn-secondary">Volver</a>
                </div>
            <?php else: ?>
                <form method="post">
                    <div class="row">
                        <?php foreach($estudiantes as $estudiante): ?>
                            <div class="col-md-6 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="estudiantes[]" value="<?= $estudiante['codigo'] ?>" id="est_<?= $estudiante['codigo'] ?>">
                                    <label class="form-check-label" for="est_<?= $estudiante['codigo'] ?>">
                                        <?= $estudiante['nombres'] . ' ' . $estudiante['apellidos'] ?>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-success">Asignar Estudiantes</button>
                        <a href="grupos.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            <?php endif; ?>
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