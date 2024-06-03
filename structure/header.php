<?php
/***
 * @var string $curPage
 */
?>

<header class="site-header">
    <a class="site-logo" href="/index.php">
        <img src="/image/azalea-logo.png" alt="site_logo">
    </a>

    <nav class="navbar">
        <ul class="nav-links">
            <li class="nav-link <?php if ($curPage == "home") { echo "active"; } ?> "><a href="index.php">Home</a></li>
            <li class="nav-link <?php if ($curPage == "about") { echo "active"; } ?> "><a href="about.php">About us</a></li>
        </ul>
    </nav>
</header>