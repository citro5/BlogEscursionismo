function checkRegistrationData() {
    registrationUsername = $("form[id=register-form] input[name=username]");
    registrationEmail = $("form[id=register-form] input[name=email]");
    registrationPasswd = $("form[id=register-form] input[name=password]");
    registrationPasswdRepeat = $("form[id=register-form] input[name=conf-password]");

    regName_msg = $("#invalid-registrationUsername");
    regEmail_msg = $("#invalid-registrationEmail");
    regPasswd_msg = $("#invalid-registrationPasswd");
    passwdConfirm_msg = $("#invalid-passwdConfirm");

    var emailRegularExpression = new RegExp(/^[A-Za-z0-9]+(\.[A-Za-z0-9]+)*@[A-Za-z0-9-]+\.[A-Za-z]{2,3}$/, "g");
    error = false;

    if (registrationUsername.val().trim() === "")
    {
        regName_msg.html("Inserisci un username");
        registrationUsername.focus();
        error = true;
    } else {
        regName_msg.html("");
    }

    if (registrationEmail.val().trim() === "")
    {
        regEmail_msg.html("Inserisci un email");
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
    } else if(registrationPasswd.val().length < 8) {
        regPasswd_msg.html("Minimo 8 caratteri");
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

    if(!error) {
        $.ajax('/registrationEmailCheck', {

            method: 'GET',

            data: {email: registrationEmail.val().trim()},

            success: function (result) {

                if (result.found)
                {
                    error = true;
                    regEmail_msg.html("Email già in uso");
                } else {
                    $('form[id=register-form]').submit();
                }
            }

        });   
    }
}