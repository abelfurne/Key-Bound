<!DOCTYPE html>
<html>
    <head>
        <title>Key Bound | Practice</title>
        <link rel="shortcut icon" type="image/png" href="/images/kblogo.png">
        <link rel="stylesheet" href="styles.css">
        <script type="text/javascript" src="../controller/listener.js"></script>
    </head>
    <body>
        <a href="about.php"><img id="homelogo" src="images/kblogo.png" alt="Key Bound logo"></a>
        <nav>
            <table>
                <tr>
                    <td class="rpad"><a href="about.php">Home</a></td>
                    <td class="rpad"><a href="practice.php">Practice</a></td>
                    <td class="rpad"><a href="keybinds.php">Keybinds</a></td>
                    <td class="rpad"><a href="login.php">Login</a></td>
                    <td><a href="profile.php">Profile</a></td>
                </tr>
            </table>
        </nav>
        <div class="center boxed">
            <h2>
                <span id="mins">00</span> : <span id="secs">00</span> : <span id="millis">00</span>
            </h2>
            <img src="images/fireball.jpg" class="iconimg" alt="variable"/>
            <h2 id="keybind">&nbsp</h2>
            <h2 id="success">&nbsp</h2>
            <h2 id="record">&nbsp</h2>
        </div>
        <h2 id="keyspressed" class="center"></h2>
    </body>
</html>