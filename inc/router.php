
<?php
include "nav.php";
$includePath = "";

foreach ($nav as $path => $key) {
    switch (htmlspecialchars(isset($_GET["page"])) ? htmlspecialchars($_GET["page"]) : "") {
        case $path:
            $siteTitle = $key;
            $includePath = "pages/$path.php";
            break;
        default:
            if (empty($includePath)) {
                $siteTitle = "Home";
                $includePath = "pages/home.php";
            }
            break;
    }
}
