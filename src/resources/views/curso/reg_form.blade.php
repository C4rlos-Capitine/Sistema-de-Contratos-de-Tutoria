
<style>
    #div-button{
        width:fit-content;
        height:auto;
    }
    @media (max-width:500px){
        #div-button{
            width:fit-content;
            height:auto;
        }
    }
</style>
<script type="text/javascript" src="javascript/submit-forms.js">
    <script src="Jquery/jq"></script>

    <div id="feedback"></div>
    <form id="curso-reg">
    @csrf
        <div class="row">
            <div class="form-floating mb-3">
                <input required="true" type="text" class="form-control" name="designacao_curso" placeholder="Designação">
                <label class="input-label" for="floatingInput">Designação</label>
            </div>
        </div>
        <div class="row">
            <div class="form-floating mb-3">
                <input required="true" type="text" class="form-control" name="sigla" placeholder="sigla">
                <label class="input-label" for="floatingInput">sigla</label>
            </div>
        </div>

        <div class="col-md-3">
            <label for="validationCustom04" class="form-label">Faculdade</label>
            <select id="faculdade" name="faculdade" class="form-select" id="validationCustom04" required>
                <option selected disabled value="">Escolha..</option>   
                @foreach($faculdades as $faculdade)
                    <option value="{{$faculdade->id_faculdade}}">{{$faculdade->nome_faculdade}}</option>
                @endforeach
            </select>
        </div>
       
   </form>
 
   <div class="row" id="div-button">
        <button class="rounded bg-green-600 text-white px-2 py-1" id="submit" width="fit-content" onclick="reg_curso()">registar</button>
    </div>


