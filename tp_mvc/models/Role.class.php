<?php
Class Role extends DB {
    function getRole()
    {
        $query = "SELECT * FROM role";
        return $this->execute($query);
    }

    function getRoleById ($id) {
        $query = "SELECT * FROM role WHERE role_id = $id";
        $this->execute($query);

        return $this->getResult();
        // $result = $this->execute($query);
    }

    function add($data)
    {
        $nama = $data['tnama'];

        $query = "insert into role values ('', '$nama')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM role WHERE role_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }


    public function edit($id, $data) {
        $role_nama = $data["role_nama"];
        $query = "UPDATE role SET role_nama='$role_nama' WHERE role_id='$id'";
        return $this->execute($query);
    }
}
?>