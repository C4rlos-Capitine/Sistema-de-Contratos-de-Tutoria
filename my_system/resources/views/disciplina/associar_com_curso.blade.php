<h3>Associar disciplina a Curso</h3>
<style>
    .row{
        display: flex;
        flex-direction: row;
    }
</style>
<!--<div class="card">-->
<script src="javascript/funcoes2.js"></script>
    <div id="feedback"></div>
    <form id="associar" action="" method="post" novalidate>
        <div class="row">
            
            <div class="form-floating mb-3">
                <input required="true" type="text" class="form-control" onkeyup="checkCurso(this)" id="curso" name="curso" placeholder="curso" autocomplete="off">
                <label class="input-label" for="floatingInput">Curso</label>
                <ul class="list"></ul>
            </div>
        

            <div class="form-floating mb-3">
                <input required="true" type="text" class="form-control" id="disciplina" onkeyup="checkDisciplina(this)" name="disciplina" placeholder="disciplina" autocomplete="off">
                <label class="input-label" for="floatingInput">Disciplina</label>
                <ul class="list2"></ul>
            </div>
         
           
        </div>
        <div class="row">

            <div class="form-floating mb-3">
                <input required="true" type="number" class="form-control" id="floatingInput" name="horas_c" placeholder="Horas de contacto" autocomplete="off">
                <label class="input-label" for="floatingInput">Horas de Contacto</label>
            </div>
        
            <!--<div class="column">-->
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">Ano</label>
                <select id="ano" name="ano" class="form-select" id="validationCustom04" required>
                <option selected disabled value="">Escolha..</option>
                <option value="1">1 Ano</option>
                <option value="2">2 Ano</option>
                <option value="3">3 Ano</option>
                <option value="4">4 Ano</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">Semestre</label>
                <select id="semestre" name="semestre" class="form-select" id="validationCustom04" required>
                <option selected disabled value="">Escolha..</option>
                <option value="1">1 Semestre</option>
                <option value="2">2 Semestre</option>
                
                </select>
            </div>
            <!---</div>-->
        </div>

        <input type="hidden" name="id_curso" id="id_curso">
        <input type="hidden" name="codigo_disciplina" id="codigo_disciplina">
    </form>
    <div class="row" id="div-button">
            <button id="submit" class="rounded bg-green-600 text-white px-2 py-1" onclick="validarForm()" >Submit</button>
        </div>