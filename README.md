# TP4DPBO2024C2

Saya Tia ifania nugrahaningtyas mengerjakan TP4 [TP4DPBO2024C2] dalam mata kuliah DPBO untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

berikut adalah desain database saya

<img width="222" alt="image" src="https://github.com/tiaifania/TP4DPBO2024C2/assets/159092454/bfe614b2-d4ac-4e08-aa89-7a65ffdcb78c">

terdapat 2 tabel, yaitu tabel members dan tabel role. terdapat relasi diantara 2 tabel ini di bagian role_id sebagai foreign key di tabel members dan role_id di tabel role sebagai primary key. saya buat begitu agar untuk pilihan role saat add atau edit member nya akan berasal dari data yang tersedia pada tabel role.

alur dalam arsitektur mvc (model - view - controller) ini adalah seperti berikut: pertama - tama index.php akan dipanggil sebagai halaman utama. index.php memanggil view nya index. di dalam view index ada navbar yang mengacu pada tabel members dan role (penampilan menggunakan template index), untuk pergi kehalaman tabel member atau role kita harus memencet pilihan pada navbar.

dalam file members.php terdapat if-condition untuk memanggil perintah yang sesuai. perintah add ke tabel dan menampilkan form untuk add itu dipisah menjadi 2 function yang terpisah. begitu juga untuk edit. di dalam controllers ini juga memanggil file models untuk mengambil data, menambahkan, atau menghapus data yang query database nya terdapat di dalam file model. create, edit, dan delete akan dilakukan jika user menekan tombol yang ada pada view awal (menampilkan tabel), perintah yang ditekan oleh user akan diolah di dalam file members.php/role.php, dan kemudian di teruskan kepada file controller
