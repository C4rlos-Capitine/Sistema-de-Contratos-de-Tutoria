

<div id="docente-reg" class="row g-3 needs-validation">
<h3>Dados pessoais</h3>
    <div class="row">

        <div class="form-floating mb-3">
            <input required="true" type="text" class="form-control" id="floatingInput" name="nome" value="{{$docente->nome_docente}}" autocomplete="off" disabled>
            <label class="input-label" for="floatingInput">Nome</label>
        </div>

        <div class="form-floating mb-3">
            <input required="true" type="text" class="form-control" id="floatingInput" name="apelido" value="{{$docente->apelido_docente}}"0 disabled>
            <label class="input-label" for="floatingInput">Apelido</label>
        </div>

    </div>
    <div class="row">
       
            <div class="form-floating mb-3">
                <input required="true" type="text" class="form-control" name="bi" value="{{$docente->bi}}" disabled>
                <label class="input-label" for="floatingInput">BI</label>
            </div>


            <div class="form-floating mb-3">
                <input required="true" type="text" class="form-control" id="floatingInput" name="nuit" value="{{$docente->nuit}}" disabled>
                <label class="input-label" for="floatingInput">Nuit</label>
            </div>

    </div>
    </div>
    <div class="row">

        <div class="form-floating mb-3">
            <input required="true" type="text" class="form-control" id="floatingInput" name="nacionalidade" value="{{$docente->nacionalidade}}" disabled>
            <label class="input-label" for="floatingInput">Nacionalidade</label>
        </div>

        <div class="form-floating mb-3">
            <input required="true" type="text" class="form-control" name="email"value="{{$docente->email}}" disabled>
            <label class="input-label" for="floatingInput">Email</label>
        </div>
</div>