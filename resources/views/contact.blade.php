@extends('layouts.guest.menu-app')

@section('content')

    <br><br>
    <style>
        .contact-section {
            padding: 60px 0;
        }
        .contact-info {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
        }
        .contact-info h4 {
            margin-bottom: 15px;
        }
        .social-icons a {
            color: #28a745;
            font-size: 20px;
            margin-right: 10px;
            transition: 0.3s;
        }
        .social-icons a:hover {
            color: black;
        }
    </style>


    <!-- Contact Section -->
    <section class="contact-section container py-5 mt-5">
        <div class="container">

        <div class="row">
            <!-- Formulir Kontak -->
            <h2>Contact Us</h2>
            <br>
            <br>
            <div class="col-md-6">
                <form onsubmit="sendToWhatsApp(event)">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Your Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="4" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Send Message via WhatsApp</button>
                    <br><br>
                </form>
            </div>

            <!-- Informasi Kontak -->
            <div class="col-md-6">
<br>
                <div class="contact-info">
                    <h4>Our Office</h4>
                    <p><i class="fas fa-map-marker-alt"></i> 	Jl Pantai Kedungu, Desa Belalang, Kediri, Tabanan, Bali, Indonesia 52121</p>
                    <p><i class="fas fa-envelope"></i> desabelalang8@gmail.com</p>
                    <p><i class="fas fa-phone"></i> +6287846536991</p>
                    
                    <h4>Follow Us</h4>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script>
        function sendToWhatsApp(event) {
            event.preventDefault(); // Mencegah form submit biasa
            
            // Ambil nilai dari input form
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var message = document.getElementById("message").value;
            
            // Nomor WhatsApp tujuan (ganti dengan nomor bisnis WhatsApp)
            var phoneNumber = "6287846536991"; // Format: kode negara tanpa "+" (contoh: Indonesia 62)

            // Format pesan
            var textMessage = `Halo, saya ingin menghubungi Belalang Tourism.%0A%0A*Nama:* ${name}%0A*Email:* ${email}%0A*Pesan:* ${message}`;

            // Buat URL WhatsApp
            var whatsappURL = `https://wa.me/${phoneNumber}?text=${textMessage}`;

            // Arahkan ke WhatsApp
            window.open(whatsappURL, "_blank");
        }
    </script><br><br>
@endsection
