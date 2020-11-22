<?php
/*
    creoacion de la entidad user del la BD (videogame_dashboard)

*/

class User{

    private $idUser;
    private $nickname;
    private $score;

    /*GET AND SET */
    public function _GET($K) {return $this->$K;}
    public function _SET($K, $v) {return $this->$K=$v;}

}