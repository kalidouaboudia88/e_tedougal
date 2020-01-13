<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tedougal telecom Afrique</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('css/app.css')}}" rel="stylesheet" />
  
  <link href="{{asset('css/all.css')}}" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Tedougal</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('/') }}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="#">Panier</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
        </ul>
        
       
      </div>
      
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Produits</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Wax</a>
          <a href="#" class="list-group-item">Bazin</a>
          <a href="#" class="list-group-item">Drap</a>
          <a href="#" class="list-group-item">Rido</a>
          <a href="#" class="list-group-item">Brodé</a>
          <a href="#" class="list-group-item">Autres produits</a>


        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="images/wax2.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="images/wax1.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="images/wax3.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">

        @foreach($products as $product)
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <a href="/produit/{{$product->slug}}/show"><img class="card-img-top" src="{{$product->images ?? asset('uploads/images/default.png')}}" height="250" width="250" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="/produit/{{$product->slug}}/show">{{$product->name}}</a>
                    </h4>
                    <p class="card-text">{!! \Illuminate\Support\Str::words($product->description, 25,'....')  !!}</p>
                    <form action="#" id="{{'product_'.$product->id}}" class="add-to-cart">
                        @csrf
                        <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">cart.proudctsproudcts
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="price" value="{{$product->price}}">
                        <button type="submit" class="btn btn-primary btn-fancy" href="/produit/{{$product->id}}/show">Ajouter au panier</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        {{--<div>
            <nav aria-label="...">{{$products->links()}}</nav>
        </div>--}}


        </div>
        <!-- /.row -->


      </div>

      <!-- /.col-lg-9 -->

    </div>

    <!-- /.row -->


  </div>
  <!-- /.container -->


  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->

  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  
  <script src="{{asset('js/app.js')}}"></script>

</body>

</html>
