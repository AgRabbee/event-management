<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <img src="https://placehold.co/50/343434/FFF.png?text=User&font=roboto" alt="Logged In User" class="img-circle img-size-32 mr-2">
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">User Name</span>
                <div class="dropdown-divider"></div>
                <form action="#" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        Logout
                    </button>
                </form>

            </div>
        </li>
    </ul>
</nav>
