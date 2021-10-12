<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Elbruz</title>
</head>
<body>
  <h1>Elbruz</h1>
  <hr>
  <h3>
    Mizo-te tan, thei leh thlai hrisel tha zawrhna Elbruz hi a hnuaia link atang hian lo download la, lo hrisel zel ang che.
    <br>
    <br>
    <div class="container">
      <div class="child">
        <a href="https://play.google.com/store/apps/details?id=com.elbruz.elbruz"><img height="80" src="playstore.png" alt=""></a>
      </div>
    </div>
  </h3>
  <footer class="footer">
    <small>All rights reserved © {{ date('Y') }} Elbruz</small>
    <br>
    <small>
      By using our app you agree to our <a href="/privacy-policy">Privacy Policy</a>
    </small>
    <br>
    <small>Designed and developed by BenzCraft</small>
  </footer>
</body>
<style>
  body{
    margin-left: 43rem;
    margin-top: 10rem;
    background-size: cover;
    background-repeat: no-repeat;
    background-image: url('background.jpg');
  }
  .footer {
    position: fixed;
    bottom: 10px;
    width: 100%;
    color: black;
  }
  .container{
    display: flex;
    justify-content: center;
  }

  @media screen and (max-width: 950px){
    body{
      margin-left: 1rem;
      margin-top: 1rem;
      background-size: cover;
      background: url('mobile.jpg');
    }
    h1,h3{
      color: white;
    }
  }
</style>
</html>