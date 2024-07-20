        <!-- Navbar Start -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <a class="logo" href="index.html">
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
                                            <input type="text" class="form-control rounded-3 border" name="s"
                                                id="searchItem" placeholder="Search...">
                                            <input type="submit" id="searchItemsubmit" value="Search">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item ps-1 mb-0">
                        <a href="auth-login.html" class="btn btn-sm btn-icon btn-pills btn-primary"><i
                                data-feather="user" class="icons"></i></a>
                    </li>
                </ul>

                <div id="navigation">
                    <ul class="navigation-menu nav-left nav-light">

                        <li><a href="index.php" class="sub-menu-item">Home</a></li>

                        <li><a href="buy.html" class="sub-menu-item">Buy</a></li>

                        <li><a href="sell.php" class="sub-menu-item">Sell</a></li>
                        <li class="has-submenu parent-parent-menu-item">
                            <a href="javascript:void(0)">Listing</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> List View
                                    </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="list.php" class="sub-menu-item">List Listing</a></li>
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