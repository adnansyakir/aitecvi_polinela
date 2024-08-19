<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- 
    - primary meta tag
  -->
    <title>AITECVI-POLINELA</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">



    <link rel="shortcut icon" href="landing/assets/images/L2.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">



    <!-- 
    - custom css link
  -->
    <link rel="stylesheet" href="landing/assets/css/style.css" />

    <!-- 
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700;800&family=Poppins:wght@400;500&display=swap" rel="stylesheet" />

    <!-- 
    - preload images
  -->
    <link rel="preload" as="image" href="landing/assets/images/L3.png" />
    <link rel="preload" as="image" href="landing/assets/images/L3.png" />
    <link rel="preload" as="image" href="landing/assets/images/L3.png" />
    <link rel="preload" as="image" href="landing/assets/images/L3.png" />
    <link rel="preload" as="image" href="landing/assets/images/L3.png" />


</head>

<body id="top">
    <!-- 
    - #HEADER
  -->

    <header class="header" data-header>
        <div class="containerku">
            <!-- <a href="#" class="logo">
        <img src="./assets/images/L2.png" width="60" height="50" alt="AITeCVI logo" />
      </a> -->
            <a href="" class="header-logo">
                <img src="landing/assets/images/L3.png" width="180" height="50" alt="AITeCVI logo" />
            </a>

            <nav class="navbar" data-navbar>
                <a href="">
                    <img src="landing/assets/images/L3.png" width="180" height="50" alt="AITeCVI logo" />
                </a>
                <ul class="navbar-list">
                    <li class="navbar-item">
                        <a href="#" class="navbar-link" data-nav-link>Home</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#" class="navbar-link" data-nav-link>Pengumuman</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#" class="navbar-link" data-nav-link>Tentang AITEC VI &#x25BC;</a>
                        <div class="dropdown-content">
                            <a href="#latar">Latar Belakang</a>
                            <a href="#tujuan">Tujuan dan Manfaat</a>
                            <a href="#kompetisi">Kompetisi</a>
                            <a href="#kampuspeserta">Kampus Peserta</a>
                            <a href="#jadwal">Jadwal</a>
                            <a href="#lokasi">Lokasi</a>
                            <a href="#gallery">Gallery</a>
                            <a href="#buku">Buku Panduan</a>
                        </div>
                    </li>
                    <li class="navbar-item">
                        <a href="#" class="navbar-link" data-nav-link>Sambutan &#x25BC;</a>
                        <div class="dropdown-content">
                            <a href="#direktur">Direktur Polinela Lampung</a>
                            <a href="#bakorma">Ketua BAKORMA</a>
                            <a href="#panitia">Ketua Panitia</a>
                        </div>
                    </li>
                    <li class="navbar-item">
                        <a href="#" class="navbar-link" data-nav-link>Kepanitiaan &#x25BC;</a>
                        <div class="dropdown-content">
                            <a href="#juri">Juri</a>
                            <a href="#kordinator">Kordinator Lomba</a>
                            <a href="#hubungi">Hubungi</a>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="header-actions">
                <button class="header-action-btn" aria-label="toggle search" title="Search">
                </button>

                <a href="../loginn" class="btn has-before">
                    <span class="span">Login</span>

                </a>

                <button class="header-action-btn" aria-label="open menu" data-nav-toggler>
                    <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
                </button>
            </div>

            <div class="overlay" data-nav-toggler data-overlay></div>
        </div>
    </header>

    <main>
        <article>
            <!-- 
        - #HERO
      -->

            <section class="section hero has-bg-image" id="home" aria-label="home" style="background-image: url('landing/assets/images/hero-bg.svg')">
                <div class="container">
                    <div class="haldep" align="center">
                        <h1 class="judul" align="center">
                            Agricultural Innovation Technology
                        </h1>
                        <h2 align="center">
                            <span class="red-text">Competition VI</span>
                            <span class="black-text">Politekinik Negeri Lampung</span>
                        </h2>
                        </h1>

                        <a href="../loginn" class="btn has-before">
                            <span class="span">Login </span>

                            <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                        </a>
                    </div>

                    <figure class="hero-banner">

                        <section class="video has-bg-image" aria-label="video" style="background-image: url('landing/assets/images/video-bg.png')">
                            <div class="video-banner img-holder has-after" style="--width: ; --height: ">
                                <video id="vid1" width="970" height="550" loading="lazy" class="img-cover">
                                    <source src="landing/assets/images/vid1.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <button class="play-btn" aria-label="play video" onclick="playVideo()">
                                    <ion-icon name="play" aria-hidden="true"></ion-icon>
                                </button>
                            </div>
                        </section>

                        <!-- <div class="img-holder two" style="--width: 240; --height: 370">
                <img
                  src="./assets/images/hero-banner-2.jpg"
                  width="240"
                  height="370"
                  alt="hero banner"
                  class="img-cover"
                />
              </div> -->

                    </figure>
                </div>

            </section>




            <!-- 
        - #CATEGORY
      -->

            <section class="section category" aria-label="category" id="latar">
                <div class="container">
                    <h2 class="h2 section-title">LATAR BELAKANG</h2>

                    <p>
                    Upaya untuk meningkatkan minat, softskill, dan hardskill sumberdaya manusia dapat dilakukan melalui pendidikan formal dan pendidikan informal seperti pelatihan, penyuluhan, lokakarya, 
                    dan sebagainya. Dalam hal penyelenggaraan pendidikan formal, Perguruan Tinggi Vokasi (PTV) menjadi institusi pendidikan yang berperan besar untuk menghasilkan output lulusan yang tidak hanya menguasai teori, tetapi mampu mengaplikasikan penguasaan keahlian terapan tertentu. Hal ini bertujuan untuk menyiapkan sumberdaya manusia dengan kemampuan dan keterampilan bidang tertentu yang siap terjun ke dunia kerja dan dapat bersaing secara global. Dalam hal mewujudkan tujuan tersebut, motivasi untuk senantiasa meningkatkan kompetensi dan keterampilan dinilai memiliki tingkat urgensi yang tinggi bagi mahasiswa.
                    </p><br>
                    <p>
                    Politeknik Negeri Lampung sebagai salah satu Perguruan Tinggi Vokasi senantiasa memprioritaskan kesempatan bagi mahasiswa untuk dapat terus memperbarui <i>(update)</i> dan meningkatkan <i>(upgrade)</i> kompetensi diri. Hal ini dilakukan karena adanya kesadaran penuh bahwa pendidikan vokasi berfokus pada pengembangan keterampilan yang merupakan modal utama yang dibutuhkan generasi muda untuk dapat bersaing. Di tahun 2024, Politeknik Negeri Lampung mengemban amanah sebagai tuan rumah penyelenggara event nasional, yaitu Kompetisi Inovasi Teknologi Bidang Pertanian ke-6 atau 6th <i>Agricultural Innovation Technology Competition</i> (AITeC VI) yang secara repetitif dilaksanakan di bawah pengawasan Badan Koordinasi Kemahasiswaan (BAKORMA) Politeknik se-Indonesia.
                    </p><br>
                    <p>
                    Badan Koordinasi Kemahasiswaan (BAKORMA) Politeknik se-Indonesia memiliki tanggung jawab bidang kemahasiswaan di lingkup vokasi untuk pengembangan softskill mahasiswa pada tataran implementasi secara nasional. Salah satu program yang dimiliki oleh BAKORMA untuk pengembangan softskill tersebut adalah melalui penyelenggaraan Agricultural Innovation Technology Competition (AITeC) tingkat nasional yang dilakukan secara rutin untuk mahasiswa vokasi bidang pertanian. AITeC juga memfasilitasi mahasiswa untuk mengembangkan potensi diri, jiwa kompetitif yang sehat, dan kompetensi diri. Secara umum, selain untuk menjadi wadah bagi mahasiswa, kegiatan AITeC ini diarahkan untuk meningkatkan, produktivitas, efektivitas dan efisiensi, serta kualitas pertanian secara luas yang melalui suatu ide/gagasan, pemikiran kreatif, maupun inovasi-inovasi mutakhir yang mencakup pertanian pangan dan hortikultura, peternakan, perikanan, dan kehutanan. Tidak hanya itu, 
                    penyelenggaraan AITeC diharapkan mampu melahirkan peningkatan akses teknologi pertanian bagi petani kecil dan masyarakat pedesaan dengan pendekatan yang inklusif dan berkelanjutan.
                    </p><br>
                    <p>
                    AITeC menjadi salah satu ajang tahunan bergengsi yang secara konsisten telah diselenggarakan selama 6 tahun berturut-turut dan berkontribusi dalam memberikan apresiasi (penghargaan) berskala nasional kepada mahasiswa yang berprestasi di AITeC. Hal ini sekaligus menunjukan komitmen BAKORMA untuk senantiasa mendukung dan memberikan peluang bagi Perguruan Tinggi untuk dapat meningkatkan persentase capaian Indikator Kinerja Utama (IKU) Perguruan Tinggi. Atas dasar pemikiran tersebut, AITeC VI Politeknik Negeri Lampung diharapkan mampu menjadi sebuah kompetisi bergengsi untuk meningkatkan kompetensi diri, menumbuhkan jiwa kompetitif yang sehat, sekaligus mempersiapkan diri untuk dapat bersaing di tingkat yang lebih tinggi lagi dan mengharumkan nama institusi atau Perguruan Tinggi.
                    </p><br>
                    


                </div>
            </section>


            <section class="section course" id="tujuan" aria-label="course">
                <div class="container">
                    <h3 class="h2 section-title">Tujuan dan Manfaat Kompetisi</h3>
                    <div class="row">

                        <ol type="A">
                            <li>
                                <strong>TUJUAN</strong>
                                <ol type="1">
                                    <li>
                                    Memberikan wadah bagi mahasiswa untuk dapat berinovasi, meningkatkan kompetensi diri, kreativitas, dan kualitas produksi di bidang pertanian yang berwawasan lingkungan;
                                    </li>
                                    <li>
                                    Memberikan apresiasi (penghargaan) berskala nasional kepada mahasiswa yang berprestasi di AITeC;
                                    </li>
                                    <li>
                                    Meningkatkan kualitas hubungan dan kerjasama antar Perguruan Tinggi Vokasi bidang pertanian di Indonesia.
                                        <br />
                                        <br />
                                    </li>
                                </ol>

                            </li>

                            <li>
                                <strong>MANFAAT</strong>
                                <ol type="1">
                                    <li>
                                    Tumbuhnya semangat dan motivasi dalam diri mahasiswa untuk berkompetisi yang sehat di bawah naungan Badan Koordinasi Kemahasiswaan Politeknik bidang pertanian;
                                    </li>
                                    <li>
                                    Terciptanya kreativitas, budaya berprestasi dan berinovasi dalam diri mahasiswa yang berorientasi pada peningkatan kualitas di bidang pertanian;
                                    </li>
                                    <li>
                                    Terbentuknya relasi dan silaturahmi yang baik antar civitas Perguruan Tinggi Vokasi bidang pertanian di Indonesia.
                                    </li>
                                </ol>
                            </li>

                        </ol>
                    </div>
                </div>
                </div>
            </section>

            <section class="section category" aria-label="category" id="kompetisi">
                <div class="container">
                    <h3 class="h2 section-title">Kompetisi</h3>
                    <div class="row">

                        <ol type="A">
                            <li>
                                <strong>TEMA KOMPETISI</strong>
                                <p style="font-style:italic">
                                Tema untuk Kompetisi Inovasi Teknologi Bidang Pertanian VI  atau <i>Agricultural Innovation Technology Competition</i> 6th (AITeC VI) Politeknik Negeri Lampung tahun 2024 adalah: <br /><br />

                                    <strong style="color:darkred; font-size:larger; font-style:normal;text-align:center">
                                    “Pemantapan Ketahanan Pangan melalui Peningkatan Inovasi Teknologi Bidang Pertanian dalam Mengantisipasi Perubahan Iklim Menuju Indonesia Emas 2045”
                                    </strong>
                                </p>

                            <li>
                                <strong>LOGO KOMPETISI</strong>
                                <div class="row">
                                    <div class="col-lg-4 col-md-3">
                                        &nbsp;
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <img class="img-fluid" src="landing/assets/images/L4.png">
                                    </div>
                                    <li>
                                <p style="font-style:italic">
                                Secara umum, terdapat 5 (lima) elemen yang mendasari filosofi konsep logo yang 
                                digunakan pada penyelenggaraan AITeC VI Politeknik Negeri Lampung, yaitu: 
                                <br /><br />

                                <ol>
                                    <strong><i><li>1. Warna Hijau dan Warna Kuning</li></i></strong>
                                    <p>Warna hijau melambangkan kesuburan, pertumbuhan, dan keberlanjutan. Hal ini menunjukkan 
                                    pentingnya pertanian dalam menjaga ketahanan pangan dan keseimbangan lingkungan. Warna kuning melambangkan kemakmuran, kehangatan, dan optimisme. 
                                    Hal ini mencerminkan harapan dan potensi besar sektor pertanian di masa depan.
                                </p>
                                </ol>
                                <ol>
                                <strong><i><li>2. Elemen Tunas dan Daun</li></i></strong>
                                    <p>Warna hijau melambangkan kesuburBentuk daun dan tunas melambangkan pertumbuhan dan 
                                        inovasi dalam teknologi pertanian. Penggunaan elemen ini menekankan pentingnya inovasi 
                                        teknologi untuk mendukung ketahanan pangan dan mengantisipasi perubahan iklim.
                                </p>
                                </ol>
                                <ol>
                                <strong><i><li>3. Pola Geometris dan Pola Tradisional</li></i></strong>
                                    <p>Warna hijau melambangkan kesuburBentuk daun dan tunas melambangkan pertumbuhan dan 
                                        inovasi dalam teknologi pertanian. Penggunaan elemen ini menekankan pentingnya inovasi 
                                        teknologi untuk mendukung ketahanan pangan dan mengantisipasi perubahan iklim.
                                </p>
                                </ol>
                                <ol>
                                <strong><i><li>4. Konsep Simetris dan Kesatuan</li></i></strong>
                                    <p>Konsep desain logo yang simetris melambangkan keseimbangan dan harmoni yang berperan 
                                        penting untuk mencapai keberlanjutan dalam sektor pertanian. Selain itu, konsep kesatuan 
                                        yang ditampilkan pada logo mencerminkan kerjasama dan sinergi antara berbagai pihak untuk mencapai tujuan bersama.
                                </p>
                                </ol>
                                <ol>
                                <strong><i><li>5. Inisial AITeC VI</li></i></strong>
                                    <p>AITeC VI adalah singkatan dari <i>"Agricultural Innovation Technology Competition"</i> y
                                        ang menunjukkan bahwa kegiatan ini adalah acara berkelanjutan yang sudah memasuki 
                                        tahun keenam sekaligus menunjukkan bentuk komitmen Badan Koordinasi Kemahasiswaan 
                                        Politeknik se-Indonesia untuk terus-menerus memberikan dukungan melalui penyelenggaraan 
                                        kompetisi sehat yang berorientasi 
                                        pada inovasi teknologi dan peningkatan kualitas produksi di sektor pertanian. </p>
                                </ol>
                                
                                    <p>
                                    Logo AITeC VI Politeknik Negeri Lampung dirancang dengan menggunakan elemen-elemen yang 
                                    secara umum merepresentasikan pertumbuhan, inovasi, keberlanjutan, dan kesatuan yang 
                                    selaras dengan tema “Pemantapan Ketahanan Pangan melalui Peningkatan 
                                    Inovasi Teknologi Bidang Pertanian dalam Mengantisipasi Perubahan Iklim Menuju 
                                    Indonesia Emas 2045”. Oleh karena itu, Politeknik Negeri Lampung selaku tuan
                                     rumah penyelenggara AITeC VI berhadap logo ini tidak hanya berfungsi sebagai identitas visual, 
                                    tetapi juga sebagai simbol dari visi dan misi kegiatan yang mendalam dan bermakna.
                                    </p>
                            

                            <li>

                                    <div class="col-lg-4 col-md-3">
                                        &nbsp;
                                    </div>
                                </div>
                                <br />
                                <br />
                            </li>

                            <li>
                                <strong>BENTUK KOMPETISI</strong>
                                <ol>
                                Secara umum, AITeC VI Politeknik Negeri Lampung tahun 2024 dilaksanakan dalam bentuk 3 (tiga) kategori kompetisi, yaitu:
                                    <li>
                                        <strong>
                                            1. Kompetisi Inovasi Teknologi Bidang Pertanian (Agricultural Innovation
                                            Technology Competition),
                                        </strong>
                                        Kompetisi ini merupakan suatu ajang unjuk kemampuan mahasiswa di bidang pertanian dengan 
                                        menekankan pada kemampuan dasar yang dilakukan  seorang dan/atau kelompok mahasiswa 
                                        pada tahap pengetahuan, keterampilan, dan sikap dalam pencapaian standar kompetensi 
                                        di dalam mengembangkan teknologi yang inovatif guna mengatasi berbagai tantangan 
                                        di bidang pertanian. Ruang lingkup kompetisi ini mencakup bidang pertanian pada 
                                        sektor tanaman pangan dan hortikultura, perkebunan, peternakan, kesehatan hewan, 
                                        perikanan, kehutanan, industri, ekonomi, dan teknologi. Kategori ini terdiri atas 2 (dua) cabang kompetisi, yaitu: <br />
                                        <ol>
                                        1. Inovasi Teknologi Bidang Pertanian sub-kategori Smart and Precision Farming
                                        </ol>
                                        <ol>
                                        2. Inovasi Teknologi Bidang Pertanian sub-kategori Teknologi Tepat Guna
                                        </ol><br>
                                    </li>

                                    <li>
                                        <strong>
                                            2. Kontes Vokasi Bidang Pertanian (Agricultural Vocation Skill Contest),
                                        </strong>
                                        Kompetisi ini merupakan suatu ajang unjuk kemampuan mahasiswa dengan menekankan 
                                        peningkatan keterampilan spesifik di bidang pertanian dan berkreasi dalam  mengembangkan 
                                        kompetensi inovatif untuk dapat meningkatkan efisiensi, produktivitas, serta kualitas
                                        pertanian yang berkelanjutan dengan tetap mengedepankan sisi sosial
                                        budaya pertanian dan kearifan lokal di Indonesia.
                                        Kategori ini terdiri atas 13 (tiga belas) cabang kompetisi, yaitu: <br />
                                        <ol>
                                            1.	Teknik Okulasi Tanaman 
                                        </ol>
                                        <ol>
                                        2.	Sortasi Biji Kopi
                                        </ol>
                                        <ol>
                                        3.	Handling Ternak
                                        </ol>
                                        <ol>
                                        4.	Teknik Proses Karkas Ayam
                                        </ol>
                                        <ol>
                                        5.	Teknik Pengambilan Sampel Darah Ayam
                                        </ol>
                                        <ol>
                                        6.	Formulasi Pakan Ternak
                                
                                        </ol>
                                        <ol>
                                        7.	Formulasi Pakan Ikan
                                        </ol>
                                        <ol>
                                        8.	Packing Benih Ikan
                                        </ol>
                                        <ol>
                                        9.	Teknik Proses Fillet Ikan
                                        </ol>
                                        <ol>
                                        10.	Teknik Pembuatan Bakso Ikan
                                        </ol>
                                        <ol>
                                        11.	Survey Pemetaan Lahan
                                        </ol>
                                        <ol>
                                        12.	Desain Alat dan Mesin Pertanian dengan AutoCAD
                                        </ol>
                                        <ol>
                                        13.	Penyuluhan Pertanian
                                        </ol><br>
                                    </li>

                                    <li>
                                        <strong>
                                            3. Eksibisi Fotografi (Photography Exhibition)
                                        <p></strong>
                                        Perlu disadari bahwa bakat dan talenta mahasiswa tidak hanya sebatas di bidang akademik, 
                                        tetapi juga di bidang seni sehingga diperlukan suatu kompetisi yang dapat berperan sebagai
                                        ajang unjuk kemampuan mahasiswa di bidang seni, terutama dalam lingkup fotografi dan videografi. 
                                        Pada AITeC VI tahun 2024, Politeknik Negeri Lampung sebagai tuan rumah mengusulkan 
                                        adanya 1 (satu) cabang kompetisi baru yaitu Eksibisi Fotografi (Photography Exhibition)
                                        yang diharapkan mampu mendorong ranah pendidikan visual di Indonesia, khususnya fotografi,
                                        mampu bergerak ke arah yang lebih baik dan selaras dengan capaian kemajuan teknologi saat ini. 
                                    </p>
                                    <p>
                                    Tema kompetisi disesuaikan dengan tema penyelenggaraan AITeC secara umum, 
                                    yaitu fotografi di bidang pertanian. Peserta akan diberikan kesempatan 
                                    untuk mengeksplorasi pelaksanaan AITeC VI serta berbagai aktivitas yang ada 
                                    di Politeknik Negeri Lampung sebagai objek foto. Hasil foto akan disajikan dan 
                                    dipresentasikan di depan Tim Juri. Tim Juri akan memberikan penilaian terhadap hasil foto,
                                     arti dan makna dari hasil foto yang disampaikan oleh fotografer, serta kemampuan fotografer 
                                     untuk menceritakan arti fotonya untuk menarik perhatian audiens. Adanya Eksibisi Fotografi 
                                     diharapkan mampu melahirkan dokumentasi yang memikat dari segi daya tarik visual dan kualitas
                                      produksi, kreatif, informatif, serta memberikan nilai edukatif kepada para penonton dengan
                                       memberikan wawasan menarik tentang kegiatan AITeC. Hal ini sekaligus dinilai mampu memberikan
                                        efek positif terhadap peningkatan kualitas publikasi penyelenggaraan AITeC 
                                    yang secara konsisten diselenggarakan sebagai program tahunan BAKORMA.
                                    </p>
                                    </li>
                                </ol>
                                <br />

                                Secara umum, sistem pelaksanaan AITeC VI Politeknik Negeri Lampung tahun 2024 terdiri atas:
                                <ol>
                                    <li>
                                        <strong>Babak Penyisihan dilaksanakan secara:</strong>
                                        <ol type="a">
                                            <li>
                                            <strong style="color:darkred">
                                                    1.	Seleksi Internal
                                                </strong>
                                                Mahasiswa yang didaftarkan sebagai peserta di AITeC VI adalah hasil 
                                                seleksi internal oleh masing-masing 
                                                Perguruan Tinggi yang dibuktikan dengan lampiran Berita Acara Seleksi Internal.
                                            </li><br>
                                            <li>
                                                <strong style="color:darkred">
                                                2.	Seleksi secara daring (online)
                                                </strong>
                                                Pelaksanaan secara daring (online) atau seleksi online adalah proses seleksi bagi peserta yang ditujukan untuk 9 (sembilan) cabang kompetisi, yaitu:
                                                <ol>1.	Inovasi Teknologi Bidang Pertanian sub-kategori Smart and Precision Farming</ol>
                                                <ol>2.	Inovasi Teknologi Bidang Pertanian sub-kategori Teknologi Tepat Guna</ol>
                                                <ol>3. Teknik Okulasi Tanaman</ol>
                                                <ol>4. Teknik Proses Karkas Ayam</ol>
                                                <ol>5.  Teknik Pengambilan Sampel Darah Ayam</ol>
                                                <ol>6.	Formulasi Pakan Ternak</ol>
                                                <ol>7.	Formulasi Pakan Ikan</ol>
                                                <ol>8.	Teknik Proses Fillet Ikan</ol>
                                                <ol>9.	Penyuluhan Pertanian</ol>
                                                <br />
                                            </li>
                                            <li>
                                                <strong style="color:darkred">
                                                    3.	Pelaksanaan secara luring (offline)
                                                </strong>
                                                Pelaksanaan secara luring (offline) di Politeknik Negeri Lampung meliputi 7 (tujuh) cabang kompetisi dan seluruh babak final dari cabang kompetisi yang sebelumnya telah melalui proses seleksi daring (online). Adapun 7 (tujuh) cabang kompetisi yang dimaksud adalah:
                                                    <ol>1.	Sortasi Biji Kopi</ol>
                                                    <ol>2.	Handling Ternak</ol>
                                                    <ol>3.	Packing Benih Ikan</ol>
                                                    <ol>4.	Teknik Pembuatan Bakso Ikan</ol>
                                                    <ol>5.	Survey Pemetaan Lahan</ol>
                                                    <ol>6.	Desain Alat dan Mesin Pertanian dengan AutoCAD</ol>
                                                    <ol>7.	Eksibisi Fotografi</ol>
                                                    <br />
                                            </li>
                                </ol>
                            </li>

                        </ol>
                    </div>

                </div>
            </section>



            <section class="section course" id="kampuspeserta" aria-label="course">
                <div class="container">

                    <div class="section-header">
                        <h3 class="h2 section-title">Kampus Peserta</h3>
                    </div>

                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr style="font-weight:bold">
                                        <td class="text-center" style="width:4%">No</td>
                                        <td class="text-center" style="width:56%">Nama Kampus</td>
                                        <td class="text-center" style="width:20%">Asal Provinsi</td>
                                        <td class="text-center" style="width:20%">Asal Negara</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($pt as $row) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $row['nama_pt']; ?></td>
                                            <td align="center"><?= $row['asal_prov']; ?></td>
                                            <td align="center"><?= $row['asal_negara']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section course" id="courses" aria-label="course">
                <div class="container">

                    <div class="section-header" id="direktur">
                        <h2 class="h2 section-title"> SAMBUTAN DIREKTUR POLITEKNIK NEGERI LAMPUNG</h2>
                    </div>

                    <div class="row">
                    <div class="col-lg-4" data-aos="fade-right">
                        <div class="image">
                            <img src="<?= base_url('landing/assets/images/direktur.png') ?>" class="img-fluid" alt="Direktur">
                        </div>
                    </div>
                    <div class="col-lg-8" data-aos="fade-left">
                        <div class="content">
                                <p>Assalamu’alaikum warahmatullahi wabarakatuh,
                                <p>

                                <p style="text-align: justify; text-indent:45px">
                                Salam sejahtera bagi kita semua. Puji syukur kita panjatkan kehadirat Allah SWT, Tuhan Yang Maha Esa, yang telah melimpahkan rahmat dan karunia-Nya kepada kita semua. Alhamdulillah, pada tahun 2024 Politeknik Negeri Lampung diberi kepercayaan untuk menjadi tuan rumah dalam penyelenggaraan <i>Agricultural Innovation Technology Competition</i> yang ke-6 (AITeC VI), sebuah ajang kompetisi bergengsi bagi mahasiswa Politeknik se-Indonesia.
                                <p>

                                <p style="text-align: justify; text-indent:45px">
                                AITeC VI adalah sebuah momentum penting yang mempertemukan talenta-talenta terbaik dari berbagai Politeknik di Indonesia. Kompetisi ini tidak hanya menjadi ajang untuk mengukur kemampuan dan keterampilan mahasiswa, tetapi juga sebagai sarana untuk memperluas wawasan, memperkuat jaringan, serta membangun semangat kolaborasi antar mahasiswa Politeknik.
                                <p>

                                <p style="text-align:justify; text-indent:45px">
                                Kami, Politeknik Negeri Lampung, merasa sangat terhormat dan bangga dapat berperan dalam penyelenggaraan AITeC VI yang merupakan agenda tahunan Badan Koordinasi Kemahasiswaan (BAKORMA) Politeknik se-Indonesia. Sebagai tuan rumah, kami berkomitmen untuk memberikan yang terbaik dalam menyambut dan melayani para peserta, juri, dan seluruh pihak yang terlibat. Kami berharap melalui AITeC VI akan lahir inovasi-inovasi baru, pemikiran kreatif, dan solusi-solusi yang dapat memberikan kontribusi nyata bagi perkembangan dunia pendidikan dan industri di Indonesia.
                                <p>
                                    <p>
                                    Pedoman ini disusun sebagai panduan bagi seluruh peserta dan panitia dalam mengikuti dan menyelenggarakan setiap rangkaian kegiatan AITeC VI. Kami berharap pedoman ini dapat dipahami dengan baik dan menjadi acuan yang memudahkan setiap pihak untuk berpartisipasi secara maksimal.
                                    </p>
                                    <p>
                                    Akhir kata, saya ucapkan terima kasih kepada seluruh panitia dan pihak yang telah berkontribusi dalam persiapan dan pelaksanaan AITeC VI. Semoga acara ini dapat berjalan lancar dan sukses, serta memberikan manfaat yang besar bagi kita semua.
                                    </p>
                                    <p>
                                    Wassalamu’alaikum warahmatullahi wabarakatuh.
                                    </p>

                                    <pre style="font-size:large">
                            Direktur
                                                                                                                

                            Prof. Dr. Ir. Sarono, M.Si.
                            </pre>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <section class="section course" id="courses" aria-label="course">
                <div class="container">

                    <div class="section-header">
                        <h2 class="h2 section-title">SAMBUTAN KETUA BADAN KOORDINASI KEMAHASISWAAN <br>POLITEKNIK SE-INDONESIA</h2>
                        <p style="font-size:large">
                            
                        </p>
                    </div>

                    <div class="row">
                    <div class="col-lg-4" data-aos="fade-right">
                            <div class="image">
                                <img src="<?= base_url('landing/assets/images/ketua.png') ?>" class="img-fluid" alt="Direktur">
                            </div>
                        </div>
                        <div class="col-lg-8" data-aos="fade-left">
                            <div class="content">
                                <p>Assalamu’alaikum warahmatullahi wabarakatuh,
                                <p>

                                <p style="text-align: justify; text-indent:45px">
                                Salam sejahtera bagi kita semua. Puji syukur kita panjatkan kehadirat Allah SWT, Tuhan Yang Maha Esa, yang telah melimpahkan rahmat dan karunia-Nya sehingga kita dapat menyusun Pedoman AITeC VI dengan baik dan tepat waktu. 
                                Pertama-tama, saya ingin menyampaikan apresiasi yang sebesar-besarnya kepada seluruh anggota Badan Koordinasi Kemahasiswaan (BAKORMA) Politeknik se-Indonesia yang telah bekerja keras dan berkontribusi dalam penyusunan pedoman ini. 
                                <p>

                                <p style="text-align: justify; text-indent:45px">
                                <i>Agricultural Innovation Technology Competition</i> yang ke-6 (AITeC VI) merupakan salah satu ajang kompetisi yang sangat dinanti oleh mahasiswa Politeknik di seluruh Indonesia dimana kreativitas, inovasi, dan 
                                kecakapan teknis mahasiswa diuji dan dipamerkan. AITeC bukan hanya sekadar ajang perlombaan, tetapi juga wadah untuk mempererat tali persaudaraan, memperluas jejaring, dan memperkaya wawasan antar mahasiswa Politeknik se-Indonesia. Oleh karena itu, penyelenggaraan AITeC harus terus didorong agar dapat menghasilkan generasi muda yang kompeten, siap bersaing di dunia kerja, dan mampu memberikan kontribusi nyata bagi pembangunan bangsa.  
                                <p>
                                    <p>
                                    Saya berharap Pedoman AITeC VI ini dapat menjadi acuan yang jelas dan mudah dipahami oleh seluruh peserta, panitia, juri dan pihak terkait lainnya sehingga pelaksanaan AITeC VI dapat berjalan lancar dan mencapai tujuan yang diharapkan. 
                                    Mari kita jadikan AITeC VI tahun 2024 yang dilaksanakan di Politeknik Negeri Lampung sebagai momentum untuk menunjukkan bahwa mahasiswa Perguruan Tinggi Vokasi adalah insan yang kreatif, inovatif, dan berdaya saing tinggi.
                                    </p>
                                    <p>
                                    Akhir kata, saya ucapkan terima kasih kepada semua pihak yang telah mendukung terselenggaranya AITeC VI. Semoga Allah SWT senantiasa 
                                    melimpahkan berkah dan rahmat-Nya kepada kita semua dalam setiap langkah yang kita ambil.
                                    </p>


                                <p style="text-align:justify; text-indent:45px">
                                    Wassalamu’alaikum warahmatullahi wabarakatuh.
                                <p>

                                <pre style="font-size:large">
                            Ketua BAKORMA Politeknik se-Indonesia
                                                            
                                                    

                            Wahyu Kurnia Dewanto, S.Kom., MT
                    </pre>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <section class="section category" aria-label="category">
                <div class="container">

                    <div class="section-header" id="panitia">
                        <h2 class="h2 section-title"> SAMBUTAN KETUA PANITIA AITeC VI</h2>
                    </div>

                    <div class="row">
                    <div class="col-lg-4" data-aos="fade-right">
                            <div class="image">
                                <img src="<?= base_url('landing/assets/images/ketua.png') ?>" class="img-fluid" alt="Direktur">
                            </div>
                        </div>
                        <div class="col-lg-8" data-aos="fade-left">
                            <div class="content">
                                <p>Assalamu'alaikum warahmatullahi wabarakatuh,
                                <p>

                                <p style="text-align: justify; text-indent:45px">
                                Dengan penuh rasa syukur dan kebanggaan, kami menyambut kehadiran seluruh peserta, manager pendamping, juri, dan pimpinan Politeknik se-Indonesia dalam acara AITeC VI tahun 2024 yang diselenggarakan di Politeknik Negeri Lampung. Merupakan suatu kehormatan bagi kami untuk menjadi tuan rumah dalam ajang tahunan yang bergengsi dengan tujuan untuk mempromosikan kreativitas dan inovasi di kalangan mahasiswa Politeknik se-Indonesia.
                                <p>

                                <p style="text-align: justify; text-indent:45px">
                                AITeC VI adalah ajang yang sangat penting dalam mengembangkan potensi dan bakat di bidang teknologi dan inovasi. Tahun ini, kami berkomitmen untuk menghadirkan kompetisi yang tidak hanya menantang, tetapi juga memberi kesempatan kepada peserta untuk mengeksplorasi dan menampilkan hasil karya terbaik mereka. Melalui AITeC VI, kami berharap dapat mendorong munculnya solusi-solusi kreatif dan inovatif yang dapat bermanfaat bagi masyarakat dan dunia industri.
                                <p>

                                <p style="text-align:justify; text-indent:45px">
                                Kami mengucapkan terima kasih kepada semua pihak yang telah berkontribusi dalam penyelenggaraan acara ini, termasuk sponsor, mitra, dan seluruh panitia yang telah bekerja keras untuk memastikan kesuksesan penyelenggaraan AITeC VI Politeknik Negeri Lampung. Ucapan terima kasih juga kami sampaikan kepada Bapak/Ibu Juri yang akan menilai karya-karya peserta dengan penuh profesionalisme dan objektivitas.
                                <p>

                                <p style="text-align:justify; text-indent:45px">
                                Kepada seluruh peserta, kami ucapkan selamat bertanding. Kami yakin bahwa setiap ide dan inovasi yang Anda hadirkan akan menjadi inspirasi dan memberikan dampak positif. Jadikanlah kesempatan ini sebagai ajang untuk belajar, berkembang, dan berkompetisi dengan menjunjung semangat sportivitas yang tinggi.    
                                <p>
                                    <p>
                                    Akhir kata, kami berharap acara AITeC VI tahun 2024 dapat berjalan dengan sukses, menjadi pengalaman yang berharga serta mampu memberikan kesan yang mendalam bagi semua pihak yang terlibat. Semoga kegiatan ini dapat mempererat tali silaturahmi dan memberikan kontribusi yang berarti bagi kemajuan ilmu pengetahuan dan teknologi.
                                    </p>

                                    <p>
                                    Wassalamu'alaikum Warahmatullahi Wabarakatuh.
                                    </p>

                                <pre style="font-size:large">
                            Ketua Pelaksana,
                                                            
                                                       

                            Riko Noviadi
                    </pre>
                            </div>
                        </div>
                    </div>

                </div>
            </section>


            <section class="section course" id="juri" aria-label="course">
                <div class="container">

                    <div class="section-header">
                        <h2 class="h2 section-title">JURI AITEC 6</h2>
                    </div>
                    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-lg-9">

                            <ul class="faq-list">

                                <li>
                                    <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Teknologi Bidang Pertanian <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                                        <div class="row" style="padding-top:20px">
                                            <div class="dropdown-content">
                                                <a href="#latarbelakang">Latar Belakang</a>
                                                <a href="#tujuan">Tujuan dan Manfaat</a>
                                                <a href="#kompetisi">Kompetisi</a>
                                                <a href="#kampuspeserta">Kampus Peserta</a>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J11.jpg" alt="" class="img-fluid">

                                                </div>
                                                <h6 style="font-weight:bold; text-align:center; padding-top:10px">
                                                    Welianto Boboy, SP., M.Sc <br />
                                                    (Politeknik Pertanian Negeri Kupang)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J12.jpg" alt="" class="img-fluid">
                                                </div>
                                                <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                    Dr. Rahmad D, SP.,M.Si <br />
                                                    (Politeknik Pertanian Negeri Pangkajene Kepulauan)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/j13.jpg" alt="" class="img-fluid">

                                                    <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                        Robinson A. Wadu, ST., MT <br />
                                                        (Politeknik Negeri Kupang)
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Teknik Okulasi Tanaman <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                                        <div class="row" style="padding-top:20px">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J21.jpg" alt="" class="img-fluid">

                                                </div>
                                                <h6 style="font-weight:bold; text-align:center; padding-top:10px">
                                                    Olivina S. Messakh,SP.,MP <br />
                                                    (Politeknik Pertanian Negeri Kupang)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J22.jpg" alt="" class="img-fluid">
                                                </div>
                                                <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                    Dwi Rahmawati, SP.,M.P <br />
                                                    (Politeknik Negeri Jember)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/j23.jpg" alt="" class="img-fluid">

                                                    <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                        Yohanes Lalang <br />
                                                        (Ketua P4S Abdi Laboratus)
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">
                                        Teknik Proses Karkas Ayam <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                                    </div>
                                    <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                                        <div class="row" style="padding-top:20px">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J31.jpg" alt="" class="img-fluid">

                                                </div>
                                                <h6 style="font-weight:bold; text-align:center; padding-top:10px">
                                                    Dr. Cytske Sabuna, S.Pt., M.Si <br />
                                                    (Politeknik Pertanian Negeri Kupang)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J32.jpg" alt="" class="img-fluid">
                                                </div>
                                                <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                    Dr. drh. Dwi D. Putri., M.Si <br />
                                                    (Politeknik Negeri Lampung)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/j33.jpg" alt="" class="img-fluid">
                                                    <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                        Wenslaus Watu <br />
                                                        (Manajer Divisi Butcher LIPPO PLAZA)
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Teknik Proses Fillet Ikan<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                                        <div class="row" style="padding-top:20px">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J41.jpg" alt="" class="img-fluid">

                                                </div>
                                                <h6 style="font-weight:bold; text-align:center; padding-top:10px">
                                                    Naema Bora, STP., M.Si <br />
                                                    (Politeknik Pertanian Negeri Kupang)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J42.jpg" alt="" class="img-fluid">
                                                </div>
                                                <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                    Obyn I. Pumpente S.Pi,M.Si <br />
                                                    (Politeknik Negeri Nusa Utara)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/j43.jpg" alt="" class="img-fluid">
                                                    <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                        Breva Rizqi D. N <br />
                                                        (GM PT. Matsyaraja A. Stambhapura)
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Penyuluhan Pertanian <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                                        <div class="row" style="padding-top:20px">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J51.jpg" alt="" class="img-fluid">

                                                </div>
                                                <h6 style="font-weight:bold; text-align:center; padding-top:10px">
                                                    Prof. Dr. Ir. Rupa Mateus, M.Si <br />
                                                    (Politeknik Pertanian Negeri Kupang)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J52.jpg" alt="" class="img-fluid">
                                                </div>
                                                <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                    Mohammad I.Hilal S.St., M.St <br />
                                                    (Politeknik Negeri Banyuwangi)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/j53.jpg" alt="" class="img-fluid">
                                                    <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                        Petrus D. N. Dawa Djabur, SP <br />
                                                        (Penyuluh Pertanian)
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Desain Alat dan Mesin (ALSIN) Pertanian dengan AutoCAD <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                                        <div class="row" style="padding-top:20px">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J61.jpg" alt="" class="img-fluid">

                                                </div>
                                                <h6 style="font-weight:bold; text-align:center; padding-top:10px">
                                                    Alexius Leonardo Johanis, S.T., M.T <br />
                                                    (Politeknik Negeri Kupang)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J62.jpg" alt="" class="img-fluid">
                                                </div>
                                                <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                    Dr. Edi Syafri, S.T., M.Si <br />
                                                    (Politeknik Pertanian Negeri Payakumbuh)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/j63.jpg" alt="" class="img-fluid">
                                                    <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                        Edwin Ariesto Umbu Malahina,S.Kom., MT.,CIP.,C.ACS <br />
                                                        Founder dan Owner DINEGO (Startup : Ecommerce Ads & Socia)
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>


                                <li>
                                    <div data-bs-toggle="collapse" href="#faq7" class="collapsed question">Formulasi Pakan Ternak <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq7" class="collapse" data-bs-parent=".faq-list">
                                        <div class="row" style="padding-top:20px">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J71.jpg" alt="" class="img-fluid">

                                                </div>
                                                <h6 style="font-weight:bold; text-align:center; padding-top:10px">
                                                    Catootjie L. Nalle, Ph.D <br />
                                                    (Politeknik Pertanian Negeri Kupang)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J72.jpg" alt="" class="img-fluid">
                                                </div>
                                                <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                    Dwi Ahmad Priyadi,S.Pt., M.Sc <br />
                                                    (Politeknik Negeri Banyuwangi)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/j73.jpg" alt="" class="img-fluid">
                                                    <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                        Rip Krishaditersanto,S.Pt.,M.Si <br />
                                                        (Balai Besar Pelatihan Peternakan Kupang)
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq8" class="collapsed question">Formulasi Pakan Ikan <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq8" class="collapse" data-bs-parent=".faq-list">
                                        <div class="row" style="padding-top:20px">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J81.jpg" alt="" class="img-fluid">

                                                </div>
                                                <h6 style="font-weight:bold; text-align:center; padding-top:10px">
                                                    Dr. Theresia Koni S.Pt.,M.Si <br />
                                                    (Politeknik Pertanian Negeri Kupang)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J82.jpg" alt="" class="img-fluid">
                                                </div>
                                                <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                    Jetti T. Saselah, S.Pi., M.Si <br />
                                                    (Politeknik Negeri Nusa Utara)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/j83.jpg" alt="" class="img-fluid">
                                                    <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                        Asriati Djonu,S.Pi.,MP <br />
                                                        (Praktisi - Universitas Nusa Cendana)
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>


                                <li>
                                    <div data-bs-toggle="collapse" href="#faq9" class="collapsed question">Packing Benih Ikan <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq9" class="collapse" data-bs-parent=".faq-list">
                                        <div class="row" style="padding-top:20px">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J91.jpg" alt="" class="img-fluid">

                                                </div>
                                                <h6 style="font-weight:bold; text-align:center; padding-top:10px">
                                                    Muhammad Panuntun, A.Md.Pi <br />
                                                    (Politeknik Pertanian Negeri Kupang)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J92.jpg" alt="" class="img-fluid">
                                                </div>
                                                <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                    Dr. Ir. Muhammad Ikbal Illjas., M.Sc <br />
                                                    (Politeknik Pertanian Negeri Pangkajene Kepulauan)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/j93.jpg" alt="" class="img-fluid">
                                                    <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                        Marselinus Blitanagy, SM <br />
                                                        (Aneka Anugerah Aquaculture)
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq10" class="collapsed question">Teknik Pembuatan Bakso Ikan <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq10" class="collapse" data-bs-parent=".faq-list">
                                        <div class="row" style="padding-top:20px">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J101.jpg" alt="" class="img-fluid">

                                                </div>
                                                <h6 style="font-weight:bold; text-align:center; padding-top:10px">
                                                    Zulianatul Hidayah, STP., M.Sc <br />
                                                    (Politeknik Pertanian Negeri Kupang)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J102.jpg" alt="" class="img-fluid">
                                                </div>
                                                <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                    Ir. Fien Sudirjo,M.Sc <br />
                                                    (Politeknik Perikanan Negeri Tual)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/j103.jpg" alt="" class="img-fluid">
                                                    <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                        Etni Ira Risva Banunu, S.Si <br />
                                                        (Kelompok Substansi Infokom-Balai POM Kupang)
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq11" class="collapsed question">Survey dan Pemetaan <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq11" class="collapse" data-bs-parent=".faq-list">
                                        <div class="row" style="padding-top:20px">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J111.jpg" alt="" class="img-fluid">

                                                </div>
                                                <h6 style="font-weight:bold; text-align:center; padding-top:10px">
                                                    Melkianus Pobas, S.T., M.Sc <br />
                                                    (Politeknik Pertanian Negeri Kupang)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J112.jpg" alt="" class="img-fluid">
                                                </div>
                                                <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                    Husmul Beze, S.Hut., M.Si <br />
                                                    (Politeknik Negeri Samarinda)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/j113.jpg" alt="" class="img-fluid">
                                                    <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                        Umbu Deny Esau Hawula,S.Hut., M.Ling <br />
                                                        (BPKH Kupang)
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq12" class="collapsed question">Teknik Pengambilan Sampel Darah Ayam <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq12" class="collapse" data-bs-parent=".faq-list">
                                        <div class="row" style="padding-top:20px">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J121.jpg" alt="" class="img-fluid">

                                                </div>
                                                <h6 style="font-weight:bold; text-align:center; padding-top:10px">
                                                    Dr.drh.Petrus M. Bulu, BVSc,MVSc <br />
                                                    (Politeknik Pertanian Negeri Kupang)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J122.jpg" alt="" class="img-fluid">
                                                </div>
                                                <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                    drh. Ulva Mohtar Lutfi <br />
                                                    (Politeknik Pertanian Negeri Payakumbuh)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/j123.jpg" alt="" class="img-fluid">
                                                    <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                        Drh. Hilda S.D Berek, M.Sc <br />
                                                        (UPTD Veteriner Disnak Provinsi NTT)
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq13" class="collapsed question">Sortasi Biji Kopi <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq13" class="collapse" data-bs-parent=".faq-list">
                                        <div class="row" style="padding-top:20px">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J131.jpg" alt="" class="img-fluid">

                                                </div>
                                                <h6 style="font-weight:bold; text-align:center; padding-top:10px">
                                                    Krisna Setiawan, S.P., M.Sc <br />
                                                    (Politeknik Pertanian Negeri Kupang)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J132.jpg" alt="" class="img-fluid">
                                                </div>
                                                <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                    Ir. Ujang Setyoko,M.P <br />
                                                    (Politeknik Negeri Jember)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/j133.jpg" alt="" class="img-fluid">
                                                    <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                        Muhamad Fikri Shobari <br />
                                                        (Founder Nemukebun Kopi)
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq14" class="collapsed question">Kontes Handling Ternak <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq14" class="collapse" data-bs-parent=".faq-list">
                                        <div class="row" style="padding-top:20px">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J141.jpg" alt="" class="img-fluid">

                                                </div>
                                                <h6 style="font-weight:bold; text-align:center; padding-top:10px">
                                                    Alfred Bait Saubaki, S.Sos <br />
                                                    (Politeknik Pertanian Negeri Kupang)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/J142.jpg" alt="" class="img-fluid">
                                                </div>
                                                <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                    Riko Noviadi,S.Pt.,M.Pt <br />
                                                    (Politeknik Negeri Lampung)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="speaker">
                                                    <img src="landing/assets/img/speakers/j143.jpg" alt="" class="img-fluid">
                                                    <h6 style="font-weight: bold; text-align: center; padding-top: 10px">
                                                        Erfan Kustiawan, S.Pt., M.P <br />
                                                        (Politeknik Negeri Jember)
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>

                        </div>
                    </div>

                </div>
            </section>

            <section class="section category" aria-label="category" id="kordinator">
                <div class="container">

                    <div class="section-header">
                        <h2 class="h2 section-title">Kordinator AITEC 6</h2>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="speaker">
                                <img src="landing/assets/img/speakers/1.jpg" alt="" class="img-fluid">
                                <div class="details" style="padding-bottom:5px">
                                    <h3 style="font-size:large">
                                        Dr. Melkianus Deddy Randu, S.Pt., M.Si<br> Koordinator Lomba dan Juri
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="speaker">
                                <img src="landing/assets/img/speakers/2.jpg" alt="" class="img-fluid">
                                <div class="details" style="padding-bottom:5px">
                                    <h3 style="font-size:large">
                                        Catootjie L. Nalle, S.Pt., M.Agr.St, Ph.D <br> Koordinator Bidang Inovasi Pertanian
                                    </h3>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="speaker">
                                <img src="landing/assets/img/speakers/3.jpg" alt="" class="img-fluid">
                                <div class="details" style="padding-bottom:5px">
                                    <h3 style="font-size:large">
                                        Agrippina Agnes Bele, STP., M.APCM <br> Koordinator Bidang Proses Fillet Ikan
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="speaker">
                                <img src="landing/assets/img/speakers/4.jpg" alt="" class="img-fluid">
                                <div class="details" style="padding-bottom:5px">
                                    <h3 style="font-size:large">
                                        Andi Yumina Ninu, S.Pt., M.Si <br> Koordinator Bidang Teknik Karkas Ayam
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="speaker">
                                <img src="landing/assets/img/speakers/5.jpg" alt="" class="img-fluid">
                                <div class="details" style="padding-bottom:5px">
                                    <h3 style="font-size:large">
                                        Ferdinan S. Suek, S. Pt. M.Si <br> Koordinator Handling Ternak
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="speaker">
                                <img src="landing/assets/img/speakers/6.jpg" alt="" class="img-fluid">
                                <div class="details" style="padding-bottom:5px">
                                    <h3 style="font-size:large">
                                        Kurinus Tonis, A.Md., S.P <br> Koordinator Bidang Okulasi Tanaman
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="speaker">
                                <img src="landing/assets/img/speakers/7.jpg" alt="" class="img-fluid">
                                <div class="details" style="padding-bottom:5px">
                                    <h3 style="font-size:large">
                                        Stefanus Markus Kuang, STP., M.Sc <br> Koordinator Desain Alat dan Mesin Pertanian dengan AutoCad
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="speaker">
                                <img src="landing/assets/img/speakers/8.jpg" alt="" class="img-fluid">
                                <div class="details" style="padding-bottom:5px">
                                    <h3 style="font-size:large">
                                        Wely Y Pello, S.ST., M.Si <br> Koordinator Penyuluhan Pertanian
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="speaker">
                                <img src="landing/assets/img/speakers/9.jpg" alt="" class="img-fluid">
                                <div class="details" style="padding-bottom:5px">
                                    <h3 style="font-size:large">
                                        Laurentius D. W. Wardhana, S.Hut., M.Si <br> Koordinator Survey Pemetaan Lahan
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="speaker">
                                <img src="landing/assets/img/speakers/10.jpg" alt="" class="img-fluid">
                                <div class="details" style="padding-bottom:5px">
                                    <h3 style="font-size:large">
                                        Eny Idayati, STP., M.Sc <br> Koordinator Pengolahan Bakso Ikan
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="speaker">
                                <img src="landing/assets/img/speakers/11.jpg" alt="" class="img-fluid">
                                <div class="details" style="padding-bottom:5px">
                                    <h3 style="font-size:large">
                                        Dr. drh. Andrijanto H. Angi, M.Si <br> Koordinator Teknik Pengambilan Sampel Darah Unggas
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="speaker">
                                <img src="landing/assets/img/speakers/12.jpg" alt="" class="img-fluid">
                                <div class="details" style="padding-bottom:5px">
                                    <h3 style="font-size:large">
                                        Senny J. Bunga, ST., M.Sc., PhD <br> Koordinator Sortasi Biji Kopi
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="speaker">
                                <img src="landing/assets/img/speakers/13.jpg" alt="" class="img-fluid">
                                <div class="details" style="padding-bottom:5px">
                                    <h3 style="font-size:large">
                                        Wahyuni Fanggitasik, S.Pi., M.Si <br> Koordinator Packing Benih Ikan
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="speaker">
                                <img src="landing/assets/img/speakers/14.jpg" alt="" class="img-fluid">
                                <div class="details" style="padding-bottom:5px">
                                    <h3 style="font-size:large">
                                        Suhartini S.Tr.Pt <br> Koordinator Formulasi Pakan Ternak dan Ikan
                                    </h3>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </section>



            <section class="section course" id="jadwal" aria-label="course">
                <div class="container">

                    <div class="section-header">
                        <h2 class="h2 section-title">Jadwal Kompetisi AITEC 6</h2>

                    </div>

                    <ul class="nav nav-tabs" role="tablist" data-aos="fade-up" data-aos-delay="100">
                        <li class="nav-item">
                            <a class="nav-link active" href="#day-1" role="tab" data-bs-toggle="tab">Inovasi Teknologi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#day-2" role="tab" data-bs-toggle="tab">Kontes Vokasi</a>
                        </li>

                    </ul>



                    <div class="tab-content row justify-content-center" data-aos="fade-up" data-aos-delay="200">

                        <!-- Schdule Day 1 -->
                        <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">

                            <div class="row schedule-item">
                                <div class="col-md-4"><time>26 Agustus - 18 September 2024</time></div>
                                <div class="col-md-8">
                                    <h4>Pendaftaran peserta dan validasi oleh panitia</h4>
                                    <p>Pendaftaran secara online pada laman https://aitec-lampung.polinela.ac.id </p>
                                </div>
                            </div>

                            <div class="row schedule-item">
                                <div class="col-md-4"><time>26 Agustus - 18 September 2024</time></div>
                                <div class="col-md-8">
                                    <h4>Upload Proposal Lomba (tahap 1)</h4>
                                    <p>Upload proposal secara online pada laman https://aitec-lampung.polinela.ac.id </p>
                                </div>
                            </div>

                            <div class="row schedule-item">
                                <div class="col-md-4"><time>20 -27 September 2024</time></div>
                                <div class="col-md-8">
                                    <h4>Seleksi Proposal <span style="font-style:italic">(Desk Evaluation)</span></h4>
                                    <p>Seleksi proposal secara online pada laman https://aitec-lampung.polinela.ac.id </p>
                                </div>
                            </div>

                            <div class="row schedule-item">
                                <div class="col-md-4"><time>30 September 2023</time></div>
                                <div class="col-md-8">
                                    <h4>Pengumuman Hasil Seleksi Proposal</h4>
                                    <p>Pengumuman dilihat secara online pada laman https://aitec-lampung.polinela.ac.id </p>
                                </div>
                            </div>

                            <div class="row schedule-item">
                                <div class="col-md-4"><time> 01 -07 oktober 2024</time></div>
                                <div class="col-md-8">
                                    <h4>Upload video (tahap 2)</h4>
                                    <p>Upload video secara online pada laman https://aitec-lampung.polinela.ac.id </p>
                                </div>
                            </div>

                            <div class="row schedule-item">
                                <div class="col-md-4"><time>4 Oktober 2023</time></div>
                                <div class="col-md-8">
                                    <h4>Seleksi Video </h4>
                                    <p>Seleksi video secara online pada laman https://aitec-lampung.polinela.ac.id </p>
                                </div>
                            </div>

                            <div class="row schedule-item">
                                <div class="col-md-4"><time>6 Oktober 2023</time></div>
                                <div class="col-md-8">
                                    <h4>Pengumuman Hasil Seleksi Video</h4>
                                    <p>Pengumuman dilihat secara online pada laman https://aitec-lampung.polinela.ac.id </p>
                                </div>
                            </div>

                            <div class="row schedule-item">
                                <div class="col-md-4"><time>9 Oktober 2023</time></div>
                                <div class="col-md-8">
                                    <h4>Undangan Peserta yang dinyatakan LOLOS Tahap 2 menuju babak FINAL</h4>
                                    <p>Undangan didownload pada laman https://aitec-lampung.polinela.ac.id </p>
                                </div>
                            </div>

                            <div class="row schedule-item">
                                <div class="col-md-4"><time>14 - 18 Oktober 2023</time></div>
                                <div class="col-md-8">
                                    <h4>Pembayaran Registrasi Finalis</h4>
                                    <p>Bukti pembayaran diupload pada laman https://aitec-lampung.polinela.ac.id </p>
                                </div>
                            </div>

                            <div class="row schedule-item">
                                <div class="col-md-4"><time>19 Oktober 2023</time></div>
                                <div class="col-md-8">
                                    <h4><span style="font-style:italic;font-weight:bold">Technical Meeting Daring Finalis</span></h4>
                                </div>
                            </div>

                            <div class="row schedule-item">
                                <div class="col-md-4"><time>26 - 27 Oktober 2023</time></div>
                                <div class="col-md-8">
                                    <h4>BABAK FINAL</h4>
                                    <p>Pelaksanaan secara Luring di Kampus POLITEKNIK PERTANIAN NEGERI KUPANG</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Schdule Day 1 -->
                        <!-- Schdule Day 2 -->
                        <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-2">

                            <div class="row schedule-item">
                                <div class="col-md-4"><time>1 - 10 September 2023</time></div>
                                <div class="col-md-8">
                                    <h4>Pendaftaran peserta dan validasi oleh panitia</h4>
                                    <p>Pendaftaran secara online pada laman https://aitec-lampung.polinela.ac.id </p>
                                </div>
                            </div>

                            <div class="row schedule-item">
                                <div class="col-md-4"><time>11 - 14 September 2023</time></div>
                                <div class="col-md-8">
                                    <h4>Pendaftaran Mata Lomba</h4>
                                    <p>Pendaftaran mata lomba secara online pada laman https://aitec-lampung.polinela.ac.id </p>
                                </div>
                            </div>

                            <div class="row schedule-item">
                                <div class="col-md-4"><time>15 September 2023</time></div>
                                <div class="col-md-8">
                                    <h4><span style="font-style:italic;font-weight:bold">Technical Meeting </span> Daring Babak Penyisihan</h4>
                                </div>
                            </div>

                            <div class="row schedule-item">
                                <div class="col-md-4"><time>21 - 23 September 2023</time></div>
                                <div class="col-md-8">
                                    <h4>Presentasi Secara Daring Melalui Zoom</h4>
                                </div>
                            </div>

                            <div class="row schedule-item">
                                <div class="col-md-4"><time>23 September 2023 s/d 2 Oktober 2023</time></div>
                                <div class="col-md-8">
                                    <h4>Upload Video Seleksi</h4>
                                    <p>Upload video secara online pada laman https://aitec-lampung.polinela.ac.id </p>
                                </div>
                            </div>

                            <div class="row schedule-item">
                                <div class="col-md-4"><time>4 Oktober 2023</time></div>
                                <div class="col-md-8">
                                    <h4>Seleksi Video </h4>
                                    <p>Seleksi video secara online pada laman https://aitec-lampung.polinela.ac.id </p>
                                </div>
                            </div>

                            <div class="row schedule-item">
                                <div class="col-md-4"><time>6 Oktober 2023</time></div>
                                <div class="col-md-8">
                                    <h4>Pengumuman Hasil Seleksi Video</h4>
                                    <p>Pengumuman dilihat secara online pada laman https://aitec-lampung.polinela.ac.id </p>
                                </div>
                            </div>

                            <div class="row schedule-item">
                                <div class="col-md-4"><time>9 Oktober 2023</time></div>
                                <div class="col-md-8">
                                    <h4>Undangan Peserta yang dinyatakan LOLOS Tahap 2 menuju babak FINAL</h4>
                                    <p>Undangan didownload pada laman https://aitec-lampung.polinela.ac.id </p>
                                </div>
                            </div>

                            <div class="row schedule-item">
                                <div class="col-md-4"><time>14 - 18 Oktober 2023</time></div>
                                <div class="col-md-8">
                                    <h4>Pembayaran Registrasi Finalis</h4>
                                    <p>Bukti pembayaran diupload pada laman https://aitec-lampung.polinela.ac.id </p>
                                </div>
                            </div>

                            <div class="row schedule-item">
                                <div class="col-md-4"><time>23 Oktober 2023</time></div>
                                <div class="col-md-8">
                                    <h4><span style="font-style:italic;font-weight:bold">Technical Meeting Daring Finalis</span></h4>
                                </div>
                            </div>

                            <div class="row schedule-item">
                                <div class="col-md-4"><time>26 - 27 Oktober 2023</time></div>
                                <div class="col-md-8">
                                    <h4>BABAK FINAL</h4>
                                    <p>Pelaksanaan secara Luring di Kampus POLITEKNIK PERTANIAN NEGERI KUPANG</p>
                                </div>
                            </div>

                        </div>
                        <!-- End Schdule Day 2 -->
                    </div>

                </div>
            </section>

            <section class="section category" aria-label="category" id="lokasi">
                <div class="container">

                    <div class="section-header">
                        <h2 class="h2 section-title">Lokasi Kegiatan Kompetisi AITEC 6</h2>

                        <div class="row g-0">
                            <div class="col-lg-6 venue-map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1963.6755593961552!2d123.67044116575296!3d-10.152087730498591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c568398f844fbe1%3A0x56f55f4db5373e62!2sPoliteknik%20Pertanian%20Negeri%20Kupang!5e0!3m2!1sid!2sid!4v1689958162478!5m2!1sid!2sid" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>

                            <div class="col-lg-6 venue-info">
                                <div class="row justify-content-center">
                                    <div class="col-11 col-lg-8 position-relative">
                                        <h3>Politeknik Negeri Lampung</h3>
                                        <p>
                                            Aku Belajar, Aku Terapkan dan Aku Sejahtera.<br />
                                            <span style="font-style:italic;color:lightskyblue">
                                                (Learn, Practice and be Rich)
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
            </section>


            <section class="section course" id="gallery" aria-label="course">
                <div class="container">

                    <div class="section-header">
                        <h2 class="h2 section-title">Gallery</h2>
                        <p>Dokumentasi Kegiatan AITeC VI di Politeknik Pertanian Negeri Lampung</p>
                    </div>
                </div>

                <div class="gallery-slider swiper text-aligin:center">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><a href="landing/assets/images/gallery/1.jpeg" class="gallery-lightbox"><img src="landing/assets/images/gallery/1.jpeg" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="landing/assets/images/gallery/2.jpeg" class="gallery-lightbox"><img src="landing/assets/images/gallery/2.jpeg" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="landing/assets/images/gallery/3.jpeg" class="gallery-lightbox"><img src="landing/assets/images/gallery/3.jpeg" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="landing/assets/images/gallery/4.jpeg" class="gallery-lightbox"><img src="landing/assets/images/gallery/4.jpeg" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="landing/assets/img/gallery/5.jpg" class="gallery-lightbox"><img src="landing/assets/img/gallery/5.jpg" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="landing/assets/img/gallery/6.jpg" class="gallery-lightbox"><img src="landing/assets/img/gallery/6.jpg" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="landing/assets/img/gallery/7.jpg" class="gallery-lightbox"><img src="landing/assets/img/gallery/7.jpg" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="landing/assets/img/gallery/8.jpg" class="gallery-lightbox"><img src="landing/assets/img/gallery/8.jpg" class="img-fluid" alt=""></a></div>


                        <div class="swiper-slide"><a href="landing/assets/img/gallery/9.jpg" class="gallery-lightbox"><img src="landing/assets/img/gallery/9.jpg" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="landing/assets/img/gallery/10.jpg" class="gallery-lightbox"><img src="landing/assets/img/gallery/10.jpg" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="landing/assets/img/gallery/11.jpg" class="gallery-lightbox"><img src="landing/assets/img/gallery/11.jpg" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="landing/assets/img/gallery/12.jpg" class="gallery-lightbox"><img src="landing/assets/img/gallery/12.jpg" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="landing/assets/img/gallery/13.jpg" class="gallery-lightbox"><img src="landing/assets/img/gallery/13.jpg" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="landing/assets/img/gallery/14.jpg" class="gallery-lightbox"><img src="landing/assets/img/gallery/14.jpg" class="img-fluid" alt=""></a></div>
                    </div>
                    <div class="swiper-pagination"></div>

                </div>
            </section>

            



            <section class="video has-bg-image" aria-label="video" style="background-image: url('landing/assets/images/video-bg.png')">
                <div class="container">
                    <div class="video-card">
                        <div class="video-banner img-holder has-after" style="--width: ; --height: ">
                            <video id="vid1" width="970" height="550" loading="lazy" class="img-cover">
                                <source src="landing/assets/images/vid1.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <button class="play-btn" aria-label="play video" onclick="playVideo()">
                                <ion-icon name="play" aria-hidden="true"></ion-icon>
                            </button>
                        </div>
                        <img src="./assets/images/video-shape-1.png" width="1089" height="605" loading="lazy" alt="" class="shape video-shape-1" />
                        <img src="./assets/images/video-shape-2.png" width="158" height="174" loading="lazy" alt="" class="shape video-shape-2" />
                    </div>
                </div>
            </section>

        </article>
    </main>

    <!-- 
    - #FOOTER
  -->

    <footer class="footer" style="background-image: url('landing/assets/images/footer-bg.png')" id="hubungi">
        <div class="footer-top section">
                    <div class="section-header">
                        <h2 class="h2 section-title">Hubungi Kami</h2>
                    </div>
            <div class="container grid-list">
                <div class="footer-brand">
                    <a href="#" class="logo">
                        <img src="landing/assets/images/A1.png" width="162" height="50" alt="EduWeb logo" />
                    </a>

                    <p class="footer-brand-text">
                        
                                <h3>Alamat</h3>
                                <address>Jl. Soekarno Hatta No.10, Rajabasa Raya, Kec. Rajabasa, Kota Bandar Lampung, Lampung</address>
                        
                    </p>


                    <div class="wrapper">
                        <span class="span">Call:</span>

                        <a href="tel:+011234567890" class="footer-link">+01 123 4567 890</a>
                    </div>

                    <div class="wrapper">
                        <span class="span">Email:</span>

                        <a href="mailto:info@eduweb.com" class="footer-link">aitecVILampung@gmail.com</a>
                    </div>
                </div>

                <ul class="footer-list">
                    <li>
                        <p class="footer-list-title">Nomor Telepon</p>
                    </li>

                    <li>
                        <a href="tel:+6281290056900">Laurens : 081339442556 (Ketua)</a>
                    </li>

                    <li>
                    <a href="tel:+6281290056900">Dina TK : 081290056900 (Sekretaris)</a>
                    </li>

                    <li>
                    <a href="tel:+620113820891">Micha : 08113820891 (Bendahara)</a>
                    </li>

                    <li>
                    <a href="tel:+6281237942020">Romi : 081237942020 (IT)</a>
                    </li>

                    <li>
                    <a href="tel:+6281237942020">Robin : 08113837387 (IT)</a>
                    </li>

                    <li>
                    <a href="tel:+6281237942020">Xaver : 081227778862 (Humas)</a>
                    </li>
                </ul>

                <ul class="footer-list">
                    <li>
                        <p class="footer-list-title">Links</p>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Contact Us</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Gallery</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">News & Articles</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">FAQ's</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Sign In/Registration</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Coming Soon</a>
                    </li>
                </ul>

                <div class="footer-list">
                    <p class="footer-list-title">Contacts</p>

                    <p class="footer-list-text">
                        Enter your email address to register to our newsletter
                        subscription
                    </p>

                    <form action="" class="newsletter-form">
                        <input type="email" name="email_address" placeholder="Your email" required class="input-field" />

                        <button type="submit" class="btn has-before">
                            <span class="span">Subscribe</span>

                            <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                        </button>
                    </form>

                    <ul class="social-list">
                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-linkedin"></ion-icon>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-twitter"></ion-icon>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-youtube"></ion-icon>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <p class="copyright"><?= date('Y'); ?> &copy; Aitec VI <a href="polinela" class="copyright-link">Politeknik Negeri Lampung</a></p>
            </div>
        </div>
    </footer>

    <!-- 
    - #BACK TO TOP
  -->

    <a href="#top" class="back-top-btn" aria-label="back top top" data-back-top-btn>
        <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
    </a>

    <!-- 
    - custom js link
  -->
    <script src="landing/assets/js/script.js" defer></script>

    <!-- 
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const navbarItems = document.querySelectorAll(".navbar-item");

            // Event listener untuk item dropdown
            navbarItems.forEach(item => {
                item.addEventListener("click", function(event) {
                    event.stopPropagation(); // Mencegah event bubbling
                    const dropdown = this.querySelector(".dropdown-content");
                    if (dropdown) {
                        dropdown.classList.toggle("active");
                        // Menutup dropdown lain saat dropdown ini dibuka
                        navbarItems.forEach(otherItem => {
                            if (otherItem !== item) {
                                const otherDropdown = otherItem.querySelector(".dropdown-content");
                                if (otherDropdown) {
                                    otherDropdown.classList.remove("active");
                                }
                            }
                        });
                    }
                });
            });

            // Menutup dropdown jika klik di luar
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.navbar-item')) {
                    navbarItems.forEach(item => {
                        const dropdown = item.querySelector(".dropdown-content");
                        if (dropdown) {
                            dropdown.classList.remove("active");
                        }
                    });
                }
            });
        });



        function playVideo() {
            var video = document.getElementById('vid1');
            var playButton = document.querySelector('.play-btn');
            if (video.paused) {
                video.play();
                playButton.style.display = 'none';
            } else {
                video.pause();
                playButton.style.display = 'block';
            }
        }
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.gallery-slider', {
        slidesPerView: 3,
        spaceBetween: 20,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 4,
            },
            1024: {
                slidesPerView: 5,
            },
        }
    });
</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
.