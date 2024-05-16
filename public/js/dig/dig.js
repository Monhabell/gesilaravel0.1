
$(document).ready(function () {

    $("#sidebarToggle, #sidebarToggleTop").on('click', function (e) {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
        };
    });

    // Close any open menu accordions when window is resized below 768px
    $(window).resize(function () {
        if ($(window).width() < 768) {
            $('.sidebar .collapse').collapse('hide');
        };

        // Toggle the side navigation when window is resized below 480px
        if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
            $("body").addClass("sidebar-toggled");
            $(".sidebar").addClass("toggled");
            $('.sidebar .collapse').collapse('hide');
        };
    });

    // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
    $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function (e) {
        if ($(window).width() > 768) {
            var e0 = e.originalEvent,
                delta = e0.wheelDelta || -e0.detail;
            this.scrollTop += (delta < 0 ? 1 : -1) * 30;
            e.preventDefault();
        }
    });

    // Scroll to top button appear
    $(document).on('scroll', function () {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });

    // Smooth scrolling using jQuery easing
    $(document).on('click', 'a.scroll-to-top', function (e) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top)
        }, 1000, 'easeInOutExpo');
        e.preventDefault();
    });
});

// Función para insertar el frame cuando se haga clic en el botón
function insertarFrame() {
    // Obtener el div donde se insertará el frame
    var frameContainer = document.getElementById("cargarPagina");

    frameContainer.innerHTML = " "

    // Crear el elemento iframe
    var iframe = document.createElement("iframe");
    iframe.src = "http://sig.saludcapital.gov.co/geocodificardireccion/";
    iframe.width = "100%";
    iframe.height = 650;
    iframe.frameBorder = 0;

    // Insertar el iframe dentro del div
    frameContainer.appendChild(iframe);

    // Deshabilitar el botón después de insertar el frame para evitar múltiples inserciones
    document.getElementById("insertFrameBtn").disabled = true;
}

// Asociar la función insertarFrame al evento clic del botón
document.getElementById("geo").addEventListener("click", insertarFrame);

// funcion de paquetes

// Definir la función para obtener y mostrar los paquetes
function obtenerYMostrarPaquetes() {
    var userId = $('#user-id').data('user-id');
    $.ajax({
        url: '/dig/digitizer/obtener-Paquete/' + userId,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('#mensajeInformativo').hide(); // Ocultar mensaje informativo
            $('#listaPaquetes').empty();
            $('#tablaPaquetes tbody').empty();

            if (data.resultados.length === 0) {
                // Mostrar mensaje informativo si no hay paquetes
                $('#mensajeInformativo').show();
                $('#contenedorTable').hide(); // Ocultar mensaje informativo
            } else {
                // Mostrar los paquetes si hay datos
                $.each(data.resultados, function (index, resultado) {
                    var paquete = resultado.paquete;
                    var fichas = resultado.fichas;
                    var card = `
                      <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-primary shadow h-100 py-2">
                              <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                          <div class="h5 mb-0 font-weight-bold text-gray-800">${paquete}</div>
                                      </div>
                                      <div class="col-auto">
                                          <i class="fa-solid fa-folder-open fa-2x text-gray-300"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>`;
                    $('#listaPaquetes').append(card);

                    $.each(fichas, function(index, ficha) {
                        //console.log(ficha.productividad);
                    
                        // Verificar si ficha.productividad está definido y no está vacío
                        if (ficha.productividad && ficha.productividad.length > 0) {
                            // console.log(ficha.productividad[0].created_at);
                            // console.log(ficha.img)
                            //var datosproduct = ficha.productividad[0].id
                            var imagenes = ficha.img

                            var imagenesHTML = "";
                                imagenes.forEach(function(imagen) {
                                    imagenesHTML += `<img src="${imagen}" alt="imagen" style="width: 30px; height: auto; border-radius: 15px;" class="m-1">`;
                                });
                        } else {
                            console.log("No hay elementos en ficha.productividad");
                            var datosproduct = " "
                            var imagenes = " "
                        }
                        // <td> ${datosproduct}</td>  
                        var filaFicha = `
                            <tr>
                                <td>${paquete}</td>
                                <td>${ficha.ficha.file_number}</td>
                                <td>${ficha.base.nombrebase}</td>
                                <td><input type="checkbox" ${datosproduct ? 'checked' : ''}></td>
                                <td> ${imagenesHTML}</td>  

                            </tr>`;
                        $('#tablaPaquetes tbody').append(filaFicha);
                    });
                    
                });
            }
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}

// Ejecutar la función cuando se carga la página
$(document).ready(function () {
    obtenerYMostrarPaquetes();

    // Asignar la función al botón actualizar
    $('#btnActualizar').click(function () {
        obtenerYMostrarPaquetes();
    });
});

