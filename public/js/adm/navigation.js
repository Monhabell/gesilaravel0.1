const popoverTriggerList = document.querySelectorAll(
  '[data-bs-toggle="popover"]'
);
const popoverList = [...popoverTriggerList].map(
  (popoverTriggerEl) => new bootstrap.Popover(popoverTriggerEl)
);

setInterval(notificador, 300000);

function notificador() {
  var cant = document.getElementById("CantRecept").value;
  notifyPrincipal(cant);

  $.ajax({
    type: "POST",
    url: "../../configuraciones/notificacion.php",
    data: {
      cant: cant,
    },
    success: function (r) {
      if (r != 0) {
        $("#notificaCantidadnueva").html(r);
        notifyPrincipal(cant);
      }

      if (cant == r) {
        //console.log('no hay cambio');
        //modaltostada();
      }
      if (cant > r) {
        modaltostadaRecepcion();
        document.getElementById("CantRecept").value = r;
        notifyPrincipal(cant);
      }

      if (cant < r) {
        modaltostada();
        document.getElementById("CantRecept").value = r;
        notifyPrincipal(cant);
      }

      if ((r = 0)) {
        //console.log('no hay cambio');
        $("#notificaCantidadnueva").html(0);
        notifyPrincipal(cant);
      }
    },
  });
}

function notifyPrincipal(c) {
  $.ajax({
    type: "POST",
    url: "../../configuraciones/Administradores/cabeceraNotifi.php",
    data: {
      cant: c,
    },
    success: function (r) {
      var arr = r.split(" ");
      $("#notificaCantidadnueva1").html(arr[0]);
      //console.log(arr)
      InfoRecep(arr);
    },
  });
}

// ---------------------------------------------------------------
// -------------------CANTIDADES ENTREGA-------------------------
// -------------------------------------------------------------

function InfoRecep(r) {
  if (r[0] == 0) {
    document.getElementById("listaNoty").innerHTML = "";
    const logo1 = document.createElement("div");
    logo1.textContent = "Sin recepciones pendientes";
    document.getElementById("listaNoty").appendChild(logo1);
  }

  if (r[0] == 1) {
    document.getElementById("listaNoty").innerHTML = "";

    for (a = 1; a <= 1; a++) {
      nombre1 = r[a];
      const logo1 = document.createElement("div");
      logo1.classList.add("logo");
      logo1.textContent = nombre1[0];
      const nombrentorno1 = document.createElement("div");
      nombrentorno1.classList.add("entornosnoti");
      nombrentorno1.textContent = nombre1;
      const Cantientorno1 = document.createElement("div");
      Cantientorno1.classList.add("entornosnoti");
      Cantientorno1.textContent = r[a + 1];

      document.getElementById("listaNoty").appendChild(logo1);
      //document.getElementById('listaNoty').appendChild(nombrentorno1)
      document.getElementById("listaNoty").appendChild(Cantientorno1);
    }
  }

  if (r[0] == 2) {
    document.getElementById("listaNoty").innerHTML = "";

    for (a = 1; a <= 2; a++) {
      nombre1 = r[a];
      const logo1 = document.createElement("div");
      logo1.classList.add("logo");
      logo1.textContent = nombre1[0];
      const nombrentorno1 = document.createElement("div");
      nombrentorno1.classList.add("entornosnoti");
      nombrentorno1.textContent = nombre1;
      const Cantientorno1 = document.createElement("div");
      Cantientorno1.classList.add("entornosnoti");
      Cantientorno1.textContent = r[a + 2];

      document.getElementById("listaNoty").appendChild(logo1);
      //document.getElementById('listaNoty').appendChild(nombrentorno1)
      document.getElementById("listaNoty").appendChild(Cantientorno1);
    }
  }

  if (r[0] == 3) {
    document.getElementById("listaNoty").innerHTML = "";

    for (a = 1; a <= 3; a++) {
      nombre1 = r[a];
      const logo1 = document.createElement("div");
      logo1.classList.add("logo");
      logo1.textContent = nombre1[0];
      const nombrentorno1 = document.createElement("div");
      nombrentorno1.classList.add("entornosnoti");
      nombrentorno1.textContent = nombre1;
      const Cantientorno1 = document.createElement("div");
      Cantientorno1.classList.add("entornosnoti");
      Cantientorno1.textContent = r[a + 3];

      document.getElementById("listaNoty").appendChild(logo1);
      //document.getElementById('listaNoty').appendChild(nombrentorno1)
      document.getElementById("listaNoty").appendChild(Cantientorno1);
    }
  }

  if (r[0] == 4) {
    document.getElementById("listaNoty").innerHTML = "";

    for (a = 1; a <= 4; a++) {
      nombre1 = r[a];
      const logo1 = document.createElement("div");
      logo1.classList.add("logo");
      logo1.textContent = nombre1[0];
      const nombrentorno1 = document.createElement("div");
      nombrentorno1.classList.add("entornosnoti");
      nombrentorno1.textContent = nombre1;
      const Cantientorno1 = document.createElement("div");
      Cantientorno1.classList.add("entornosnoti");
      Cantientorno1.textContent = r[a + 4];

      document.getElementById("listaNoty").appendChild(logo1);
      //document.getElementById('listaNoty').appendChild(nombrentorno1)
      document.getElementById("listaNoty").appendChild(Cantientorno1);
    }
  }

  if (r[0] == 5) {
    document.getElementById("listaNoty").innerHTML = "";

    for (a = 1; a <= 5; a++) {
      nombre1 = r[a];
      const logo1 = document.createElement("div");
      logo1.classList.add("logo");
      logo1.textContent = nombre1[0];
      const nombrentorno1 = document.createElement("div");
      nombrentorno1.classList.add("entornosnoti");
      nombrentorno1.textContent = nombre1;
      const Cantientorno1 = document.createElement("div");
      Cantientorno1.classList.add("entornosnoti");
      Cantientorno1.textContent = r[a + 5];

      document.getElementById("listaNoty").appendChild(logo1);
      //document.getElementById('listaNoty').appendChild(nombrentorno1)
      document.getElementById("listaNoty").appendChild(Cantientorno1);
    }
  }
}

setTimeout(mostrar1, 5000);

document
  .getElementById("notificacionEntornos")
  .addEventListener("mouseover", animation);
document
  .getElementById("notificacionEntornos")
  .addEventListener("mouseout", ocultar);

function mostrar1() {
  let divNotificacion = document.getElementById("notificacionEntornos");
  divNotificacion.classList.remove("desplazamientoDer");
  divNotificacion.classList.add("desplazamientoIzq");
  setTimeout(ocultar, 5000);
}

function animation() {
  let divNotificacion = document.getElementById("notificacionEntornos");
  divNotificacion.classList.remove("desplazamientoDer");
  divNotificacion.classList.add("desplazamientoIzq");
}

function ocultar() {
  let divNotificacion = document.getElementById("notificacionEntornos");
  divNotificacion.classList.remove("desplazamientoIzq");
  divNotificacion.classList.add("desplazamientoDer");
}

//NOTIFICACIONES

function modaltostada() {
  Push.create("Recepción", {
    body: "Un entorno ha cargado fichas ",
    icon: "../../imagenes/logo.png",
    timeout: 900000,
    onClick: function () {
      window.focus();
      this.close();
    },
  });
  const toastLiveExample = document.getElementById("liveToast");
  const toast = new bootstrap.Toast(toastLiveExample);
  toast.show();
}

function modaltostadaRecepcion() {
  Push.create("Recepción", {
    body: "Se han Recibido Fichas ",
    icon: "../../imagenes/logo.png",
    timeout: 900000,
    onClick: function () {
      //window.focus();
      //this.close();
    },
  });

  const toastLiveExample = document.getElementById("liveToast");
  const toast = new bootstrap.Toast(toastLiveExample);
  toast.show();
}

function rotateicon(j) {
  const rotated = document.getElementById(j).classList.value;
  //console.log(rotated);

  if (rotated == "rotateIcon") {
    const rotacion1 = document.getElementById(j);
    rotacion1.classList.remove("rotateIcon");
    rotacion1.classList.add("rotateIcon1");
  } else {
    const rotacion1 = document.getElementById(j);
    rotacion1.classList.remove("rotateIcon1");
    rotacion1.classList.add("rotateIcon");
  }
  
}


// Función para obtener el número de días hábiles entre dos fechas contando festivos 
function getDiasHabilesEntreFechas(startDate, endDate) {
  let count = 0;

  for (let date = new Date(startDate); date <= endDate; date.setDate(date.getDate() + 1)) {
    const dayOfWeek = date.getDay();
    // Considerar días de lunes a viernes (0 a 4 representan de domingo a jueves)
    if (dayOfWeek >= 1 && dayOfWeek <= 5 && !isColombianHoliday(date)) {
      count++;
    }
  }

  return count;
}

// Función para asignar las horas hábiles entre dos fechas
function asignarHorasHabiles(startDate, endDate) {
  const numDiasHabiles = getDiasHabilesEntreFechas(startDate, endDate);
  const horasPorDia = 8;

  const horasTotales = numDiasHabiles * horasPorDia;
  result = horasTotales;
  document.getElementById('DiasHabiles').value = result;
}

// Función auxiliar para formatear la fecha en formato "YYYY-MM-DD"
function formatDate(date) {
  const year = date.getFullYear();
  const month = String(date.getMonth() + 1).padStart(2, "0");
  const day = String(date.getDate()).padStart(2, "0");
  return `${year}-${month}-${day}`;
}

// festivos en Colombia
function isColombianHoliday(date) {
  const colombianHolidays = [
    "2023-01-09",
    "2023-03-20",
    "2023-04-06",
    "2023-04-07",
    "2023-05-01",
    "2023-05-22",
    "2023-06-12",
    "2023-06-19",
    "2023-07-03",
    "2023-07-20",
    "2023-08-07",
    "2023-08-21",
    "2023-10-16",
    "2023-11-06",
    "2023-11-13",
    "2023-12-08",
    "2023-12-25"
  ];

  const formattedDate = formatDate(date);
  return colombianHolidays.includes(formattedDate);
}

// Obtener la fecha actual
const hoy = new Date();
const year = hoy.getFullYear();
let month = hoy.getMonth();
const day = hoy.getDate();

let mesanterior, messiguiente;

if (day < 26) {
  // Si el día actual es antes del día 26, resta un mes
  mesanterior = month - 1;
  if (mesanterior < 0) {
    mesanterior = 11; // Diciembre (11) si el mes es enero (0)
    year -= 1; // Restar un año si se cambia al mes de diciembre
  }
  messiguiente = month;

} else {
  mesanterior = month;
  messiguiente = month;
  if (messiguiente > 11) {
    messiguiente = 0; // Enero (0) si el mes es diciembre (11)
    year += 1; // Sumar un año si se cambia al mes de enero
  }
}

// Obtener las fechas de inicio y fin
const startDate = new Date(year, mesanterior, 26); // 26 de mesanterior de 2023
const endDate = new Date(year, messiguiente, day); // Día actual de messiguiente de 2023

// Llamar a la función para asignar las horas hábiles entre estas fechas
asignarHorasHabiles(startDate, endDate);

const inputElements = document.querySelectorAll('.input-number');
const resultadoElement = document.getElementById('resultado');

// Función para calcular y actualizar el resultado
function calcularResultado() {
  const input1Value = parseFloat(inputElements[0].value) || 0;
  const input2Value = parseFloat(inputElements[1].value) || 0;
  const input3Value = parseFloat(inputElements[2].value) || 0;

  const resultado = input1Value + (input2Value * input3Value);
  resultadoElement.value = resultado;
}

// Agregar evento de escucha 'blur' para cada input
inputElements.forEach((input) => {
  input.addEventListener('blur', calcularResultado);
});

calcularResultado();


