<head>
<script src="{{asset('jquery-3.7.0.js')}}"></script>
<link href="{{asset ('bootstrap.min.css')}}" rel="stylesheet">
<script src="{{asset('dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('jquery.dataTables.min.js')}}"></script>
<script src="{{asset('load_smart_table.js')}}"></script>
<link href="{{asset('tailwind.min.css')}}" rel="stylesheet">
<script>
    $(document).ready(function(){
        new DataTable('#example');
    })
   
</script>
</head>
<body>

<table id="example" class="table table-striped" style="width:100%">
    <thead><tr><th>Designação</th><th>Faculdade</th><th>Sigla</th><th></th></tr></thead>
    <tbody>
    @foreach($cursos as $curso)
        <tr>
            <td>{{$curso->designacao_curso}}</td>
            <td>{{$curso->sigla_faculdade}}</td>
            <td>{{$curso->sigla_curso}}</td>
            <td><button id="{{$curso->id_curso}}" width="fit-content" class="rounded bg-green-600 text-white px-2 py-1" onclick="loadDisciplinasCurso(this.id)">ver disciplinas</button></td>
        </tr>
    @endforeach
</tbody>
</table>
</body>