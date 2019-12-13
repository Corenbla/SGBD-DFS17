<div style="height: 10vh">
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="/">Pokéshop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/allPokemons.php">All pokémons</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/lastPokemons.php">Last 10 pokémons</a>
                </li>
            </ul>
            <?php if (isset($_SESSION['user'])): ?>
                <ul class="navbar-nav my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../create.php">Create a new pokémon</a>
                    </li>
                    <li class="nav-item">
                        <a href="/myPokemons.php" class="nav-link">My pokémons</a>
                    </li>
                    <li class="nav-item">
                        <a href="/logout.php" class="nav-link">Logout</a>
                    </li>
                    <?php if ($_SESSION['user']['is_admin']): ?>
                        <li class="nav-item">
                            <a href="/register.php" class="nav-link">Create an account</a>
                        </li>
                    <?php endif; ?>
                </ul>
            <?php else: ?>
                <ul class="navbar-nav my-lg-0">
                    <li class="nav-item">
                        <a href="/login.php" class="nav-link">Login</a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </nav>
</div>
