<?php

?>

<html>
    <head>
        <link href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
<div class="row">

    <p>Registar Faculdade</p>
</div>
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

</script>


    <div id="feedback"></div>
    <form id="faculdade-reg">
    @csrf
        <div class="row">
            <div class="form-floating mb-3">
                <input required="true" type="text" class="form-control" name="nome_faculdade" placeholder="Designação">
                <label class="input-label" for="floatingInput">Designação</label>
            </div>
        </div>
        <div class="row">
            <div class="form-floating mb-3">
                <input required="true" type="text" class="form-control" name="sigla_faculdade" placeholder="sigla">
                <label class="input-label" for="floatingInput">sigla</label>
            </div>
        </div>
       
       
   </form>
 
   <div class="row" id="div-button">
        <button class="rounded bg-green-600 text-white px-2 py-1" id="submit" width="fit-content" onclick="reg_faculdade()">registar</button>
    </div>

<script>
   
</script>

</html>


