@extends('layouts.base')

@section('content')
{{-- tabel untuk melihat locker yang kita sewa --}}
<div class="container table-container">
    <h1 class="text-center mb-4">Daftar Barang Anda di Box Locker</h1>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID Locker</th>
                <th>Deskripsi Sewa</th>
                <th>Ukuran</th>
                <th>Durasi</th>
                <th>Biaya</th>
                <th>Status</th>
                <th>Expired</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sewas as $sewa)
                {{-- Tambahkan kondisi untuk memeriksa status --}}
                @if($sewa->status == 'aktif')
                    <tr>
                        <td>{{ $sewa->id }}</td>
                        <td>{{ $sewa->nama }}</td>
                        <td>{{ $sewa->ukuran }}</td>
                        <td>{{ $sewa->durasi }}</td>
                        <td>{{ $sewa->biaya }}</td>
                        <td>{{ $sewa->status }}</td>
                        <td>{{ $sewa->expired }}</td>
                        <td><a href="#" onclick="konfirmasiAmbilBarang('{{ $sewa->id }}')">Ambil barang</a></td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

{{-- tabel untuk melihat history locker --}}
<div class="container table-container">
    <h1 class="text-center mb-4">Daftar History Barang Anda di Box Locker</h1>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Deskripsi Sewa</th>
                <th>Ukuran</th>
                <th>Durasi</th>
                <th>Biaya</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sewas as $sewa)
                {{-- Tambahkan kondisi untuk memeriksa status --}}
                @if($sewa->status == 'diambil')
                    <tr>
                        <td>{{ $sewa->nama }}</td>
                        <td>{{ $sewa->ukuran }}</td>
                        <td>{{ $sewa->durasi }}</td>
                        <td>{{ $sewa->biaya }}</td>
                        <td><a href="/hapus/{{$sewa->id}}">Hapus</a></td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

{{-- Form sewa locker --}}
<div class="container table-container">
    <link rel="stylesheet" href="/css/sewa.css" />
    <h1 class="text-center mb-4">Silahkan Isi Formulir Sewa</h1>
    <form class="form" action="/sewa/store" method="post">
        {{ csrf_field() }}

        <label for="nama">Deskripsi Sewa:</label>
        <input type="text" id="nama" name="nama"><br><br>

        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        
        <label for="ukuran">Ukuran:</label>
        <select id="ukuran" name="ukuran">
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
        </select><br><br>

        <span id="ukuran-info" style="margin-left: 10px; font-style: italic;"></span><br><br>

        <label for="durasi">Durasi:</label>
        <select id="durasi" name="durasi">
            <option value="1 Bulan">1 Bulan</option>
            <option value="2 Bulan">2 Bulan</option>
            <option value="3 Bulan">3 Bulan</option>
        </select><br><br>

        <input type="hidden" id="expired" name="expired">

        <label for="biaya">Biaya:</label><br>
        <input type="text" id="biaya" name="biaya" readonly><br><br>

        {{-- Input status yang tidak terlihat --}}
        <input type="hidden" name="status" value="aktif">

        <input type="submit" value="Kirim">
</form>
<form id="logout-form" action="/logout" method="POST" style="display: none;">
    @csrf
</form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.js"></script>
    <script>
        function konfirmasiAmbilBarang(id) {
            var konfirmasi = confirm("Apakah Anda yakin ingin mengambil barang?");
            if (konfirmasi) {
                $(".table-container").addClass("animate__animated animate__fadeOutUp");
                setTimeout(function () {
                    window.location.href = "/ambil/" + id;
            }, 1000); // Delay animasi
        }
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function updateUkuranInfo() {
            var selectedUkuran = document.getElementById('ukuran').value;
            var ukuranInfo = '';

            // Menentukan keterangan ukuran berdasarkan pilihan ukuran
            switch (selectedUkuran) {
                case 'S':
                    ukuranInfo = 'Ukuran Box : 45 X 30 cm';
                    break;
                case 'M':
                    ukuranInfo = 'Ukuran Box : 100 X 70 cm';
                    break;
                case 'L':
                    ukuranInfo = 'Ukuran Box : 200 X 250 cm';
                    break;
                default:
                    ukuranInfo = 'Pilih ukuran';
            }

            document.getElementById('ukuran-info').textContent = ukuranInfo;
        }

        document.getElementById('ukuran').addEventListener('change', updateUkuranInfo);

        updateUkuranInfo();
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function hitungBiayaDanExpired() {
            var ukuran = document.getElementById('ukuran').value;
            var durasi = document.getElementById('durasi').value;
            var biayaPerUkuran = {
                'S': 10000,
                'M': 20000,
                'L': 25000
            };
            var biayaPerDurasi = {
                '1 Bulan': 30000,
                '2 Bulan': 60000,
                '3 Bulan': 75000
            };

            var totalBiaya = biayaPerUkuran[ukuran] + biayaPerDurasi[durasi];

            document.getElementById('biaya').value = totalBiaya;

            // Menghitung tanggal kedaluwarsa
            var tanggalSekarang = new Date();
            var tanggalKedaluwarsa = new Date(tanggalSekarang);
            var durasiHari = 30;
            if (durasi === '2 Bulan') {
                durasiHari = 60;
            } else if (durasi === '3 Bulan') {
                durasiHari = 90;
            }

            // Tambahkan durasi hari ke tanggal kedaluwarsa
            tanggalKedaluwarsa.setDate(tanggalSekarang.getDate() + durasiHari);

            // Format tanggal kedaluwarsa sebagai string (contoh: YYYY-MM-DD)
            var formattedDate = tanggalKedaluwarsa.toISOString().split('T')[0];
            document.getElementById('expired').value = formattedDate;
        }

        // Memanggil fungsi hitungBiayaDanExpired saat ukuran atau durasi berubah
        document.getElementById('ukuran').addEventListener('change', hitungBiayaDanExpired);
        document.getElementById('durasi').addEventListener('change', hitungBiayaDanExpired);

        // Memanggil fungsi saat halaman dimuat untuk menginisialisasi nilai
        hitungBiayaDanExpired();
    });
</script>

<script>
    // ini fungsi logout
    document.getElementById('logout-link').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('logout-form').submit();
    });
</script>

</div>

@endsection