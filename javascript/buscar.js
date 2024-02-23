document.addEventListener("DOMContentLoaded", function () {
    
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
  
  
});