<?php
class Reponse{
    private $id;
    private $reponse;
    private $isTrue;
    private $idreponse;
    private $idQuestion;
    


    public function __construct($arrayReponse){
        $this->hydrate($arrayReponse);

    }
  
  public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value)
    {
      $method = 'set'.ucfirst($key);
      
      if (method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }
  

    public function getReponse(){
        return $this->reponse;
    }
    public function setReponse($reponse){
        $this->reponse = $reponse;
    }
   
    public function getId()
    {
     return $this->id;
    }
    public function setId($id)
    {
      $this->id = $id;
    }
    public function getIdQuestion(){
        return $this->idQuestion;
    }
    public function setIdQuestion($idQuestion){
        $this->idQuestion = $idQuestion;
    } 
    public function getIsTrue(){
        return $this->isTrue;
    }
    public function setIsTrue($isTrue){
        $this->isTrue = $isTrue;
    }
 }