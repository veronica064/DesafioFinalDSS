<?php
// views/error.php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
            height: 100vh;
            display: flex;
            align-items: center;
        }

        .container {
            max-width: 600px;
        }

        .alert {
            background-color: rgba(20, 10, 40, 0.9);
            border: 1px solid var(--primary);
            color: var(--light);
            backdrop-filter: blur(10px);
            box-shadow: 0 0 30px rgba(110, 0, 255, 0.3);
        }

        .alert h4 {
            color: var(--accent);
            text-shadow: 0 0 8px var(--accent);
        }

        .btn-secondary {
            background-color: var(--primary);
            border: none;
            font-weight: bold;
            letter-spacing: 1px;
            transition: all 0.3s;
        }

        .btn-secondary:hover {
            background-color: var(--accent);
            box-shadow: 0 0 15px var(--accent);
            transform: translateY(-2px);
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-danger">
            <h4>Error</h4>
            <p><?= $error ?></p>
            <a href="javascript:history.back()" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</body>
</html>