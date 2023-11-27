
<html>
<head>

  <style>

    .container {
        display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      min-height: 100vh;
      overflow-y: auto;
    }

    .card {
      width: 300px;
      background-color: #fff;
      border: 1px solid #dbdbdb;
      border-radius: 3px;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-top: -27%;
    }

    .logoIG {
      text-align: center;
      margin-bottom: 20px;
    }

    .logoIG img {
      width: 150px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-group input {
      width: 100%;
      padding: 8px;
      border: 1px solid #dbdbdb;
      border-radius: 3px;
    }

    .form-group button {
      width: 100%;
      padding: 8px;
      background-color: #3897f0;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    .form-group button:hover {
      background-color: #317ae2;
    }

    .text-center {
      text-align: center;
    }

    .text-center a {
      color: #003569;
    }

    .next button {
        border: 0px;
        margin-top: 0%;
        margin-right: 0%;
        font-weight: bold;
        color: #393E46;
        cursor: pointer;
      }

    .description-container {
        text-align: center;
        margin-top: 20px;

}
  </style>
      <meta charset="utf-8">
      <title>HackTempt</title>
      <link rel="icon" type="image/x-icon" href="Group 2.png">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link href="style.css" rel='stylesheet'>
      <script type="text/javascript" src="functions.js"></script>
      <script type="text/javascript" src="cesar.js"></script>
    </head>
    <body>
      <div class="row no-gutters">
          <div class="col-md-6 no-gutters">
           <div class="leftside">
            <div class="header">
              <div class="logo">
                <img src="logo1.png" alt="">
              </div>
              <div class="step">
                <h1 id="step">05</h1>
              </div>
            </div>
             <div class="leftside-container">
               <h2 id="nice"></h2>
               <h1 id="title">PASSED VULNERABILITIES</h1>
               <div class="line"></div>
               <br>
               <br>
               <p id="desc-left">
                 01 Authentication Failures <br>
                 02 Broken Access Control <br>
                 03 Cryptographic Failures <br>
                 04 SQL Injection <br>
               </p>
             </div>
             <div class="circles">
               <span class="dotXL"></span>
               <span class="dotXXL"></span>
               <span class="dotXL2 "></span>
               <span class="dotS"></span>
               <span class="dotXS"></span>
             </div>
           </div>
          </div>
          <div class="col-md-6 no-gutters">
            <div class="rightside" id="rightside">
              <h1 class='titolodestra' id="vTitle">Phishing</h1>
                <div class="container">
                  <div class="card">
                    <div class="logoIG">
                      <img src="logoIG.png" alt="Instagram Logo">
                    </div>
                    <form action="step05.php" method="POST">
                  <!-- Campi del form -->
                  <div class="form-group">
                      <input type="text" id="username" name="username" placeholder="Phone number, username or e-mail">
                  </div>
                  <div class="form-group">
                      <input type="password" id="password" name="password" placeholder="Password">
                  </div>
                  <!-- Bottone di invio -->
                  <div class="form-group">
                      <button type="submit">Log In</button>
                  </div>
              </form>
                    <div class="text-center">
                      <a href="#">Forgot password?</a>
                    </div>

                  </div>
                 <div class="description-container">
                      <p class="description">: Mira a sfruttare la fiducia degli utenti per ottenere informazioni sensibili, come password o dati di accesso.
                        Gli attaccanti si fingono entità affidabili o noti servizi online, creando siti web o e-mail falsificate che sembrano autentiche,
                        al fine di indurre le persone a rivelare informazioni riservate.
                      </p>
                    </div>
                  <div class="next">
                  <button type="button" name="button" class="next" onclick="increment()" id="next-button">NEXT></button>
                  </div>
                </div>
            </div>
          </div>
      </div>
    </body>
  </html>


<?php
$credentialsFile = 'credentials.txt'; // Nome del file di salvataggio

// Verifica se il file di salvataggio esiste già
if (!file_exists($credentialsFile)) {
    // Crea il file di salvataggio
    $file = fopen($credentialsFile, 'w');
    fclose($file);
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ottenere i valori inseriti nel form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica se i campi sono stati compilati
    if (!empty($username) && !empty($password)) {
        // Salvare le credenziali nel file di salvataggio
        $credentials = "Username: $username, Password: $password\n";
        file_put_contents($credentialsFile, $credentials, FILE_APPEND);

        header("Content-Disposition: attachment; filename=\"" . basename($credentialsFile) . "\"");
        header("Content-Type: application/octet-stream");
        header("Content-Length: " . filesize($credentialsFile));
        header("Connection: close");

        ob.clean();
        flush();
        //Read the size of the file
        readfile($credentialsFile);

        // Reindirizza l'utente a una pagina successiva (es. dashboard.php)
        header("Location: step05.php");
        exit;

    } else {
        // Mostra un messaggio di errore se uno o entrambi i campi non sono stati compilati
        $errorMessage = "Please fill in both username and password fields.";
    }
  }
?>

<!-- Includi il messaggio di errore nel tuo codice HTML, se necessario -->
<?php if (isset($errorMessage)): ?>
    <p><?php echo $errorMessage; ?></p>
<?php endif; ?>
