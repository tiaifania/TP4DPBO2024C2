<?php
class MembersView {
    public function render($data) {
        $no = 1;
        $datamember = null;
        $datarole = null;
        // echo "<pre>";
        // print_r($data['member']);
        // echo "</pre>";

        foreach($data['member'] as $val){
            list($id, $nama, $email, $phone, $join_date, $role_id , $role_nama) = $val;
            $datamember .= "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $nama . "</td>
                    <td>" . $email . "</td>
                    <td>" . $phone . "</td>
                    <td>" . $join_date . "</td>
                    <td>" . $role_nama . "</td>
            
            

                    <td>
                    <a href='members.php?id_edit=" . $id .  "' class='btn btn-warning' '>Edit</a>
                    <a href='members.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
                    </td></tr>";
        }

        foreach($data['role'] as $val){
            list($id, $nama) = $val;
            $datarole .= "<option value='".$id."'>".$nama."</option>";
        }

        $header = '<tr>
        <th scope="row">No.</th>
        <th scope="row">Nama member</th>
        <th scope="row">email</th>
        <th scope="row">phone</th>
        <th scope="row">tanggal join</th>
        <th scope="row">role</th>
        <th scope="row">Aksi</th>
        </tr>';

        $button = '
        <div class="col-1 my-3">
        <a type="button" class="btn btn-primary nav-link active" href="members.php?add">Add New Member</a>
        </div>';

        $tpl = new Template("templates/tabel.html");
        
        $tpl->replace("HEADER", $header);
        $tpl->replace("BUTTON", $button);
        $tpl->replace("OPTION", $datarole);
        $tpl->replace("DATA_TABEL", $datamember);
        $tpl->write(); 
    }

    public function add ($data) {
        $optionrole = "";
        foreach($data['role'] as $val){
            list($id, $nama) = $val;
            $optionrole .= "<option value='".$id."'>".$nama."</option>";
        }


        $form = '
        
        <form action="members.php" method="POST">
          <div class="form-row">
            <div class="form-group col">
              <label for="tnama">nama member</label>
              <input type="text" class="form-control" name="tnama" required />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col">
              <label for="temail">email member</label>
              <input type="text" class="form-control" name="temail" required />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col">
              <label for="tphone">nomor handphone</label>
              <textarea class="form-control" name="tphone" rows="3" required></textarea>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col">
              <label for="tjoin_date">tanggal join</label>
              <input type="date" class="form-control" name="tjoin_date" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col">
              <label for="trole_id">role member</label>
              <select class="custom-select form-control" name="trole_id">
                <option selected>Open this select menu</option>
                ' . $optionrole . '
              </select>
            </div>
          </div>


          <button type="submit" name="add" class="btn btn-primary mt-3">Add</button>
        </form>';

        $tpl = new Template("templates/crud.html");

        $tpl->replace("DATA_FORM", $form);
        $tpl->write(); 
    }

    public function edit ($data, $roles) {
      $optionrole = "";
      foreach($roles['role'] as $val){
          list($id, $nama) = $val;
          $selected = ($nama == $data['role_nama']) ? 'selected' : ''; // Menandai opsi yang dipilih
          $optionrole .= "<option value='".$id."' ".$selected.">".$nama."</option>";
      }
      $id = $data['id'];
      $name = $data['name'];
      $email = $data['email'];
      $phone = $data['phone'];
      $join_date = $data['join_date'];
      $form = '
      <form method="post" action="members.php">
  
      <br><br><div class="card">
      
      <div class="card-header bg-warning">
      <h1 class="text-white text-center">  Update Member </h1>
      </div><br>
  
      <input type="hidden" name="id" value="'.$id.'" class="form-control"> <br>
  
      <label> NAME: </label>
      <input type="text" name="name" value="'.$name.'" class="form-control"> <br>
  
      <label> EMAIL: </label>
      <input type="text" name="email" value="'.$email.'" class="form-control"> <br>
  
      <label> PHONE: </label>
      <input type="text" name="phone" value="'.$phone.'" class="form-control"> <br>
  
      <label> TANGGAL JOIN: </label>
      <input type="date" name="join_date" value="'.$join_date.'" class="form-control" required> <br>
      
      <label> ROLE: </label>
      
      <select class="custom-select form-control" name="role_nama">
          '.$optionrole.'
      </select>
  
      <button class="btn btn-success" type="submit" name="id_edit"> Submit </button><br>
      <a class="btn btn-info" type="submit" name="cancel" href="members.php"> Cancel </a><br>
  
      </div>
      </form>';
  
      $tpl = new Template("templates/crud.html");
  
      $tpl->replace("DATA_FORM", $form);
      $tpl->write(); 
  }
  

}
?>