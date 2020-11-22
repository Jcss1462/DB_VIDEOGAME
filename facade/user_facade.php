<?PHP
    require_once('../model/user_entity.php');
    //traigo el controller
    require_once('../controller/user_dao.php');
    echo '<h1>THIS IS THE FACADE</h1>';
    /*******************************
        variables iniciales
     ***************************** */
      //instancio el user entity
     $ent= new User();
     //instancio el controlador
     $controller= new UserDao(); 


    switch ($_REQUEST['action']) {
        case 'insert':
            //seteo los valores
            $ent->_SET('nickname',$_REQUEST['name']);
            $ent->_SET('score',0);
            echo 'this is the case x: insert'; 
            $controller->insert($ent);  
        break;
        case 'select':
            $controller->select($ent);  
            echo 'this is the case x: select'; 
        break;
        case 'update':
            $ent->_SET('idUser',$_REQUEST['idUser']);
            $ent->_SET('score',$_REQUEST['score']);
            echo $ent->_GET('score');
            $controller->update($ent);
            echo 'this is the case x: update'; 
        break;
        case 'delete':
            $ent->_SET('idUser',$_REQUEST['idUser']);
            //echo $ent->_GET('idUser'); 
            $controller->delete($ent);
            echo 'this is the case x: delete'; 
        break;
      }
?>
