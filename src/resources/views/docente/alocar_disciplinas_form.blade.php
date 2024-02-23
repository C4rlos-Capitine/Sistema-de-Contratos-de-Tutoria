
        <script>
                       function buscar_dados(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

console.log("ola");
//event.preventDefault(); // Prevent the form from being submitted traditionally

console.log(document.getElementById('tipo_contrato').value);
$.ajax({
  type: 'GET',
  url: '/cead2%20_deployed/docente/get_disciplinas',
  data: { id_docente: document.getElementById("id_docente").value, tipo_contrato: document.getElementById('tipo_contrato').value },
  success: function (data) {
    console.log(data.response);
    // Assuming data is an array of objects with properties 'column1' and 'column2'
    var table = document.getElementById("tb-data");
    var tbody = table.getElementsByTagName("tbody")[0];
       // Get all rows in tbody except the first one
      var rowsToRemove = tbody.querySelectorAll("tr:not(:first-child)");

      // Remove the rows
      rowsToRemove.forEach(function (row) {
      tbody.removeChild(row);
      });

    // Loop through the data and add rows to the table
    data.response.forEach(function (item) {
      var row = tbody.insertRow();

      // Add cells to the row and populate with data
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      var cell4 = row.insertCell(3);
      var cell5 = row.insertCell(4);
      var cell6 = row.insertCell(5);
      cell1.innerHTML = item.nome_disciplina;
      cell2.innerHTML = item.horas_contacto;
      cell3.innerHTML = item.designacao_curso;
      cell4.innerHTML = item.ano;
      cell5.innerHTML = item.semestre;
      cell6.innerHTML = '<button type="hidden" onclick="remover(this.id)">Remover</button>';
      // Add more cells and properties as needed
    });
  },
  error: function () {
    alert("error");
  }
});

}
        </script>
		<!--<form id="adicionar-disc">-->
                <div id="#feedback"></div>
           
            <div class="row">
            
                    <div class="form-floating mb-3">
                        <input required="true"  type="text" class="form-control" id="docente" name="docente" placeholder="Docente">
                        <label class="input-label" for="floatingInput">Docente</label>
                        <ul class="list"></ul>
                    </div>
                    <div class="col-md-3">
                        <button id="buscar_dados" type="submit" onclick="buscar_dados()" width="fit-content" class="rounded bg-green-600 text-white px-2 py-1">buscar</button>
                    </div>

                <div class="col-md-3">
                 
                 <select id="tipo_contrato" name="tipo_contrato" class="form-select" required>
                    <option selected disabled value="">Tipo de Contrato</option>   
                    @foreach($tipo_contrato as $tipo)
                        <option value="{{$tipo->id_tipo_contrato}}">{{ $tipo->designacao_tipo_contrato }}</option>
                    @endforeach
                 
                 </select>
             </div>
        
            </div>
                <!--<div class="column">-->
                
                <!--</div>-->
            </div>
            <div class="row">
                <!--<div class="column">-->
                <div class="col-md-3">
                 
                 <select id="curso" name="curso" class="form-select" id="validationCustom04" required>
                 <option selected disabled value="">Curso</option>   
                 @foreach($cursos as $curso)
                     <option value="{{$curso->id_curso}}">{{ $curso->designacao_curso }}</option>
                 @endforeach
                 
                 </select>
             </div>
                <div class="col-md-3">
                    
                    <select id="ano" name="ano" class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Ano</option>
                    <option value="1">1 Ano</option>
                    <option value="2">2 Ano</option>
                    <option value="3">3 Ano</option>
                    <option value="4">4 Ano</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select id="semestre" name="semestre" class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Semestre</option>
                    <option value="1">1 semestre</option>
                    <option value="2">2 semestre</option>
                    
                    </select>
                </div>
                <!--</div>-->
                <!--<div class="column">-->
                <div class="col-md-3">
               
                    <select id="disciplina" name="disciplina" class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Disciplinas</option>   
                    </select>
                </div>
                <!--</div>-->
                
            </div>
        <!--</form>-->
           
       
        <div class="div-button">
            <div class="col-md-3">
                <button width="fit-content" class="rounded bg-green-600 text-white px-2 py-1" onclick="addDisciplina()">adicionar</button>
            </div>
        </div>

            <form method="POST" id="form">
        <table id="tb-data" class="table table-striped">
            <thead>
                <tr><th id="header" colspan="6" scope="col">Modulos Lecionados</th></tr>
                <tr>
                    <th scope="col">Modulo</th><th scope="col">Horas de Contacto</th><th scope="col">Curso</th><th scope="col">Ano</th><th scope="col">Semestre</th><th scope="col">action</th>
                </tr>
            </thead>
                <tbody>
                    
                </tbody>
            
        </table>
        <input type="hidden" name="id_docente" id="id_docente">
        <input type="hidden" name="id_nivel" id="id_nivel">
        <input type="hidden" name="valor_nivel" id="valor_nivel">
        <input type="hidden" name="designacao_nivel" id="designacao_nivel">
        
        </form>
        <div class="col-md-3">
                        <button type="submit" width="fit-content" class="rounded bg-green-600 text-white px-2 py-1">gerar contrato</button>
                    </div>
		<script>
 
		</script>

<?php
//}
