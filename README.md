## Nama    : Muhammad Jalaluddin

## NIM     : 240605110235

## Kelas   : Web Programming A

## Tautan Video Youtube Demonstrasi

https://youtu.be/SJ5uheLNC5Q?si=WrebvkipHtlh0pJ6

---

#  UAS Web Programming - Blog Kami

Aplikasi blog sederhana berbasis Laravel yang digunakan untuk menampilkan artikel, kategori, dan manajemen konten oleh admin.

---

# Deskripsi Singkat

Aplikasi ini merupakan sistem blog berbasis Laravel yang digunakan untuk menampilkan berbagai artikel seputar teknologi dan pemrograman. Pengguna dapat melihat daftar artikel berdasarkan kategori, membaca detail artikel,. Selain itu, terdapat fitur admin untuk mengelola data artikel, kategori, dan konten lainnya.


##  Cara Menjalankan Aplikasi Secara Lokal

Ikuti langkah-langkah berikut untuk menjalankan project di komputer lokal:

---

### 1. Clone Repository

```bash
git clone https://github.com/jalaluddinmuhammad2108-tech/UAS-WEB-PROGRAMMING.git
cd UAS-WEB-PROGRAMMING
```

---

### 2. Install Dependency Laravel

```bash
composer install
```

---

### 3. Copy File Environment

```bash
cp .env.example .env
```

---

### 4. Generate Key Aplikasi

```bash
php artisan key:generate
```

---

### 5. Konfigurasi Database

Buka file `.env`, lalu ubah sesuai database kamu:

```env
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

---

### 6. Migrasi Database

```bash
php artisan migrate
```

---

### 7. (Opsional) Seeder Data

Jika tersedia:

```bash
php artisan db:seed
```

---

### 8. Jalankan Server Laravel

```bash
php artisan serve
```

---

### 9. Akses Aplikasi

Buka di browser:

```
http://127.0.0.1:8000
```

---

## Login Admin

Silakan login melalui halaman:

```
/login
```

Gunakan akun yang sudah dibuat di database atau melalui seeder.

---

## Teknologi yang Digunakan

* Laravel
* Bootstrap 5
* MySQL
* PHP

---


Project ini dibuat untuk keperluan UAS Web Programming.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
