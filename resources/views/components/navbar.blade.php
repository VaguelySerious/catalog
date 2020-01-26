<nav class="navbar" role="navigation" aria-label="main navigation">
  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a href="/" class="navbar-item">
        Home
      </a>

      @auth
      <a href="/products" class="navbar-item">
        Products
      </a>
      @endauth
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          @auth
            <form class="form" action="/logout" method="POST">
                @csrf
                <div class="field is-grouped is-grouped-centered">
                    <div class="control">
                        <button class="button is-link is-light">Logout</button>
                    </div>
                </div>
            </form>
          @else
            <a href="/register" class="button is-link">
              <strong>Register</strong>
            </a>
            <a href="/login" class="button is-light">
              Login
            </a>
          @endauth
        </div>
      </div>
    </div>
  </div>
</nav>