/* 
 * Fonction Ajax pour récupérer les compositions
 */
function requeteAjax(queryString){
    var ajaxRequest;  // La variable pour Ajax 
        try{
           // Opera 8.0+, Firefox, Safari
           ajaxRequest = new XMLHttpRequest();
        }catch (e){    
           // Navigateurs Internet Explorer 
            try{
                ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
            }catch (e) {
                try{
                    ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                }catch (e){
                    // erreur!
                    alert("erreur de navigateur!");
                    return false;
                }
            }
        }
        // Créer une fonction qui recevra les données 
        // envoyées par le serveur et mettra à jour 
        // la div dans la page.
        ajaxRequest.onreadystatechange = function(){
            if(ajaxRequest.readyState == 4){
            //=========== RÉCUPÉRATION ET DÉCODAGE JSON DE LA RÉPONSE AJAX ===============================
            //console.log(ajaxRequest.responseText);
            var resultats = JSON.parse(ajaxRequest.responseText);
            console.log(resultats);
            afficherJeu(resultats);
            }
            else{
                //En attendant le readyState à 4, on affiche une chargement pour l'utilisateur
                document.querySelector('#compositionsListe').innerHTML = "Chargement...";
            }
            
       }       
       ajaxRequest.open("GET", "../../application/modeles/modele_compositions.php" + queryString, true);
       ajaxRequest.send(null);        
}
function afficherJeu(resultats){
    var compositionshtml = ""; 
    var cartehtml = '<div id="stations">'; 
    
    for(var i=0; i<resultats.length; i++){
       compositionshtml += '<div id="'+ resultats[i].idStation +'" class="composition"><img class="compo" src="../../public/img/compositions/'+ resultats[i].urlComposition +'"></div>';
       cartehtml += '<div class="station">'+
                        '<div id="'+ resultats[i].nomStation +'" class="target"></div>'+
                        '<div class="nomStation">'+ resultats[i].nomStation +'</div>'
                        if(i != resultats.length-1){
                            cartehtml +='<div class="rails"></div>'
                        }
       cartehtml += '</div>';
    }
    cartehtml += '</div>';
    document.querySelector('#compositionsListe').innerHTML = compositionshtml;
    document.querySelector('#carte').innerHTML = cartehtml;
    
    $(function() {
        var compositions = $(".composition");
        for(var i=0; i<compositions.length; i++){
            if(compositions[i].id > 0){
                var id = "#"+compositions[i].id;
            } 
            //Associer dynamiquement l'id de la composition au jquery draggable()
            $(id).draggable({
                //Permet le retour à l'origine si pas dans la bonne div
                revert:  function(dropped) {
                   return !dropped;
                } 
            }).each(function() {
                var top = $(this).position().top;
                var left = $(this).position().left;
                $(this).data('orgTop', top);
                $(this).data('orgLeft', left);
            });
            
            var cibles = $(".target");
            //console.log(cibles);
            console.log(id);
            for(var i=0; i<cibles.length; i++){
                var idStations = "#"+cibles[i].id;
                console.log(idStations);
                
                /*$("#montmorency").droppable({
                accept: "#1",
                drop: function (event, ui) {
                    var $this = jQuery(this);
                    $this.append(ui.draggable);    

                    var width = $this.width();
                    var height = $this.height();

                    ui.draggable.css({
                            height: height,
                            width: width,
                            top: 0,
                            left: 0,
                            border:0
                    });
                }
            });*/
            }
        }
        
        
    });
}




window.addEventListener("load", function () {
    /**
     * Permettre l'affichage des images en LightBox
     */
    var conteneurJeux = document.querySelector('#conteneurJeux');
    var lightBox = document.querySelector('#lightBox');
    var partie = document.querySelector('#partie');
    
    //================= LightBox ===================================
    conteneurJeux.addEventListener("click", function (e) {
        var imgLightBox = document.querySelector('#imgLightBox');
        if(e.target.classList.contains("compo")){
            var url = e.target.src;
            var img = document.createElement("img");
            img.src = url;
            lightBox.classList.remove("hidden");
            imgLightBox.appendChild(img);
            $("body").css("overflow","hidden");
        } 
        
        //================= Fermeture LightBox ===================================
        var fermer = document.querySelector('#lightBox button');
        fermer.addEventListener("click", function () {
            lightBox.classList.add("hidden");
            imgLightBox.innerHTML= "";
            $("body").css('overflow', '');
        })
        
    })
    
    var débuter = document.querySelector('#formPartie button');
    débuter.addEventListener("click", function () {
        partie.classList.add("hidden");
        $("body").css('overflow', '');
        var pseudo = document.querySelector('#pseudo').value;
        var ligne = document.querySelector('#ligne').value;
        var carte = document.querySelector('#carte');
        //console.log(carte);
        var queryString = "?idLigne="+ligne;
        //console.log(queryString);
        requeteAjax(queryString);
        //console.log(ligne);
        switch(ligne){
            case "1":
                carte.style.background = "#009344";
                break;
            case "2":
                carte.style.background = "#F05A28";
                break;
            case "3":
                carte.style.background = "#F29C1A";
                break;
            case "4":
                carte.style.background = "#00ADEF";
                break;
            default:
        }       
    })
   
    /**
     * Fonction permettant le drag() and drop() du jeu
     * @returns void
     */
    
        
        var stations = [{id:1, nom:"angrignon"},{id:2, nom:"monk"},{id:3, nom:"jolicoeur"},{id:3, nom:"jolicoeur"},{id:4, nom:"verdun"},{id:5, nom:"deleglise"},{id:6, nom:"lasalle"},
                        {id:7, nom:"charlevoix"},{id:8, nom:"lionelgroulx"},{id:9, nom:"atwater"},{id:10, nom:"guyconcordia"},{id:11, nom:"peel"},{id:12, nom:"mcgill"},{id:13, nom:"placedesarts"},
                        {id:14, nom:"saintlaurent"},{id:15, nom:"berriuquam"},{id:16, nom:"beaudry"},{id:17, nom:"papineau"},{id:18, nom:"frontenac"},{id:19, nom:"prefontaine"},{id:20, nom:"joliette"},
                        {id:21, nom:"pieix"},{id:22, nom:"viau"}];
        //console.log(stations)
        $("#montmorency").droppable({
            accept: "#1",
            drop: function (event, ui) {
                var $this = jQuery(this);
                $this.append(ui.draggable);    

                var width = $this.width();
                var height = $this.height();

                ui.draggable.css({
                        height: height,
                        width: width,
                        top: 0,
                        left: 0,
                        border:0
                });
            }
        });
        $("#delaconcorde").droppable({
            accept: "#2",
             drop: function (event, ui) {
                var $this = jQuery(this);
                $this.append(ui.draggable);    

                var width = $this.width();
                var height = $this.height();

                ui.draggable.css({
                        height: height,
                        width: width,
                        top: 0,
                        left: 0,
                        border:0
                        
                });
            }
        });
        $("#cartier").droppable({
            accept: "#3",
             drop: function (event, ui) {
                var $this = jQuery(this);
                $this.append(ui.draggable);    

                var width = $this.width();
                var height = $this.height();

                ui.draggable.css({
                        height: height,
                        width: width,
                        top: 0,
                        left: 0,
                        border:0
                        
                });
            }
        });
    });
    
   
    
//})