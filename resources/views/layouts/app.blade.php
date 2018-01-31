 <!DOCTYPE html>
  <html>
    <head>
      <title>@yield('title')</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

      @include('menu')

      @yield('content')

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
      <!-- js pusher -->
      <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
      
      <script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>

      @yield('footer')
    </body>
  </html>