<h1 align="center">Proyek UKK perpus hbtw! 👋</h1>

![Landing Page](https://github.com/hbtw25/perpus-v2/blob/main/public/assets/perpus-v2.test_.png?raw=true)
---

<h2 id="tentang">🤔 Apa Konsep web yang saya buat?</h2>

Library digital application with a modern and clean layout, this page features a striking hero section with a bold call-to-action, along with easy-to-scan service descriptions, reviews, and location sections.

<h2 id="fitur">🤨 Fitur apa aja sih yg ada di proyek ini?</h2>

-   [Mazer Bootstrap Template](https://github.com/zuramai/mazer)
    -   Mode gelap dan mode terang 
    -   Dashboard UI
-   Halaman Awal (Landing Page)
    -   Halaman Beranda
    -   Fitur
    -   Layanan
    -   Ulasan
    -   Lokasi
    -   Buku
    -   Genre Buku (Kategori)
-   Authentication
    -   Pendaftaran (register)
    -   Login
-   Multi User
    -   Admin
        -   Pengguna yang dapat dikelola 
        -   Buku yang dapat dikelola
        -   Genre (Kategori) buku yang dapat dikelola
        -   Melihat semua data secara keseluruhan (widget ui)
        -   Pembuat excel (export data)
    -   Petugas
        -   Menangani penerimaan / peminjaman buku
        -   Pembuat excel (export data)
    -   Peminjam / Pembaca
        -   Mencari buku
        -   Memberikan Ulasan buku
        -   Daftar keinginan buku (whislist / bookmark)
        -   Melihat peminjaman buku mereka sendiri
        -   Register (membuat akun sebagai peminjam)
    -   Semua
        -   Mengulas buku di Halaman Awal
        -   Login
        -   Logout
-   Pencarian Halaman Awal (Landing Page)
    -   Buku
    -   Genre (kategori) Buku

<h2 id="testing-account">👤 Default account for testing</h2>

### 👨‍🏫 Admin

-   Username: hbtw
-   Password: password

### 🧖 Petugas

-   Username: adira
-   Password: password

### 🧗 Peminjam

-   Username: dxx
-   Password: password

<h2 id="demo">🏠 Demo page</h2>

<p>The demo page is currently unavailable. Therefore, it is advisable for you to try it locally by following the installation steps below.</p>

<h2 id="pre-requisite">💾 Pre-requisite</h2>

<p>Here are the prerequisites required for installing and running the application.</p>

-   PHP 8.2.8 & Web Server (Apache, Lighttpd, or Nginx)
-   Database (MariaDB w/ v11.0.3 or PostgreSQL)
-   Web Browser (Firefox, Safari, Opera, etc)

<h2 id="installation">💻 Installation</h2>

<h3 id="develop-yourself">🏃‍♂️ Develop by yourself</h3>
1. Clone repository

```bash
git clone https://github.com/hbtw25/perpus-v2.git
cd perpus-v2
composer install
npm install
cp .env.example .env
```

2. Database configuration through the `.env` file

```conf
APP_DEBUG=true
DB_DATABASE=perpus_v2
DB_USERNAME=your-username
DB_PASSWORD=your-password
```

3. Migration and symlink

```bash
php artisan key:generate
php artisan storage:link
php artisan migrate --seed
```

4. Launch the website

```bash
npm run dev
# Run in different terminal
php artisan serve
```

<h3 id="develop-docker">🐳 Develop w/ Docker</h3>

-   Clone the repository:

```bash
git clone https://github.com/hbtw25/perpus-v2.git
cd perpus-v2
```

-   Copy `.env.example` file with `cp .env.example .env` and configure database:

```conf
APP_DEBUG=true
DB_HOST=mariadb
DB_DATABASE=perpus_v2
DB_USERNAME=your-username
DB_PASSWORD=your-password
```

-   Make sure you have Docker installed and run:

```bash
docker compose up --build -d
```

-   Install dependencies:

```bash
docker compose run --rm composer install
docker compose run --rm npm install
```

-   Laravel setups:

```bash
docker compose run --rm laravel-setup
```

-   Run locally:

```bash
docker compose run --rm --service-ports npm run dev
```

-   Pages
-   -   App: `http://127.0.0.1`
-   -   PhpMyAdmin: `http://127.0.0.1:8888`
-   -   MailHog: `http://127.0.0.1:8025`

<h4 id="docker-commands">🔐 Commands</h4>

-   Composer
-   -   `docker-compose run --rm composer install`
-   -   `docker-compose run --rm composer require laravel/breeze --dev`
-   -   Etc

-   NPM
-   -   `docker-compose run --rm npm install`
-   -   `docker-compose run --rm --service-ports npm run dev`
-   -   Etc

-   Artisan
-   -   `docker-compose run --rm artisan serve`
-   -   `docker-compose run --rm artisan route:list`
-   -   Etc

<h2 id="pembuat">🧍 Author</h2>

<p>perpus-v2 is created by <a href="https://instagram.com/hbtwwwwww">hbtw</a>.</p>
