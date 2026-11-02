<nav>
    <div class="nav-title">
        <h2>PREMILLINARY STATIONING </h2>
        <img src="" alt="">
        <div class="line-diag"></div>
        <button></button>
    </div>
    <div class="nav-bar" id="navBar">
        <div class="theme">
            <h3 class="theme-text" id="themeText">LIGHTMODE </h3>
            <div class="theme-switch" id="themeSwitch"></div>
        </div>
        <div class="line-full"></div>
        <div class="list-hide" id="listHide">
            <h3>AVAILABLE OPTIONS </h3>
            <div class="list-hide" id="listHide"></div>
        </div>
        <div class="nav-list" id="navList">
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
    </div>
</nav>
