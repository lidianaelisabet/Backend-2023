// import method dalam controller
const { index, store, update, destroy } = require('./fruitController')

//Memmbuat fungsi main
const main = () => {
    console.log(`Method Index - Menampilkan Buah`);
    index()

    console.log(`\nMethod Store - Menambahkan Buah Pisang`);
    store('Pisang')

    console.log(`\nMethod Update - Update data 0 menjadi kelapa`);
    update(0, 'Kelapa')

    console.log(`\nMethod Destroy - Menghapus data 0`);
    destroy(0)
}

main()