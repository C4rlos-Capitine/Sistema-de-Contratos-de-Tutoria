<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="body-style.css">
    <link href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link href="{{asset('fontawsome/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('fontawsome/css/fontawesome.min.css')}}" rel="stylesheet">
    <link href="{{asset ('bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('dataTables.bootstrap5.min.css')}}" rel="stylesheet">
    <script src="{{asset('jquery-3.7.0.js')}}"></script>
    <script src="{{asset('dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('jquery.dataTables.min.js')}}"></script>
    <link href="{{asset('tailwind.min.css')}}" rel="stylesheet">
    <link href="{{asset('popup.css')}}" rel="stylesheet">
    <link href="{{asset('tailwind.min.css')}}" rel="stylesheet">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('javascript/jq.js') }}"></script>
    <script src="{{asset('submit.js')}}"></script>
    <script src="javascript/jq.js"></script>
    <link href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="javascript/funcoes_ver_contratos.js"></script>
    <script src="Jquery/jq"></script>
    <title>Document</title>
    <style>
        body{
            top: 0;
            left: 0;
            width: 100%;
            overflow: scroll;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .row{
            display: flex;
            flex-direction: row;
        }
        .header-section {
            top: 0;
            left: 0;
            padding-top: 2px;
            height: 60px;
            position: fixed;
            z-index: 9999;
            background: rgba(9, 32, 76, 0.882);
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .main-section{
            top: 60px;
            left: 0;
            padding-left: 0;
            height: 1000px;
            overflow: hidden;
            display: flex;
            flex-direction: row;
        }
        .btn{
            width: fit-content;
        }
        .side-section{
            left: 0;
            position: fixed;
            padding-top: 40px;
            margin-top: 60px;
            margin-right: 20px;
            width: 300px;
            height: 1500px;
            background: #43A047;
        }
        .menu-link{
            text-decoration: none;
            color: white;
        }
        .nav-bar{
            display: flex;
            flex-direction: column;
        }
        .nav-content{
            width: 100%;
            padding-top: 10px;
            padding-left: 10px;
            cursor: pointer;
        }
        .nav-content:hover{
            background: rgba(9, 32, 76, 0.882);
            cursor: pointer;
        }
        .content-section{
            /*height:2000px;*/
            width: 100%;
            margin-left: 300px;
            margin-top: 70px;
            padding: 0;
            position: relative;
            display: flex;
            flex-direction: column;
            overflow: scroll;
        }
        #content-header{
            top: 60px;
            width: 80%;
            float:left;
            text-align: center;
            z-index: 9999;
            position: fixed;
            background:gray;
        }
        .row-section{
            margin-bottom: 10px;
            display: flex;
            flex-direction: row;
        }
        .card-img-top{
            width: 30px;
            height: 30px;
        }
        .card{
            margin-left: 10px;
        }
        #titulo{
            color: white;
            text-decoration: white;
            padding: 10px;
        }
        .menu-label{
            margin-left: 10px;
            text-decoration: white;
            color: white;
            cursor: pointer;
        }
        #quit{
            height: 5px;
        }
        #quit-link{
            height: 60%;
        }
        #info{
            padding-left: 30px;
            padding-top:50px;
        }
        #logo{
            height: 50px;
            order: 1;
            margin-left:50px;
            color: white;
            display: flex;
            flex-direction: row;
        }
        #img-logo{
            height: 50px;
        }
        #header-right{
            order: 2;
            margin-right: 100px;
            width: fit-content;
            height: fit-content;
            background: red;
            background-color: red;
            color: white;
            border-radius: 20px 20px;
        }
        #div-button{
            width:fit-content;
            height:auto;
            color: #43A047;
        }
        .tb-data{
            border: solid 1px;
        }
        .tb-data th{
            border: solid 1px;
            width: 300px;
        }
 
@media (max-width:500px){
    #div-button{
        width:fit-content;
        height:auto;
    }
}
@media (max-width: 700px){
    .main-section{
        flex-direction: column;
    }
    .content-section{
        height:2000px;
        margin-top: 250px;
        margin-left:0;
        padding: 0;
        width: 100%;
        position: relative;
        display: flex;
        flex-direction: column;
        overflow-y: scroll;
    }
    .side-section{
        width: 100%;
        height: fit-content;
        z-index: 9999;
        display:none;
    }
    .row-section{
        display: flex;
        flex-direction: column;
    }
    .card{
        margin-top: 10px;
    }
    

    .rounded{
        width: fit-content;
    }
    
}
    </style>
    <script src="Jquery/jq"></script>
    <!-- ... -->
    <script src="javascript/submit-forms.js"></script>
    <script src="javascript/template-controller.js"></script>
    <script src="javascript/template-controller2.js"></script>
    <!-- ... -->
            <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        */
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
    <header class="header-section">

<!--<i class="fa-solid fa-bars" style="color: #f7f7f8;"></i>-->
<div id="logo">
    <img id="img-logo" src="cead.png">
    <label id="titulo">Sistema Gestão de Contratos do CEAD</label>
</div>

<!-- <button id="bt-quit">sair<i id="quit" class="fa-solid fa-power-off" style="color: #f4f0f0;"></i></button>-->
<p id="header-right"><a id="quit-link" width="fit-content"  class="rounded bg-red-600 text-white px-2 py-1">sair<i id="quit" class="fa-solid fa-power-off" style="color: #f4f0f0;"></i></a></p>
</header>

<main class="main-section">
        <aside class="side-section">
        
        <div class="nav-bar">
            @if(auth()->user()->tipo_user == 1)
                <div id="home" class="nav-content"><i class="fa-solid fa-house" style="color: #e5e7eb;"></i></i><label class="menu-label">Estatisticas</label></div>
                <div id="load-faculdade-form" class="nav-content"><i class="fa-solid fa-pen-to-square" style="color: #eff1f6;"></i><label class="menu-label">Registar Faculdade</label></div>
                <div id="load-representante-form" class="nav-content"><i class="fa-solid fa-pen-to-square" style="color: #eff1f6;"></i><label class="menu-label">Registar Representante</label></div>
                <div id="load-curso-form" class="nav-content"><i class="fa-solid fa-pen-to-square" style="color: #eff1f6;"></i><label class="menu-label">Registar curso</label></div>
                <div id="load-cat-disciplina-form" class="nav-content" ><i class="fa-solid fa-pen-to-square" style="color: #eff1f6;"></i><label class="menu-label">Registar Categoria de disciplina</label></div>
                <div id="load-disciplina-form" class="nav-content" ><i class="fa-solid fa-pen-to-square" style="color: #eff1f6;"></i><label class="menu-label">Registar Disciplina</label></div>
                <div id="load-docente-form" class="nav-content"><i class="fa-solid fa-pen-to-square" style="color: #eff1f6;"></i><label class="menu-label">Registar Docente</label></div>
                <div id="load-curso-disciplina-form" class="nav-content"><i class="fa-solid fa-files" style="color: #e4e5ec;"></i><label class="menu-label">Associar disciplina a curso</label></div>
                <div id="load-faculdade-view" class="nav-content"><i class="fa-solid fa-table-list" style="color: #eff0f0;"></i><label class="menu-label">Visualizar Faculdades</label></div>
                
                <div id="load-discilplina-alocar-form" class="nav-content"><i class="fa-solid fa-chalkboard-user" style="color: #f0f2f5;"></i><label class="menu-label">Alocar disciplinas</label></div>
                <div id="load-curso-view" class="nav-content"><i class="fa-solid fa-table-list" style="color: #eff0f0;"></i><label class="menu-label">Visualizar Cursos</label></div>
                <div id="load-docente-view" class="nav-content"><i class="fa-solid fa-table-list" style="color: #eff0f0;"></i><label class="menu-label">Visualizar Docentes</label></div>
                <div id="load-contrato-view" class="nav-content"><i class="fa-solid fa-file-contract" style="color: #e9eaed;"></i><label class="menu-label">Visualizar Contratos</label></div>
                <div id="load-contrato-form" class="nav-content"><i class="fa-solid fa-file-pen" style="color: #eceff3;"></i><label class="menu-label">Gerar Contrato</label></div>
            @else
            <input id="user-email" class="user-email" value="{{auth()->user()->email}}" type="hidden">
            <!-- onclick="load_data_docente()" -->
            <div id="load-docente-data" class="nav-content" ><i class="fa-solid fa-user" style="color: #f8f9fc;"></i><label class="menu-label">Meus dados</label></div>
            <div id="load-docente-contrato" class="nav-content"><i class="fa-solid fa-file-pen" style="color: #eceff3;"></i><label class="menu-label">Contratos</label></div>
            
            @endif
            </div>
    </aside>
    <div class="content-section">
        <div id="content-header"><label id="cont-title">Home</label></div>
        <div id="info">
            {{auth()->user()->tipo_user}}
        </div>
    </div>
    </body>
    <script>
        var target2 = document.getElementById('info');
       var load_data_docente = document.getElementById('load-docente-data');
       load_data_docente.addEventListener("click", function () {
        var email = document.getElementById('user-email').value;
        console.log(email);
        fetch(`docente/find?email=${email}`).then(res => {
            if (res.ok) {
            return res.text();
            }
        }).then(htmlSnippet => {
            target2.innerHTML = htmlSnippet;
          
    
            var script1 = document.createElement('script');
            script1.src = "jquery-3.7.0.js";
            document.head.appendChild(script1);
    
            var link1 = document.createElement('link');
            link1.href = "bootstrap.min.css";
            link1.rel = 'stylesheet';
            document.head.appendChild(link1);
    
            var link2 = document.createElement('link');
            link2.href = "dataTables.bootstrap5.min.css";
            link2.rel = 'stylesheet';
            document.head.appendChild(link2);

            var link3 = document.createElement('link');
            link3.href = "popup.css";
            link3.rel = 'stylesheet';
            document.head.appendChild(link3);
            var script2 = document.createElement('script');
            script2.src = "dataTables.bootstrap5.min.js";
            document.head.appendChild(script2);
    
            var script3 = document.createElement('script');
            script3.src = "jquery.dataTables.min.js";
            document.head.appendChild(script3);

            var script4 = document.createElement('script');
            script4.src = "load_smart_table.js";
            document.head.appendChild(script4);
            
            var script5 = document.createElement('script');
            script5.src = "javascript/template-controller2.js";
            document.head.appendChild(script5);
        });
    });

    </script>
 
</html>
