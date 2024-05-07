<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/role.controller.php");

$role = new roleController();

if (isset($_GET['add'])) {
    // Memanggil fungsi untuk menampilkan formulir tambah anggota
    
    $role->showAddForm();
} else if (isset($_POST['add'])) {
    // Memanggil fungsi untuk menambahkan anggota setelah formulir disubmit
    
    $role->add($_POST);
} else if (!empty($_GET['id_hapus'])) {
    // Memanggil fungsi untuk menghapus anggota
    $id = $_GET['id_hapus'];
    $role->delete($id);
} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $role->showEditForm($id);

} else if (isset($_POST['id_edit'])) {
    //$id = $_POST['id_edit'];
    
    $role->edit($_POST);
} else {
    // Menampilkan halaman utama
    // echo "<pre>";
    // print_r("test");
    // echo "</pre>";
    $role->index();
}


?>