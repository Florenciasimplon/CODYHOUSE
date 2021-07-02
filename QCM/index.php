<?php
function chargerClasse($classname)
{
  require "class/" . $classname . '.php';
}

spl_autoload_register('chargerClasse');
session_start(); // On appelle session_start() APRÈS avoir enregistré l'autoload.
$db = new PDO('mysql:host=127.0.0.1;dbname=QCM', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.
$manager = new Qcm($db);
$questionManager = new QuestionManager($db);
$reponseManager = new ReponseManager($db);

if (isset($_POST['sujet']) && isset($_POST['reponse1']) &&  isset($_POST['reponse2']) && isset($_POST['reponse3']) && isset($_POST['description'])) {

  $question = new Question(['sujet' => $_POST['sujet'], 'description' => $_POST['description']]);
  $questionManager->add($question);

  $reponse = new Reponse(['reponse' => $_POST['reponse1'], 'isTrue' => true, 'idQuestion' => $question->getId()]);
  $reponse2 = new Reponse(['reponse' => $_POST['reponse2'], 'isTrue' => false, 'idQuestion' => $question->getId()]);
  $reponse3 = new Reponse(['reponse' => $_POST['reponse3'], 'isTrue' => false, 'idQuestion' => $question->getId()]);
  $reponseManager->add($reponse);
  $reponseManager->add($reponse2);
  $reponseManager->add($reponse3);
}

?>

<?php
include 'header.php';
?>
  <div class="compteur"><h2>Points : <span class='total'>0</span></h2>
</div>
<div id="stopwatch">
            00:00:00
        </div>

        <ul id="buttons">
            <li><button onclick="startTimer()">Start</button></li>
            <li><button onclick="stopTimer()">Stop</button></li>

            <li><button onclick="resetTimer()">Reset</button></li>
        </ul>

<?php
$AllQuestion = $questionManager->get();
foreach ($AllQuestion as $question) {
?>
    <div class="title"><?= $question->getSujet()?></div><br>
  <?php
  $AllReponse = $reponseManager->getReponseByQuestion($question->getId()); ?>
    <div class="rep">
<?php
  foreach ($AllReponse as $reponse) { ?>

      <input class="form-check-input ok" type="checkbox" value="" id="flexCheckDefault" data-info="<?= $reponse->getIsTrue()?>">
      <?= $reponse->getReponse()?>
    <br>


<?php } ?>
<span class="description">Explication: <?= $question->getDescription()?></span><br>
    <input type="submit" value="Valider" name="Valider" class="valide"/>
  </div>
<?php  
}
?>


<?php
include 'footer.php';

?>


