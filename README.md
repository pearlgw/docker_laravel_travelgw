# TravelGW Project

Proyek ini adalah aplikasi berbasis Laravel yang berjalan menggunakan Docker.

## Langkah-Langkah Clone Project

1. git clone https://github.com/pearlgw/setup_laravel_docker_travelgw.git
   
2. Salin file `.env_example` menjadi `.env`, lalu sesuaikan pengaturan database MariaDB di file `.env` tersebut.

3. Jalankan perintah berikut untuk membangun dan menjalankan kontainer:  
   ```bash
   docker compose up --build -d
   
3. Akses Exec pada Kontainer PHP_travelgw
   ```bash
   composer install
   php artisan key:generate
   php artisan storage:link
   php artisan migrate --seed
   npm install
   npm run build

4. Aplikasi akan berjalan di port 1001.
   
6. Akses database menggunakan heidiSQL atau alat database lainnya
   
