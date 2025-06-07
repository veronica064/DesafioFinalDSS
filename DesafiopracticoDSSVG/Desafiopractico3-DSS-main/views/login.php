<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - Academia</title>
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
            font-family: 'Orbitron', 'Segoe UI', sans-serif;
            background: radial-gradient(circle at center, #1a0033, #0a0a1a);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            display: flex;
            flex-direction: row;
            border: none;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 0 30px rgba(110, 0, 255, 0.5);
            min-height: 700px;
            width: 90%;
            max-width: 1000px;
        }

        .login-left {
            background: linear-gradient(135deg, rgba(110,0,255,0.8), rgba(0,247,255,0.6));
            color: white;
            padding: 3rem;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 15s infinite linear;
        }

        @keyframes pulse {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .login-left h4 {
            font-size: 2.2rem;
            font-weight: bold;
            position: relative;
            z-index: 1;
            text-shadow: 0 0 10px rgba(0,0,0,0.5);
        }

        .login-left p {
            font-size: 1.2rem;
            opacity: 0.95;
            position: relative;
            z-index: 1;
            text-shadow: 0 0 5px rgba(0,0,0,0.3);
        }

        .login-right {
            background-color: rgba(20, 10, 40, 0.9);
            padding: 3rem;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            backdrop-filter: blur(5px);
            border-left: 1px solid var(--primary);
        }

        .form-label {
            color: var(--secondary);
            font-weight: 600;
        }

        .form-control {
            background-color: rgba(10, 5, 20, 0.8);
            border: 1px solid var(--primary);
            color: var(--light);
        }

        .form-control:focus {
            background-color: rgba(20, 10, 40, 0.9);
            border-color: var(--secondary);
            color: var(--light);
            box-shadow: 0 0 10px var(--secondary);
        }

        .btn-login {
            background-color: var(--primary);
            border: none;
            font-weight: bold;
            letter-spacing: 1px;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background-color: var(--accent);
            box-shadow: 0 0 15px var(--accent);
            transform: translateY(-2px);
        }

        .alert-danger {
            background-color: rgba(255, 0, 85, 0.2);
            border: 1px solid var(--accent);
            color: var(--light);
        }

        .helper-text {
            font-size: 0.9rem;
            color: var(--secondary);
            text-shadow: 0 0 5px var(--secondary);
        }

        .helper-text code {
            background-color: rgba(0, 247, 255, 0.1);
            color: var(--secondary);
            padding: 2px 5px;
            border-radius: 3px;
            border: 1px solid var(--secondary);
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="login-card">
            <div class="login-left">
                <h4>Academia Escolar</h4>
                <p>Inicio de sesión</p>
            </div>
            <div class="login-right">
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger text-center"><?= $error ?></div>
                <?php endif; ?>

                <form method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Usuario</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-login w-100">Ingresar</button>
                </form>

                <div class="text-center mt-3 helper-text">
                </div>
            </div>
        </div>
    </div>
</body>
</html>