<!DOCTYPE html>
<htm>
    <head>
        <meta charset="UTF-8">
        <title>User authentication</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <!-- Fogli di stile -->
        <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ url('/') }}/css/style.css">
        <!-- Icone Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <!-- jQuery e plugin JavaScript -->
        <script src="https://code.jquery.com/jquery.js"></script>
        <script src="{{ url('/') }}/js/bootstrap.bundle.min.js"></script>
        <script src="{{ url('/') }}/js/myScript.js"></script>
    </head>

    <body class="login">
    <div class="wrapper">
      <div class="title-text">
        <div class="title login">Accedi</div>
        <div class="title signup">Registrati</div>
      </div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login">Accesso</label>
          <label for="signup" class="slide signup">Registrazione</label>
          <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
          <form id="login-form" action="{{ route('user.login') }}" class="login" method="post">
            @csrf
            <div class="field">
              <input type="text" name="email" placeholder="Email" required>
            </div>
            <div class="field">
              <input type="password" name ="password" placeholder="Password" required>
            </div>
            <!-- <div class="pass-link"><a href="#">Password dimenticata?</a></div> -->
            @if (session('error'))
              <div class="error-message">{{ session('error') }}</div>
            @endif
            <div class="field btn">
              <div class="btn-layer"></div>
              <input id="Login" type="submit" value="Accedi">
            </div>
            <div class="signup-link">Non sei membro? <a href="">Registrati ora</a></div>
          </form>

          <form id="register-form" action="{{ route('user.register') }}" method="post" class="signup">
            @csrf  
            <div class="field">
              <input type="text" name="username" placeholder="Username" required>
              <span class="invalid-input" id="invalid-registrationUsername"></span>
            </div>
            <div class="field">
              <input type="text" name="email" placeholder="Email" required>
              <span class="invalid-input" id="invalid-registrationEmail"></span>
            </div>
            <div class="field">
              <input type="password" name="password" placeholder="Password" required>
              <span class="invalid-input" id="invalid-registrationPasswd"></span>
            </div>
            <div class="field">
              <input type="password" name="conf-password" placeholder="Conferma password" required>
              <span class="invalid-input" id="invalid-passwdConfirm"></span>
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input id="Register" type="submit" value="Registrati" onclick="event.preventDefault(); checkRegistrationData();">
            </div>
          </form>
        </div>
      </div>
    </div>

    <script>
      const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = (()=>{
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (()=>{
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
      });
      signupLink.onclick = (()=>{
        signupBtn.click();
        return false;
      });
    </script>
    </body>
</htm>