
<h3>Registar Disciplina</h3>

    <div>
    <form id="disciplina-reg" class="row g-3 needs-validation">
    <div id="feedback"></div>
        <div class="row">
       
                <div class="form-floating mb-3">
                    <input required="true" type="text" class="form-control" name="nome_disciplina" placeholder="Designação da Disciplina">
                    <label class="input-label" for="floatingInput">Nome da Disciplina</label>
                </div>

                <div class="form-floating mb-3">
                    <input required="true" type="text" class="form-control" name="codigo_disciplina" placeholder="codigo">
                    <label class="input-label" for="floatingInput">codigo da disciplina</label>
                </div>

        </div>
        <div class="row">

                <div class="form-floating mb-3">
                    <input required="true" type="text" class="form-control" id="floatingInput" name="sigla" placeholder="Sigla">
                    <label class="input-label" for="floatingInput">Sigla</label>
                </div>


                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="id_categoria">
                        <option selected>Selecione...</option>
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria->id_cat_disciplina}}">{{$categoria->designacao_categoria}}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Categoria da disciplina</label>
                </div>


        </div>
    </form>
    <div class="row" id="div-button">
        <button class="rounded bg-green-600 text-white px-2 py-1" id="submit" width="fit-content" onclick="reg_disciplina(event)">registar</button>
    </div>
    </div>
</div>

