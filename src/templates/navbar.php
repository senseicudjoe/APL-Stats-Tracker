<?php
// Get the current file name
$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="nav flex-column bg-dark p-3" style="width: 250px; height: 100vh;">
    <a class="nav-link text-light fs-4 mt-5 <?= ($current_page == 'dashboard.php') ? 'active' : '' ?>" href="dashboard.php">
        <i class="bi bi-house fs-3"></i> Home
    </a>
    <a class="nav-link text-light fs-4 <?= ($current_page == 'users.php') ? 'active' : '' ?>" href="users.php">
        <i class="bi bi-people-fill fs-3"></i> Users
    </a>
    <a class="nav-link text-light fs-4 <?= ($current_page == 'teams.php') ? 'active' : '' ?>" href="teams.php">
        <i class="bi bi-shield-fill fs-3"></i> Teams
    </a>
    <a class="nav-link text-light fs-4 <?= ($current_page == 'players.php') ? 'active' : '' ?>" href="players.php">
        <i class="fas fa-running fs-3"></i> Players
    </a>
    <a class="nav-link text-light fs-4 <?= ($current_page == 'stats.php') ? 'active' : '' ?>" href="stats.php">
        <i class="bi bi-graph-up fs-3"></i> Game Stats
    </a>
</nav>