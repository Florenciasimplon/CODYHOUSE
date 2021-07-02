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


  
<div class="container-form">
    <h3>Créer ta Question - Réponse</h3>
    <div class="pagecreate">
      <form action="" method="post" class="form">
          <p>
            <input type="text" name="sujet" maxlength="240" style="margin-bottom: 10px;" placeholder="Question"/><br>
            <input type="text" name="reponse1" maxlength="240" style="margin-bottom: 10px;"placeholder="Inque la bonne réponse ici"/><br>
            <input type="text" name="reponse2" maxlength="240" style="margin-bottom: 10px;" placeholder="Réponse2"/><br>
            <input type="text" name="reponse3" maxlength="240" style="margin-bottom: 10px;" placeholder="Réponse3"/><br>
            <input type="text" name="description" maxlength="240" style="margin-bottom: 10px;" placeholder="Description"/><br>
          
            <input type="submit" value="Créer question" name="question" style="margin-bottom: 10px;"/>
      </form>
    </div>
  </div>
