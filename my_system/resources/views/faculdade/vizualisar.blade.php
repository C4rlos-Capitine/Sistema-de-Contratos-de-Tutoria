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
    <thead><tr><th>Faculdade</th><th>Sigla</th></tr></thead>
    <tbody>
    @foreach($faculdades as $faculdade)
        <tr>
            <td>{{$faculdade->nome_faculdade}}</td>
            <td>{{$faculdade->sigla_faculdade}}</td>
        </tr>
    @endforeach
</tbody>
</table>
</body>