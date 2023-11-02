<!DOCTYPE html>
<html>
    <head>
        <title>Key Bound | Practice</title>
        <link rel="shortcut icon" type="image/png" href="/images/kblogo.png">
        <link rel="stylesheet" href="styles.css">
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

<script>
    window.onload = function(){
    let millis = 0;
    let secs = 0;
    let mins = 0;
    let addMillis = document.querySelector("#millis");
    let addSecs = document.querySelector("#secs");
    let addMins = document.querySelector("#mins");
    let Interval;
    let keysq = [];

    const startTimer = () => {
        millis++;
        if (millis <= 9){
            addMillis.innerHTML = "0" + millis;
            millisV = "0" + millis;
        }
        if (millis > 9){
            addMillis.innerHTML = millis;
        }
        if (millis > 99){
            secs++;
            addSecs.innerHTML = "0" + secs;
            millis = 0;
            addMillis.innerHTML = "0" + millis;
        }
        if (secs > 9){
            addSecs.innerHTML = secs;
        }
        if (secs > 59){
            mins++;
            addMins.innerHTML = "0" + mins;
            secs = 0;
            addSecs.innerHTML = "0" + mins;
        }
    }

    window.addEventListener('keydown', e => {
        if (e.repeat) return;
        if (e.code != 'Space'){
            keysq.push(e.key);
        }
        console.log(keysq);
        
        if (keysq.length == 2){
            clearInterval(Interval);
            
            if ((keysq[0] == 'Alt') && (keysq[1] == 't')){
                document.getElementById("success").innerHTML = "Correct!";
            } else {
                document.getElementById("success").innerHTML = "Incorrect!";
            }
            document.getElementById("keybind").innerHTML = 'Correct keybind is "Alt + t"';
            document.getElementById("record").innerHTML = 'Record: 00:00:53';
            keysq = [];
        }
    })

    window.addEventListener('keydown', e => {
        if (e.code == 'Space'){
            addMillis.innerHTML = "0" + millis;
            millisV = "0" + millis;
            addSecs.innerHTML = "0" + secs;
            millis = 0;
            addMillis.innerHTML = "0" + millis;
            addMins.innerHTML = "0" + mins;
            secs = 0;
            addSecs.innerHTML = "0" + mins;
            document.getElementById("keybind").innerHTML = '&nbsp';
            document.getElementById("success").innerHTML = '&nbsp';
            document.getElementById("record").innerHTML = '&nbsp';
            clearInterval(Interval);
            Interval = setInterval(startTimer, 10);
        }
    })
}
</script>
</html>