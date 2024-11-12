<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <link href="style.css" rel="stylesheet">
</head>

<style>
    body {
    font-family: 'Poppins', sans-serif;
    scroll-behavior: smooth; /* Untuk animasi gulir yang halus */
    background-color: #AB3434;
}

section {
    padding: 100px 0;
    height: 100vh; /* Tinggi setiap section penuh layar */
    display: flex;
    align-items: center; /* Tetap vertikal di tengah */
    font-size: 24px;

}

.highlight {

    color: #ffeb3b; /* Warna teks hitam */
    /* Menambahkan sedikit jarak di sekitar teks */
    border-radius: 4px; /* Menambahkan sudut melengkung */
}


/* Section home di kiri */
#home {
    justify-content: flex-start; /* Pindahkan konten ke kiri */
}

/* Section lain tetap di tengah */
#reward, #about, #menu, #contact {
    justify-content: center; /* Konten tetap di tengah */
}

#about.container {
    align-items: left;
}

</style>
<body>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand ml-5" href="#">GoKindai</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end " id="navbarNav">
            <ul class="navbar-nav zmr-2">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#reward">Reward</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Home -->
<section id="home" data-aos="fade-right" data-aos-offset="500">
    <div class="ml-10 relative isolate px-6 pt-14 lg:px-8">
        <div class="mx-auto max-w-6xl py-32 sm:py-48 lg:py-56 grid grid-cols-1 lg:grid-cols-2 gap-10">
            <!-- Text Content -->
            <div class="text-left flex flex-col justify-center">
                <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">
                    it’s not just <span class="highlight">FOOD</span>,
                </h1>
                <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl mt-2">
                    it’s an <span class="highlight">EXPERIENCE</span>.
                </h1>
                <p class="mt-6 text-lg leading-8 text-white">reo aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
                <div class="mt-10 flex items-center gap-x-6">
                    <a href="menu.php" class="rounded-full bg-white px-4 py-2.5 text-sm font-semibold text-black shadow-lg hover:bg-gray-200 hover:text-black transform transition-transform duration-300 hover:scale-110">
                        View Menu
                    </a>
                    <a href="rewards.php" class="rounded-full bg-rose-400 px-4 py-2.5 text-sm font-semibold text-white shadow-lg hover:bg-rose-200 hover:text-black transform transition-transform duration-300 hover:scale-110">
                        Check Rewards
                    </a>
                </div>
            </div>
            
            <!-- Image Content -->
            <div class="flex justify-center items-center lg:justify-end lg:ml-8">
                <img src="https://cdn.vox-cdn.com/uploads/chorus_image/image/62582192/IMG_2025.280.jpg" alt="Food experience" class="w-full h-auto max-w-md rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105 lg:max-w-lg">
            </div>
        </div>
    </div>
</section>


<!-- Reward -->
<section id="reward" class="flex flex-col justify-center items-center " >
    <div class="mt-10 text-center">
        <h1 class="text-balance text-4xl font-bold tracking-tight text-white sm:text-6xl">
            Poin Anda, Hadiah Anda
            <h2 class="font-semibold py-2 text-white mt-2 text-2xl ">Cek sekarang untuk Promo Spesial!</h2>
        </h1>
        <form class="flex justify-center items-center mt-8 relative" onsubmit="event.preventDefault(); checkReward();">
    <div class="relative w-96">
        <input 
            type="search" 
            placeholder="Masukkan nomor telepon anda..." 
            class="px-8 py-3 w-full text-sm rounded-full border-none shadow-lg focus:outline-none focus:ring-2 focus:ring-black pr-10"
        >
        <span class="absolute right-7 top-1/2 transform -translate-y-1/2 cursor-pointer" onclick="checkReward()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 2a9 9 0 100 18 9 9 0 000-18zM21 21l-4.35-4.35" />
            </svg>
        </span>
    </div>
</form>

  </div>
</section>


<section id="about" class="flex justify-between items-start w-full  py-10 mt-10">
    <div class="container flex justify-between items-start w-full">
        <!-- Kolom kiri untuk teks deskripsi -->
        <div class="w-1/2 ">
            <!-- Judul di tengah atas -->
            <h1 class="text-sm font-bold tracking-tight text-white sm:text-3xl mb-8 text-center">
                About US & Place
            </h1>

            <h3 class="text-l font-semibold mb-4 text-white">Selamat datang di Kindai, Resto spesialis masakan Banjar</h3>
            <p class="mb-4 text-sm text-white">
                Kindai hadir membawa cita rasa khas Banjarmasin ke tengah-tengah Yogyakarta. Kami bangga menyajikan hidangan autentik dari tanah Kalimantan Selatan, di mana setiap piring menghidangkan kenikmatan dan kehangatan tradisi Banjar.
            </p>
            <p class="mb-4 text-sm text-white">
                Nikmati kelezatan nasi kuning kami yang dipadukan dengan pilihan lauk yang beragam, atau cicipi segarnya soto banjar—dapat disajikan dengan nasi ataupun ketupat, sesuai selera Anda. Setiap hidangan di Kindai dimasak dengan penuh cinta dan menggunakan bahan-bahan segar berkualitas, menjadikan pengalaman bersantap Anda di sini tak terlupakan.
            </p>
        </div>

        <!-- Kolom kanan untuk carousel -->
        <div class="w-1/2 pl-5">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://www.yogyes.com/id/places/sleman/kindai/1.jpg" class="d-block w-100" alt="Slide 1">
                    </div>
                    <div class="carousel-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ8r4DOTFER45RPYW2ca19j2GAS40J9fOCbr8dHRZyVZN2CKXfEJuYkZUMDOaHgkJm5M74&usqp=CAU" class="d-block w-100" alt="Slide 2">
                    </div>
                    <div class="carousel-item">
                        <img src="https://kulineran.com/images/restoran/gallery/brand_foto_54113d7bde554.jpg" class="d-block w-100" alt="Slide 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</section>


<section id="menu" class="flex  justify-center items-start ">
    <h1 class="text-balance text-sm font-semibold tracking-tight text-white sm:text-4xl mb-4">Khas Kindai</h1>
</section>

<section id="contact" class="flex flex-col justify-center items-center mt-8 w-full">
    <h1 class="justiyfy-center text-balance text-sm font-bold tracking-tight text-white sm:text-4xl mb-4">Contact Us</h1>
    
    <!-- Kontainer yang membagi halaman menjadi dua kolom -->
    <div class="flex flex-col lg:flex-row w-full">   
        <!-- Kolom kiri untuk informasi kontak -->
        <div class="w-full lg:w-1/2 bg-rose-200 p-6 ml-5">
            <h2 class="text-lg font-bold text-white mb-4">Informasi Kontak</h2>
            <p class="text-white py-1 mb-2">
                Alamat : Jl. Jemb. Merah No.116 D, Kaliwaru, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283
            </p>
            <p class="text-white py-1 mb-2">
                Telepon: (0274) 2920744
            </p>
            <p class="text-white py-1">
                Jam buka : Setiap hari (07.00-21.00)
            </p>
        </div>
        
        <!-- Kolom kanan untuk peta Google -->
        <div class="w-full lg:w-1/2 h-96 mr-10">
            <!-- Google Maps Embed -->
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.77726622584!2d110.39395497480491!3d-7.765153277017329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59bc9faa1bc1%3A0xf356388ae30a5371!2sKindai%20Warung%20Masakan%20Banjar!5e1!3m2!1sid!2sid!4v1729330582333!5m2!1sid!2sid" 
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
    
    <!-- Tombol Buka di Google Maps -->
    <a 
        href="https://maps.app.goo.gl/NusQUnVUbuD7Uj6Q6" 
        target="_blank" 
        class="mt-8 px-8 py-2  text-sm font-semibold hover:bg-rose-900 text-black bg-white rounded-full shadow-lg hover:bg-rose-200 hover:text-black transition duration-300"
    >
        Open in Google Maps
    </a>
</section>


<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
