  <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{url('/kelas')}}">Data Kelas</a></li>
        <li><a href="{{url('/jurusan')}}">Data Jurusan</a></li>
        
        @if(!Auth::check())
          <li><a href="{{url('/login')}}">Login</a></li>
        @else
          <li><a href="{{ route('logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
              Logout
          </a></li>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        @endif

      </ul>
    </div>
  </nav>