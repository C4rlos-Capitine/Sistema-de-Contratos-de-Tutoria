<head>
<script src="{{asset('jquery-3.7.0.js')}}"></script>
<link href="{{asset ('bootstrap.min.css')}}" rel="stylesheet">
<script src="{{asset('dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('jquery.dataTables.min.js')}}"></script>
<script src="{{asset('load_smart_table.js')}}"></script>
<link href="{{asset('tailwind.min.css')}}" rel="stylesheet">
<style>
.popup{
    position: absolute;
    top:-100%;
    left:50%;
    padding:20px;
    transform: translate(-50%, -50%);
    width:650px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0px 2px 5px 5px rgba(0,0,0,1);
    margin-top: -25px;
    opacity:0;
    transition:top ease-in-out 0ms,
    opacity 300ms ease-in-out,
    margin-top 300ms ease-in-out;
}

.popup > *{
margin: 15px 0px;
}
.popup .close-btn{
position:absolute;
top: -5px;
right:10px;
width: 20px;
height: 20px;
background:#eee;
color:#111;
border:none;
outline:none;
border-radius:50%;
cursor:pointer;
}
body.active-popup{
overflow:hidden;
}
.main{
transition: filter 0ms ease-in-out 300ms; 
}
body.active-popup .main{
filter:blur(5px);
background:rgba(0,0,0,0.08);
transition: filter 0ms ease-in-out 0ms;
}

body.active-popup .popup{
top:50%;
opacity:1;
margin-top:0px;
transition:top ease-in-out 0ms,
opacity 300ms ease-in-out,
margin-top 300ms ease-in-out;
}
</style>
<script>
    $(document).ready(function(){
        new DataTable('#example');
    })
   
</script>
</head>
<body>
    <main class="main">
<table id="example" class="table table-striped" style="width:100%">
    <thead><tr><th>Nome Completo</th><th>Nivel</th><th>Curso</th><th></th></tr></thead>
    <tbody>
    @foreach($docentes as $docente)
        <tr>
            <td>{{$docente->nome_docente}}-{{$docente->apelido_docente}}</td>
            <td>{{$docente->designacao_nivel}}</td>
            <td>{{$docente->designacao_curso}}</td>
            <td><button id="{{$docente->id_docente}}" width="fit-content" class="rounded bg-green-600 text-white px-2 py-1" onclick="loadDisciplinasAlocadas(this.id)">ver disciplinas</button></td>
        </tr>
    @endforeach
</tbody>
</table>
</main>
<div class="popup" width="80%">
    <span class="close-btn">&times;</span>
</div>
<script>
      
</script>
</body>
