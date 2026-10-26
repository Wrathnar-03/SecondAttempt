<nav>
    <div class="nav-title">
        <h1>PREMILLINARY STATIONING </h1>
        <img src="" alt="">
        <div class="line-diag"></div>
        <button></button>
    </div>
    <div class="nav-bar" id="navBar">
        <div class="theme">
            <h2 class="theme-text" id="themeText">LIGHTMODE </h2>
            <div class="theme-switch" id="themeSwitch"></div>
        </div>
        <div class="line-full"></div>
        <div class="list-hide" id="listHide">
            <h2>AVAILABLE OPTIONS </h2>
            <div class="list-hide" id="listHide"></div>
        </div>
        <div class="nav-list" id="navList">
            <?php if ($user->isAdmin()): ?>
                <ul>
                    <li onclick="window.location.href='?view=areas'">Areas</li>
                    <li onclick="window.location.href='?view=listlings'">Listings</li>
                    <li onclick="window.location.href='?view=logs'">Logs</li>
                    <li onclick="window.location.href='?view=values'">Values</li>
                </ul>
            <?php elseif ($user->isSecurity()): ?>
                <ul>
                    <li onclick="window.location.href='?view=areas'">Areas</li>
                    <li onclick="window.location.href='?view=listlings'">Listings</li>
                </ul>
            <?php else: ?>
                <ul>
                    <li onclick="window.location.href='?view=areas'">Areas</li>
                    <li onclick="window.location.href='?view=reports'">Report</li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>
