<?php

/** 
 * Vue de la page jeux
 * Projet Web 2
 * @author Danny Labeaume, Christian Salette, Arnaud Martin
 * @version 2017-03-22
 */  

    /**
     * Fonction permettant de construire la vue de la page jeux
     * @param array $compositions
     * @return string $html
     */
    function getVueJeux($lignes){

        $html = '
                <div id="conteneurJeux">
                    <div id="lightBox" class="hidden">
                        <button>X Fermer</button>
                        <div id="containerLightBox">
                            <div id="imgLightBox"></div>
                        </div>
                    </div>
                    <div id="partie">
                        <div id="containerPartie">
                            <div id="formPartie">
                                <label>Pseudonyme</label/>
                                <input type="text" id="pseudo" name="pseudo">
                                <div id="right">
                                    <label>Choisir une ligne</label/>
                                    <select name="ligne" id="ligne">';
                                    foreach($lignes as $ligne){
                                        $html .= '<option value="'.$ligne["idLigne"].'">Ligne '.$ligne["nomLigne"].'</option>';
                                    }                                       
        $html .='                    </select><br>
                                    <button>Débuter une partie</button>
                                </div>
                            </div>
                        </div>                   
                    </div>
                    <div id="compositionsListe">
                        
                       <!--id Station
                        <div id="1" class="composition"><img class="compo" src="../../public/img/compositions/atwater_01c.jpg"></div>
                        <div id="2" class="composition"><img class="compo" src="../../public/img/compositions/beaudry_01c.jpg"></div>
                        <div id="3" class="composition"><img class="compo" src="../../public/img/compositions/berriuqam_01c.jpg"></div>
                        <div class="composition"><img class="compo" src="../../public/img/compositions/bonaventure_01c.jpg"></div>
                        <div class="composition"><img class="compo" src="../../public/img/compositions/champsdemars_01c.jpg"></div>
                        <div class="composition"><img class="compo" src="../../public/img/compositions/charlevoix_01c.jpg"></div>
                        <div class="composition"><img class="compo" src="../../public/img/compositions/charlevoix_01c.jpg"></div>
                        <div class="composition"><img class="compo" src="../../public/img/compositions/charlevoix_01c.jpg"></div>
                        <div class="composition"><img class="compo" src="../../public/img/compositions/charlevoix_01c.jpg"></div>
                        <div class="composition"><img class="compo" src="../../public/img/compositions/charlevoix_01c.jpg"></div>
                        <div class="composition"><img class="compo" src="../../public/img/compositions/charlevoix_01c.jpg"></div>
                        <div class="composition"><img class="compo" src="../../public/img/compositions/charlevoix_01c.jpg"></div>
                        <div class="composition"><img class="compo" src="../../public/img/compositions/charlevoix_01c.jpg"></div>
                        <div class="composition"><img class="compo" src="../../public/img/compositions/charlevoix_01c.jpg"></div>
                        <div class="composition"><img class="compo" src="../../public/img/compositions/charlevoix_01c.jpg"></div>
                        <div class="composition"><img class="compo" src="../../public/img/compositions/charlevoix_01c.jpg"></div>
                        <div class="composition"><img class="compo" src="../../public/img/compositions/charlevoix_01c.jpg"></div>
                        <div class="composition"><img class="compo" src="../../public/img/compositions/charlevoix_01c.jpg"></div>
                        <div class="composition"><img class="compo" src="../../public/img/compositions/charlevoix_01c.jpg"></div>
                        <div class="composition"><img class="compo" src="../../public/img/compositions/charlevoix_01c.jpg"></div>-->


                        
                    </div>
                    <div id="carte">
                        <!--<div id="atwaterTgt" class="target"></div>
                        <div id="beaudryTgt" class="target"></div>
                        
                        <div id="ligne01">
                            <div id="videGaucheLigne01"></div>
                            <div id="montmorency" class="target"></div>
                            <div id="nomMontmorency">
                            <p class="nomOrange">Montmorency</p>
                            </div>
                        </div>
                        <div id="ligne02">
                            <div id="videGaucheLigne02"></div>
                            <div id="delaconcorde" class="target"></div>
                            <div id="nomDelaconcorde">
                            <p class="nomOrange">De la Concorde</p>
                            </div>
                        </div>
                        <div id="ligne03">
                            <div id="videGaucheLigne03"></div>
                            <div id="cartier"></div>
                            <div id="nomCartier">
                            <p class="nomOrange">Cartier</p>
                            </div>
                            <div id="nomHonorebeaugrand">
                            <p class="nomVert">Honoré-Beaugrand</p>
                            </div>
                            <div id="honorebeaugrand"></div>
                            <div id="videDroitLigne03"></div>
                        </div>
                        <div id="ligne04">
                            <div id="nomRadisson">
                            <p class="nomVert">Radisson</p>
                            </div>
                            <div id="radisson"></div>
                            <div id="videDroitLigne04"></div>
                        </div>
                        <div id="ligne05">
                            <div id="nomHenribourassa">
                            <p class="nomOrange">Henri-Bourassa</p>
                            </div>
                            <div id="henribourassa"></div>
                            <div id="nomLangerlier">
                            <p class="nomVert">Langerlier</p>
                            </div>
                            <div id="langelier"></div>
                            <div id="videDroitLigne05"></div>
                        </div>
                        <div id="ligne06">
                            <div id="nomSauve">
                            <p class="nomOrange">Sauvé</p>
                            </div>
                            <div id="sauve"></div>
                            <div id="videCentreLigne06"></div>
                            <div id="saintmichel"></div>
                            <div id="nomSaintmichel">
                            <p class="nomBleu">Saint-Michel</p>
                            </div>
                            <div id="nomCadillac">
                            <p class="nomVert">Cadillac</p>
                            </div>
                            <div id="cadillac"></div>
                            <div id="videDroitLigne06"></div>
                        </div>
                        <div id="ligne07">
                            <div id="nomCremazie">
                            <p class="nomOrange">Crémazie</p>
                            </div>
                            <div id="cremazie"></div>
                            <div id="videCentreLigne07"></div>
                            <div id="diberville"></div>
                            <div id="nomDibervile">
                            <p class="nomBleu">D’Iberville</p>
                            </div>
                            <div id="nomLassomption">
                            <p class="nomVert">L’Assomption</p>
                            </div>
                            <div id="lassomption"></div>
                            <div id="videDroitLigne07"></div>
                        </div>
                        <div id="ligne08">
                            <div id="nomJarry">
                            <p class="nomOrange">Jarry</p>
                            </div>
                            <div id="jarry"></div>
                            <div id="videCentreLigne08"></div>
                            <div id="fabre"></div>
                            <div id="nomFabre">
                            <p class="nomBleu">Fabre</p>
                            </div>
                            <div id="nomViau">
                            <p class="nomVert">Viau</p>
                            </div>
                            <div id="viau"></div>
                            <div id="videDroitLigne08"></div>
                        </div>
                        <div id="ligne09">
                            <div id="nomJeantalon">
                            <p class="nomOrange">Jean-Talon</p>
                            </div>
                            <div id="jeantalon"></div>
                            <div id="videCentreLigne09"></div>
                            <div id="pieix"></div>
                            <div id="nomPiex">
                            <p class="nomVert">Pie-X</p>
                            </div>
                        </div>
                        <div id="ligne10">
                            <div id="nomDecastelneau">
                            <p class="nomBleu">De Casatelneau</p>
                            </div>
                            <div id="decastelneau"></div>
                            <div id="videCentreLigne10"></div>
                            <div id="beaubien"></div>
                            <div id="nomBeaubien">
                            <p class="nomOrange">Beaubien</p>
                            </div>
                            <div id="joliette"></div>
                            <div id="nomJoliette">
                            <p class="nomVert">Joliette</p>
                            </div>
                        </div>
                        <div id="ligne11">
                            <div id="nomParc">
                            <p class="nomBleu">Parc</p>
                            </div>
                            <div id="parc"></div>
                            <div id="videCentreLigne11"></div>
                            <div id="rosemont"></div>
                            <div id="nomRosemont">
                            <p class="nomOrange">Rosemont</p>
                            </div>
                            <div id="prefontaine"></div>
                            <div id="nomPrefontaine">
                            <p class="nomVert">Préfontaine</p>
                            </div>
                        </div>
                        <div id="ligne12">
                            <div id="videGaucheLigne12"></div>
                            <div id="laurier"></div>
                            <div id="nomLaurier">
                            <p class="nomOrange">Laurier</p>
                            </div>
                            <div id="frontenac"></div>
                            <div id="nomFrontenac">
                            <p class="nomVert">Frontenac</p>
                            </div>
                        </div>
                        <div id="ligne13">
                            <div id="nomCotevertu">
                            <p class="nomOrange">Côte-Vertu</p>
                            </div>
                            <div id="cotevertu"></div>
                            <div id="nomAcadie">
                            <p class="nomBleu">Acadie</p>
                            </div>
                            <div id="acadie"></div>
                            <div id="nomMontroyal">
                            <p class="nomOrange">Mont-Royal</p>
                            </div>
                            <div id="montroyal"></div>
                            <div id="videCentreLigne13"></div>
                            <div id="papineau"></div>
                            <div id="nomPapineau">
                            <p class="nomVert">Papineau</p>
                            </div>
                        </div>
                        <div id="ligne14">
                            <div id="nomDucollege">
                            <p class="nomOrange">Du Collège</p>
                            </div>
                            <div id="ducollege"></div>
                            <div id="nomSherbrooke">
                            <p class="nomOrange">Sherbrooke</p>
                            </div>
                            <div id="sherbrooke"></div>
                            <div id="videCentreLigne14"></div>
                            <div id="beaudry"></div>
                            <div id="nomBeaudry">
                            <p class="nomVert">Beaudry</p>
                            </div>
                        </div>
                        <div id="ligne15">
                            <div id="nomDelasavanne">
                            <p class="nomOrange">De la Savanne</p>
                            </div>
                            <div id="delasavanne"></div>
                            <div id="nomOutremont">
                            <p class="nomBleu">Outremont</p>
                            </div>
                            <div id="outremont"></div>
                            <div id="nomBerriuqam">
                            <p class="nomOrange">Berri / UQAM</p>
                            </div>
                            <div id="berriuqam"></div>
                            <div id="videCentreLigne15"></div>
                            <div id="parcjeandrapeau"></div>
                            <div id="nomParcjeandrapeau">
                            <p class="nomJaune">Parc-Jean-Drapeau</p>
                            </div>
                        </div>
                        <div id="ligne16">
                            <div id="nomNamur">
                            <p class="nomOrange">Namur</p>
                            </div>
                            <div id="namur"></div>
                            <div id="videCentreLigne16"></div>
                            <div id="edouardmontpetit"></div>
                            <div id="nomEdouardmontpetit">
                            <p class="nomBleu">Édouard-Montpetit</p>
                            </div>
                            <div id="saintlaurent"></div>
                            <div id="nomSaintlaurent">
                            <p class="nomVert">Saint-Laurent</p>
                            </div>
                        </div>
                        <div id="ligne17">
                            <div id="nomPlamondon">
                            <p class="nomOrange">Plamondon</p>
                            </div>
                            <div id="plamondon"></div>
                            <div id="videCentreLigne17"></div>
                            <div id="universitedemontreal"></div>
                            <div id="nomUniversitedemontreal">
                            <p class="nomBleu">Université-de-Montréal</p>
                            </div>
                            <div id="placedesarts"></div>
                            <div id="nomPlacedesarts">
                            <p class="nomVert">Place-des-Arts</p>
                            </div>
                            <div id="longueuil"></div>
                            <div id="nomLongueuil">
                            <p class="nomJaune">Longueuil</p>
                            </div>
                        </div>
                        <div id="ligne18">
                            <div id="nomCotesaintecatherine">
                            <p class="nomOrange">Côte-Sainte-Catherine</p>
                            </div>
                            <div id="cotesaintecatherine"></div>
                            <div id="videCentreLigne18"></div>
                            <div id="cotedesneiges"></div>
                            <div id="nomCotedesneiges">
                            <p class="nomBleu">Côte-des-neiges</p>
                            </div>
                            <div id="mcgill"></div>
                            <div id="nomMcgill">
                            <p class="nomVert">McGill</p>
                            </div>
                            <div id="champdemars"></div>
                            <div id="nomChampdemars">
                            <p class="nomOrange">Champ-de-Mars</p>
                            </div>
                        </div>
                        <div id="ligne19">
                            <div id="nomSnowdon">
                            <p class="nomOrange">Snowdon</p>
                            </div>
                            <div id="snowdon"></div>
                            <div id="videCentreLigne19"></div>
                            <div id="peel"></div>
                            <div id="nomPeel">
                            <p class="nomVert">Peel</p>
                            </div>
                            <div id="placedarmes"></div>
                            <div id="nomPlacedarmes">
                            <p class="nomOrange">Place-d’Armes</p>
                            </div>
                        </div>
                        <div id="ligne20">
                            <div id="nomVillamaria">
                            <p class="nomOrange">Villa-Maria</p>
                            </div>
                            <div id="villamaria"></div>
                            <div id="videCentreLigne20"></div>
                            <div id="guyconcordia"></div>
                            <div id="nomGuyconcordia">
                            <p class="nomVert">Guy-Concordia</p>
                            </div>
                            <div id="squarevictoriaoaci"></div>
                            <div id="nomSuqarevictoriaoaci">
                            <p class="nomOrange">Square-Victoria / OACI</p>
                            </div>
                        </div>
                        <div id="ligne21">
                            <div id="nomVendome">
                            <p class="nomOrange">Vendôme</p>
                            </div>
                            <div id="vendome"></div>
                            <div id="videCentreLigne21"></div>
                            <div id="atwaterTgt"></div>
                            <div id="nomAtwater">
                            <p class="nomVert">Atwater</p>
                            </div>
                            <div id="bonaventure"></div>
                            <div id="nomBonaventure">
                            <p class="nomOrange">Bonaventure</p>
                            </div>
                        </div>
                        <div id="ligne22">
                            <div id="nomPlacesainthenri">
                            <p class="nomOrange">Place-Saint-Henri</p>
                            </div>
                            <div id="placesainthenri"></div>
                            <div id="videCentreLigne22"></div>
                            <div id="lucienlallier"></div>
                            <div id="nomLucienlallier">
                            <p class="nomOrange">Lucien-L’Allier</p>
                            </div>
                        </div>
                        <div id="ligne23">
                            <div id="videGaucheLigne23"></div>
                            <div id="georgesvanier"></div>
                            <div id="nomGeorgesvanier">
                            <p class="nomOrange">Georges-Vanier</p>
                            </div>
                        </div>
                        <div id="ligne24">
                            <div id="nomLionelgroulx">
                            <p class="nomOrange">Lionel-Groulx</p>
                            </div>
                            <div id="lionelgroulx"></div>
                            <div id="videDroiteLigne24"></div>
                        </div>
                        <div id="ligne25">
                            <div id="videGaucheLigne25"></div>
                            <div id="charlevoix"></div>
                            <div id="nomCharlevoix">
                            <p class="nomVerte">Charlevoix</p>
                            </div>
                        </div>
                        <div id="ligne26">
                            <div id="videGaucheLigne26"></div>
                            <div id="lasalle"></div>
                            <div id="nomLasalle">
                            <p class="nomVerte">Lasalle</p>
                            </div>
                        </div>
                        <div id="ligne27">
                            <div id="nomJolicoeur">
                            <p class="nomVert">Jolicoeur</p>
                            </div>
                            <div id="jolicoeur"></div>
                            <div id="videCentreLigne27"></div>
                            <div id="deleglise"></div>
                            <div id="nomDeleglise">
                            <p class="nomVerte">De l’Église</p>
                            </div>   
                        </div>
                        <div id="ligne28">
                            <div id="nomMonk">
                            <p class="nomVert">Monk</p>
                            </div>
                            <div id="monk"></div>
                            <div id="videCentreLigne28"></div>
                            <div id="verdun"></div>
                            <div id="nomVerdun">
                            <p class="nomVerte">Verdun</p>
                            </div>
                        </div>
                        <div id="ligne29">
                            <div id="nomAngrignon">
                            <p class="nomVert">Angrignon</p>
                            </div>
                            <div id="angrignon"></div>
                            <div id="videDroiteLigne29"></div>
                        </div>-->
                    </div>
                
                ';

        echo $html;
    }

?>