<nav>
    <div class="nav-title">
        <h2>PREMILLINARY STATIONING </h2>
        <div class="line-diag"></div>
        <input type="button" class="octagon">
    </div>
    <div class="nav-bar" id="navBar">
        <div class="theme">
            <h3 class="theme-text" id="themeText">LIGHTMODE </h3>
            <div class="theme-switch" id="themeSwitch"><input type="button" class="octagon"></div>
        </div>
        <div class="line"></div>
        <h3>AVAILABLE OPTIONS </h3>
        <?php if ($user->isAdmin()): ?>
            <ul>
                <li onclick="window.location.href='?view=areas'">Area</li>
                <li onclick="window.location.href='?view=listlings'">Listings</li>
                <li onclick="window.location.href='?view=logs'">Logs</li>
                <li onclick="window.location.href='?view=values'">Values</li>
            </ul>
        <?php elseif ($user->isSecurity()): ?>
            <ul>
                <li onclick="window.location.href='?view=areas'">Area</li>
                <li onclick="window.location.href='?view=listlings'">Listings</li>
            </ul>
        <?php else: ?>
            <ul>
                <li onclick="window.location.href='?view=areas'">Area</li>
                <li onclick="window.location.href='?view=reports'">Report</li>
            </ul>
        <?php endif; ?>
    </div>
</nav>
