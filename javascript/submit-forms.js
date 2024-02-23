
function reg_faculdade() {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    console.log("ola");
    //event.preventDefault(); // Prevent the form from being submitted traditionally

    console.log("ola");
    $.ajax({
        type: 'post',
        url: "/cead2%20_deployed/faculdade/save",
        data: $('#faculdade-reg').serialize(),
        success: function (data) {
            console.log(data);
            $('#feedback').html('<div class="alert alert-success">' + data.response + '</div>');
            $('#feedback').delay(5000).hide(0);
            $('#faculdade-reg')[0].reset();
        },
        error: function () {
            alert("error");
        }
    });
    }
function reg_curso() {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    console.log("ola");
    //event.preventDefault(); // Prevent the form from being submitted traditionally

    console.log("ola");
    $.ajax({
        type: 'post',
        url: '/cead2%20_deployed/curso/save',
        data: $('#curso-reg').serialize(),
        success: function (data) {
            console.log(data);
            $('#feedback').html('<div class="alert alert-success">' + data.response + '</div>');
            //$('#feedback').delay(5000).hide(0);
            $('#curso-reg')[0].reset();
        },
        error: function () {
            alert("error");
        }
    });
    }
    
function reg_categoria(){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    console.log("ola");
    //event.preventDefault(); // Prevent the form from being submitted traditionally

    console.log("ola");
    $.ajax({
        type: 'POST',
        url: '/cead2%20_deployed/categoria/save',
        data: $('#categoria-reg').serialize(),
        success: function (data) {
            console.log(data);
            $('#feedback').html('<div class="alert alert-success">' + data.response + '</div>');
            $('#feedback').delay(5000).hide(0);
            $('#categoria-reg')[0].reset();
        },
        error: function () {
            alert("error");
        }
    });
}

function reg_disciplina(event)
{
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    event.preventDefault(); // Prevent form submission and page refresh
        console.log("ola");
        $.ajax({
            type: 'POST',
            url: '/cead2%20_deployed/disciplina/save',
            data: $('#disciplina-reg').serialize(),
            success: function (data) {
                $('#feedback').html('<div class="alert alert-success">' + data.response + '</div>');
                $('#feedback').delay(5000).hide(0);
                $('#disciplina-reg')[0].reset();
            },
            error: function () {
                alert("error");
            }
        });
}

function editarCurso() {
    
    console.log("ola");
    //event.preventDefault(); // Prevent the form from being submitted traditionally

    console.log("ola");
    $.ajax({
        type: 'post',
        url: 'curso-editar.php',
        data: $('#curso-editar').serialize(),
        success: function (response) {
            $('#feedback').html(response);
        },
        error: function () {
            alert("error");
        }
    });
}

function reg_docente(event){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    console.log("ola");
    event.preventDefault(); // Prevent the form from being submitted traditionally

    console.log("ola");
    $.ajax({
        type: 'POST',
        url: '/cead2%20_deployed/docente/save',
        data: $('#docente-reg').serialize(),
        success: function (response) {
            console.log(response);
            $('#feedback').html('<div class="alert alert-success">' + response.data + '</div>');
            $('#feedback').delay(5000).hide(0);
            $('#docente-reg')[0].reset();
        },
        error: function () {
            alert("error");
        }
    });
}
function regDisciplina(){
    console.log("ola");
//event.preventDefault(); // Prevent the form from being submitted traditionally

    console.log("ola");
    $.ajax({
        type: 'post',
        url: 'disciplina-reg.php',
        data: $('#disciplina-reg').serialize(),
        success: function (response) {
            $('#feedback').html(response);
        },
        error: function () {
            alert("error");
        }
    });
}

function regRepresentante() {
    
    console.log("ola");
    //event.preventDefault(); // Prevent the form from being submitted traditionally

    console.log("ola");
    $.ajax({
        type: 'post',
        url: 'contratante-reg.php',
        data: $('#contratante-reg').serialize(),
        success: function (response) {
            $('#feedback').html(response);
        },
        error: function () {
            alert("error");
        }
    });
}



function addDisciplina(){
 
    console.log(document.getElementById('id_docente').value)
    console.log(document.getElementById('curso').value)
    //event.preventDefault(); // Prevent the form from being submitted traditionally
  
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    console.log("ola");
    $.ajax({
        type: 'POST',
        url: '/cead2%20_deployed/docente/alocar/add_disciplina',
        data: {
          id_docente: document.getElementById('id_docente').value,
          id_curso: document.getElementById('curso').value,
        codigo_disciplina: document.getElementById('disciplina').value,
        tipo_contrato: document.getElementById('tipo_contrato').value

        },
        success: function (data) {
            console.log(data.novo_registo);
            var novoRegisto = data.novo_registo;
            $('#feedback').html('<div class="alert alert-success">' + data.response + '</div>');
            document.getElementById('#feedback').innerHTML = '<div class="alert alert-success">' + data.response + '</div>';
            //$('#feedback').delay(5000).hide(0);
            //$('#curso-reg')[0].reset();
            //var selectobject = document.getElementById("disciplina");
            //var text= selectobject.options[selectobject.selectedIndex].text;
            var table = document.getElementById("tb-data");
            var row = table.insertRow(table.rows.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);

            
            cell1.innerHTML = novoRegisto[0].nome_disciplina;
            cell2.innerHTML = "--"//novoRegisto.horas_contacto ;
            cell3.innerHTML = novoRegisto[0].designacao_curso;
            cell4.innerHTML = document.getElementById("ano").value;
            cell5.innerHTML = document.getElementById('semestre').value;
            cell6.innerHTML = '<button type="hidden" onclick="remover(this.id)">Remover</button>';
            //document.getElementById("header").innerHTML = "Modulos Lecionados lecionados por "+document.getElementById("docente").value;
        
        },
        error: function () {
            alert("error");
        }
    });
  
  }

