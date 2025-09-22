# 🚀 Latihan: REST API CRUD Sederhana dengan Laravel

Proyek ini adalah hasil latihan untuk membangun sebuah REST API sederhana menggunakan framework Laravel. API ini menyediakan fungsionalitas dasar CRUD (Create, Read, Update, Delete) untuk mengelola data postingan blog.

## ✨ Fitur Utama

-   **Create Post**: Membuat postingan baru dengan `title` dan `content`.
-   **Read Posts**: Menampilkan semua postingan dengan sistem paginasi.
-   **Read Single Post**: Menampilkan detail satu postingan berdasarkan `ID`.
-   **Update Post**: Memperbarui `title` dan `content` dari postingan yang sudah ada.
-   **Delete Post**: Menghapus sebuah postingan berdasarkan `ID`.

## 🛠️ Teknologi yang Digunakan

-   **Framework**: Laravel 12
-   **Bahasa**: PHP 8+
-   **Database**: MySQL / MariaDB
-   **Testing Tool**: Postman

## ⚙️ Panduan Instalasi dan Setup

Untuk menjalankan proyek ini di lingkungan lokal Anda, ikuti langkah-langkah berikut:

1.  **Clone Repository**
    ```bash
    git clone [URL_REPOSITORY_ANDA]
    cd [NAMA_FOLDER_PROYEK]
    ```

2.  **Install Dependencies**
    Pastikan Anda memiliki Composer terinstal, lalu jalankan:
    ```bash
    composer install
    ```

3.  **Setup Environment File**
    Salin file `.env.example` menjadi `.env`:
    ```bash
    cp .env.example .env
    ```

4.  **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

5.  **Konfigurasi Database**
    Buka file `.env` dan sesuaikan konfigurasi database Anda:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database_anda
    DB_USERNAME=username_db_anda
    DB_PASSWORD=password_db_anda
    ```

6.  **Jalankan Migrasi Database**
    Perintah ini akan membuat tabel `posts` di database Anda:
    ```bash
    php artisan migrate
    ```

7.  **Jalankan Server**
    ```bash
    php artisan serve
    ```
    API akan berjalan di `http://127.0.0.1:8000`.

## 🔌 Daftar Endpoint API

Semua endpoint berada di bawah prefix `/api/v1`.

| Method | Endpoint | Deskripsi | Body (Payload) |
| :--- | :--- | :--- | :--- |
| `GET` | `/posts` | Menampilkan semua postingan (paginasi). | - |
| `POST` | `/posts/store` | Menyimpan postingan baru. | `{ "title": "...", "content": "..." }` |
| `GET` | `/posts/{id}` | Menampilkan satu postingan berdasarkan ID. | - |
| `PUT` | `/posts/{id}` | Mengupdate postingan berdasarkan ID. | `{ "title": "...", "content": "..." }` |
| `DELETE` | `/posts/{id}` | Menghapus postingan berdasarkan ID. | - |
