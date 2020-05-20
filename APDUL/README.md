## APDUL

Aplikasi Data Usulan Satya Lencana Mahkamah Agung RI  
versi 0.1 
  
### Deskripsi
Aplikasi Data Usulan Satya Lencana atau disingkat APDUL merupakan aplikasi yang digunakan untuk mengelola data usulan penghargaan Satya Lencana. APDUL versi 0.1 dapat menampilkan data dan dokumen elektronik pegawai yang diusulkan penghargaan, dokumen elektronik yang ditampilkan pada aplikasi ini yaitu:
*   DRH
*   SK CPNS
*   SK PNS
*   SK JABATAN
*   SK PANGKAT

### Setup
Untuk menjalankan aplikasi, Anda cukup menjalankan file `index.html`, untuk data Anda dapat masukkan ke dalam file `dataset.js` pada folder `/assets` dengan format sebagai berikut:

```
  [
    "1",
    "196900001990001002",
    "Rudi Soepadi, S.H., M.Hum.",
    "Kepala Bagian",
    "Pembina Tingkat I",
  ],
```
Sedangkan untuk file dokumen elektronik dapat di simpan dalam folder `/pdf`, dengan struktur berikut:
```
/pdf
|-- 1
|   |-- CPNS.pdf
|   |-- DRH.pdf
|   |-- JAB.pdf
|   |-- PANGKAT.pdf
|   |-- PNS.pdf
|-- 2
|   |-- CPNS.pdf
|   |-- DRH.pdf
|   |-- JAB.pdf
|   |-- PANGKAT.pdf
|   |-- PNS.pdf
```


### Kontribusi
Aplikasi ini merupakan aplikasi Open source, Anda dapat bergabung untuk pengembangan dan saran masukan di: [https://github.com/agussudarmanto/egov\_office](https://github.com/agussudarmanto/egov_office)  
MIT License  
Agus Sudarmanto <agus.sudarmanto@gmail.com>
