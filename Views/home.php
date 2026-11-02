<main>
    <div class="introduction">
        <h1>PREMILLINARY STATIONING</h1>
        <h3>Choose where you stay</h3>
    </div>
    <div class="menu-list" id="menu-list">
        <?php if ($user->isAdmin()): ?>
            <div class="list-holder">
                <div class="list-block"></div>
                <div class="list-block"></div>
                <div class="list-block"></div>
                <div class="list-block"></div>
            </div>
        <?php elseif ($user->isSecurity()): ?>
            <div class="list-holder">
                <div class="list-block"></div>
                <div class="list-block"></div>
            </div>
        <?php else: ?>
            <div class="list-holder">
                <div class="list-block"></div>
                <div class="list-block"></div>
            </div>
        <?php endif; ?>
    </div>
</main>