function toggleEmpleados() {
    let menu = document.getElementById("subEmpleados");
    menu.style.display = menu.style.display === "block" ? "none" : "block";
}

function mostrar(id) {
    let secciones = document.querySelectorAll(".seccion");

    secciones.forEach(sec => sec.style.display = "none");

    document.getElementById(id).style.display = "block";
}