<?php
include_once("connection.php");
include_once("models/role.class.php");
include_once("views/role.view.php");

class roleController {
    private $role;

    function __construct(){
        $this->role = new Role(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index() {
        $this->role->open();
        $this->role->getRole();
        
        $data = array(
        'role' => array()
        );
        while($row = $this->role->getResult()){
        array_push($data['role'], $row);
        }
        $this->role->close();

        $view = new roleView();
        $view->render($data);
    }

    
    function add($data){
        $this->role->open();
        $this->role->add($data);
        $this->role->close();

        header("location:role.php");
        
    }

    public function showAddForm() {

        $view = new roleView();
        $view->add();
    }

    public function showEditForm($id) {
        $this->role->open();
        
        $role = $this->role->getRoleById($id);



        $this->role->close();

        $view = new roleView();
        $view->edit($role);
    }

    function edit($data){
        $this->role->open();
        $id = $data['role_id'];
        $this->role->edit($id, $data);
        $this->role->close();

        header("location:role.php");
    }

    function delete($id){
        $this->role->open();
        $this->role->delete($id);
        $this->role->close();

        header("location:index.php");
    }
}

?>