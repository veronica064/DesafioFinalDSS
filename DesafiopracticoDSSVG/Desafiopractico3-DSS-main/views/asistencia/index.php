<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Asistencia - Academia</title>
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

        .form-container {
            max-width: 900px;
            margin: 3rem auto;
            padding: 2rem;
            background: rgba(20, 10, 40, 0.7);
            border-radius: 1rem;
            box-shadow: 0 0 30px rgba(110, 0, 255, 0.3);
            backdrop-filter: blur(10px);
            border: 1px solid var(--primary);
        }

        .form-label {
            font-weight: 600;
            color: var(--secondary);
        }

        .form-select, .form-control {
            background-color: rgba(10, 5, 20, 0.8);
            border: 1px solid var(--primary);
            color: var(--light);
        }

        .form-select:focus, .form-control:focus {
            background-color: rgba(20, 10, 40, 0.9);
            border-color: var(--secondary);
            color: var(--light);
            box-shadow: 0 0 10px var(--secondary);
        }

        .table {
            color: var(--light);
        }

        .table thead {
            background-color: rgba(110, 0, 255, 0.3);
            border-bottom: 1px solid var(--primary);
        }

        .table tbody tr {
            border-bottom: 1px solid rgba(110, 0, 255, 0.2);
        }

        .table tbody tr:hover {
            background-color: rgba(110, 0, 255, 0.1);
        }

        .btn-primary {
            background-color: var(--primary);
            border: none;
            font-weight: bold;
            letter-spacing: 1px;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: var(--accent);
            box-shadow: 0 0 15px var(--accent);
            transform: translateY(-2px);
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
            <a class="navbar-brand" href="#">ACADEMIA - TUTOR</a>
            <div class="d-flex">
                <span class="navbar-text text-white me-3">Bienvenido, <?= $_SESSION['username'] ?></span>
                <a class="nav-link text-white" href="logout.php">Cerrar Sesión</a>
            </div>
        </div>
    </nav>

    <div class="section-title-bar">
        TOMAR ASISTENCIA - <?= date('d/m/Y') ?>
    </div>

    <div class="main-content">
        <div class="form-container">
            <?php if (isset($mensaje)): ?>
                <div class="alert alert-success"><?= $mensaje ?></div>
            <?php endif; ?>

            <?php if (isset($grupo) && $grupo): ?>
                <h5 class="mb-4"><strong>Grupo:</strong> <?= $grupo['nombre'] ?></h5>
                <form method="post">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>Estudiante</th>
                                    <th>Asistencia</th>
                                    <th>Aspecto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($estudiantes as $estudiante): ?>
                                    <tr>
                                        <td><?= $estudiante['nombres'] . ' ' . $estudiante['apellidos'] ?></td>
                                        <td>
                                            <select name="asistencia[<?= $estudiante['codigo'] ?>]" class="form-select form-select-sm">
                                                <option value="A">Asistió</option>
                                                <option value="I">Inasistencia</option>
                                                <option value="J">Justificado</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="aspectos[<?= $estudiante['codigo'] ?>][]" class="form-select form-select-sm">
                                                <option value="">Sin aspecto</option>
                                                <?php foreach ($aspectos as $aspecto): ?>
                                                    <option value="<?= $aspecto['id'] ?>">[<?= $aspecto['tipo'] ?>] <?= $aspecto['descripcion'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3">REGISTRAR ASISTENCIA</button>
                </form>
            <?php else: ?>
                <div class="alert alert-warning mt-3">No tienes un grupo asignado.</div>
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
