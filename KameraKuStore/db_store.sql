-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2022 at 02:18 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(1, 'Rifqi Iqbal Pratama', 'admin                                             ', '81dc9bdb52d04dc20036dbd8313ed055', '085891129040', 'rifqiiqbalpratama21@gmail.com', 'Bojong Mas Indah Blok E2 No.6'),
(8, 'Rifqi', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '08589112020', 'rifqiiqbalpratama232@gmail.com', ''),
(9, 'Zainal', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '08589112055', 'zain123@gmail.com', ''),
(10, 'Nana', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '08589112020', 'nana@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL,
  `category_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`, `category_image`) VALUES
(79, 'Kamera ', 'kategori1658321343.png'),
(80, 'Lensa Kamera', 'kategori1658321333.png'),
(81, 'Microphone & Audio ', 'kategori1658321318.png'),
(82, 'Tripod & Monopod ', 'kategori1658321303.png'),
(83, 'Aksesoris', 'kategori1658321292.png'),
(92, 'Memory Card', 'kategori1658321256.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_status`, `date_created`) VALUES
(38, 79, 'Canon EOS 3000D Kit EF-S 18-55mm III ', 5299000, '<p>Resolusi 18 Megapixel, Koneksi WiFi, Video Full HD 30fps, Prosesor DIGIC 4+, APS-C CMOS Sensor, 3.0 fps Continuous Shooting, Optical Viewvinder, ISO 100 - 6400 (expand 12800) and Face Detection Focusing</p>\r\n', 'produk1658297641.jpg ', 1, '2022-07-20 06:14:01'),
(39, 79, 'Canon EOS 1500D Kit EF-S 18-55mm IS II ', 7899000, '<p>Resolusi 24 Megapixel, Koneksi WiFi, Video Full HD 30fps, Prosesor DIGIC 4+. APS-C CMOS Sensor. 3.0 fps Continuous Shooting, Optical Viewvinder, ISO 100 - 6400 (expand 12800), Face Detection Focusing</p>\r\n', 'produk1658298090.jpg ', 1, '2022-07-20 06:21:30'),
(41, 80, 'Lensa Canon EF 50mm F/1.8 STM ', 2099000, '<p>EF Mount Lens/Full-Frame Format, Maximum Aperture f/1.8, Optimized Lens Coatings, STM AF Motor Support Movie Servo AF, Manual Focus Override, Metal Lens Mount, Rounded 7-Blade Diaphragm, Minimum Focus Distance 14&quot;</p>\r\n', 'produk1658298775.jpg ', 1, '2022-07-20 06:32:55'),
(42, 80, 'Lensa Sony FE 50mm F1.8 ', 3849000, '<p>Prime lens, Max Format size 35mm FF, Lens mount Sony FE, Maximum aperture F1.8, Minimum aperture F22, Autofocus and Filter thread 49mm</p>\r\n', 'produk1658321561.jpg', 1, '2022-07-20 06:36:40'),
(45, 79, 'Canon EOS 200D Mark II Kit 18-55mm ', 12899000, '<p>Sensor CMOS APS-C 24,1MP, Dual Pixel CMOS AF, Video 4K, DIGIC 8, 3.975 pilihan posisi fokus (Live View), Creative Assist, Creative Filters dan Smooth Skin, Eye Detection AF, (One Shot &amp; Servo AF &ndash; Live View)</p>\r\n ', 'produk1658507439.jpg ', 1, '2022-07-22 16:30:39'),
(46, 79, 'Canon EOS 200D Kit 18-55mm ', 9949000, '<p>Desain ringkas dan ringan, Fokus cepat pada mode Tampilan Langsung dengan AF CMOS Piksel Ganda, Layar Sentuh LCD berbagai sudut, Wi-Fi / NFC / Bluetooth hemat energi</p>\r\n ', 'produk1658507662.jpg ', 1, '2022-07-22 16:34:22'),
(47, 79, 'Canon EOS 80D Kit EF-S 18-55mm IS STM ', 17950000, '<p>24 MP APS-C CMOS + DIGIC 6, AF 45 titik semua tipe silang,&nbsp;AF CMOS Piksel Ganda</p>\r\n ', 'produk1658507770.jpg ', 1, '2022-07-22 16:36:10'),
(48, 79, 'Canon EOS 90D Kit 18-135mm IS USM ', 27299000, '<p>33MP - APS-C CMOS Sensor, ISO 100 - 25600, 3 Fully Articulated Screen, Optical (pentaprism) viewfinder, 11.0 fps continuous shooting, 4K - 3840 x 2160 video resolution, Built-in Wireless, 701g. 141 x 105 x 77 mm, Weather Sealed Body</p>\r\n ', 'produk1658507924.jpg ', 1, '2022-07-22 16:38:44'),
(49, 79, 'Canon EOS 90D Body ', 20499000, '<p>33MP - APS-C CMOS Sensor, ISO 100 - 25600, 3 Fully Articulated Screen, Optical (pentaprism) viewfinder, 11.0 fps continuous shooting, 4K - 3840 x 2160 video resolution, Built-in Wireless, 701g. 141 x 105 x 77 mm, Weather Sealed Body</p>\r\n ', 'produk1658508065.jpg ', 1, '2022-07-22 16:41:05'),
(50, 79, 'Canon EOS 80D Body ', 15999000, '<p>24 MP APS-C CMOS + DIGIC 6, AF 45 titik semua tipe silang, AF CMOS Piksel Ganda</p>\r\n ', 'produk1658508275.jpg ', 1, '2022-07-22 16:44:35'),
(51, 80, 'Lensa Sony E 35mm F1.8 OSS ', 4049000, '<p>Prime lens, Max Format size APS-C / DX, Lens mount Sony E, Maximum aperture F1.8, Minimum aperture F22, Autofocus, Filter thread 49mm</p>\r\n ', 'produk1658508586.jpg ', 1, '2022-07-22 16:49:46'),
(52, 80, 'Lensa Sony E 55-210mm F/4.5-6.3 OSS E-Mount ', 4059000, '<p>Zoom lens, Max Format size APS-C / DX, Lens mount Sony E, Maximum aperture F4.5-6.3, Minimum aperture F22-32, Autofocus, Filter thread 49mm</p>\r\n ', 'produk1658508869.jpg ', 1, '2022-07-22 16:54:29'),
(53, 80, 'Lensa Fujifilm Fujinon XF 35mm F/1.4 R ', 8999000, '<p>Prime lens, Max Format size APS-C / DX, Lens mount Fujifilm X, Maximum aperture F1.4, Minimum aperture F16, Autofocus, Filter thread 52mm</p>\r\n ', 'produk1658508985.jpg ', 1, '2022-07-22 16:56:25'),
(54, 80, 'Lensa Sony E PZ 18-105mm F4 G OSS ', 6299000, '<p>Zoom Lens, Lens Mount Sony E, Max Format Size APS-C/DX, OSS (Image Stabilizer), Max Aperture F4, Autofocus, Filter thread 72mm</p>\r\n ', 'produk1658509090.jpg ', 1, '2022-07-22 16:58:10'),
(55, 80, 'Lensa Canon EF-S 10-18mm F/4.5-5.6 IS STM ', 5399000, '<p>10-18mm Focal Range, F4.5 - F5.6 Max Aperture, Image Stabilization, Filter Thread: 67mm, Max Format: APS-C / DX, Canon EF-S Mount, Weight: 240g., Diameter: 75mm, Length: 72mm, Min Focus Distance:22m, Max Magnification:15x</p>\r\n ', 'produk1658509218.jpg ', 1, '2022-07-22 17:00:18'),
(56, 80, 'Lensa Sony FE 28mm F2 ', 4579000, '<p>Prime Lens, Max Format Size 35mm FF, Lens Mount Sony FE, Maximum Aperture F2, Minimum Aperture F22, Autofocus, Filter Thread 49mm</p>\r\n ', 'produk1658509333.jpg ', 1, '2022-07-22 17:02:13'),
(57, 92, 'Memory SDHC Sandisk Ultra 16GB 80mb/s ', 79000, '<p>Kecepatan Baca Hingga 80 MB/S Untuk Mengambil Foto Dan Merekam Video Full HD Cocok Untuk Digunakan Pada Smartphone Atau Kamera Kapasitas 16GB Untuk Menyimpan Foto Dan Video Air, Suhu, Kejutan, Dan Bukti Sinar-X</p>\r\n ', 'produk1658509533.jpg ', 1, '2022-07-22 17:05:33'),
(58, 92, 'Memory SDHC Sandisk EXTREME 16GB 90MB/s ', 99000, '<p>Memory Kamera</p>\r\n ', 'produk1658509603.jpg ', 1, '2022-07-22 17:06:43'),
(59, 92, 'Memory SDXC Sandisk Extreme Pro 128GB 170MB/S ', 635000, '<p>28GB Storage Capacity UHS-I / V30 / U3 / Class 10 Max Read Speed: 170 MB/S Max Write Speed: 90 MB/S</p>\r\n ', 'produk1658509680.jpg ', 1, '2022-07-22 17:08:00'),
(60, 92, 'Memory SDHC Sandisk ULTRA 128GB 100mb/s ', 297500, '<p>Cocok untuk kamera kesayangan Anda</p>\r\n ', 'produk1658509752.jpg ', 1, '2022-07-22 17:09:12'),
(61, 92, 'Memory SDHC Sandisk Extreme 32GB 90mb/s ', 149500, '<p>Kecepatan Baca Hingga 90 MB/S Untuk Mengambil Foto Dan Merekam Video Full HD Hingga 4K Cocok Untuk Digunakan Pada Smartphone Atau Kamera Kapasitas 32GB Untuk Menyimpan Foto Dan Video Air, Suhu, Kejutan, Dan Bukti Sinar-X</p>\r\n ', 'produk1658509810.jpg ', 1, '2022-07-22 17:10:10'),
(62, 92, 'Memory SDHC Sandisk Ultra 32GB 90mb/s ', 185000, '<p>Kapasitas Penyimpanan 32GB UHS-I / Kelas 10 / U1 Kecepatan Baca Maks: 90 MB / S Min Write Speed: 10 MB / S</p>\r\n ', 'produk1658509882.jpg ', 1, '2022-07-22 17:11:22'),
(63, 92, 'Memory SDHC Sandisk Extreme 64GB 150mb/s ', 256000, '<p>Read Speed 150 MB/S Maximum Write Speed 60 MB/S Maximum 4K Ultra HD And Full HD Video Recording Waterproof, Temperature-Proof, Shockproof, And X-Ray Proof RescuePRO Deluxe Software Writeable Label For Easy Identification And Organization Operating Temperature : -13&deg;F To 185&deg;F (-25&deg;C To 85&deg;C) Storage Temperature : -40&deg;F To 185&deg;F (-40&deg;C To 85&deg;C)</p>\r\n ', 'produk1658509964.jpg ', 1, '2022-07-22 17:12:44'),
(64, 92, 'Memory SDHC Sandisk Ultra 16GB 48mb/s ', 100000, '<p>Kecepatan Baca Hingga 48 MB/S Untuk Mengambil Foto Dan Merekam Video Full HD Cocok Untuk Digunakan Pada Smartphone Atau Kamera Kapasitas 16GB Untuk Menyimpan Foto Dan Video Air, Suhu, Kejutan, Dan Bukti Sinar-X</p>\r\n ', 'produk1658510095.jpg ', 1, '2022-07-22 17:14:55'),
(65, 82, 'Somita ST-3110 Tripod ', 126500, '<p>Tripod Somita ST-3110 Hanya Tersedia Warna Hitam. Desainnya Dirancang Dengan Sistem 3 Way Panhead Dan Memiliki 3 Bagian Kaki Yang Berbahan Karet. Tripod Somita ST3110 Mempunyai Bodi Yag Sangat Compact, Ringan Dan Dapat Dilipat Sehingga Memudahkan Anda Membawanya Saat Berpergian Dan Perjalanan.</p>\r\n ', 'produk1658510428.jpg ', 1, '2022-07-22 17:20:28'),
(66, 82, 'Zomei Q666 Tripod ', 765000, '<p>Bahan Aluminium Complete Tripods - Beban Maksimal 10kg - Panjang Maksimal 1530mm - 5 Leg Section - Dengan Center Column - Dengan Drag Control - Sudah Termasuk Ball Head - Arca-Swiss Quick Release Style</p>\r\n ', 'produk1658510518.jpg ', 1, '2022-07-22 17:21:58'),
(67, 82, 'Zomei Q111 Tripod ', 299000, '<p>Tripod Kamera</p>\r\n ', 'produk1658510662.jpg ', 1, '2022-07-22 17:24:22'),
(68, 82, 'Beike Q999H Tripod ', 948000, '<p>Tripod Beike Q999H cocok untuk kamera kesayangan Anda</p>\r\n ', 'produk1658510746.jpg ', 1, '2022-07-22 17:25:46'),
(69, 82, 'Beike Q555P Tripod ', 799000, '<p>Merek : QZSD &nbsp;Model : Q-555 &nbsp;Bahan : Paduan Aluminium &nbsp;Tinggi Maks : 1440mm &nbsp;Tinggi Min : 490mm &nbsp;Diameter Tabung Maks : 25mm &nbsp;Diameter Tabung Min : 13mm &nbsp;Kapasitas Beban Maks : 5kg &nbsp;Tinggi Terlipat : 350mm &nbsp;Bagian : 4 &nbsp;Berat Tripod : 1.48kg</p>\r\n ', 'produk1658510828.jpg ', 1, '2022-07-22 17:27:08'),
(70, 82, 'Takara Rover 77 Light Weight Tripod ', 899000, '<p>Desain Sempurna Dan Cocok Untuk Tugas Berat Support Untuk Semua Kamera Dan Camcorder Support Untuk Vlogging / Bepergian Cocok Juga Untuk Kamera Aksi Dan Smartphone Pan Head Yang Dapat Berputar Pan Head Bisa Dilepas Cocok Untuk Fotografer Profesional / Pribadi Cocok Untuk Studio Indoor / Outdoor Hunting &amp; Travelling Berbadan Aluminium Keras Terdapat Gantungan Bawaan Sehingga Anda Dapat Menggantung Tripod Jika Tidak Menggunakannya</p>\r\n ', 'produk1658510981.jpg ', 1, '2022-07-22 17:29:41'),
(71, 82, 'Somita ST-3520 Tripod ', 200000, '<p>Tripod Kamera</p>\r\n ', 'produk1658511084.jpg ', 1, '2022-07-22 17:31:24'),
(72, 82, 'Takara MT-08 Extendable Mini Tripod ', 79000, '<p>Tripod &amp; Handle Dalam 1, Anda Dapat Mengubahnya Sesuai Keinginan Anda Silicon Handle Tidak Akan Slip/Terpeleset Walaupun Tangan Basah Buckle Detail Pastikan Keamanan Kamera Dan Ponsel Anda, Tidak Akan Jatuh Portable Desain Yang Dapat Diperpanjang Dan Beratnya Mudah Dibawa Kemana Saja 1/4 Interface</p>\r\n ', 'produk1658511139.jpg ', 1, '2022-07-22 17:32:19'),
(73, 81, 'Boya BY-MM1 Cardioid Microphone ', 315000, '<p>- Mikrofon Kamera - Kompatibel Dengan Smartphone, Kamera DSLR, Camcorders, PC Dll - Konstruksi Logam Kasar - Tidak Perlu Baterai - Dilengkapi Windshield Berbulu Profesional</p>\r\n ', 'produk1658511311.jpg ', 1, '2022-07-22 17:35:11'),
(74, 81, 'Boya BY-M1 Omni Directional Lavalier Microphone ', 135000, '<p>Clip-On Mic Untuk Smartphone, DSLR, Camcorder, Audio Recorder, PC Dan Masih Banyak Lainnya - Suara Luar Biasa, Cocok Untuk Presentasi Dan Video Recording Omni-Directional Condenser Microphone - High-Quality Condenser Yang Ideal Untuk Video - Low Handling Noise - Sudah Termasuk Lapel Clip, Foam Windscreen, Adapter 3.5mm Sampai 6.3mm</p>\r\n ', 'produk1658511424.jpg ', 1, '2022-07-22 17:37:04'),
(75, 81, 'Rode Microphone VideoMic ', 1412000, '<p>Kualitas Rekaman Studio - Mikrofon Kondensor - Pola Kutub Super-Cardioid - Daya Baterai 9V - Pemasangan Kejutan Rycote&reg; Lyre&reg; Terintegrasi - Filter Pass Tinggi Dua Langkah (Flat / 80Hz) - Tiga Langkah PAD (0, -10, -20dB) - Konstruksi ABS Yang Diperkuat Dengan Kokoh - Kaca Depan Disertakan - Output Mini-Jack 3,5mm - Dudukan Sepatu Dingin Terintegrasi (Ulir 3/8 &rdquo;)</p>\r\n ', 'produk1658511509.jpg ', 1, '2022-07-22 17:38:29'),
(76, 81, 'Rode Microphone VideoMic GO ', 908000, '<p>Mikrofon Directional Berkualitas Tinggi - Tidak Diperlukan Baterai - Pemasangan Kejutan Rycote&reg; Lyre&reg; Terintegrasi - Mic Paling Ringan Kami Hanya 73g - Konstruksi ABS Yang Diperkuat Dengan Kokoh - Kaca Depan Disertakan - Output Mini-Jack 3,5mm - Dudukan Sepatu Dingin Terintegrasi Dengan Ulir 3/8&rdquo;</p>\r\n ', 'produk1658511587.jpg ', 1, '2022-07-22 17:39:47'),
(77, 81, 'Rode Microphone VideoMic Pro ', 2614000, '<p>Rycote&reg; Lyre&reg; Terpasang Di Kapal - Kapsul Baru Dengan Kebisingan Lebih Rendah Dan Sensitivitas Lebih Tinggi - Menyiarkan Mikrofon Kondensor Kualitas Rekaman - Faktor Bentuk Ringkas (Panjang 150mm / 6 &rdquo;) - Sangat Ringan (85g / 3oz) - Bertenaga Baterai 9V - Penggunaan Lebih Dari 70 Jam (Alkaline) - Pemasangan Kejutan Terintegrasi - Kaca Depan Busa Terintegrasi - Output Mini-Jack Stereo 3,5mm (Dual Mono) - Filter 2 Langkah High Pass (Datar, 80Hz) - Kontrol Level Tiga Posisi (-10dB, 0, + 20dB) - Dudukan Kamera Kamera Dengan Ulir 3/8 &quot;Untuk Pemasangan Boompole Yang Mudah</p>\r\n ', 'produk1658511671.jpg ', 1, '2022-07-22 17:41:11'),
(78, 81, 'Rode NT-USB Microphone ', 3002000, '<p>Mikrofon Studio Berkualitas Tinggi Dengan Kenyamanan Konektivitas USB Pelindung Pop, Dudukan Meja Tripod, Dudukan Cincin, Kantong Penyimpanan, Dan Kabel USB 6m (20 &#39;) Disertakan Colokan Headphone Stereo 3,5 Mm Untuk Pemantauan Tanpa Latensi Kontrol Campuran Langsung Antara Input Mic Dan Output Sumber Kompatibel Dengan Apple&reg; IPad Kompatibel Dengan Kaca Depan Shockmount SMR &amp; Kaca Depan Busa WS2 Garansi Tambahan Dua Tahun Saat Anda Mendaftarkan Mikrofon Anda</p>\r\n ', 'produk1658511732.jpg ', 1, '2022-07-22 17:42:12'),
(79, 81, 'Saramonic SmartMic ', 360000, '<p>Microphone Type: Electric Condenser - Connector: TRRS (3.5mm Jack) - Frequency Response: 35 Hz To 18 KHz - Signal To Noise Ratio: 74dB SPL - Dimensions: 2.8 X 0.6 X 0.5&rdquo; (71.2 X 15.24 X 12.7mm) - Weight: 0.74oz (21g)</p>\r\n ', 'produk1658511834.jpg ', 1, '2022-07-22 17:43:54'),
(80, 81, 'Zoom ZDM-1 Podcast Mic Pack with Headphones ', 1380000, '<p>Desain Dinamis Dan Kokoh Cocok Untuk Penggunaan Sehari-Hari Di Studio Atau Di Lapangan. - Penanganan SPL Tinggi Dan Shockmount Internal Meminimalkan Kebisingan. - Termasuk Dudukan Dudukan Mikrofon Berputar Dan Adaptor Berulir - Sirkuit Humbucking Bawaan Menolak Interferensi Elektromagnetik - Semua Bodi Logam Dan Kisi-Kisi Tahan Untuk Penggunaan Sehari-Hari</p>\r\n ', 'produk1658511908.jpg ', 1, '2022-07-22 17:45:08'),
(81, 83, 'Baterai Fujifilm NP-W126S Original ', 850000, '<p>Baterai Fujifilm NP-W126S Li-Ion Battery Original Fujifilm Indonesia &nbsp;Typ.1260mAh &nbsp;Mln.1200mAh</p>\r\n ', 'produk1658512039.jpg ', 1, '2022-07-22 17:47:19'),
(82, 83, 'Baterai Sony NP-FZ100 Original ', 1215000, '<p>Cocok Untuk Kamera Tipe : - Alpha A9 II - Alpha A9 - Alpha A7R IV - Alpha A7R III - Alpha A7 III - Alpha A6600</p>\r\n ', 'produk1658512171.jpg ', 1, '2022-07-22 17:49:31'),
(83, 83, 'Casell Dual Charger F Series ', 190000, '<p>Spesifikasi : Kompatibel Untuk Baterai Seri F Baterai F550 F570 F770 F970 Mengisi 2 Baterai Sekaligus Menggunakan Kabel USB Ringan Dan Tahan Lama Dimensi 20 &times; 10 &times; 4 Cm Berat 100 Gram</p>\r\n ', 'produk1658512276.jpg ', 1, '2022-07-22 17:51:16'),
(84, 83, 'Charger Sony BC-TRW Original ', 607000, '<p>Pengisi Daya Baterai Isi Daya Melalui Catu Daya AC Kompatibel Dengan Baterai NP-FW50 Periksa Level Status Daya Saat Mengisi Daya Tegangan Universal 100V-240V (50 / 60Hz) Kompatible Dengan Kamera Sony RX100 Mark IV, RX100 Mark III, RX100 Mark II, RX10, A6400, A6500, A6300, A7S Mark II, A7R Mark II, A5100, A7 Mark II, A7 S, A6000, A5000, A7, A7R, Dan Kamera Lainnya Yang Memakai Baterai Tipe NP-FW50</p>\r\n ', 'produk1658512324.jpg ', 1, '2022-07-22 17:52:04'),
(85, 83, 'TetherPlus USB 2.0 Mini B Cable 3 Meter ', 195000, '<p>Kabel USB 2.0 A Male To Mini-B 5 Pin Panjang : 3 Meter Material : Full Tembaga Kompatibel Dengan Banyak Tipe Kamera</p>\r\n ', 'produk1658512441.jpg ', 1, '2022-07-22 17:54:01'),
(86, 83, 'Saramonic SR-C2003 Adapter 3.5mm TRS Female to USB Type C Male Adapter Cable ', 210000, '<p>Konektor USB-C Berkualitas Tinggi Koneksi Jack Audio 3.5mm Transmisi Berkecepatan Tinggi Dan Stabil Sangat Compact Dan Mudah Digunakan Kompatibel Dengan Perangkat TYPE-C Dan Mikrofon 3,5 Mm Panjang Kabel : 7.6 Cm Berat : 6 Gram</p>\r\n ', 'produk1658512497.jpg ', 1, '2022-07-22 17:54:57'),
(87, 83, 'VSGO VPE-01 Professional LensPen ', 121000, '<p>Ukuran Produk: 10 X 20.5 X 3.5 &nbsp;- LensPen Pembersih Profesional &nbsp;- Karbon Aktif Berskala Nano Multiminasi &nbsp;- Efektif Membersihkan Secara Akurat &nbsp;- Cocok Untuk Membersihkan Lensa Dan Permukaan Halus Lainnya</p>\r\n ', 'produk1658512608.jpg ', 1, '2022-07-22 17:56:48'),
(88, 83, 'VSGO VS-S03E Full Frame Sensor Cleaner ', 495000, '<p>Fitur Dan Detail : &nbsp;- Berisikan 12 Buah Swab Pembersih Sensor &nbsp;- Swab Pembersih Sensor Full-Frame Sangat Pas Dengan Sensor CMOS &nbsp;- Sensor Pembersih Swab Yang Ergonomis, Nyaman Digunakan &nbsp;- Swab Pembersih Sensor Yang Mampu Memasang Dan Membersihkan Sensor Dengan Pas &nbsp;- Swab Pembersih Sensor Dengan Pembersih Bebas Alkohol Dapat Melindungi Lapisan Optik Anda &nbsp;- Kit Pembersih Kamera Yang Mudah Dibawa Dan Bebas Debu Untuk Setiap Swab</p>\r\n', 'produk1658512670.jpg ', 1, '2022-07-22 17:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_telp` varchar(20) NOT NULL,
  `user_ask` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_name`, `user_email`, `user_telp`, `user_ask`, `date_created`) VALUES
(3, 'Rifqi Iqbal Pratama ', 'rifqiiqbalpratama21@gmail.com ', '085891129040 ', 'min mau nanya, Kamera rekomendasi untuk vloger apa? ', '2022-07-24 14:46:17'),
(4, 'Rahma ', 'dina123@gmail.com ', '085891129502 ', 'Min untuk pengiriman berapa lama ya? ', '2022-07-24 14:48:52'),
(5, 'Budi ', 'budi123@gmail.com ', '085891112456 ', 'Kamera terpopuler apa ya? ', '2022-07-24 20:45:24'),
(6, 'Ani ', 'ani123@gmail.com ', '085891129595 ', 'Kapan kamera saya datang? ', '2022-07-24 20:54:38'),
(7, 'Dira ', 'dir123@gmail.com ', '085891129502 ', 'Berapa harga kamera termurah ? ', '2022-07-24 21:08:18'),
(8, 'Dani ', 'dani123@gmail.com ', '085891112456 ', 'Apakah ada ongkirnya? ', '2022-07-24 21:39:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
