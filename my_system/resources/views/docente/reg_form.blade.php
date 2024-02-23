<?php

?>

<div id="feedback"></div>
<form id="docente-reg" class="row g-3 needs-validation" novalidate>
<h3>Registar Docente</h3>
    <div class="row">

        <div class="form-floating mb-3">
            <input required="true" type="text" class="form-control" id="floatingInput" name="nome" placeholder="nome" autocomplete="off">
            <label class="input-label" for="floatingInput">Nome</label>
        </div>
    
        <div class="form-floating mb-3">
            <input required="true" type="text" class="form-control" id="floatingInput" name="apelido" placeholder="apelido" autocomplete="off">
            <label class="input-label" for="floatingInput">Apelido</label>
        </div>
 
        
    </div>
    <div class="row">
       
            <div class="form-floating mb-3">
                <input required="true" type="text" class="form-control" id="floatingInput" name="bi" placeholder="bi" autocomplete="off">
                <label class="input-label" for="floatingInput">BI</label>
            </div>


            <div class="form-floating mb-3">
                <input required="true" type="text" class="form-control" id="floatingInput" name="nuit" placeholder="nuit" autocomplete="off">
                <label class="input-label" for="floatingInput">Nuit</label>
            </div>

    </div>
    </div>
    <div class="row">

        <div class="form-floating mb-3">
            <input required="true" type="text" class="form-control" id="floatingInput" name="nacionalidade" placeholder="nacionalidade">
            <label class="input-label" for="floatingInput">Nacionalidade</label>
        </div>

        <div class="form-floating mb-3">
            <input required="true" type="text" class="form-control" name="email" placeholder="email">
            <label class="input-label" for="floatingInput">Email</label>
        </div>

    </div>
    <div class="row">
  
        <div class="col-md-3">
            <label for="validationCustom04" class="form-label">Nivel</label>
            <select id="nivel" name="nivel" class="form-select" id="validationCustom04" required>
                <option selected disabled value="">Escolha..</option>   
                @foreach($niveis as $nivel)
                    <option value="{{$nivel->id_nivel}}">{{$nivel->designacao_nivel}}</option>
                @endforeach
            </select>
        </div>
       
        <div class="col-md-3">
                <label for="validationCustom04" class="form-label">Curso</label>
                <select id="curso" name="curso" class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Escolha..</option>   
                    @foreach($cursos as $curso)
                        <option value="{{$curso->id_curso}}">{{$curso->designacao_curso}}</option>
                    @endforeach
                </select>
            </div>
    </div>

</form>
<div class="row" id="div-button">
    <button class="rounded bg-green-600 text-white px-2 py-1" id="submit" width="fit-content" onclick="reg_docente(event)">registar</button>
    </div>
