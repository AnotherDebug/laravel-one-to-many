<header class="bg-dark">
    <nav class="navbar navbar-dark">
        <div class="container-fluid">
          <a href="{{route('home')}}" target="_blank" class="navbar-brand">Vai al sito</a>
          <form class="d-flex" role="search" action="{{route('logout')}}" method="POST">
            @csrf
            <button class="btn btn-light" type="submit"><i class="fa-solid fa-right-from-bracket"></i></button>
          </form>
        </div>
      </nav>
</header>
