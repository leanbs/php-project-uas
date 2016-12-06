<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Navbar Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" >
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

  </head>

  <body>

    <div class="main-container">
            {{-- Warning messages --}}
            <noscript>
                <div class="text-center text-bold">
                    <h3>
                        <label class="label label-warning" for="warning">
                            This site may not work correctly without javascript,
                            please enable your javascript to ensure content quality.
                        </label>
                    </h3>
                </div>
            </noscript>

            <div class="container-fluid">
                {{-- Page content --}}
                @yield('page-content')
            </div>
        </div>

        @include('layouts.masters.footer')

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>   
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/scripts.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.4.2/tinymce.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.com/libraries/jquery-smooth-scroll"></script>
    
    @yield('script')
  </body>
</html>
