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
        scroll-behavior: smooth;
        /* Untuk animasi gulir yang halus */
        background-color: #AB3434;
    }

    .section-reward {
        background-image: url("/image/reward.png");

        background-size: cover;
        background-position: center;
    }

    section {
        padding: 100px 0;
     
        
        /* Tinggi setiap section penuh layar */
        display: flex;
        align-items: center;
        /* Tetap vertikal di tengah */
        font-size: 24px;

    }

    .highlight {

        color: #ffeb3b;
        /* Warna teks hitam */
        /* Menambahkan sedikit jarak di sekitar teks */
        border-radius: 4px;
        /* Menambahkan sudut melengkung */
    }


    /* Section home di kiri */
    #home {
        justify-content: flex-start;
        /* Pindahkan konten ke kiri */
    }

    /* Section lain tetap di tengah */
    #reward,
    #about,
    #menu,
    #contact {
        justify-content: center;
        /* Konten tetap di tengah */
    }

    #about.container {
        align-items: left;
    }

    /* Initial transparent background with white text */
    #navbar {
        background-color: transparent;
        color: white;
        transition: background-color 0.4s ease, color 0.4s ease;
    }

    #navbar .nav-link,
    #navbar .navbar-brand {
        margin-top: 5px;
        margin-right: 5px;
        color: white;
        transition: color 0.4s ease;
    }

    #navbar .nav-link:hover,
    #navbar .navbar-brand:hover {
        text-decoration: underline;
    }

    /* Background and text color change on scroll */
    #navbar.scrolled {
        background-color: white;
        color: black;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        /* Optional shadow */
    }

    #navbar.scrolled .nav-link,
    #navbar.scrolled .navbar-brand {
        color: black;
    }
    /* Responsif untuk layar kecil */
@media (max-width: 768px) {
    .section-reward {
        padding: 50px 20px; /* Kurangi padding agar tidak terlalu sempit */
        text-align: center; /* Pastikan konten rata tengah */
    }

    #reward .flex {
        flex-direction: column; /* Tumpuk elemen secara vertikal */
    }

    #reward input[type="search"] {
        width: 100%; /* Sesuaikan input agar lebar penuh */
        margin-bottom: 10px; /* Tambahkan jarak bawah */
    }

    #rewardInfo {
        margin-top: 20px;
    }

    #about {
        padding: 50px 20px; /* Kurangi padding di sekitar konten */
        text-align: center; /* Pusatkan teks */
    }

    #about .container {
        flex-direction: column; /* Tumpuk elemen secara vertikal */
    }

    #about .text-content {
        margin-bottom: 20px; /* Tambahkan jarak bawah antara teks dan gambar */
    }

    #about img {
        max-width: 100%; /* Pastikan gambar tidak melampaui layar */
        height: auto;
    }
}

</style>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand ml-5" href="#">
                <img src="https://kulineran.com/images/restoran/brand/thumbs/brand_logo_54113d7bd2022.jpg" alt="Logo" width="30" height="30" class="d-inline-block align-text-top mr-2">
                GoKindai
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
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
    <section id="home">
        <div class="relative isolate">
            <div class="mx-auto w-full min-h-screen py-32 sm:py-48 lg:py-56 grid grid-cols-1 lg:grid-cols-2 gap-10 bg-cover bg-center"
                style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0) 80%), url('https://cdn.vox-cdn.com/uploads/chorus_image/image/62582192/IMG_2025.280.jpg');">
                <!-- Text Content -->
                <div class="text-left ml-10 flex flex-col justify-center">
                    <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl" data-aos="fade-right">
                        it’s not just <span class="highlight">FOOD</span>,
                    </h1>
                    <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl mt-2" data-aos="fade-right">
                        it’s an <span class="highlight">EXPERIENCE</span>.
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-white" data-aos="fade-right">Menghadirkan cita rasa khas Banjar yang autentik. Nikmati sensasi kuliner yang menggugah selera dan penuh kehangatan budaya Banjar.</p>
                    <div class="mt-10 flex items-center gap-x-6" data-aos="fade-down" data-aos-duration="1500">
                        <a href="menu.php" class="rounded-full bg-white px-4 py-2.5 text-sm font-semibold text-black shadow-lg hover:bg-gray-200 hover:text-black transform transition-transform duration-300 hover:scale-110">
                            View Menu
                        </a>
                        <a href="#reward" class="rounded-full border-2 border-rose-400 px-4 py-2.5 text-white text-sm font-semibold text-rose-400 shadow-lg  hover:text-black transform transition-transform duration-300 hover:scale-110">
                            Check Reward
                        </a>

                        </a>
                    </div>
                </div>

                <!-- Image Content (removed img tag) -->
                <div class="flex justify-center items-center lg:justify-end lg:ml-8">
                    <!-- The background image is applied here -->
                </div>
            </div>
        </div>
    </section>

    <!-- Reward -->
    <section id="reward" class="section-reward flex flex-col justify-center items-center ">
        <div class="mt-10 text-center">
            <h1 class="text-balance text-4xl font-bold tracking-tight text-white sm:text-6xl">
                Poin Anda, Hadiah Anda
                <h2 class="font-semibold py-2 text-white mt-2 text-2xl ">Cek sekarang untuk Promo Spesial!</h2>
            </h1>
            <form class="flex justify-center items-center mt-8 relative" onsubmit="event.preventDefault(); checkReward();">
                <div class="relative w-96">
                    <input
                        id="noTelepon"
                        type="search"
                        placeholder="Masukkan nomor telepon anda..."
                        class="px-8 py-3 w-full text-sm rounded-full border-none shadow-lg focus:outline-none focus:ring-2 focus:ring-black pr-10">
                    <span class="absolute right-7 top-1/2 transform -translate-y-1/2 cursor-pointer" onclick="checkReward()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 2a9 9 0 100 18 9 9 0 000-18zM21 21l-4.35-4.35" />
                        </svg>
                    </span>
                </div>
            </form>

            <div id="rewardInfo" class="mt-8 text-black hidden">
                <div class="bg-gray-100 rounded-md p-6">
                    <h3 id="namaPelanggan" class="text-xl font-semibold mb-2"></h3>
                    <div class="text-sm">
                        <p id="noTeleponText" class="flex items-center mb-2">
                            <i class="fa fa-phone mr-2"></i><span class="reward-label">No. Telepon:</span> <span id="noTelepon"></span>
                        </p>
                        <p id="levelText" class="flex items-center mb-2">
                            <i class="fa fa-star mr-2"></i><span class="reward-label">Level:</span> <span id="level"></span>
                        </p>
                        <p id="poinText" class="flex items-center">
                            <i class="fa fa-gift mr-2"></i><span class="reward-label">Poin:</span> <span id="poin"></span>
                        </p>
                        <p id="diskonText" class="flex items-center">
                            <i class="fa fa-gift mr-2"></i><span class="reward-label">Poin:</span> <span id="diskon"></span>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- about section -->
    <section id="about" class="flex flex-col justify-center items-center ">
        <h1 class="text-balance text-4xl tracking-tight text-white sm:text-6xl py-5 mb-5" data-aos="fade-up"
            data-aos-anchor-placement="top-bottom">
            <span class="font-light">About Us</span> & <span class="font-semibold">Place</span>
        </h1>

        <!-- Flex container untuk About Us & About Place -->
        <div class="flex flex-col sm:flex-row justify-between items-center sm:space-x-10 w-full sm:max-w-7xl">
            <!-- About Us section -->
            <div class="w-full sm:w-1/2 mb-8 sm:mb-0" data-aos="fade-right" data-aos-duration="2000">
                <h2 class="text-2xl font-semibold" style="color: #f59e0b;">A Few Words About Us</h2>
                <p class="text-sm" style="color: #f59e0b;">
                    Ayom mencoba menselaraskan bentuk dan warna 'ibu', sederhana tidak berlebih, tapi 'ayu' dipandang. Dengan pintu menghadap utara dan selatan sebagai sumbu imajiner, 'ngayomi'.
                </p>
                <p class="text-sm" style="color: #f59e0b;">
                    Kemudian lihatlah kebarat, sembari menikmati pergantian waktu 'ngayemi'. Penawar, melepas hari, melepas beban yang bertumpuk. Singgah & Bersandarlah.
                </p>
            </div>
            <!-- About Place section -->
            <div class="w-full sm:w-1/2" data-aos="fade-left" data-aos-duration="2000">
                <h2 class="text-2xl font-semibold" style="color: #f59e0b;">A Place to Lean, A Place to Dine</h2>
                <p class="text-sm" style="color: #f59e0b;">
                    Kami memilih hijau, sebagai penanda alam, tenang dan damai. Dan terakota perlambang kehangatan, kekeluar an. Di sini, setiap sudut dirancang untuk memberikan kenyamanan dan kehangatan bagi setiap pengunjung.
                </p>
            </div>
        </div>

        <!-- Image Gallery Section -->
        <div class="flex flex-col justify-center items-center w-full mt-10 pt-5 md:w-1/2 grid grid-cols-1 sm:grid-cols-5">
            <div class="object-fit">
                <img class="h-auto max-w-full border-r " src="https://img.kurio.network/Gcwi1JA631V4oyGipdFfwrUP2GI=/1200x900/filters:quality(80)/https://kurio-img.kurioapps.com/21/08/12/b50aef91-a93b-40b2-93a0-1a081bf581fa.jpe" alt="Gallery Image 1" data-aos="fade-up" data-aos-duration="500">
            </div>
            <div>
                <img class="h-auto max-w-full border-r" src="https://indonesiakaya.com/wp-content/uploads/2023/04/sb_Artboard_5.jpg" alt="Gallery Image 2" data-aos="fade-up" data-aos-duration="1000">
            </div>
            <div>
                <img class="h-auto max-w-full border-r" src="https://asset.kompas.com/crops/VEMd5H4lRZYH6QAc3zr0b003UfU=/0x0:880x587/1200x800/data/photo/2023/08/16/64dc53ca9f3db.jpg" alt="Gallery Image 3" data-aos="fade-up" data-aos-duration="1500">
            </div>
            <div>
                <img class="h-auto max-w-full border-r" src="https://www.dapurkobe.co.id/wp-content/uploads/nasi-kuning-kobe.jpg" alt="Gallery Image 4" data-aos="fade-up" data-aos-duration="2000">
            </div>
            <div>
                <img class="h-auto max-w-full border-r" src="https://cdn.idntimes.com/content-images/community/2022/08/lauk-pendamping-nasi-kuning-paling-favorit-lauk-nasi-kuning-apa-saja-resep-nasi-kuning-tips-nasi-kuning-lauk-nasi-kuning-paling-enak-resep-lauk-nasi-kuning-mudah-9cde86371d7fc78c91ae80a6ffab250e-f70e9439deafc113c2b9efd9ee627bc4_600x400.jpg" alt="Gallery Image 5" data-aos="fade-up" data-aos-duration="2500">
            </div>
        </div>
    </section>

    <!-- Menu section -->
    <section id="menu" class="flex flex-col justify-center items-center py-10">
        <h1 class="text-center text-4xl font-semibold text-white mb-6" data-aos="fade-down"
            data-aos-easing="linear"
            data-aos-duration="1000">Khas Kindai</h1>
        <div style="width: 80%; max-width: 600px; margin: 0 auto;">
            <iframe
                src="https://heyzine.com/flip-book/61f290c788.html"
                width="100%"
                height="450px"
                frameborder="5"
                allowfullscreen
                title="Menu Flipbook">
            </iframe>
        </div>
    </section>

    <!-- Gap Section: Available On-->
    <div id="available-on" class="flex flex-col items-center justify-center py-2 text-white">
        <h2 class="text-3xl font-light mb-6">Available On</h2>
        <div class="flex justify-center gap-5 pt-3">
            <!-- ShopeeFood -->
            <a href="https://shopeefood.id" target="_blank" class="hover:scale-110 transition-transform duration-300" data-aos="fade-right">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhszHIHC8CUwz_gXyGIpz3JpWLLEDv0nmOmZhExINd4qCZpQpcGEn4Qxc_gO2RgwYGxvoA9w9TJbClTfFPKI2QQs5VEwyd2MTmpFlLQMJhXsgKl9zjBv36zoEOfsgkYG_Uq44p_OJw8GCPg5VPHe4D5RCbrnLflj2u1fnK_TlRHV1MOg3aG8fP0ePOdYA/s5601/Shopee%20Food%202.png" alt="ShopeeFood" class="w-48 h-24">
            </a>
            <!-- GoFood -->
            <a href="https://www.gofood.co.id" target="_blank" class="hover:scale-110 transition-transform duration-300">
                <img src="https://i.gojekapi.com/darkroom/gofood-id/v2/images/uploads/a912ee1d-dfd7-4975-9330-697e42b03d73_gofood_logo@3x.png" alt="GoFood" class="w-48 h-24" data-aos="fade-down">
            </a>
            <!-- GrabFood -->
            <a href="https://www.grab.com/id/en/food/" target="_blank" class="hover:scale-110 transition-transform duration-300" data-aos="fade-left">
                <img src="https://i.pinimg.com/736x/6e/9b/95/6e9b95d516082899783cfd05d7629995.jpg" alt="GrabFood" class="w-48 h-24">
            </a>
        </div>
    </div>

    <!-- Contact section -->
    <section id="contact" class="flex flex-col justify-center items-center mt-24 w-full pt-12">
        <h1 class="text-center text-4xl font-bold tracking-tight text-white sm:text-5xl py-5 mt-5">
            Contact Us
        </h1>

        <!-- Kolom untuk Peta Google -->
        <div class="w-full h-screen px-5">
            <!-- Google Maps Embed -->
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.77726622584!2d110.39395497480491!3d-7.765153277017329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59bc9faa1bc1%3A0xf356388ae30a5371!2sKindai%20Warung%20Masakan%20Banjar!5e1!3m2!1sid!2sid!4v1729330582333!5m2!1sid!2sid"
                width="100%" height="100%" style="border-radius: 10px; border: 5px solid  #f59e0b;">
            </iframe>
        </div>

        <!-- Tombol untuk membuka peta di Google Maps -->
        <a
            href="https://maps.app.goo.gl/NusQUnVUbuD7Uj6Q6"
            target="_blank"
            class="mt-8 px-8 py-3 rounded-full border-2 border-rose-400 text-white text-sm font-semibold text-rose-400 shadow-xl hover:bg-rose-200 hover:text-black transform transition-transform duration-300 hover:scale-110">
            Open in Google Maps
        </a>
    </section>

    <!-- Footer Section -->
    <footer id="footer" class="bg-black text-white py-6">
        <div class="w-full text-center">
            <h2 class="text-2xl font-semibold">Contact Information</h2>
            <p class="text-md mt-4">Jl. Jemb. Merah No.116 D, Kaliwaru, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283</p>
            <p class="text-md mt-2">Phone: (0274) 2920744</p>
            <p class="text-md mt-2">Open Hours: Daily (07.00-21.00)</p>

            <!-- Social Media Links -->
            <div class="flex justify-center mt-6 space-x-4">
                <a href="#" class="text-white hover:text-gray-400">
                    <i class="fab fa-facebook-square text-2xl"></i>
                </a>
                <a href="#" class="text-white hover:text-gray-400">
                    <i class="fab fa-instagram text-2xl"></i>
                </a>
                <a href="#" class="text-white hover:text-gray-400">
                    <i class="fab fa-twitter text-2xl"></i>
                </a>
            </div>
        </div>

        <!-- Copyright or Footer Text -->
        <div class="text-center py-4 text-sm text-gray-400">
            <p>&copy; 2024 Kindai Warung Masakan Banjar. All Rights Reserved.</p>
        </div>
    </footer>


    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 500) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>


    <script>
        function checkReward() {
            const noTelepon = document.getElementById('noTelepon').value;

            // Cek jika nomor telepon diisi
            if (!noTelepon) {
                alert('Nomor telepon tidak boleh kosong');
                return;
            }

            // Mengirim request ke backend
            fetch(`/cek-reward/${noTelepon}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // tampil data member
                        document.getElementById('rewardInfo').classList.remove('hidden');
                        document.getElementById('namaPelanggan').innerText = `Nama Pelanggan: ${data.data.nama_pelanggan}`;
                        document.getElementById('noTeleponText').innerText = `Nomor Telepon: ${data.data.no_telepon}`;
                        document.getElementById('levelText').innerText = `Level: ${data.data.level}`;

                        // diskon berdasarkan level king
                        let diskon = 0;
                        switch (data.data.level.toLowerCase()) {
                            case 'bronze':
                                diskon = 10;
                                break;
                            case 'silver':
                                diskon = 20;
                                break;
                            case 'gold':
                                diskon = 30;
                                break;
                            case 'platinum':
                                diskon = 40;
                                break;
                            case 'diamond':
                                diskon = 50;
                                break;
                            case 'master':
                                diskon = 60;
                                break;
                            case 'grandmaster':
                                diskon = 70;
                                break;
                            case 'challenger':
                                diskon = 80;
                                break;
                            case 'legend':
                                diskon = 90;
                                break;
                            case 'mythic':
                                diskon = 100;
                                break;
                                //dstnya 
                            default:
                                diskon = 0; // Level tidak dikenal
                        }

                        document.getElementById('poinText').innerText = `Total Poin: ${data.data.total_poin}`;
                        document.getElementById('diskonText').innerText = `Diskon: Hore kamu mendapatkan diskon ${diskon}%!`;
                    } else {
                        alert(data.message); // Menampilkan pesan error
                    }
                })
                .catch(error => {
                    alert('Terjadi kesalahan. Coba lagi nanti.');
                    console.error(error);
                });
        }
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>