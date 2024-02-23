document.addEventListener("DOMContentLoaded", function () {
    
    var target = document.getElementById('info');
    var home = document.getElementById("home");
    var load_reg_curso = document.getElementById("load-curso-form");
    var load_categoria = document.getElementById("load-cat-disciplina-form");
    var load_reg_repesentante = document.getElementById("load-representante-form");
    var load_reg_disciplina = document.getElementById("load-disciplina-form");
    var load_reg_docente = document.getElementById("load-docente-form");
    var load_reg_contrato = document.getElementById("load-contrato-form");
    var load_view_curso = document.getElementById("load-curso-view");
    var load_view_docente = document.getElementById("load-docente-view");
    var load_view_contrato = document.getElementById("load-contrato-view");
    var load_curso_disciplina_form = document.getElementById("load-curso-disciplina-form");

    var load_faculdade_form = document.getElementById('load-faculdade-form');
    var load_view_faculdade = document.getElementById('load-faculdade-view');
    
    var load_form_disciplina_alocar = document.getElementById('load-discilplina-alocar-form');
    /*home.style.setProperty("color", "#1658DC", "important");
    fetch(`home.php`).then(res => {
        if (res.ok) {
        return res.text();
        }
    }).then(htmlSnippet => {
        target.innerHTML = htmlSnippet;
    });

    var menu_components = [
        [home.id, "no"]
        [load_reg_curso.id, "no"]
        [load_reg_disciplina.id, "no"]
        [load_reg_docente.id, "no"]
        [load_reg_contrato.id, "no"]
        [load_view_curso.id, "no"]
        [load_view_docente.id, "no"]
        [load_view_contrato.id, "no"]
    ]*/
    home.addEventListener("click", function(){
        this.style.setProperty("color", "#1658DC", "important");
        //var script = document.createElement('script');
        //script.src = "javascript/load_relatorio.js";
        var link1 = document.createElement('link');
        link1.href = "estatisticas_layout.css";
        link1.rel = 'stylesheet';
        document.head.appendChild(link1);
        fetch(`curso/get_count_disciplinas_associadas`).then(res => {
          if (res.ok) {
            return res.text();
          }
        }).then(htmlSnippet => {
            //console.log(htmlSnippet);
          target.innerHTML = htmlSnippet;
          document.head.appendChild(link1);
        });
        //document.body.appendChild(script);
    });
    load_faculdade_form.addEventListener("click", function(){
        // Set the text content of the element with the ID "cont-title"
        document.getElementById("content-header").innerHTML = "<label>registar faculdade</label>";
    
        fetch(`faculdade/reg`).then(res => {
            if (res.ok) {
                return res.text();
            }
        }).then(htmlSnippet => {
            // Assuming 'target' is an element, set its innerHTML to 'htmlSnippet'
            target.innerHTML = htmlSnippet;
    
            // If you want to change the title again after the content is loaded, you can do it here
            document.getElementById("content-header").innerHTML = "<label>registar faculdade</label>";
        });
    });
    
    load_reg_curso.addEventListener("click", function () {
        //this.style.setProperty("color", "#1658DC", "important");
        document.getElementById("content-header").innerHTML = "<label>registar curso</label>";
    
        fetch(`curso/reg`).then(res => {
          if (res.ok) {
            return res.text();
          }
        }).then(htmlSnippet => {
          target.innerHTML = htmlSnippet;
          document.getElementById("content-header").innerHTML = "<label>registar curso</label>";
        });
      });
      
      load_categoria.addEventListener("click", function(){
        document.getElementById("content-header").innerHTML = "<label>registar categoria</label>";
        fetch(`categoria/reg`).then(res => {
            if (res.ok) {
              return res.text();
            }
          }).then(htmlSnippet => {
            target.innerHTML = htmlSnippet;
            var link1 = document.createElement('link');
            link1.href = "tailwind.min.css";
            link1.rel = 'stylesheet';
            document.head.appendChild(link1);
            document.getElementById("content-header").innerHTML = "<label>registar categoria</label>";
          });
      });
  
      load_reg_repesentante.addEventListener("click", function(){
        fetch(`contratante-reg-form.php`).then(res => {
            if (res.ok) {
              return res.text();
            }
          }).then(htmlSnippet => {
            target.innerHTML = htmlSnippet;
          });
      })
    load_reg_docente.addEventListener("click", function () {
        document.getElementById("content-header").innerHTML = "<label>registar docente</label>";
        fetch(`docente/reg`).then(res => {
            if (res.ok) {
            return res.text();
            }
        }).then(htmlSnippet => {
            target.innerHTML = htmlSnippet;
            var link1 = document.createElement('link');
            link1.href = "input_style.css";
            link1.rel = 'stylesheet';
            document.head.appendChild(link1);
            
            document.getElementById("content-header").innerHTML = "<label>registar docente</label>";
            //console.log(htmlSnippet)
        });
    });
    load_reg_disciplina.addEventListener("click", function () {
        fetch(`disciplina/reg`).then(res => {
            if (res.ok) {
            return res.text();
            }
        }).then(htmlSnippet => {
            target.innerHTML = htmlSnippet;
            //console.log(htmlSnippet)
        });
    });

    load_view_curso.addEventListener("click", function () {
        document.getElementById("content-header").innerHTML = "<label>ver cursos</label>";
        fetch(`curso/ver`).then(res => {
            if (res.ok) {
                return res.text();
            }
        }).then(htmlSnippet => {
            console.log(htmlSnippet);
            target.innerHTML = htmlSnippet;
    
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
    
            var script2 = document.createElement('script');
            script2.src = "dataTables.bootstrap5.min.js";
            document.head.appendChild(script2);
    
            var script3 = document.createElement('script');
            script3.src = "jquery.dataTables.min.js";
            document.head.appendChild(script3);

            var script4 = document.createElement('script');
            script4.src = "load_smart_table.js";
            document.head.appendChild(script4);
            document.getElementById("content-header").innerHTML = "<label>ver cursos</label>";
        });
    });
    
    load_view_docente.addEventListener("click", function () {
        document.getElementById("content-header").innerHTML = "<label>ver docentes</label>";
        fetch(`docente/vizualisar`).then(res => {
            if (res.ok) {
            return res.text();
            }
        }).then(htmlSnippet => {
            target.innerHTML = htmlSnippet;
            //console.log(htmlSnippet)
            target.innerHTML = htmlSnippet;
    
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

    
    load_reg_contrato.addEventListener("click", function () {
        var script = document.createElement('script');
        script.src = 'javascript/contracto2.js';
    
        fetch(`contrato_gerar2.php`).then(res => {
        if (res.ok) {
            return res.text();
        }
        }).then(htmlSnippet => {
        target.innerHTML = htmlSnippet;
        // Additional code specific to contrato_gerar2.php if needed
        });
        
        document.body.appendChild(script);
    });
    load_view_contrato.addEventListener("click", function () {
        
        fetch(`contrato-ver.php`).then(res => {
            if (res.ok) {
            return res.text();
            }
        }).then(htmlSnippet => {
            target.innerHTML = htmlSnippet;
            //console.log(htmlSnippet)
        });
        
    });
    load_curso_disciplina_form.addEventListener("click", function () {
        var script = document.createElement('script');
        script.src = 'javascript/funcoes2.js';
        document.getElementById("content-header").innerHTML = "<label>alocar disciplinas à curso</label>";
        fetch(`disciplina/associar`).then(res => {
            if (res.ok) {
            return res.text();
            }
        }).then(htmlSnippet => {
            target.innerHTML = htmlSnippet;
            //console.log(htmlSnippet)
            var script1 = document.createElement('script');
            script1.src = "jquery-3.7.0.js";
            document.head.appendChild(script1);
            var link1 = document.createElement('link');
            link1.href = "input_style.css";
            link1.rel = 'stylesheet';
            document.head.appendChild(link1);
            document.getElementById("content-header").innerHTML = "<label>alocar disciplinas à curso</label>";
        });
        document.body.appendChild(script);
    });

    load_view_faculdade.addEventListener("click", function(){
        document.getElementById("content-header").innerHTML = "<label>faculdade</label>";
        fetch(`faculdade/vizualisar`).then(res => {
            if (res.ok) {
            return res.text();
            }
        }).then(htmlSnippet => {
            target.innerHTML = htmlSnippet;
            target.innerHTML = htmlSnippet;
    
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
    
            var script2 = document.createElement('script');
            script2.src = "dataTables.bootstrap5.min.js";
            document.head.appendChild(script2);
    
            var script3 = document.createElement('script');
            script3.src = "jquery.dataTables.min.js";
            document.head.appendChild(script3);

            var script4 = document.createElement('script');
            script4.src = "load_smart_table.js";
            document.head.appendChild(script4);
            document.getElementById("content-header").innerHTML = "<label>faculdade</label>";
            //console.log(htmlSnippet)
        });
    })
    loadDisciplinasCurso = id =>{
        document.getElementById("content-header").innerHTML = "<label>disciplinas</label>";
        fetch(`disciplina/vizualisar?id_curso=${id}`).then(res => {
            if (res.ok) {
            return res.text();
            }
        }).then(htmlSnippet => {
            target.innerHTML = htmlSnippet;
            var script1 = document.createElement('script');
            script1.src = "javascript/load_table.js";
            document.head.appendChild(script1);
            //console.log(htmlSnippet)
            document.getElementById("content-header").innerHTML = "<label>disciplinas</label>";
        });
    }

    loadEditarCursoForm = id =>{
        fetch(`curso-editar-form.php?id_curso=${id}`).then(res => {
            if (res.ok) {
            return res.text();
            }
        }).then(htmlSnippet => {
            target.innerHTML = htmlSnippet;
            //console.log(htmlSnippet)
        });
    
      }

      load_form_disciplina_alocar.addEventListener('click', function(){
        document.getElementById("content-header").innerHTML = "<label>alocar disciplinas</label>";
        fetch(`docente/alocar`).then(res => {
            if (res.ok) {
            return res.text();
            }
        }).then(htmlSnippet => {
            
            target.innerHTML = htmlSnippet;
           // console.log(htmlSnippet)
            var script1 = document.createElement('script');
            script1.src = "jquery-3.7.0.js";
            document.head.appendChild(script1);

            var script2 = document.createElement('script');
            script2.src = 'javascript/contracto2.js';
            document.body.appendChild(script2);

            var script3 = document.createElement('script');
            script3.src = 'javascript/funcoes_alocar.js';
            document.body.appendChild(script3);

            var script4 = document.createElement('script');
            script4.src = 'javascript/funcoes2.js';
            document.body.appendChild(script4);

            
            var script5 = document.createElement('script');
            script5.src = 'javascript/submit-forms.js';
            document.body.appendChild(script5);

            var script6 = document.createElement('script');
            script6.src = 'javascript/buscar.js';
            document.body.appendChild(script6);

            var link1 = document.createElement('link');
            link1.href = "input_style.css";
            link1.rel = 'stylesheet';
            document.head.appendChild(link1);
            console.log("carregado")
            document.getElementById("content-header").innerHTML = "<label>alocar disciplinas</label>";
            //target.innerHTML = htmlSnippet;
            //console.log(htmlSnippet)
        });
      });
      
     
  });
  





