@extends('layouts.base')

@section('content')
{{-- fungsi menyapa user --}}
<div class="container text-center pt-4">
    <h1>@auth
        Selamat Datang {{ auth()->user()->name }}, Berikut
        @endauth
    </h1>
</div>

{{-- bagian tabel daftar penyewa --}}
<section id="box" class="box">
    <div class="container table-container">
        <h1 class="text-center mb-4">Daftar Locker aktif di Box Locker</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID Locker</th>
                    <th scope="col">Ukuran Box</th>
                    <th scope="col">Durasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sewas as $sewa)
                    @if($sewa->status === 'aktif')
                        <tr>
                            <td>{{ $sewa->id }}</td>
                            <td>{{ $sewa->ukuran }}</td>
                            <td>{{ $sewa->durasi }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<section id="sewa" class="sewa">
<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Our Services</h5>
            <h1 class="mb-5">Explore Our Services</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <img src="img/ly1.jpg" alt="" class="img-fluid">
                        <h5>Box Locker Rental Via App</h5>
                        <p> Titip, simpan dan ambil barang/paketmu di PaxelBox secara mandiri via Aplikasi</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <img src="img/ly2.jpg" alt="" class="img-fluid">
                        <h5>Box Locker Rental Via Web</h5>
                        <p>Titip, simpan dan ambil barang/paketmu di PaxelBox secara mandiri via Website</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <img src="img/ly3.jpg" alt="" class="img-fluid">
                        <h5>Box Locker Drop - Off</h5>
                        <p>Titip dan simpan barang/paketmu yang diantar Hero atau kurir manapun untuk nantinya Kamu ambil</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-center text-lg-end overflow-hidden">
                    <img class="img-fluid" src="img/hero1.png" alt="">
                </div>
<!-- Service End -->
{{-- tombol ke halaman sewa --}}
</section>

<section id="lokasi" class="lokasi">
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Location</h5>
                <h1 class="mb-5">Dimana Letak Kantor kami ?</h1>
            </div>
            <div class="d-flex justify-content-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1722.0820187881038!2d117.15600069560415!3d-0.46712895048039726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67902a63f62cf%3A0x1163ef31755fee1c!2sProdi%20Sistem%20Informasi%20%2C%20Fakultas%20Teknik%20UNMUL!5e0!3m2!1sid!2sid!4v1699555370527!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>


<section id="tentang" class="tentang">
        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">About Us</h5>
                    <h1 class="mb-5">Berikut sedikit ulasan tentang kami</h1>
                </div>
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="mb-4">Welcome to <i class="fa fa-archive" aria-hidden="true"></i> Locker Box</h1>
                        <p class="mb-4">Dalam era kehidupan yang sibuk, Locker Box hadir untuk meredefinisi cara Anda menyimpan dan mengakses barang Anda. Kami menghadirkan solusi inovatif dalam bentuk locker box yang aman dan praktis. Sebagai mitra setia dalam kesederhanaan sehari-hari, kami berkomitmen untuk membuat pengalaman penyimpanan Anda lebih mudah dan efisien. Temukan kenyamanan dan keamanan bersama Locker Box - membuka kotak kemudahan untuk gaya hidup modern Anda."</p>
                        <p class="mb-4">T Harapannya kata-kata ini dapat mencerminkan semangat dan visi dari bisnis Locker Box Anda! Jangan ragu untuk menyesuaikan dan menambahkan sentuhan pribadi sesuai dengan karakteristik unik dari layanan atau produk Anda.</p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Years of</p>
                                        <h6 class="text-uppercase mb-0">Experience</h6>
                                    </div>
                                </div>
                            </div>
        <!-- About End -->
</section>

   
<!-- Contact Start -->
<section id="contact" class="contact">
   <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Contact Us</h5>
            <h1 class="mb-5">Contact For Any Query</h1>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="row gy-4">
                    <div class="col-md-4">
                        <h5 class="section-title ff-secondary fw-normal text-start text-primary">Booking</h5>
                        <p><i class="fa fa-envelope-open text-primary me-2"></i>boxlocker@gmail.com</p>
                    </div>
                    <div class="col-md-4">
                        <h5 class="section-title ff-secondary fw-normal text-start text-primary">General</h5>
                        <p><i class="fa fa-envelope-open text-primary me-2"></i>boxlocker@gmail.com</p>
                    </div>
                    <div class="col-md-4">
                        <h5 class="section-title ff-secondary fw-normal text-start text-primary">Technical</h5>
                        <p><i class="fa fa-envelope-open text-primary me-2"></i>boxlocker@gmail.com</p>
                    </div>
                </div>
            </div>
            
            {{-- <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1722.0820187881038!2d117.15600069560415!3d-0.46712895048039726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67902a63f62cf%3A0x1163ef31755fee1c!2sProdi%20Sistem%20Informasi%20%2C%20Fakultas%20Teknik%20UNMUL!5e0!3m2!1sid!2sid!4v1699555370527!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div> --}}
            <div class="container col-md-6">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    

</section>
<!-- Contact End -->

{{-- fungsi logout --}}
<form id="logout-form" action="/logout" method="POST" style="display: none;">
    @csrf
</form>

@section('footer')
@endsection

<script>
    // buat js
    // ini fungsi logout
    document.getElementById('logout-link').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('logout-form').submit();
    });

</script>


@endsection