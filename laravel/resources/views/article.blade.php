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
  <link rel="stylesheet" href="{{ url('style.css') }}">
</head>
<body>
<div class="article-page">
  <div class="banner">
    <div class="container">
      <h1>{{ $article->title }}</h1>

      @if ($article->userid == session('user_id'))
        <a href="{{ route('edit', ['id' => $article->id]) }}" class="btn btn-outline-secondary btn-sm article">
          Edit Article
        </a>
        <a href="{{ route('delete', ['id' => $article->id]) }}" class="btn btn-outline-danger btn-sm article">
          delete Article
        </a>
      @endif
    </div>
  </div>

  <div class="container page">
    <div class="row article-content">
      <div class="col-md-12">
        <p>
          Web development technologies have evolved at an incredible clip over the past few years.
        </p>
        <h2 id="introducing-ionic">Introducing RealWorld.</h2>
        <p>It's a great solution for learning how other frameworks work.</p>
        <ul class="tag-list">
          <li class="tag-default tag-pill tag-outline">realworld</li>
          <li class="tag-default tag-pill tag-outline">implementations</li>
        </ul>
      </div>
    </div>

    <hr />

    <div class="article-actions">
      
    </div>

    
  </div>
</div>
</body>