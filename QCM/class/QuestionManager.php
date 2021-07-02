<?php
class QuestionManager
{
  private $_db; // Instance de PDO
  
  public function __construct($db)
  {
    $this->setDb($db);
  }
  
  public function add(Question $question)
  {
    $q = $this->_db->prepare('INSERT INTO questions (sujet, description) VALUES(:sujet, :description)');
    $q->bindValue(':sujet', $question->getSujet());
    $q->bindValue(':description', $question->getDescription());
    $q->execute();
    
    $question->hydrate([
      'id' => $this->_db->lastInsertId(),
    ]);
  }
  public function get(){
    // Retourne la liste des personnages dont le nom n'est pas $nom.
    // Le résultat sera un tableau d'instances de Personnage.
    $sujet = [];

    $q = $this->_db->prepare('SELECT * FROM questions ');
    $q->execute();

    $donnees = $q->fetchAll(PDO::FETCH_ASSOC);
    foreach ($donnees as $donnee) {
        $sujet[] = new Question($donnee);
        }
        return $sujet;
    }
//   public function add(Personnage $perso)
//   {
//     // Préparation de la requête d'insertion.
//     // Assignation des valeurs pour le nom du personnage.
//     // Exécution de la requête.
    
//     // Hydratation du personnage passé en paramètre avec assignation de son identifiant et des dégâts initiaux (= 0).
//   }
  
//   public function count()
//   {
//     // Exécute une requête COUNT() et retourne le nombre de résultats retourné.
//   }
  
//   public function delete(Personnage $perso)
//   {
//     // Exécute une requête de type DELETE.
//   }
  
//   public function exists($info)
//   {
//     // Si le paramètre est un entier, c'est qu'on a fourni un identifiant.
//       // On exécute alors une requête COUNT() avec une clause WHERE, et on retourne un boolean.
    
//     // Sinon c'est qu'on a passé un nom.
//     // Exécution d'une requête COUNT() avec une clause WHERE, et retourne un boolean.
//   }
  
//   public function get($info)
//   {
//     // Si le paramètre est un entier, on veut récupérer le personnage avec son identifiant.
//       // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personnage.
    
//     // Sinon, on veut récupérer le personnage avec son nom.
//     // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personnage.
//   }
  
//   public function getList($nom)
//   {
//     // Retourne la liste des personnages dont le nom n'est pas $nom.
//     // Le résultat sera un tableau d'instances de Personnage.
//   }
  
//   public function update(Personnage $perso)
//   {
//     // Prépare une requête de type UPDATE.
//     // Assignation des valeurs à la requête.
//     // Exécution de la requête.
//   }
  
//   public function setDb(PDO $db)
//   {
//     $this->_db = $db;
//   }
// }
public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}

