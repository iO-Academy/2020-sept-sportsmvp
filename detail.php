<!DOCTYPE HTML>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#111111">
        <title>The Real MVP</title>
        <link rel="icon" type="image/x-icon" href="./app/images/favicon.ico">
        <link type='text/css' rel='stylesheet' href='./app/css/normalize.css' />
        <link type='text/css' rel='stylesheet' href='./app/css/style.css' />
    </head>
    <body>
        <?php require_once './vendor/autoload.php'; ?>
        <header>
            <button class="homeButton"><a href="index.php">HOME</a></button>
            <h1>The Real MVP</h1>
        </header>
        <main class="detailPage">
            <a href="detail.php?team=">
                <section>
                    <h2>FC Barcelona</h2>
                    <div class="content">
                        <img src="https://dev.maydenacademy.co.uk/resources/sports_teams/canucks.png" />
                        <ul>
                            <li>Sport: Football</li>
                            <li>Country: UK</li>
                            <li>Team colours: Red/Yellow</li>
                        </ul>
                    </div>
                    <p>"Futbol Club Barcelona, commonly referred to as Barcelona and colloquially known as Barça, is a Spanish professional football club based in Barcelona, that competes in the La Liga, the top flight of Spanish football."</p>
                </section>
            </a>
        </main>
        <footer>
            <img class="logo" src="./app/images/pangologo.png" />
            &copy; Pangolins <?php echo date('Y'); ?>
        </footer>
    </body>
</html>