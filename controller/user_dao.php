<?php

 /*******************************
        Conectar user con la Bd 
***************************** */
require_once('../dao.php');


class UserDao extends DAO{

    public function _CONSTRUCT(){
        parent::_construct();
    }

    public function insert(User $user){
        //obtengo e inserto los datos
        $SQL = "INSERT INTO `user`( `nickname`, `score`) VALUES (?,?)";
        //$SQL = "INSERT INTO `user`( `nickname`, `score`) VALUES (".$user->_GET('nickname').",".$user->_GET('score').")";
        //echo $SQL;
    
        //inserto
        try {
        $this->pdo->prepare($SQL)->execute(
            array(
                $user->_GET('nickname'),
                $user->_GET('score')
            )
        );
            
        } catch(Exception $e) {
            die($e->getMessage());
        }
    
        
    }

    public function select(){
        $SQL ="SELECT `idUser`, `nickname`, `score` FROM `user` ORDER BY score DESC";
        echo $SQL;
        echo  "<br>";

        try{
            $result = array();

            $stm = $this->pdo->prepare($SQL);
            $stm->execute();
            
            // 1. Pegar el codigo
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                $std = new User(); // 2. cambiar por User
                $std->_SET('iduser',   $r->idUser);
                $std->_SET('nickname', $r->nickname);
                $std->_SET('score',   $r->score);
                
                $result[] = $std;
            }
            //MUESTRO LOS DATOS
            foreach ($result as &$idx) {
                echo $idx->_GET("nickname");
                echo  "<br>";
            }
            
            return $result;  // 3. Retornar el result
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function update(User $user){
        //$SQL ="UPDATE `user` SET `nickname`=[value-2],`score`=[value-3] WHERE `idUser`=?";
        $SQL ="UPDATE `user` SET `score`=? WHERE `idUser`=?";

        echo $SQL;
        // echo 'update';
        try{
            $this->pdo->prepare($SQL)->execute(
                // nickname points
                array(
                    $user->_GET('score'),    
                    $user->_GET('idUser'),  
                )
            );
        }catch(Exception $e){
            die($e->getMessage());
        }

    }

    public function delete(User $user){
        $SQL ="DELETE FROM `user` WHERE `idUser`=?";
        echo $SQL;
        try{
            $this->pdo->prepare($SQL)->execute(
                // nickname points
                array( 
                    $user->_GET('idUser'),  
                )
            );
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


}

/**
public function update(User $data, $nicknameSet){
    // echo 'update';
    try{
        $sql = "UPDATE user
                SET points = ?
                WHERE nickname= '".$nicknameSet."'";

        $this->pdo->prepare($sql)->execute(
            // nickname points
            array(
                $data->__GET('points')
            )
        );
    }catch(Exception $e){
        die($e->getMessage());
    }
}
public function select(){
    // echo 'select';
    try{
        $result = array();
        $sql = "SELECT * 
                FROM user 
                ORDER BY points DESC";

        $stm = $this->pdo->prepare($sql);
        $stm->execute();
        
        // 1. Pegar el codigo
        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
            $std = new User(); // 2. cambiar por User
            $std->__SET('iduser',   $r->iduser);
            $std->__SET('nickname', $r->nickname);
            $std->__SET('points',   $r->points);

            $result[] = $std;
        }
        return $result;  // 3. Retornar el result
    }catch(Exception $e){
        die($e->getMessage());
    }

}
*/