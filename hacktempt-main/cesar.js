function encrypt(message, shift) {
    var encryptedMessage = "";

    for (var i = 0; i < message.length; i++) {
      var char = message[i];

      // Controllo se il carattere è una lettera dell'alfabeto
      if (char.match(/[a-z]/i)) {
        var code = message.charCodeAt(i);

        // Controllo se il carattere è maiuscolo o minuscolo
        if (code >= 65 && code <= 90) {
          char = String.fromCharCode(((code - 65 + shift) % 26) + 65);
        } else if (code >= 97 && code <= 122) {
          char = String.fromCharCode(((code - 97 + shift) % 26) + 97);
        }
      }

      encryptedMessage += char;
    }

    return encryptedMessage;
}

function decrypt(text, shift) {
    // La decifratura è semplicemente la cifratura con uno shift negativo
    let decryptedText = encrypt(text, -shift);
    return decryptedText;
}

  // Esempio di utilizzo
  /*let plaintext = "HacktemptSPL";
  let shift = 3;

  let ciphertext = encrypt(plaintext, shift);
  console.log("Testo cifrato:", ciphertext);

  let decryptedText = decrypt(ciphertext, shift);
  console.log("Testo decifrato:", decryptedText);*/

  function script03(){
    var input = document.getElementById('token-input');
    var token = 'KdfnwhpswVSO';
    if (input.value == decrypt(token, 3)) {
      document.getElementById('wya').innerHTML = 'TOKEN DECRYPTED CORRECTLY';
    } else document.getElementById('wya').innerHTML = 'TOKEN DECRYPTED NOT CORRECTLY'
  }
