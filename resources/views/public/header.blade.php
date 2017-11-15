<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Desa Sajen</title>
    <link href="{{ asset('assets/pluggins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/pluggins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/pluggins/pgw-slideshow-master/pgwslideshow.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div id="fb-root"></div>
    <script>
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('assets/img/logo.jpg') }}" /></a>
            </div>
          </div>
          <div class="col-sm-9">
            <div id="navbar" class="navbar-collapse collapse pull-right">
              <ul class="nav navbar-nav">
                @php
                    $menu = App\Model\Admin\Menu::whereMenu('Sidebar')->first();
                    if($menu) {
                      $parentMenus = App\Model\Admin\DaftarMenu::whereIdMenu($menu->id)->get();
                      $treeMenus = tree($parentMenus);
                    } else {
                      $treeMenus = [];
                    }
                @endphp
                @forelse($treeMenus as $menu)
                    @if($menu->children) 
                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ $menu->menu }}<span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            @foreach($menu->children as $child1)
                              <li><a href="{{ url("$child1->url") }}">{{ $child1->menu }}</a></li>
                            @endforeach
                          </ul>
                      </li>
                    @else
                      <li><a href="{{ url("$menu->url") }}">{{ $menu->menu }}</a></li>
                    @endif
                @empty
                @endforelse
                <li>
                  <div id="custom-search-input">
                    <div class="input-group col-md-12">
                      <input type="text" class="search-query form-control" placeholder="Search" />
                      <span class="input-group-btn">
                        <button class="btn btn-danger" type="button">
                          <span class="fa fa-search"></span>
                        </button>
                      </span>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
