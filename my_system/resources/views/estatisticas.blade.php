<h2>Estatisticas</h2>

<h4>Estatisticas Gerais</h4>
<div class="row-section" style="padding:0">
    <div class="card">
        <img src="grafic2.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Contratos de 2023</h5>
            <p class="card-text" id="total-contratos">Docentes contratados para tutorias: .</p>
            <p class="card-text"><small class="text-muted">Contratos de tutorias</small></p>
        </div>
    </div>

    <div class="card">
        <img src="grafic2.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Contratos de 2023</h5>
            <p class="card-text" id="total-contratos">Cursos: {{ $total_cursos }}.</p>
            <p class="card-text"><small class="text-muted">Contratos de tutorias</small></p>
        </div>
    </div>
</div>

@php
$controlador = 1;
@endphp

<h4>Estatisticas dos cursos</h4>

@foreach ($cada_curso as $curso)
    @if($controlador == 1)
        <div class="row-section" style="padding:0">
    @endif

    <div class="card border-warning mb-3" style="width: 80%;">
        <div class="card-header">Curso: {{ $curso['designacao_curso'] }}</div>
        <div class="card-body">
            <h5 class="card-title">Não Associadas: {{ $curso['nao_associadas'] }}</h5>
            @php
                $total_disciplinas = $curso['nao_associadas'];
                $total_disciplinas_curso = $curso['total_disciplinas'];
                $percentagem = intval($total_disciplinas) * 100;
                $percentagem2 = 0;
                if (intval($total_disciplinas_curso) > 0) {
                    $percentagem2 = $percentagem / intval($total_disciplinas_curso);
                }
                $faltam = $total_disciplinas_curso - $total_disciplinas;
            @endphp
            <h5 class="card-title">Faltam: {{ $faltam }}</h5>
            <p class="card-text">Total das disciplinas do curso: {{ $curso['total_disciplinas'] }}</p>
        
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {{ $percentagem2 }}%" aria-valuenow="{{ $percentagem2 }}%" aria-valuemin="0" aria-valuemax="{{ $curso['total_disciplinas'] }}">{{ $percentagem2.'%' }}</div>
            </div>
        </div>
    </div>

    @if($controlador == 3)
        </div>
        @php
        $controlador = 1;
        @endphp
    @else
        @php
        $controlador++;
        @endphp
    @endif
@endforeach

@if($controlador !== 1)
    </div>
@endif
