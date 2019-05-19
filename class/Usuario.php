<?php
  class Usuario{
              private $idusuario;
              private $deslogin;
              private $dessenha;
              private $dtcadastro;
              
              //ok
              function getIdusuario() {
                  return $this->idusuario;
              }
              //ok 
              function getDeslogin() {
                  return $this->deslogin;
              }
              //ok 
              function getDessenha() {
                  return $this->dessenha;
              }
              //ok  
              function getDtCadastro() {
                  return $this->dtcadastro;
              }
              //ok
              function setIdUsuario($value) {
                  $this->idusuario = $value;
              }
              //ok
              function setDeslogin($value) {
                  $this->deslogin = $value;
              }
              //ok 
              function setDessenha($value) {
                  $this->dessenha = $value;
              }

              function setDtCadastro($value) {
                  $this->dtcadastro = $value;
              }

              public function loadById($id){
                  $sql = new Sql();
                  
                  $result = $sql->select("select * from tb_usuarios where idusuario = :ID", array(
                       ":ID"=>$id
                          ));
                  
                 if (count($result) > 0) {
			$this->setData($result[0]);
		}
              }                

             public static function getList(){
                $sql = new Sql();
                
                return $sql->Select("select * from tb_usuarios order by deslogin");
             }

             public function login($login, $pass){
                  $sql = new Sql();
                  
                  $result = $sql->select("select * from tb_usuarios where deslogin = :LOGIN and dessenha = :PASS" , array(
                       ":LOGIN"=>$login, ":PASS"=>$pass
                          ));
                  
                 if (count($result) > 0) {
			$this->setData($result[0]);
		} else {
			throw new Exception("Login e/ou senha inválidos.");
		}
                 
             }
             
            public static function search($login){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
			':SEARCH'=>"%".$login."%"
		));
	    }
              
              public function __toString() {
                return json_encode(array("idusuario"=>$this->getIdUsuario(),
                                         "deslogin"=>$this->getDeslogin(),
                                         "desenha"=>$this->getDessenha(),
                                         "dtcadastro"=>$this->getDtCadastro() ));
              }
              
              public function setData($data){
		$this->setIdusuario($data['idusuario']);
		$this->setDeslogin($data['deslogin']);
		$this->setDessenha($data['dessenha']);
		$this->setDtcadastro(new DateTime($data['dtcadastro']));
	}
          }
        ?>
