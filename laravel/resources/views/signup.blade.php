<head>
  <meta charset="utf-8" />
  <title>Conduit</title>
  <!-- Import Ionicon icons & Google Fonts our Bootstrap theme relies on -->
  <link
    href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    rel="stylesheet"
    type="text/css"
  />
  <link
    href="//fonts.googleapis.com/css?family=Titillium+Web:700|Source+Serif+Pro:400,700|Merriweather+Sans:400,700|Source+Sans+Pro:400,300,600,700,300italic,400italic,600italic,700italic"
    rel="stylesheet"
    type="text/css"
  />
  <!-- Import the custom Bootstrap 4 theme from our hosted CDN -->
  <link rel="stylesheet" href="//demo.productionready.io/main.css" />
</head>
<body>
    <div class="auth-page">
    <div class="container page">
        <div class="row">
        <div class="col-md-6 offset-md-3 col-xs-12">
            <h1 class="text-xs-center">Sign up</h1>
            <p class="text-xs-center">
            <a href="/register">Need an account?</a>
            </p>
            <form action="{{ route('signup') }}" method="POST">
                @csrf
                <fieldset class="form-group">
                    @if ($errors['email'])
                        <p class="error-messages">{{ $errors['email'] }}</p>
                    @endif
                    <input name="email" class="form-control form-control-lg" type="text" placeholder="Email" />
                </fieldset>
                <fieldset class="form-group">
                    @if ($errors['password'])
                        <p class="error-messages">{{ $errors['password'] }}</p>
                    @endif
                    <input name="password" class="form-control form-control-lg" type="password" placeholder="Password" />
                </fieldset>
                <button class="btn btn-lg btn-primary pull-xs-right">Sign up</button>
            </form>
        </div>
        </div>
    </div>
    </div>
</body>