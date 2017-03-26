/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


window.addEventListener("load", function () {
    
    /**
     * Permettre l'affichage des images en LightBox
     */
    var compositions = document.querySelector('#compositionsListe');
    var lightBox = document.querySelector('#lightBox');
    
    //================= LightBox ===================================
    compositions.addEventListener("click", function (e) {
        var imgLightBox = document.querySelector('#imgLightBox');
        if(e.target.classList.contains("compo")){
            var url = e.target.src;
            var img = document.createElement("img");
            img.src = url;
            lightBox.classList.remove("hidden");
            imgLightBox.appendChild(img);
        } 
        
        //================= Fermeture LightBox ===================================
        var fermer = document.querySelector('#lightBox button');
        fermer.addEventListener("click", function () {
            lightBox.classList.add("hidden");
            imgLightBox.innerHTML= "";
        })
    })
    var next = document.querySelector("#next");
    next.addEventListener("click", function () {
        var widthWindow = $(window).width();
        var widthDiv = compositions.clientWidth;
        console.log(widthWindow);
        console.log(widthDiv);
        var translate = widthWindow - widthDiv;
        console.log(translate);
        compositions.style.left = translate +"px";
        
    })
    
    /**
     * Fonction permettant le drag() and drop() du jeu
     * @returns void
     */
    $(function() {
        var compositions = $(".composition");
        console.log(compositions);
        var limit = 14;
        var taille = 7;
        if(compositions.length > limit){
            var elements = compositions.length - limit;
            var widthSupp = elements*taille;
            var width = 100+widthSupp;
            console.log(taille)
            document.querySelector("#compositionsListe").style.width = width+"%";
        }
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
        }
        //var targets = $(".target");
        //console.log(targets);
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
    
    
})