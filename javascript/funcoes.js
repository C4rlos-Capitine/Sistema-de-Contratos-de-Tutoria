var input;
var input2;
var cursos = []; // Variável global
var disciplinas = [];
input = document.getElementById("curso");
input2 = document.getElementById("disciplina");
var arrCursos = [];
var arrDisciplinas = [];
document.addEventListener("DOMContentLoaded", function(){
  input = document.getElementById("curso");
  input2 = document.getElementById("disciplina");
  setupInputListener();
  console.log("ola2");
});

setupInputListener();


function getCurso(callback) {
var ajax = new XMLHttpRequest();
var method = "GET";
var url = "cursos-get.php";
var asynchronous = true;

ajax.open(method, url, asynchronous);
ajax.send();
ajax.onreadystatechange = function () {
if (this.readyState == 4 && this.status == 200) {
  cursos = JSON.parse(this.responseText); // Atribui o valor à variável global
  //console.log(cursos); 
  callback();
}
};
}

function imprimirCursos() {
//console.log(cursos); 
for(i = 0; i<cursos.length; i++){
arrCursos[i] = cursos[i].designacao;
console.log(arrCursos[i]);
}
}

function getDisciplina(callback){
var ajax = new XMLHttpRequest();
var method = "GET";
var url = "disciplinas-get.php";
var asynchronous = true;

ajax.open(method, url, asynchronous);
ajax.send();
ajax.onreadystatechange = function () {
  if (this.readyState == 4 && this.status == 200) {
    disciplinas = JSON.parse(this.responseText); 
    //console.log(disciplinas)
    callback();
  }
};
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

function setupInputListener() {
//Sort names in ascending order
let sorteCursos = arrCursos.sort();

//Execute function on keyup
input.addEventListener("keyup", (e) => {
removeElements();
for (let i of sorteCursos) {
  //convert input to lowercase and compare with each string
console.log("input")
  if (i.toLowerCase().startsWith(input.value.toLowerCase()) && input.value != "") {
  //create li element
  let listItem = document.createElement("li");
  //One common class name
  listItem.classList.add("list-items");
  listItem.style.cursor = "pointer";
  listItem.setAttribute("onclick", "displayNames('" + i + "')");
  //Display matched part in bold
  let word = "<b>" + i.substr(0, input.value.length) + "</b>";
  word += i.substr(input.value.length);
  //display the value in array
  listItem.innerHTML = word;
  document.querySelector(".list").appendChild(listItem);
  }
}
});

let sortedDiscplinas = arrDisciplinas.sort();

//Execute function on keyup
input2.addEventListener("keyup", (e) => {
//console.log(i);
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
  listItem2.setAttribute("onclick", "displayNames2('" + i + "')");
  //Display matched part in bold
  let word = "<b>" + i.substr(0, input2.value.length) + "</b>";
  word += i.substr(input2.value.length);
  //display the value in array
  listItem2.innerHTML = word;
  console.log("palavra: "+word);
  document.querySelector(".list2").appendChild(listItem2);
  }
}
});
}

//Execute function on keyup
function displayNames(value) {
input.value = value;
removeElements();
}

function displayNames2(value) {
input2.value = value;
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
    if(cursos[i].designacao == nome_curso){
      document.getElementById("id_curso").value = cursos[i].id_curso;
      console.log("achado!!!");
      break
    }
  }
  
  for(i = 0; i<disciplinas.length; i++){
    console.log(`disciplina: ${disciplinas[i].nome_disciplina}`)
    if(disciplinas[i].nome_disciplina == nome_disciplina){
      document.getElementById("codigo_disciplina").value = disciplinas[i].codigo_disciplina;
      console.log("achado!!!");
      break;
    }
  }
  //event.preventDefault(); // Prevent form submission and page refresh
  console.log("ola");
  $.ajax({
      type: 'POST',
      url: 'disciplina-associar-curso.php',
      data: $('#associar').serialize(),
      success: function (response) {
          $('#feedback').html(response);
      },
      error: function () {
          alert("error");
      }
  });
  
}
