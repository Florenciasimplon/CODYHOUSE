<?php
class ReponseManager
{
    private $_db; // Instance de PDO
    
    public function __construct($db)
    {
        $this->setDb($db);
    }
    
    public function add(Reponse $reponse)
    {
        $q = $this->_db->prepare('INSERT INTO reponses (reponse, isTrue, idQuestion) VALUES(:reponse, :isTrue, :idQuestion)');
        $q->bindValue(':reponse', $reponse->getReponse());
        $q->bindValue(':isTrue', (int)$reponse->getIsTrue());
        $q->bindValue(':idQuestion', $reponse->getIdQuestion());
        $q->execute();
        
        $reponse->hydrate([
        'id' => $this->_db->lastInsertId(),
        ]);
    }
    public function getReponseByQuestion($idQuestion){
        $arrayReponse= [];
        $q = $this->_db->prepare('SELECT * FROM reponses WHERE idQuestion=? ORDER BY rand()');
        $q->execute([$idQuestion]);
        $listReponse = $q->fetchAll();

        foreach ($listReponse as $reponse) {
            array_push($arrayReponse, new Reponse($reponse));
        }
        return $arrayReponse;
    }


    // public function getOne(){

    // }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}