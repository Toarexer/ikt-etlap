<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Étlap</title>
    <link rel="stylesheet" href="style/style.css">
    <script src="script/script.js"></script>
</head>

<body>
    <nav id="desktop-nav" class="navbar">
        <a href="/?day=hetfo">Hétfő</a>
        <a href="/?day=kedd">Kedd</a>
        <a href="/?day=szerda">Szerda</a>
        <a href="/?day=csutortok">Csütörtök</a>
        <a href="/?day=pentek">Péntek</a>
        <a href="/?day=szombat">Szombat</a>
        <a href="/?day=vasarnap">Vasárnap</a>
    </nav>

    <nav id="mobile-nav" class="navbar">
        <div id="days">
            <a href="/?day=hetfo">Hétfő</a>
            <a href="/?day=kedd">Kedd</a>
            <a href="/?day=szerda">Szerda</a>
            <a href="/?day=csutortok">Csütörtök</a>
            <a href="/?day=pentek">Péntek</a>
            <a href="/?day=szombat">Szombat</a>
            <a href="/?day=vasarnap">Vasárnap</a>
        </div>
        <a href="javascript:void(0);" class="icon" onclick="ToggleHamburgerMenu()">
            <i class="fa fa-bars"></i>
        </a>
    </nav>

    <main>
        <?php
        include('./data/menu-days.php');
        include('./data/menu-cards.php');

        $query;
        parse_str(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY), $query);

        $day = $days[$query['day'] ?? 'hetfo'];

        echo "<h1>{$day['name']}i étlap</h1>\n<div>\n";
        foreach ($day['dishes'] as $id) {
            echo "<a href=\"./desc?dish=$id\">";
            echo "<div class=\"card\">\n";
            echo "<img src=\"img/{$cards[$id]['img']}\" alt=\"{$cards[$id]['name']} kép\">\n";
            echo "<h1>{$cards[$id]['name']}</h1>\n";
            echo "</div>";
            echo "</a>\n";
        }
        echo "</div>\n";
        ?>
    </main>
</body>

</html>