<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/members.controller.php");

$member = new membersController();

if (isset($_GET['add'])) {
    // Memanggil fungsi untuk menampilkan formulir tambah anggota
    
    $member->showAddForm();
} else if (isset($_POST['add'])) {
    // Memanggil fungsi untuk menambahkan anggota setelah formulir disubmit
    
    $member->add($_POST);
} else if (!empty($_GET['id_hapus'])) {
    // Memanggil fungsi untuk menghapus anggota
    $id = $_GET['id_hapus'];
    $member->delete($id);
} else if (!empty($_GET['id_edit'])) {
    // Memanggil fungsi untuk menampilkan formulir edit anggota
    $id = $_GET['id_edit'];

    
    $member->showEditForm($id);
} else if (isset($_POST['id_edit'])) {
    //$id = $_POST['id_edit'];
    //print_r($_POST);
    $member->edit($_POST);
} else {
    // Menampilkan halaman utama
    // echo "<pre>";
    // print_r("test");
    // echo "</pre>";
    $member->index();
}


?>