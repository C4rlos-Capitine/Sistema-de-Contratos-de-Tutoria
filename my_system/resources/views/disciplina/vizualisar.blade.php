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
z-index: 9999;
top:-100%;
left:50%;
padding:20px;
transform: translate(-50%, -50%);
width:650px;
background: #fff;
border-radius: 10px;
box-shadow: 0px 2px 5px 5px rgba(0,0,0,1);
margin-top: 0;

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
z-index: 9999;
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
margin-top:10px;
transition: filter 0ms ease-in-out 300ms; 
position: relative;

}
body.active-popup .main{
filter:blur(5px);
background:rgba(0,0,0,0.08);
transition: filter 0ms ease-in-out 0ms;
}

body.active-popup .popup{
top:20%;
opacity:1;
margin-top:20%;
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
<table id="example" class="table table-striped" style="width:100%">
    <thead><tr><th>designação</th><th>sigla</th></tr></thead>
    <tbody>
    @foreach($disciplinas as $disciplina)
        <tr>
            <td>{{$disciplina->nome_disciplina}}</td>
            <td>{{$disciplina->codigo_disciplina}}</td>
        </tr>
    @endforeach
</tbody>
</table>
</body>