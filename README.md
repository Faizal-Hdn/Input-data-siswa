## Panduan Penggunaan
- Setting database nya di .env sebagai berikut:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=siswa
    DB_USERNAME=YOUR_USERNAME
    DB_PASSWORD=YOUR_PASSWORD
    ```
- Jalankan Perintah ini untuk build dan create docker image 
```docker
docker compose up --build -d
```
- Akses browser with port 8100 
