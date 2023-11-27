function increment() {
  var step = Number(document.getElementById("step").innerHTML);
  if (step<7) {
    step = step + 1;
  }
  if (step==7) {
    step=1;
    window.location.href = 'http://localhost/hacktempt/index.php';
  }
  document.getElementById("step").innerHTML = "0" + step;
  if (step > 1) {
    document.getElementById("nice").innerHTML = "";
    document.getElementById("title").innerHTML = "PASSED VULNERABILITIES";
  }
  switch (step) {
    case 2:
    console.log(step);
    document.getElementById("desc-left").innerHTML = "01 Authentication Failures <br>";
    loadHTML('step02.html');
      break;
    case 3:
    console.log(step);
    document.getElementById("desc-left").innerHTML += "02 Broken Access Control <br>";
    loadHTML('step03.html');
      break;
    case 6:
    console.log(step);
    document.getElementById("desc-left").innerHTML += "05 Phishing <br>";
    loadHTML('step06.html');
      break;
  }
}

function script01(){
    var username = document.getElementById("username-input").value;
    var password = document.getElementById("password-input").value;
    if (username == "admin" && password == "admin") {
      document.getElementById("wya").innerHTML = "ADMIN";
    } else document.getElementById("wya").innerHTML = "YOU'RE NOT AN ADMIN";
}

function loadHTML(filename){
  fetch(filename)
  .then(response=> response.text())
  .then(text=> document.getElementById('rightside').innerHTML = text);
}

function loadFirst(){
  loadHTML('step01.html');
}
