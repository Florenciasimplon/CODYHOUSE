<?php
include 'header.php';
?>
<div class="maps">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31680.31237053977!2d7.418978282657058!3d43.74749274155356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1618324176656!5m2!1sfr!2sfr" width="100%" height="450" style="border:0;" allowfullscreen="fullscreen" loading="lazy"></iframe>
</div>
<div class="filtre">
    <div class="filter">
        <div class="filter-menu">
            <input type="text" placeholder="Destination" class="geo" />
            <input placeholder="Date d'arrivée" type="date" name="checkIn" id="datepicker" value="" class="calendar">⇄
            <input placeholder="Date retour" type="date" name="checkIn" id="datepicker" value="" class="calendar">
            <Select name="size" class="boat">
                <option> Taille boat</option>
                <option>10 Meters</option>
                <option>30 Meters</option>
            </Select>
            <button class="btnsend">Rechercher</button>
        </div>
    </div>
    <div class="resultat">
        <h4>Résulats de votre recherche</h4>
        <p><u>Ou voir tous les Yachts disponibles</u></p>
    </div>
    <div class="selection">
        <h6>Filtrer<br>la sélection</h6>
        <Select id="size" name="size">
            <option> Taille boat</option>
            <option>10 Meters</option>
            <option>30 Meters</option>
        </Select>
        <Select name="point">
            <option>Point d'achat</option>
            <option>Monaco</option>
            <option>Nice</option>
        </Select>
        <Select name="pers">
            <option>Pers. a board</option>
            <option>10 pers.</option>
            <option>12 pers.</option>
        </Select>
        DISPONIBILITÉ
        <input id="terms" data-error="Before you wreck yourself" type="checkbox" required class="dispo">
    </div>

    <div class="content-info grid">
        <div class="cardss col-12 col-8@md">
            <?php
            for ($i = 0; $i < 12; $i++) {
                echo "<div class='card'>
             <img src='../images/63d75c702d078272f957d476c2850bf3.jpg' alt='mountains' style='width:100%'>
             <div class='container'>
             <p>BlackBoard 42métres</p>
             <p>Lorem ipsum dolor sit amet consectetur<br>👥 12 ⚓︎ Port d'attache</p>
             </div>
         </div>";
            } ?>
        </div>
        <div class="pub2 col-12 col-3@md">
            <div class="pub">
                
                </div>
                <div class="pub3">
                
                </div>
        </div>
    </div>
</div>

<div class="actualiter">
    <h3>Les actualités du Yacht</h3>
    <div class="containe-carousel">
            <div class="wrapper">
                <div class="carousel owl-carousel">
                    <?php
                    for($i=0; $i<4; $i++){
                    echo '<div class="card">
                            <img src="../images/yacht-interieur.png">
                            <div class="text-zone">
                                <h6>BlackBoard</h6>
                                <p>Le 17.07.2020 par Yacht Prestige</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                                <p class="info-card"><button class="btn-book">Read more</button></p>
                            </div>
                         </div>';
                        }
                    ?>
                </div>
            </div>
        </div>
</div>










































    <?php
    include 'footer.php';
    ?>