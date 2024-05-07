<?php
class roleView {
    public function render($data) {
        $no = 1;
        $datarole = null;
        // echo "<pre>";
        // print_r($data['member']);
        // echo "</pre>";

        foreach($data['role'] as $val){
            list($id, $role_nama) = $val;
            $datarole .= "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $role_nama . "</td>";
            
            
                $datarole .= "
                    <td>
                    <a href='role.php?id_edit=" . $id .  "' class='btn btn-warning' '>Edit</a>
                    <a href='role.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
                    </td>";
            
            $datarole .= "</tr>";
        }

        $header = '<tr>
        <th scope="row">No.</th>
        <th scope="row">role</th>
        <th scope="row">Aksi</th>
        </tr>';

        $button = '
        <div class="col-1 my-3">
        <a type="button" class="btn btn-primary nav-link active" href="role.php?add">Add New Role</a>
        </div>';

        $tpl = new Template("templates/tabel.html");
        
        $tpl->replace("HEADER", $header);
        $tpl->replace("BUTTON", $button);
        $tpl->replace("DATA_TABEL", $datarole);
        $tpl->write(); 
    }

    public function add () {


        $form = '
        
        <form action="role.php" method="POST">
          <div class="form-row">
            <div class="form-group col">
              <label for="tnama">nama role</label>
              <input type="text" class="form-control" name="tnama" required />
            </div>
          </div>

          


          <button type="submit" name="add" class="btn btn-primary mt-3">Add</button>
        </form>';

        $tpl = new Template("templates/crud.html");

        $tpl->replace("DATA_FORM", $form);
        $tpl->write(); 
    }

    public function edit ($roles) {
      $role_id = $roles['role_id'];
      $role_nama = $roles['role_nama'];
      $form = '
      <form method="post" action="role.php">
   
      <br><br><div class="card">
      
      <div class="card-header bg-warning">
      <h1 class="text-white text-center">  Update role </h1>
      </div><br>
  
      <input type="hidden" name="role_id" value=" ' . $role_id . ' " class="form-control"> <br>
  
      <label> NAME: </label>
      <input type="text" name="role_nama" value=" '. $role_nama . ' " class="form-control"> <br>
  
  
      <button class="btn btn-success" type="submit" name="id_edit"> Submit </button><br>
      <a class="btn btn-info" type="submit" name="cancel" href="role.php"> Cancel </a><br>
  
      </div>
      </form>';
  
      $tpl = new Template("templates/crud.html");
  
      $tpl->replace("DATA_FORM", $form);
      $tpl->write(); 
  }
  

}
?>