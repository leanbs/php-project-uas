<!-- Static navbar -->
<header class="navbar-fixed-top">
      <nav class="navbar navbar-static">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">FORUM TESTING</a> 
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              @if (!Auth::user())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
              @elseif (Auth::user()->role == 1)

                <li><a href="{{ url('/daftar_anggota') }}"><i class="fa fa-child fa-lg"></i><br/>Anggota</a></li>
                <li><a href="{{ url('/laporan_keuangan') }}"><i class="fa fa-money fa-lg"></i><br/>Keuangan</a></li>
                <li><a href="#"><i class="fa fa-question fa-lg"></i><br/>Rencana Ulaon Adat</a></li>
                <li><a href="{{ url('/informasi_kegiatan') }}"><i class="fa fa-calendar fa-lg"></i><br/>Kegiatan</a></li>
                <li><a href="{{ url('/pengurus_punguan') }}"><i class="fa fa-users fa-lg"></i><br/>Pengurus Punguan</a></li>
                <li><a href="{{ url('/category') }}"><i class="fa fa-book fa-lg"></i><br/>Kategori</a></li>
                <li><a href="{{ url('/question/posts') }}"><i class="fa fa-reply fa-lg"></i><br/>Post !</a></li>

                
                <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Pengurus Punguan <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Pengurus Se-Jabodetabek</a></li>
                        <li><a href="#">Pengurus Wilayah</a></li>
                    </ul>
                </li> -->
                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <i class="fa fa-user fa-lg"></i><br/>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>  

              @else            
                <li><a href="{{ url('/question/posts') }}"><i class="fa fa-reply fa-lg"></i><br/>Post !</a></li>

                
                <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Pengurus Punguan <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Pengurus Se-Jabodetabek</a></li>
                        <li><a href="#">Pengurus Wilayah</a></li>
                    </ul>
                </li> -->
                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <i class="fa fa-user fa-lg"></i><br/>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li> 
              @endif
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
</header>