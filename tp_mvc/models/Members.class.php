<?php
Class Members extends DB
{
    function getMember()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function getMemberJoin () {
        $query = "SELECT members.*, role.role_nama
        FROM members 
        JOIN role ON members.role_id = role.role_id 
        ORDER BY members.id";

        return $this->execute($query);
    }

    function getMemberById ($id) {
        $query = "SELECT members.*, role.role_nama
        FROM members 
        JOIN role ON members.role_id = role.role_id 
        WHERE members.id=$id";
        $this->execute($query);

        return $this->getResult();
    }

    function add($data)
    {
        $nama = $data['tnama'];
        $email = $data['temail'];
        $phone = $data['tphone'];
        $join_date = $data['tjoin_date'];
        $role_id = $data['trole_id'];

        $query = "insert into members values ('', '$nama', '$email', '$phone', '$join_date', '$role_id')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM members WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }


    public function edit($id, $data) {
        $name=$data["name"];
        $email=$data["email"];
        $phone=$data["phone"];
        $join_date=$data["join_date"];
        $role_nama=$data["role_nama"];
        $query = "UPDATE members SET name='$name', email='$email', phone='$phone', join_date='$join_date', role_id='$role_nama' WHERE id='$id'";
        return $this->execute($query);
    }
}
?>