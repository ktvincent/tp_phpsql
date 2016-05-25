<?php

class personne {
	protected $id;
	protected $nom;
	protected $prenom;
  
    function __construct ($id,$nom,$prenom){
      $this->id = $id;
      $this->nom = $nom;
      $this->prenom = $prenom;
    }
  
  public function getPrenom (){
    return $this->prenom; 
  }
  public function getNom (){
    return $this->nom;
  }
  public function setPrenom ($prenom){
    $this->prenom = $prenom;
  }
  public function setNom ($nom){
    $this->nom = $nom;
  }
  
  function __toString (){
    return "prenom = ".$this->prenom." nom = ".$this->nom." id = ".$this->id;
  }
}

class contact {
	protected $id;
	protected $nom;
	protected $prenom;
  protected $email;
  
    function __construct ($id,$nom,$prenom,$email){
      $this->id = $id;
      $this->nom = $nom;
      $this->prenom = $prenom;
      $this->email = $email;
    }
  
  public function getPrenom (){
    return $this->prenom; 
  }
  public function getNom (){
    return $this->nom;
  }
  public function setPrenom ($prenom){
    $this->prenom = $prenom;
  }
  public function setNom ($nom){
    $this->nom = $nom;
  }
  
  function __toString (){
    return "prenom = ".$this->prenom." / nom = ".$this->nom." / id = ".$this->id." / email= ".$this->email;
  }
}

$vincent = new contact(1,"Kwan-Teau","Vincent","vkwan-teau@hotmail.fr");
echo $vincent

?>