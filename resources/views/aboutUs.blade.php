@extends('layouts.guest.menu-app')

@section('content')
    <!-- Hero Section -->
    <section id="tentang" class="py-5 bg-light">
        <br><br><br>
        <div class="container">
            <!-- Profil Perusahaan -->
            <div class="row align-items-center mb-5">
                <div class="col-md-6">
                    <h2 class="fw-bold mb-4">About Us</h2>
                    <p class="text-secondary" style="text-align: justify;">
                        <b>Belalang Village</b> is a charming rural area located in Kediri District, Tabanan Regency, Bali. Known for its lush green landscapes and rich cultural heritage, the village offers a glimpse into the traditional Balinese way of life. The fertile agricultural land, particularly its rice fields, is sustained by the ancient subak irrigation system, a UNESCO-recognized tradition that reflects the harmonious relationship between nature and the local community. The residents of Belalang still uphold their cultural values, with frequent Hindu religious ceremonies and traditional practices that have been passed down for generations.
                    </p>
                    <p class="text-secondary" style="text-align: justify;">
                        Situated near popular tourist destinations like Tanah Lot, Belalang Village has great potential for eco and cultural tourism. Visitors can enjoy breathtaking views of rice paddies, experience the serene village atmosphere, and witness daily life in an authentic Balinese community. In addition to its natural beauty, the village offers unique cultural experiences, such as traditional ceremonies, local crafts, and artistic performances. Moreover, it is home to several historic temples, making it an ideal spot for spiritual tourism.
                    </p>
                </div>
                <div class="col-md-6 text-center">
                    <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=2073&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid rounded shadow" alt="Travel Image">
                </div>
            </div>

            <!-- Visi & Misi -->
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <h2 class="fw-bold">Vision & Mission</h2>
                </div>
                <div class="col-md-6">
                    <h4 class="fw-bold mt-4">Vision</h4>
                    <p class="text-secondary">Through Excellent Service, we realize the Belalang Village as ADVANCED, SAFE, PROSPEROUS, SUPERIOR, UNITED AND DIGNIFIED.</p>
                </div>
                <div class="col-md-6">
                    <h4 class="fw-bold mt-4">Mission</h4>
                    <ul class="text-secondary">
                        <li>Strengthening good, effective, efficient, transparent, accountable village governance based on the village information system (SID).</li>
                        <li>Improving maximum service to village communities.</li>
                        <li>Improving security and order in the village environment.</li>
                        <li>Improving village welfare by establishing Village-Owned Enterprises (BUMDes) and other programs to open up employment opportunities for village communities, as well as increasing small household production.</li>
                        <li>Improving village health and cleanliness.</li>
                        <li>Improving harmonious, united, tolerant and respectful life in cultural and religious life.</li>
                        <li>Improving creativity in arts and culture and community participation in sustainable development.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Location -->
    <section class="py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Location</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31559.698525133303!2d115.05808978334092!3d-8.59961660554169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd239de5325fa9f%3A0x7c5e4bd33b0835a6!2sBelalang%2C%20Kec.%20Kediri%2C%20Kabupaten%20Tabanan%2C%20Bali!5e0!3m2!1sid!2sid!4v1741158756514!5m2!1sid!2sid" style="border:0; width:100%; height:450px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
@endsection
