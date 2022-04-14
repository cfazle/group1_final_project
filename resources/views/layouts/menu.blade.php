
   <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="index.html" class="navbar-brand px-lg-4 m-0">
               <h1 class="  text-white">Our Coffee Shop</h1>
           <!--  <div class ="logo"><b>Welcome to Coffee Shop!</b></div> -->
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                  <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <div class="navbar-nav ml-auto p-4">
                             <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
                             <a href="{{route('about')}}" class="nav-item nav-link">About</a>

                             <a href="{{route('products')}}" class="nav-item nav-link">Menu</a>
                             <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>


                      </ul>
                        </div>
                                  <!-- Right Side Of Navbar -->
                         <div class="top-nav-right">

                            <ul class="navbar-nav ms-auto">
                                      <!-- Authentication Links -->
                                      @guest
                                          @if (Route::has('login'))
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                   </li>
                                          @endif

                                          @if (Route::has('register'))
                                    <li class="nav-item">
                                         <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                     </li>
                                          @endif
                                      @else
                                          <li class="nav-item dropdown">
                                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                  {{ Auth::user()->name }}
                                              </a>
                                              <a class="dropdown-item" href="{{ route('logout') }}"
                                                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                  {{ __('Logout') }}
                                               </a>
                                               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                      @csrf
                                                  </form>
                                              </div>
                                          </li>
                                      @endguest
                                  </ul>

                                  <form action="{{ route('search') }}" method="GET">
                                      <input type="text" name="search" required/>
                                      <button type="submit">Search</button>
                                  </form>
                                  </div>
                              </div>

                    </div>

         </nav>
    </div>
