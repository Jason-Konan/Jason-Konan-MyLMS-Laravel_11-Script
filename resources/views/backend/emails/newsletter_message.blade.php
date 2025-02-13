<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Message de la Newsletter</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
  <style>
    /* Styles globaux */
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #eef2f6;
      margin: 0;
      padding: 0;
      color: #333;
    }

    .newsletter-container {
      max-width: 600px;
      margin: 50px auto;
      background: #ffffff;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      border: 1px solid #dfe3e8;
    }

    /* En-tête */
    .newsletter-header {
      background: #1d4ed8;
      background: linear-gradient(135deg, #1e40af, #3b82f6);
      color: white;
      padding: 20px 10px;
      text-align: center;
    }

    .newsletter-header h1 {
      font-size: 24px;
      margin: 0;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .newsletter-header p {
      font-size: 16px;
      margin-top: 8px;
      font-weight: 300;
    }

    /* Contenu principal */
    .newsletter-body {
      padding: 25px 20px;
      text-align: justify;
      line-height: 1.7;
    }

    .newsletter-body p {
      font-size: 16px;
      color: #444;
      margin-bottom: 18px;
    }

    .newsletter-body .call-to-action {
      margin-top: 20px;
      text-align: center;
    }

    .newsletter-body .button {
      display: inline-block;
      background: #1d4ed8;
      color: white;
      padding: 12px 24px;
      text-decoration: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: 600;
      box-shadow: 0 4px 10px rgba(29, 78, 216, 0.2);
      transition: background 0.3s, box-shadow 0.3s;
    }

    .newsletter-body .button:hover {
      background: #2563eb;
      box-shadow: 0 6px 15px rgba(29, 78, 216, 0.3);
    }

    /* Pied de page */
    .newsletter-footer {
      background: #f9fafb;
      text-align: center;
      padding: 20px;
      font-size: 14px;
      color: #666;
      border-top: 1px solid #dfe3e8;
    }

    .newsletter-footer a {
      color: #1d4ed8;
      text-decoration: none;
      font-weight: 500;
    }

    .newsletter-footer a:hover {
      text-decoration: underline;
    }

    /* Responsive */
    @media (max-width: 600px) {
      .newsletter-header h1 {
        font-size: 20px;
      }

      .newsletter-header p {
        font-size: 14px;
      }

      .newsletter-body p {
        font-size: 14px;
      }

      .newsletter-body .button {
        padding: 10px 20px;
        font-size: 14px;
      }
    }

  </style>
</head>
<body>

  <div class="newsletter-container">
    <!-- En-tête -->
    <div class="newsletter-header">
      <h1>Bienvenue dans votre formation</h1>
    </div>

    <!-- Corps principal -->
    <div class="newsletter-body">
      <p>
        {{ $messageContent }}
      </p>

    </div>

    <!-- Pied de page -->
    <div class="newsletter-footer">
      <p>Des questions ? <a href="{{route('contact.show')}}">Contactez notre support</a></p>
      <p>Vous ne souhaitez plus recevoir nos emails ? <a href="{{route('profile.infos')}}">Se désabonner</a></p>

    </div>
  </div>

</body>
</html>
