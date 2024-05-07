<?php
include_once("connection.php");
include_once("models/members.class.php");
include_once("models/role.class.php");
include_once("views/members.view.php");

class membersController {
    private $member;
    private $role;

    function __construct(){
        $this->member = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->role = new Role(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index() {
        $this->member->open();
        $this->role->open();
        $this->member->getMemberJoin();
        $this->role->getRole();
        
        $data = array(
        'member' => array(),
        'role' => array()
        );
        while($row = $this->member->getResult()){
        // echo "<pre>";
        // print_r($row);
        // echo "</pre>";
        array_push($data['member'], $row);
        }
        while($row = $this->role->getResult()){
        array_push($data['role'], $row);
        }
        $this->member->close();
        $this->role->close();

        $view = new MembersView();
        $view->render($data);
    }

    
    function add($data){
        $this->member->open();
        $this->member->add($data);
        $this->member->close();

        header("location:members.php");
        
    }

    public function showAddForm() {
        $this->role->open();
        $this->role->getRole();
        $data = array('role' => array());

        while($row = $this->role->getResult()){
            array_push($data['role'], $row);
        }
        //$data = $this->role->getRole();

        $this->role->close();

        $view = new MembersView();
        $view->add($data);
    }

    public function showEditForm($id) {
        $this->member->open();
        $this->role->open();
        $this->role->getRole();
        
        //$role = $this->role->getRole();
        $role = array('role' => array());
        while($row = $this->role->getResult()){
            array_push($role['role'], $row);
        }
        $data = $this->member->getMemberById($id);

        $this->member->close();
        $this->role->close();

        $view = new MembersView();
        $view->edit($data, $role);
    }

    function edit($data){
        $this->member->open();
        $id = $data['id'];
        $this->member->edit($id, $data);
        $this->member->close();

        header("location:members.php");
    }

    function delete($id){
        $this->member->open();
        $this->member->delete($id);
        $this->member->close();

        header("location:index.php");
    }
}

?>