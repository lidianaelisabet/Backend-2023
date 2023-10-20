<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 2 - PHP</title>
</head>
<body>
    <div>
        <h3>Belajar PHP OOP</h3>
    </div>
    <hr>
        <?php
        #Membuat class animal
        class Animal {

            #Membuat property animals
            public $animals = array();

            #Membuat method constructor - mengisi data awal
            #Parameter: data hewan (array)
            public function __construct() {
                $this->animals = ['Ayam' , 'Ikan', ];
            }

            #Membuat method index - menampilkan data animals
            public function index() {
                foreach ($this->animals as $animal) {
                    echo $animal . "<br>";
                }
            }

            #Membuat method store - menambahkan hewan baru
            public function store($data) {
                array_push($this->animals, $data);
            }

            #Membuat method update - mengupdate hewan
            public function update($index, $data) {
                $this->animals[$index] = $data;
            }

            #Membuat method delete - menghapus hewan
            public function destroy($index) {
                unset($this->animals[$index]);
            }
        }

        #Membuat object
        $animal = new Animal();

        #Membuat data hewan
        echo 'Index - Menampilkan data hewan <br>';
        $animal->index();
        echo "<br>";

        #Menambahkan hewan baru
        echo 'Store - Menambahkan hewan baru<br>';
        $animal->store('Burung');
        $animal->index();
        echo "<br>";

        #Update data hewan
        echo 'Update - Mengupdate data hewan <br>';
        $animal->update(0, 'Kucing Anggora');
        $animal->index();
        echo "<br>";

        #Menghapus data hewan
        echo 'Destroy - Menghapus data hewan <br>';
        $animal->destroy(0);
        $animal->index();
        echo "<br>";
        ?>
</body>
</html>