
# Project POS RedBull - RPL




## Deskripsi

Repositori ini digunakan untuk menyimpan proyek sistem informasi manajamen UMKM Kang Bakery, serta memenuhi tugas proyek RPL.


## Authors

- [@ananditosa](https://github.com/anandito38) - Anandito Satria Asyraf / 1301213026
- [@nabilaurelliaa](https://github.com/nabilaurelliaa) - Nabila Aurellia / 1301213017
- [@nadirhadd](https://github.com/nadirhadd) - Nadir Septian / 1301213098
- [@Ryvenzz](https://github.com/Ryvenzz) - Atilla Fejril / 1301210495
- [@viegoz](https://github.com/viegoz) - Viego Naufal Salsabil / 1301213418


## Instalasi

1. Clone repositori ini ke komputer lokal anda.

```bash
  git clone https://github.com/anandito38/fe_pos_redbull.git
```

2. Lakukan instalasi modul sebagai berikut.

```bash
  composer install
  composer update
  php artisan key:generate
```

3. Lakukan konfigurasi dengan mengubah file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database.
```bash
  ...
  DB_CONNECTION= mysql
  DB_HOST= {HOST_DATABASE}
  DB_PORT= {PORT_DATABASE}
  DB_DATABASE= laravel
  DB_USERNAME= {USERNAME_DATABASE}
  DB_PASSWORD= {PASSWORD_DATABASE}
  ...
```

4. Jalankan server backend yang sudah di konfigurasi.
```bash
  php artisan serve --port=8000
```

5. Jalankan server frontend yang sudah di konfigurasi.
```bash
  php artisan serve --port=8001
```

6. Buka aplikasi di browser dengan alamat `http://localhost:8001`.


## Features

- Authentication
- Flavor
- Packaging
- Category Product
- Material
- Vendor
- Invoice
- Customer Information
- New Item
- Branch
