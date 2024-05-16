@if(isset($mostrarModal) && $mostrarModal)
<!-- Modal -->
<div class="modal fade" id="modal_user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">

      @if($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      
      <form action="{{ route('dig/digitizer/guardar-informacion') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <input id="id_user" name="id_user" type="text" value="{{ $user->id }}" hidden>
        <div class="modal-body">
          <div class="flex-container">
            <div class="m-3" style="position: relative;">
              <label for="foto">Foto de Perfil:</label>

              <div id="photo-container">
                <img id="photo-preview" src="https://mancomunidadaxarquia.com/media/noImage.jpg" alt="Foto de perfil">
              </div>

              <div class="btn_img_perfil">
                <label for="foto" class="camera-icon m-0 p-0"></label>
                <input type="file" id="foto" name="foto" accept="image/*" onchange="previewImage(event)" required style="display: none;">
                <button id="btn_img_foto" onclick="document.getElementById('foto').click();" style="background: none; border: none; cursor: pointer;">
                </button>
              </div>
            </div>

            <div>
              <div class="flex-container">
                <div class="m-2">
                  <label for="document">Documento:</label>
                  <input type="number" id="document" name="document" placeholder="10032464546" required>
                </div>
                <div class="m-2">
                  <label for="birthdate">Fecha de nacimiento:</label>
                  <input type="date" id="birthdate" name="birthdate" placeholder="02/06/1994" required>
                </div>
              </div>
              <div class="flex-container">
                <div class="m-2">
                  <label for="phone">Telefono:</label>
                  <input type="number" id="phone" name="phone" placeholder="7845111" required>
                </div>

                <div class="m-2">
                  <label for="address">Direccion:</label>
                  <input type="text" id="address" name="address" placeholder="" required>
                </div>
              </div>

              <div class="flex-container">
                <div class="m-2">
                  <label for="gender">Género:</label>
                  <select id="sex" name="sex" required>
                    <option value=""></option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="no-binario">No binario</option>
                    <option value="género-fluido">Género fluido</option>
                    <option value="género-queer">Género queer</option>
                    <option value="transgénero">Transgénero</option>
                    <option value="agénero">Agénero</option>
                    <option value="bigénero">Bigénero</option>
                    <option value="pangénero">Pangénero</option>
                    <option value="genderqueer">Genderqueer</option>
                    <option value="neutrois">Neutrois</option>
                    <option value="andrógino">Andrógino</option>
                    <option value="demigénero">Demigénero</option>
                    <option value="transmasculino">Transmasculino</option>
                    <option value="transfemenino">Transfemenino</option>
                  </select>
                </div>


                <div class="m-2">
                  <label for="rh">RH:</label>
                  <select name="rh" id="rh" select>
                    <option value=""></option>
                    <option value="A+">Tipo A Rh positivo (A+)</option>
                    <option value="A-">Tipo A Rh negativo (A-)</option>
                    <option value="B+">Tipo B Rh positivo (B+)</option>
                    <option value="B-">Tipo B Rh negativo (B-)</option>
                    <option value="AB+">Tipo AB Rh positivo (AB+)</option>
                    <option value="AB-">Tipo AB Rh negativo (AB-)</option>
                    <option value="O+">Tipo O Rh positivo (O+)</option>
                    <option value="O-">Tipo O Rh negativo (O-)</option>
                  </select>
                </div>

                <div class="m-2">
                  <label for="ethnicity">Etnia</label>
                  <select name="ethnicity" id="ethnicity">
                    <option value=""></option>
                    <option value="mestizo">Mestizo</option>
                    <option value="indigena">Indígena</option>
                    <option value="afrocolombiano">Afrocolombiano</option>
                    <option value="gitano">Gitano</option>
                    <option value="raizal">Raizal</option>
                    <option value="palenquero">Palenquero</option>
                    <option value="ninguno">Ninguno</option>
                  </select>
                </div>


              </div>

            </div>
          </div>



          <div class="flex-container">

            <div>

              <label for="contract">No. Contrato:</label>

              <div class="flex-container">
                <input type="number" id="contract_number" oninput="concatenar()">
                <label for="contract">-</label>
                <input type="number" id="contract_vig" oninput="concatenar()">
              </div>

              <input type="text" id="contract" name="contract" placeholder="4015-2023" required hidden>


            </div>

            <div class="m-2">
              <label for="eps">EPS:</label>
              <select id="eps" name="eps" required>
                <option value=""></option>
                <option value="COMPENSAR E.P.S.">COMPENSAR E.P.S.</option>
                <option value="COMPENSAR E.P.S.">CAPITAL SALUD E.P.S.</option>
                <option value="E.P.S. FAMISANAR LTDA.">E.P.S. FAMISANAR LTDA.</option>
                <option value="E.P.S. SANITAS S.A.">E.P.S. SANITAS S.A.</option>
                <option value="EPS SERVICIO OCCIDENTAL DE SALUD S.A.">EPS SERVICIO OCCIDENTAL DE SALUD S.A.</option>
                <option value="EPS Y MEDICINA PREPAGADA SURAMERICANA S.A.">EPS Y MEDICINA PREPAGADA SURAMERICANA S.A.</option>
                <option value="NUEVA EPS S.A.">NUEVA EPS S.A.</option>
                <option value="SALUD TOTAL S.A. E.P.S.">SALUD TOTAL S.A. E.P.S.</option>
                <option value="SALUDVIDA S.A. E.P.S.">SALUDVIDA S.A. E.P.S.</option>

              </select>
            </div>


            <div class="m-2">
              <label for="afp">AFP:</label>
              <select name="afp" id="afp" required>
                <option value=""></option>
                <option value="PROTECCION">PROTECCION</option>
                <option value="PORVENIR">PORVENIR</option>
                <option value="COLFONDOS">COLFONDOS</option>
                <option value="PROTECCION">PROTECCION</option>
                <option value="OLD MUTUAL">OLD MUTUAL</option>
                <option value="COLPENSIONES">COLPENSIONES</option>
              </select>
            </div>

            <div>
              <label for="arl">ARL:</label>
              <select name="arl" id="arl" required placeholder="Selecciona una ARL">
                <option value=""></option>
                <option value="SURA">SURA</option>
                <option value="POSITIVA">POSITIVA</option>
                <option value="BOLIVAR">BOLIVAR</option>
                <option value="COLSANITAS">COLSANITAS</option>
                <option value="COLMENA">COLMENA</option>
              </select>
            </div>

          </div>

          <!-- <input type="submit" value="Enviar"> -->
        </div>

        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Enviar">
        </div>

      </form>

    </div>
  </div>
</div>

<!-- JavaScript para mostrar el modal -->
<script>
  setTimeout(function() {
    // Abre el modal
    $('#modal_user').modal('show');
  }, 1000); // 5000 milisegundos = 5 segundos

  function previewImage(event) {
    var preview = document.getElementById('photo-preview');
    var file = event.target.files[0];
    var reader = new FileReader();

    reader.onload = function() {
      preview.src = reader.result;
    };

    if (file) {
      reader.readAsDataURL(file);
    }
  }

  function concatenar() {
    // Obtener los valores de los campos de entrada
    var contract_number = document.getElementById('contract_number').value;
    var contract_vig = document.getElementById('contract_vig').value;
    // Concatenar los valores
    var contract = contract_number + '-' + contract_vig;
    // Actualizar el valor del campo contract
    document.getElementById('contract').value = contract;
  }
</script>

@endif