const botones = document.querySelectorAll(".bEliminar");
botones.forEach(boton => {
    boton.addEventListener("click", function(){
        const matricula = this.dataset.matricula;//obtener la matricula
        const confirm = window.confirm("¿Deseas eliminar al alummno" + matricula + "?");
        if(confirm){
            //comienza el ajax
            httpRequest("http://localhost/ejemplo/consulta/eliminarAlumno/" + matricula, function(){
                //console.log(this.responseText);
                document.querySelector('#respuesta').innerHTML = this.responseText;

                const tbody = document.querySelector("#tbody-alumnos");
                const fila = document.querySelector("#fila-" + matricula);

                tbody.removeChild(fila);//elimina la fila visualmente
            });
        }
    });
});

function httpRequest(url, callback){
    const http = new XMLHttpRequest();//objeto http
    http.open("GET", url);//definir metodo, url a cargar
    http.send();//mandar solicitud

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            callback.apply(http);
        }
    }
}