document.addEventListener("DOMContentLoaded", () => {

    // Hamburger / Sidebar toggle (móvil) 
    const hamburger = document.querySelector(".hamburger");
    const sidebar   = document.querySelector(".sidebar");
    const overlay   = document.querySelector(".overlay");

    function openSidebar() {
        sidebar.classList.add("open");
        overlay.classList.add("show");
    }

    function closeSidebar() {
        sidebar.classList.remove("open");
        overlay.classList.remove("show");
    }

    if (hamburger) hamburger.addEventListener("click", openSidebar);
    if (overlay) overlay.addEventListener("click", closeSidebar);

    // Cerrar sesión
    const btnLogout = document.getElementById("btn-logout");
    if (btnLogout) {
        btnLogout.addEventListener("click", (e) => {
            e.preventDefault();
            if (confirm("¿Seguro que deseas cerrar sesión?")) {
                window.location.href = e.currentTarget.href;
            }
        });
    }

    // =========================
    //  GRAFICO DE BARRAS
    // =========================
    const ctx = document.getElementById('graficoSemana');

    if (ctx) {
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
                datasets: [{
                    data: [0,1,0,1,0,0]
                }]
            }
        });
    }

   // =========================
// GRAFICO CIRCULAR
// =========================

let asistio = 0;
let tardanza = 0;
let falto = 0;

if (typeof resumen !== "undefined") {

    resumen.forEach(item => {

        if(item.estado === 'asistio'){
            asistio = parseInt(item.total);
        }

        if(item.estado === 'tardanza'){
            tardanza = parseInt(item.total);
        }

        if(item.estado === 'falto'){
            falto = parseInt(item.total);
        }

    });

}

const ctx2 = document.getElementById('graficoPorcentaje');

if (ctx2) {

    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['Asistió','Tardanza','Faltó'],
            datasets: [{
                data: [asistio,tardanza,falto]
            }]
        }
    });

}

});