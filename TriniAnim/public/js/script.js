// Resumen-diario

// AJAX
function loadEmocion() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("resumen").innerHTML =
                this.responseText;
        }
    };
    xhttp.open("GET", '/resumen', true);
    xhttp.send();
}

// El tiempo que dura la notificación
    setTimeout(function () {
        document.getElementById('notificacion').style.display = 'none';
    }, 2000);




// Save

function prueba(id, blade) {
    //ruta dnd estan las imagenes
    var ruta = blade;
    //recojo las imagenes
    var imagenes = document.getElementsByClassName("imagenes");
    //las recojo
    for (var i = 0; i < imagenes.length; i++) {
        //Si el id no coincide con el id de la que ha sido seleccionada
        if (imagenes[i].id != id) {
            //la pinto sin color
            imagenes[i].src = ruta + "/" + imagenes[i].id + "b.png";
        } else { //Si el id coincide
            //la pinto en color
            imagenes[i].src = ruta + "/" + id + ".png";
        }
    }
}

//admin

function loadEmocionAdmin(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("admin" + id).innerHTML =
                this.responseText;
        }
    };
    xhttp.open("GET", '/admin/' + id, true);
    xhttp.send();
}

// Gráfico

function crearGrafico(emociones, eventos) {
    var tipoGrafico=document.getElementById('tipoGrafico').value;
    var xValues = emociones;
    var yValues = eventos;
    var colores = [
        "#FE3916",
        "#F57615",
        "#FDD51B",
        "#A1DE38",
        "#23B522"
    ];
    new Chart("grafico", {
        type: tipoGrafico,
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: colores,
                data: yValues
            }]
        }
    });
}

function filtro(){
    // Obtener la fecha actual
    var hoy = new Date().toISOString().split('T')[0];

    // Asignar la fecha actual al input
    document.getElementById("fecha").setAttribute("max", hoy);
}