<?php
  class Usuario{
              private $IdUsuario;
              private $Deslogin;
              private $Dessenha;
              private $DtCadastro;
              
              public function getIdUsuario(){
                  return $this->idUsuario;
              }
              
              public function setIdUsuario($id){
                  $this->idUsuario = $id;
              }
              
              public function getDeslogin(){
                  return $this->Deslogin;
              }
              
              public function setDeslogin($value){
                  $this->Deslogin = $value;
              }
              
              public function getDessenha(){
                  return $this->Dessenha;
              }
              
              public function setDessenha($value){
                  $this->Dessenha = $value;
              }
              
              public function getDtCadastro(){
                  return $this->DtCadastro;
              }
              
              public function setdtCadastro($value){
                  $this->DtCadastro = $value;
              }
              
              public function loadById($id){
                  $sql = new Sql();
                  
                  $result = $sql->Select("select * from tb_usuarios where idusuario = :ID",array("ID"=>$id));
                  var_dump($result);
                  if(count($result) > 0){
                      $row = $result[0];
                      $this->setIdUsuario($row['idusuario']);
                      $this->setDeslogin($row['deslogin']);
                      $this->setDessenha($row['dessenha']);
                      $this->setdtCadastro(new DateTime($row['dtcadastro']));
                      
                  }
              }                
              
              public function __toString() {
                return json_encode(array("idusuario"=>$this->getIdUsuario(),
                                         "deslogin"=>$this->getDeslogin(),
                                         "desenha"=>$this->getDessenha(),
                                         "dtcadastro"=>$this->getDtCadastro()->format('d/m/Y H:i:s') ));
              }
              
          }
        ?>
