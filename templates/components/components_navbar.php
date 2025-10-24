<nav>
    <ul>
        <li><strong>Chocoblast</strong></li>
    </ul>
    <ul>
        <!-- Menu Commun -->
        <li><a href="/">Home</a></li>
        <li><a href="/cgu">CGU</a></li>
        <!-- Menu déconnecté -->
        <?php if (!isset($_SESSION["email"])) : ?>
            <li><a href="/register">Register</a></li>
            <li><a href="/login">Login</a></li>
        <?php else : ?>
            <!-- Menu connecté -->
            <li><a href="/test">Test</a></li>
            <li><a href="/logout">Logout</a></li>
        <?php endif ?>
    </ul>
</nav>