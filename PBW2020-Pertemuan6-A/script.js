// getElementById --> Mengembalikan nilai elemen HTML
// Ambil elemen dengan id hasil, tambah, kurang, bagi, kali, warna dan judul
const hasil = document.getElementById('hasil');
const tambah = document.getElementById('tambah');
const kurang = document.getElementById('kurang');
const bagi = document.getElementById('bagi');
const kali = document.getElementById('kali');
const buttonWarna = document.getElementById('warna');
const judul = document.getElementById('judul');

// Function proses
function proses(pilihan){
    // Ambil elemen angka 1 dan angka 2
    var angka1 = document.getElementById("angka1"); 
    var angka2 = document.getElementById("angka2");
    // Untuk Validasi bahwa hanya angka 0-9 yang diterima
    var nomor = /^[0-9]+$/;
    // Jika tidak sesuai angka, maka tampilkan alert
    if(!angka1.value.match(nomor) || !angka2.value.match(nomor))
    {
       alert("MASUKAN ANGKA");
    }
    else
    {
        // parse inputan menjadi tipe data Float
        angka1 = parseFloat(angka1.value); 
        angka2 = parseFloat(angka2.value);
        // Masukan sesuai Pilihan
        if(pilihan == "tambah")
        { 
            jumlah = angka1 + angka2;
            judul.innerHTML = "PENJUMLAHAN";
        }
        else if(pilihan == "kurang"){
            jumlah = angka1 - angka2;
            judul.innerHTML = "PENGURANGAN";
        }
        else if(pilihan == "bagi"){
            jumlah = angka1 / angka2;
            judul.innerHTML = "PEMBAGIAN";
        }
        else if(pilihan == "kali"){
            jumlah = angka1 * angka2;
            judul.innerHTML = "PERKALIAN";
        }
    // Tampilkan pada form hasil dengan menambahkan attribut value dengan isinya yaitu jumlah
    hasil.setAttribute('value', jumlah);
    }
}

// Ketika tombol tambah di klik
tambah.addEventListener('click', function(){
    var pilihan = "tambah";
    // Panggil function proses dengan variabel pilihan sebagai parameter
    proses(pilihan);
});

// ketika tombol kurang di klik
kurang.addEventListener('click', function(){
    var pilihan = "kurang";
    proses(pilihan);
});

// ketika tombol bagi di klik
bagi.addEventListener('click', function(){
    var pilihan = "bagi";
    proses(pilihan);
});

// ketika tombol bagi di klik
kali.addEventListener('click', function(){
    var pilihan = "kali";
    proses(pilihan);
});

// Tambahan untuk tampilan background warna 
buttonWarna.addEventListener('click', function () {
    // Ambil nilai warna red 
    const r = Math.round(Math.random() * 255 + 1);
     // Ambil nilai warna green
    const g = Math.round(Math.random() * 255 + 1);
     // Ambil nilai warna blue
    const b = Math.round(Math.random() * 255 + 1);
    // ubah waran body background dengan rgb dan angka acak yang sudah didapatkan sebelumnya
    document.body.style.backgroundColor = 'rgb('+ r +', '+ g +', '+ b +')';
});

// Math.round --> untuk pembulatan terdekat
// Math.random --> untuk mendapatkan angka acak dari 0.0 - 1.0
// dengan * 255 + 1 digunakan untuk mendapatkan angka acak dari 1 - 255
