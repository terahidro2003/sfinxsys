<!DOCTYPE html>
<html>
<head>
	<title>Sfinx registracija</title>
	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<!-- CSRF Token -->
    	<meta name="csrf-token" content="{{ csrf_token() }}">
    	<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/feather.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/signup.css') }}" rel="stylesheet">

	<script type="text/javascript">
		function checkDate() {
			let dd = document.getElementById("birth_date");
			if(dd.value.length == 4 || dd.value.length == 7) dd.value += "/";
			else if(dd.value.length > 10) dd.style.backgroundColor = "red";
			else dd.style.backgroundColor = "white";
		}
</script>
</head>
<body>
<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <div class="signup-background"></div>
  <div class="container uk-position-center">
  <div class="sfinx-signup">
  	
    <form class="sfinx-signup-form" method="POST" action="{{action('SignupRequestsController@store')}}">
    	@if ($errors->any())
    <div style="color: red;" class="uk-alert-danger uk-container" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <h1>Neteisingai įvesti duomenys</h1>
    <p>Kažką įvedėte netesingai. Patikrinkite savo įvestus duomenis ir bandykite iš naujo</p>
</div>	       
	@endif
	@if ($success == true)
    <div class="uk-alert-success uk-container" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <h1>Registracija sėkminga!</h1>
    <p>Sveikiname užsiregistravus</p>
</div>	       
	@endif
    	@csrf
      <span class="title">Registracija į šokių studija SFINX</span>
      <div class="row-class">
      <div>
      <label class="label">Vardas</label>
      <input type="text" name="first_name" class="sfinx-input " placeholder="Pvz: Vardenis">
      </div>
      <div>
      <label class="label">Pavardė</label>
      <input type="text" name="last_name" class="sfinx-input " placeholder="Pvz: Pavardenis">
      </div>
    </div>
    	<label class="label">Facebook vartotojo vardas</label>
      <input type="text" name="facebook" class="sfinx-input " placeholder="Pvz: http://facebook.com/vardenis.pavardenis">
      <label class="label">Gimimo data</label>
      <input onkeyup="check_birth_date();" type="text" id="birth-date" name="birth_date" class="sfinx-input " placeholder="Pvz: 2018-01-01">
      
      <label class="label">Telefono numeris</label>
      <input type="text" name="phone" class="sfinx-input " placeholder="Pvz: +3706xxxxxxx">
      <div id="parents-phone-number">
      <label class="label">Tėvų telefono numeris</label>
      <input type="text" name="parents_phone" class="sfinx-input " placeholder="Pvz: +3706xxxxxxx">
      </div>
      <div class="row-class">
      <span class="action">Patvirtindami šią formą, Jūs sutinkate, kad Sfinx kaups Jūsų duomenis atrankos tikslais</span>
      <button type="submit" class="btn-submit">Patvirtinti</button>
      </div>
    </form>
  </div>
</div>
  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
  <script>
    function check_birth_date()
{
  var birth_date = document.getElementById('birth-date').value;
  if (birth_date.length == 4){
    document.getElementById('birth-date').value += "-";
  }else if(birth_date.length == 7){
    document.getElementById('birth-date').value += "-";
  }
  var dateObj = new Date();
  var month = dateObj.getUTCMonth() + 1; //months from 1-12
  var day = dateObj.getUTCDate();
  var year = dateObj.getUTCFullYear();
  newdate = year + "-" + month + "-" + day;
  var date1 = new Date(birth_date);
  var date2 = new Date(newdate);
  var timeDiff = Math.abs(date2.getTime() - date1.getTime());
  var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
  var years_old = Math.round(diffDays/366);
  if (years_old < 18){
    document.getElementById('parents-phone-number').style.display = 'block';
  } else{
    document.getElementById('parents-phone-number').style.display = 'none';
  }
}
  </script>
</body>

</html>

</div>
</body>
</html>