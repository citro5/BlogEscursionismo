function checkRegistrationData() {
    registrationUsername = $("form[id=register-form] input[name=username]");
    registrationEmail = $("form[id=register-form] input[name=email]");
    registrationPasswd = $("form[id=register-form] input[name=password]");
    registrationPasswdRepeat = $("form[id=register-form] input[name=conf-password]");

    regName_msg = $("#invalid-registrationUsername");
    regEmail_msg = $("#invalid-registrationEmail");
    regPasswd_msg = $("#invalid-registrationPasswd");
    passwdConfirm_msg = $("#invalid-passwdConfirm");

    var emailRegularExpression = new RegExp(/^[A-Za-z0-9]+(\.[A-Za-z0-9]+)*@[A-Za-z0-9-]+\.[A-Za-z]{2,3}$/, "g");    //.[A-Za-z]{2,3} - punto seguito da due o tre lettere maiuscole o minuscole che rappresentano l'estensione del dominio (ad esempio .com, .net, .org).  $/ Termina la corrispondenza alla fine della stringa.
    var usernameRegularExpression = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    error = false;

    if (registrationUsername.val().trim() === "")               //val() per ottenere il valore attuale del campo. Trim() per rimuovere eventuali spazi vuoti all'inizio e alla fine del valore ottenuto.
    {
        regName_msg.html("Inserisci un username");
        registrationUsername.focus();                           //l'elemento di input ottiene il focus e diventa l'elemento attivo, pronto per l'interazione dell'utente.
        error = true;
    } else {
        regName_msg.html("");
    }


    if (registrationEmail.val().trim() === "")
    {
        regEmail_msg.html("Inserisci un'email");
        error = true;
    } else if(!registrationEmail.val().trim().match(emailRegularExpression))
    {
        regEmail_msg.html("Email inserita non valida");
        error = true;
    } else {
        regEmail_msg.html("");
    }

    if (registrationPasswd.val().trim() === "")
    {
        regPasswd_msg.html("Inserisci una password");
        error = true;
    } else if(!registrationPasswd.val().match(usernameRegularExpression) ) {
        regPasswd_msg.html("Minimo 8 caratteri tra cui una lettera e una cifra");
        error = true;
    } else {
        regPasswd_msg.html("");
    }

    if((registrationPasswdRepeat.val().trim === "")||(registrationPasswdRepeat.val() != registrationPasswd.val()))
    {
        passwdConfirm_msg.html("Il valore inserito non corrisponde");
        error = true;
    } else {
        passwdConfirm_msg.html("");
    }

    if (!error) {
        var usernameCheck = $.ajax('/registrationUsernameCheck', {
          method: 'GET',
          data: { username: registrationUsername.val().trim() }
        });
      
        var emailCheck = $.ajax('/registrationEmailCheck', {
          method: 'GET',
          data: { email: registrationEmail.val().trim() }
        });
      
        $.when(usernameCheck, emailCheck).done(function(usernameResult, emailResult) {      //usernameResult e emailResult sono il return del metodo del controller caricato dalla rotta definita da ajax
          if (usernameResult[0].found) {
            error = true;
            regName_msg.html("Username già in uso");
          }
      
          if (emailResult[0].found) {
            error = true;
            regEmail_msg.html("Email già in uso");
          }

          if (!error) {
            $('form[id=register-form]').submit();
          }
        });
      }
}

function showContacts(){
$(document).ready(function() {
    // Effettua lo scorrimento della pagina verso l'ancor del footer
    $('html, body').animate({
      scrollTop: $('.footer').offset().top
    }, 1000); // Tempo di animazione in millisecondi
  });
};


