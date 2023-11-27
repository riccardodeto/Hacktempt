<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HackTempt</title>
    <link rel="icon" type="image/x-icon" href="Group 2.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="style.css" rel='stylesheet'>
    <script type="text/javascript" src="functions.js"></script>
    <script type="text/javascript" src="cesar.js"></script>

    <style>
      .input04{
        height: 40px;
        border-radius: 15px;
        border:  1px solid grey;
        text-align: center;
      }

      .button04{
        background-color: #FFD369;
        border-radius: 25px;
        cursor: pointer;
        border: 1px solid grey;
        width: 120px;
        height: 40px;
        margin-top: 5%;
        color: #393E46;
        font-weight: bold;
      }
    </style>
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
              <h1 id="step">04</h1>
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
            <h1 class='titolodestra' id="vTitle">SQL Injection</h1>
            <br>
            <h2>you want to simulate username retrieval from the email</h2>
            <br>
            <form class="" action="step04.php" method="post" autocomplete="off">
                  <input type="text" name="email" id="email" value="" class="input04" placeholder="Enter the e-mail">
                  <br>
                  <button type="submit" name="button" class="button04" id="button">RECOVER</button>
            </form>
            <div class="description-container">
              <p class="description">
                Si verifica quando un'applicazione web non gestisce correttamente gli input forniti dagli utenti.
                Sfrutta lacune nelle procedure di input validation per inserire o eseguire codice dannoso all'interno delle query inviate al database.
                <br>
                <br>
                SUGGERIMENTO: inserendo < ' OR '1'='1 > potrai accedere al nome dell'utente pur non avendo inserito la mail ad esso associata.
              </p>
            </div>
            <br>
            <br>
            <?php

            $servername = "localhost";
            $username = "admin";
            $password = "admin";
            $dbname = "hacktempt";

            try {
              $conn = new mysqli($servername, $username, $password, $dbname);
            } catch(MysqlndUhConnection $e) {
              echo "Connection failed: " . $e->getMessage();
            }

            if (isset($_POST['email'])) {
              $email = $_POST['email'];
              $user = $conn->query("SELECT * FROM users WHERE email='{$email}'");

              while ($row = $user->fetch_assoc()) {
                die("USERNAME: " .$row["username"] ."<br> <a href='http://localhost/hacktempt/step05.php' class='next' onclick='increment()'' id='next-button'>
                  NEXT>
                </a>");
              }
            }
            ?>
            <a href="http://localhost/hacktempt/step05.php" class="next" onclick="increment()" id="next-button">
              NEXT>
            </a>
          </div>
        </div>
    </div>
  </body>
</html>
