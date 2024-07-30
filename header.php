<?php
// Get the current page name
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- Navbar Start -->
<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <a class="logo" href="index.php">
            <span class="logo-light-mode">
                <img src="images/terralogo.png" class="l-dark" alt="">
                <img src="images/terralogo.png" class="l-light" alt="">
            </span>
            <img src="images/logo-light.png" class="logo-dark-mode" alt="">
        </a>

        <div class="menu-extras">
            <div class="menu-item">
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
        </div>

        <ul class="buy-button list-inline mb-0">
            <li class="list-inline-item ps-1 mb-0">

                <div class="dropdown">
                    <button type="button" class="dropdown-toggle btn btn-sm btn-icon btn-pills btn-primary"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="search" class="icons"></i>
                    </button>

                    <div class="dropdown-menu dd-menu dropdown-menu-end bg-white rounded-3 border-0 mt-3 p-0"
                        style="width: 240px;">
                        <div class="search-bar">
                            <div id="itemSearch" class="menu-search mb-0">
                                <form role="search" method="get" id="searchItemform" class="searchform">
                                    <input type="text" class="form-control rounded-3 border" name="s" id="searchItem"
                                        placeholder="Search...">
                                    <input type="submit" id="searchItemsubmit" value="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </li>


            <li class="list-inline-item ps-1 mb-0">
                <a href="auth-login.php" class="btn btn-sm btn-icon btn-pills btn-primary">
                    <i data-feather="user" class="icons"></i>
                </a>

                <!-- Conditionally display the plus icon based on the current page -->
                <?php if ($current_page == 'agents.php'): ?>
                <a href="#" class="btn btn-sm btn-icon btn-pills btn-primary" data-bs-toggle="modal"
                    data-bs-target="#addAgentModal">
                    <i data-feather="plus" class="icons"></i>
                </a>
                <?php endif; ?>

                <?php if (session_status() === PHP_SESSION_NONE) {session_start();} ?>
                <?php if (isset($_SESSION['LoginEmail'])): ?>

                <a href="logout.php" class="btn btn-sm btn-icon btn-pills btn-primary " class="dropdown-item"
                    type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i data-feather="log-out" class="icons"> Sign out </i>
                </a>


                <?php endif; ?>

            </li>


        </ul>

        <div id="navigation">
            <ul class="navigation-menu nav-left nav-light">
                <li><a href="index.php" class="sub-menu-item">Home</a></li>
                <li><a href="formtransactions.php" class="sub-menu-item">Buy</a></li>
                <li><a href="sell.php" class="sub-menu-item">Sell</a></li>
                <li class="has-submenu parent-parent-menu-item">
                    <a href="javascript:void(0)">Listing</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)">List</a><span
                                class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="list.php" class="sub-menu-item">House Listings</a></li>
                                <li><a href="listtransactions.php" class="sub-menu-item">Transactions Listing</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)">People</a><span
                                class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="agents.php" class="sub-menu-item">Agents</a></li>
                                <li><a href="parties.php" class="sub-menu-item">Parties</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</header>
<!-- Navbar End -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                You've been signed out.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="logoutButton">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
document.getElementById('logoutButton').addEventListener('click', function() {
    window.location.href = 'logout.php'; // Redirect to logout.php
});
</script>