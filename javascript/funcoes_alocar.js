var arrDisciplinas = [];
document.getElementById("semestre").addEventListener('change', (event) => {
        //console.log("val "+event.target.value)
		//console.log(document.getElementById('curso').value);
		



        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        console.log("ola");
        console.log(document.getElementById('ano').value);
        //event.preventDefault(); // Prevent the form from being submitted traditionally
    
        console.log("ola");
        $.ajax({
            type: 'GET',
            url: '/cead2%20_deployed/curso/get_disciplina_by_ano',
            data: {
                ano: document.getElementById('ano').value,
                semestre: document.getElementById('semestre').value,
                id_curso: document.getElementById('curso').value,
                tipo_contrato: document.getElementById('tipo_contrato').value
            },
            success: function (data) {
                console.log(data);
               // $('#feedback').html('<div class="alert alert-success">' + data.response + '</div>');
                //$('#feedback').delay(5000).hide(0);
                //$('#curso-reg')[0].reset();
                var html = "";
                for(var a = 0; a< data.length; a++){
                    if(data[a].codigo_docente="null"){
                        html += "<option value="+data[a].codigo_disciplina+">"+data[a].nome_disciplina+"</option>";
                    }
                    
                }
                document.getElementById("disciplina").innerHTML = html;
            },
            error: function () {
                alert("error");
            }
        });

        
        
    });
	document.getElementById("submit").addEventListener('click', (event)=>{
		console.log('ok');
       var horas_contacto = "";
       var semestre = "";
       var curso = "";
       var id_curso = "";
       var id_disciplina = "";
        for(var i=0; i<arrDisciplinas.length; i++){
            if(arrDisciplinas[i].codigo_disciplina == document.getElementById("disciplina").value){
                horas_contacto = arrDisciplinas[i].horas_contacto;
                semestre = arrDisciplinas[i].semestre;
                curso = arrDisciplinas[i].designacao;
                id_curso = arrDisciplinas[i].id_curso;
                id_disciplina = arrDisciplinas[i].codigo_disciplina;
                break;
            }
        }
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "verificar_disciplina.php?id_curso="+id_curso+"&id_disciplina="+id_disciplina, true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
                if(data == "existe"){
                    alert("disciplina deste curso ja associada a um contrato")
                }else{
                    var selectobject = document.getElementById("disciplina");
                    var text= selectobject.options[selectobject.selectedIndex].text;
                    var table = document.getElementById("tb-data");
                    var row = table.insertRow(table.rows.length);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    var cell5 = row.insertCell(4);
                    var cell6 = row.insertCell(5);

                    
                    cell1.innerHTML = text + '<input type="hidden" name="disciplina1[]" value="' + id_disciplina + '">';
                    cell2.innerHTML = horas_contacto + '<input type="hidden" name="horas_contacto[]" value="' + horas_contacto + '">';
                    cell3.innerHTML = curso + '<input type="hidden" name="curso1[]" value="' + id_curso + '">';
                    cell4.innerHTML = document.getElementById("ano_academico").value + '<input type="hidden" name[]="ano" value="' + document.getElementById("ano_academico").value + '">';
                    cell5.innerHTML = semestre + '<input type="hidden" name="semestre[]" value="' + semestre + '">';
                    cell6.innerHTML = '<button type="hidden" id="'+id_disciplina+'" onclick="remover(this.id)">Remover</button>';
                    document.getElementById("header").innerHTML = "Modulos Lecionados lecionados por "+document.getElementById("docente").value;
                }
            }
        }
        }
        xhr.send();
        

	});


    function remover(id){
        var oTable = document.getElementById('tb-table');
   
        var rowLength = oTable.rows.length;
        var estado = false;
        for (i = 0; i < rowLength; i++){

            //gets cells of current row  
            var oCells = oTable.rows.item(i).cells;

            var cellLength = oCells.length;

            for(var j = 0; j < cellLength; j++){

                var cellVal = oCells.item(j).innerHTML;
                if(cellVal == id){
                    estado = true;
                    break;
                }                               
                    //alert(cellVal);
            }
            if(estado==true){
                document.getElementById("tb-table").deleteRow(i);
                break;
            }
        }
    }


    function gerarContracto(){
        const form = document.getElementById("form");
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "contracto-criar.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
                /*if(data === "success"){
                    location.href="users.php";
                }else{
                    errorText.style.display = "block";
                    errorText.textContent = data;
                }*/
            }
        }
        }
        let formData = new FormData(form);
        xhr.send(formData);
    }

var buscar_dados = document.getElementById("buscar_dados");
//buscar_dados.addEventListener("click", function(){
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
//});