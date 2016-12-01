<?php
if ($fileToLoad != "home") { $logo = "logo.png"; } else { $logo = "logo_w.png"; }

return "
    <!-- ====|  SITE GLOBAL NAVIGATION   |==== -->

    <!-- separate menu and logo for small screens -->
    <div id=\"small-screen\">
    <a href=\"#menu\" class=\"menu-link\">Menu</a>
    <p class=\"logo\"><a href=\"/\"><img src=\"./img/$logo\" width=\"200\" alt=\"Logo > Home\"></a></p>
  
        <nav id=\"menu\" role=\"navigation\">
            <ul title=\"Main menu\" class=\"primary\">
                <li><a href=\"index.php?page=about\" title=\"About us\">about us</a></li>
                <li><a href=\"index.php?page=portfolio\" title=\"Portfolio\">portfolio</a></li>
                <li><a href=\"index.php?page=prices\" title=\"Prices\">prices</a></li>
                <li><a href=\"index.php?page=contact\" title=\"Contacts\">contact</a></li>
            </ul>
        </nav>
     </div>
     
        <div id=\"all-in-all\">
        <nav id=\"menu\" role=\"navigation\">
            <ul title=\"Main menu\" class=\"primary\">
                <li><a href=\"index.php?page=about\" title=\"About us\">about us</a></li>
                <li><a href=\"index.php?page=portfolio\" title=\"Portfolio\">portfolio</a></li>
                <li><a href=\"index.php?page=home\" title=\"Home\"><img src=\"./img/$logo\" width=\"200\" alt=\"Logo > Home\"></a></li>
                <li><a href=\"index.php?page=prices\" title=\"Prices\">prices</a></li>
                <li><a href=\"index.php?page=contact\" title=\"Contacts\">contact</a></li>
            </ul>
        </nav>
        </div>
        <!-- end all-in-all -->
         
        <!-- end site global navigation -->";



