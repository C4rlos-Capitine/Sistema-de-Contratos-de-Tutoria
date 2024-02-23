var input;
var input2;
var cursos = []; // Variável global
var disciplinas = [];
input = document.getElementById("curso");
input2 = document.getElementById("disciplina");
var arrCursos = [];
var arrDisciplinas = [];

function getCurso(callback) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    type: "GET",
    url: "/cead2%20_deployed/curso/get",
    dataType: "json",
    success: function (dados) {
      cursos = dados; // Assign the value to the global variable
      console.log(cursos);
      callback();
    },
    error: function () {
      // Handle the error here if needed
      console.log("erro");
    }
  });
}


function imprimirCursos() {
//console.log(cursos); 
for(i = 0; i<cursos.length; i++){
arrCursos[i] = cursos[i].designacao_curso;
console.log(arrCursos[i]);
}
}

function getDisciplina(callback) {
  $.ajax({
    type: "GET",
    url: "/cead2%20_deployed/disciplina/get_disciplinas_only",
    dataType: "json",
    success: function (data) {
      disciplinas = data; // Assign the value to the global variable
      console.log(disciplinas);
      callback();
    },
    error: function () {
      // Handle the error here if needed
      console.log("erro");
    }
  });
}


function imprimeDisciplinas(){
//console.log(disciplinas);
for(i = 0; i<disciplinas.length; i++){
  arrDisciplinas[i] = disciplinas[i].nome_disciplina;
  console.log(arrDisciplinas[i]);
}
}

getCurso(imprimirCursos); 
getDisciplina(imprimeDisciplinas);

//reference


// Rest of your code...

let sorteCursos = arrCursos.sort();
let sortedDiscplinas = arrDisciplinas.sort();



//Execute function on keyup
function displayNames(value, input) {
input.value = value;
console.log(input);
removeElements();
}

function displayNames2(value, input) {
input.value = value;
console.log(input);
removeElements2();
}
function removeElements() {
//clear all the item
let items = document.querySelectorAll(".list-items");
items.forEach((item) => {
  item.remove();
});
}

function removeElements2() {
//clear all the item
let items = document.querySelectorAll(".list-items2");
items.forEach((item) => {
    item.remove();
});
}

function validarForm(){

  var nome_curso = document.getElementById("curso").value;
  var nome_disciplina = document.getElementById("disciplina").value;

  for(i=0; i<cursos.length; i++){
    if(cursos[i].designacao_curso == nome_curso){
      document.getElementById("id_curso").value = cursos[i].id_curso;
      console.log("achado!!!"+cursos[i].id_curso);
      break
    }
  }
  
  for(i = 0; i<disciplinas.length; i++){
    console.log(`disciplina: ${disciplinas[i].nome_disciplina}`)
    if(disciplinas[i].nome_disciplina == nome_disciplina){
      document.getElementById("codigo_disciplina").value = disciplinas[i].codigo_disciplina;
      console.log("achado!!!"+disciplinas[i].codigo_disciplina);
      break;
    }
  }
  //event.preventDefault(); // Prevent form submission and page refresh
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  console.log("ola");
  $.ajax({
      type: 'POST',
      url: '/cead2%20_deployed/disciplina/associar/save',
      data: $('#associar').serialize(),
      success: function (data) {
        console.log(data.response)
        $('#feedback').html('<div class="alert alert-success">' + data.response + '</div>');
        $('#feedback').delay(5000).hide(0);
        $('#faculdade-reg')[0].reset();
      },
      error: function () {
          alert("error");
      }
  });
  
}


checkCurso = input =>{
  removeElements();
  for (let i of sorteCursos) {
    //convert input to lowercase and compare with each string
  console.log(input.value);
    if (i.toLowerCase().startsWith(input.value.toLowerCase()) && input.value != "") {
    //create li element
    let listItem = document.createElement("li");
    //One common class name
    listItem.classList.add("list-items");
    listItem.style.cursor = "pointer";
    //listItem.setAttribute("onclick", "displayNames('" + i + "', '" + input + "')");
    listItem.onclick = ()=>{
      input.value = i;
      console.log(input);
      removeElements();
    }

    //Display matched part in bold
    let word = "<b>" + i.substr(0, input.value.length) + "</b>";
    word += i.substr(input.value.length);
    //display the value in array
    listItem.innerHTML = word;
    document.querySelector(".list").appendChild(listItem);
    }
  }
}

checkDisciplina = input2 =>{
  removeElements2();
  for (let i of sortedDiscplinas) {
    //convert input to lowercase and compare with each string
    console.log(i);
    if(i.toLowerCase().startsWith(input2.value.toLowerCase()) && input2.value != "")  {
    //create li element
    let listItem2 = document.createElement("li");
    //One common class name
    listItem2.classList.add("list-items2");
    listItem2.style.cursor = "pointer";
    //listItem2.setAttribute("onclick", "displayNames2('" + i + "', '" + input2 + "')");
    listItem2.onclick = ()=>{
      input2.value = i;
      console.log(input2);
      removeElements2();
    }
    //Display matched part in bold
    let word = "<b>" + i.substr(0, input2.value.length) + "</b>";
    word += i.substr(input2.value.length);
    //display the value in array
    listItem2.innerHTML = word;
    console.log("palavra: "+word);
    document.querySelector(".list2").appendChild(listItem2);
    }
  }
}

