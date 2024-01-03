<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Saya</title>
    <!-- Tambahkan stylesheet atau link lainnya jika diperlukan -->
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/styles.css') !!}">
    <style>
        /* CSS yang sudah ada tetap ada di sini */

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .fadeIn {
            animation: fadeIn 1s ease-in-out;
        }

        .project:hover img {
            transform: scale(1.1);
        }
    </style>
</head>

<body>

    <header class="fadeIn">
        <img src="https://i.ibb.co/pQbpkmW/cici.jpg" alt="cici" border="0">
        <h1>Cici Wahyuningsih</h1>
        <p>A3.2100010</p>
        <p>Mahasiswa Prodi Sistem Informasi</p>
    </header>

    <nav class="fadeIn">
        <a href="#tentang-saya">Tentang Saya</a>
        <a href="#proyek-saya">Proyek Saya</a>
        <a href="#kontak">Kontak</a>
    </nav>

    <section id="tentang-saya" class="fadeIn">
        <h2>Tentang Saya</h2>
        <p>Selamat datang di portofolio saya. Saya adalah seorang mahasiswa dengan minat dalam teknologi dan desain. Berikut adalah beberapa proyek yang telah saya kerjakan.</p>
    </section>

    <section id="proyek-saya" class="fadeIn">
        <h2>Proyek Saya</h2>

    <section id="Proyek">
        <h2>Proyek Saya</h2>
        <article class="blog-post">
            <img src="https://i.ibb.co/DPBYFHx/UTS-SS.png" alt="proyek1">
            <div class="blog-content">
                <h3>Proyek Pertama</h3>
                <p>Website Blog</p>
                <p>Proyek pertama ini merupakan tugas dari mata kuliah Sistem Informasi Berbasis Web. Web ini menggunakan framework laravel dan bahasa pemrograman php serta css.</p>
                <a href="{{ route('blog.index') }}">Kunjungi Website</a>
            </div>
        </article>
        </section>

        <section id="Proyek">
        <article class="blog-post">
            <img src="https://i.ibb.co/QnjBQdK/112.png" alt="Proyek 2">
            <p> </p>
            <img src="https://i.ibb.co/8xJbC40/111.png" alt="Proyek2">
            <div class="blog-content">
                <h3>Proyek Kedua</h3>                
                <p>Proyek kedua ini merupakan proyek percobaan saya. Saya membuat ini karena iseng saat liburan kuliah tahun lalu. Proyek ini menggunakan framework codeigniter.</p>
                <a href="#">Kunjungi Website</a>
            </div>
        </article>
        
        </section>




        <section id="kontak" class="fadeIn">
            <h2>Kontak</h2>
            <p>Hubungi saya melalui email: <a href="mailto:youremail@example.com">youremail@example.com</a></p>
            <div class="social">
                <a href="https://www.linkedin.com/in/username" target="_blank">LinkedIn</a>
                <a href="https://github.com/username" target="_blank">GitHub</a>
            </div>
        </section>

        <footer class="fadeIn">
            &copy; 2023 Portofolio Saya
        </footer>

</body>

</html>