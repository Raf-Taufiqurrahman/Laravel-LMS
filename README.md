## WeLearn
WeLearn adalah sebuah website online course yang saya bangun menggunakan laravel 9 tujuan pembuatan aplikasi adalah untuk pembelajaran. 
Aplikasi ini masih dalam tahapan pengembangan baik dari fitur, clean code, dan juga peforma.

![Imgur](https://imgur.com/J3zJXFw.png)

## Cara Instalasi Project

Pastikan git cli sudah terinstall, kemudian jalankan perintah dibawah
```
1. clone repository
2. copy .env.example rename menjadi .env kemudian atur database di .env
3. composer install
4. php artisan key:generate
5. php artisan migrate --seed
```

## Akun Admin
```
email : admin@gmail.com
password : password
```

## Fitur Aplikasi 
- Terdapat 2 role yaitu : admin dan member
- Mengelola Tags (Admin)
- Mengelola Course (Admin)
- Mengelola Video (Admin)
- Mengelola User (Admin)
- Mengelola Transaksi (Admin)
- Mengelola Roles & Permission (Admin)
- Halaman Dashboard dengan berbagai fitur seperti : (Admin) 
   - Total pendapatan 
   - Notifikasi pembayaran belum terverifikasi
   - Jumlah course
   - Jumlah member
   - Jumlah artikel
- Pembelian Course
- Preview Course
- Keranjang
- Full akses untuk course yang di beli (Member)
- Mengubah Password dan Profile (Member)
- List Transaksi (Member)
- Search Data
- Responsive

## Fitur Yang Akan Dikembangkan
- Penerbitan sertifikat untuk member setelah menyelesaikan course
- Showcase project dari member
- Daftar peringkat para member
- Testimonial course
- Flash sale
- Diskon course
- Artikel
- Forum tanya jawab

## License
Aplikasi ini bersifat open source dapat digunakan oleh siapa pun dengan syarat tidak untuk di perjual belikan.
