window.onload = function(){
    let millis = 0;
    let secs = 0;
    let mins = 0;
    let addMillis = document.querySelector("#millis");
    let addSecs = document.querySelector("#secs");
    let addMins = document.querySelector("#mins");
    let Interval;
    let keysq = [];
    console.log(keybindArray);

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
            
            if ((keysq[0] == keybindArray[3][2]) && (keysq[1] == keybindArray[2][2])){
                document.getElementById("success").innerHTML = "Correct!";
            } else {
                document.getElementById("success").innerHTML = "Incorrect!";
            }
            document.getElementById("keybind").innerHTML = 'Correct keybind is "Alt + t"';
            keysq = [];
        }
    })

    window.addEventListener('keydown', e => {
        if (e.code == 'Space'){
            clearInterval(Interval);
            Interval = setInterval(startTimer, 10);
        }
    })
}