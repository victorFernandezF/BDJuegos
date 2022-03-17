
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
<!--     <script src="../assets/js/general.functions.js" defer></script> -->
    <title>Añadir Evento</title>
</head>
<body>
    <div class="container">
        <div class="item">
            <div class="titulo">
                 <h1>BD - JUEGOS</h1>
            </div>
            <div class="menu">
                <?php include("menuses.php") ?>
            </div>
            <div class="texto">
                <div class="subtitulover"> 
                    <form class="formulariover" action="editselect.php" method="POST" enctype="multipart/form-data">
                        <fieldset class="nobordever">
                            <input type="checkbox" class="inputado" id="todos" name="todos" value="todos" onclick="tod()">
                            <label for="todos"> TODOS</label><br>
                        </fieldset>
                        <fieldset class="nobordever">
                            <input type="checkbox" class="inputado" id="plataforma" name="plataforma" value="plataforma" onclick="plat()">
                            <label for="plataforma"> PLATAFORMA </label>
                            <select class="selecto" name="plataforma2" id="plataforma2">
                                <option value="PS4">PS4</option>
                                <option value="PS3">PS3</option>
                                <option value="PS2">PS2</option>
                                <option value="PC">PC</option>
                            </select>
                        </fieldset>
                        <!-- GENERO -->
                        <fieldset class="nobordever">
                            <input type="checkbox" class="inputado" id="genero" name="genero" value="genero" onclick="gen()">
                            <label for="genero"> GENERO </label>
                            <select class="selecto" name="genero2" id="genero2">
                                <option value="Accion">ACCION</option>
                                <option value="Deporte">DEPORTE</option>
                                <option value="Platafdorma">PLATAFORMA</option>
                                <option value="Simulacion">SIMULACION</option>
                                <option value="Shooter">PIUM PIUM</option>
                                <option value="Lego">LEGO</option>
                                <option value="Superheroe">SUPERHEROE</option>
                            </select>
                        </fieldset>
                        <!-- JUGADORES -->
                        <fieldset class="nobordever">
                            <input type="checkbox" class="inputado" id="jugadores" name="jugadores" value="jugadores" onclick="jug()">
                            <label for="jugadores"> JUGADORES </label>
                            <select class="selecto" name="jugadores2" id="jugadores2">
                                <option value="1">1 JUGADOR</option>
                                <option value="1-2">DE 1 A 2 JUGADORES</option>
                                <option value="1-4">DE 1 A 4 JUGADORES</option>
                            </select>
                        </fieldset>
                        <fieldset class="nobordever">
                            <input class="boton" type="submit" name="ver" value="VER">           
                        </fieldset> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>

    function tod() {
        const todos = document.getElementById("todos");
        const plataforma = document.getElementById("plataforma");
        const plataforma2 = document.getElementById("plataforma2");
        const genero = document.getElementById("genero");
        const genero2 = document.getElementById("genero2");
        const jugadores = document.getElementById("jugadores");
        const jugadores2 = document.getElementById("jugadores2");

        if (todos.checked == true){
            plataforma.checked = false;
            plataforma2.style.visibility = "hidden";
            genero.checked = false;
            genero2.style.visibility = "hidden";
            jugadores.checked = false;
            jugadores2.style.visibility = "hidden";

        }

    }    
    function plat() {
        const todos = document.getElementById("todos");
        const plataforma = document.getElementById("plataforma");
        const plataforma2 = document.getElementById("plataforma2");
        if (plataforma.checked == true){
            todos.checked = false;
            plataforma2.style.visibility = "visible";
        } else {
            plataforma2.style.visibility = "hidden";
         }
    }
    function gen() {
        const todos = document.getElementById("todos");
        const genero = document.getElementById("genero");
        const genero2 = document.getElementById("genero2");
        if (genero.checked == true){
            todos.checked = false;
            genero2.style.visibility = "visible";
        } else {
            genero2.style.visibility = "hidden";
         }
    }
    function jug() {
        const todos = document.getElementById("todos");
        const jugadores = document.getElementById("jugadores");
        const jugadores2 = document.getElementById("jugadores2");
        if (jugadores.checked == true){
            jugadores2.style.visibility = "visible";
            todos.checked = false;
        } else {
            jugadores2.style.visibility = "hidden";
         }
    }

</script>




</html>