<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e5d2b8;
            font-family: 'Arial', sans-serif;
        }

        .sidebar {
            background-color: #809671;
            height: 100vh;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            width: 220px;
            transition: transform 0.3s ease;
            z-index: 1000;
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }

        .sidebar img {
            width: 100%;
            margin-bottom: 20px;
        }

        .sidebar p {
            color: #ffffff;
            font-weight: bold;
            text-align: center;
            margin: 0;
        }

        .sidebar .admin-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: block;
            margin: 0 auto 10px auto;
        }

        header {
            background-color: #e5e0d8;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            margin-left: 220px;
            transition: margin-left 0.3s ease;
        }

        header.hidden {
            margin-left: 0;
        }

        header .logout-btn {
            color: #6b4e30;
            font-weight: bold;
            text-decoration: none;
            background-color: #f8f9fa;
            padding: 8px 12px;
            border-radius: 5px;
            border: 2px solid #6b4e30;
        }

        header .logout-btn:hover {
            background-color: #6b4e30;
            color: white;
        }

        .main-content {
            margin-left: 240px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .main-content.hidden {
            margin-left: 0;
        }

        .table-container {
            margin-top: 20px;
            background-color: #e5d2b8;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: black;
            margin-bottom: 15px;
        }

        .table {
            width: 100%;
            background-color: white;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 12px;
            border: 1px solid black;
            text-align: left;
        }

        .table th {
            background-color: #d2ab80;
            color: black;
            text-transform: uppercase;
            font-size: 0.9rem;
        }

        .table tbody tr:nth-child(even) {
            background-color: #e5e0d8;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .table tbody tr:hover {
            background-color: #d2ab80;
            transition: background-color 0.3s ease;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .search-box {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }

        .search-box input {
            width: 300px;
            padding: 8px;
            border-radius: 8px;
            border: 1px solid #6b4e30;
        }

        .search-box button {
            margin-left: 5px;
            padding: 8px 12px;
            background-color: #6b4e30;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-save {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            float: right;
            margin-bottom: 15px;
        }

        .btn-save:hover {
            background-color: #0056b3;
        }
        .admin-info {
            display: flex;
            align-items: center; 
            justify-content: center; 
            margin-top: 20px; 
            background-color: #b3b792; 
            border-radius: 5px; 
            padding: 10px; 
            transition: transform 0.3s ease; 
        }

        .admin-info:hover {
            transform: scale(1.05); 
        }

        .admin-avatar {
            margin-right: 10px; 
        }

        .btn-tambah-barang {
            background-color: #809671;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
        }

        .btn-tambah-barang:hover {
            background-color: #6b4e30;
        }

        
    </style>
</head>

<body>
    <div class="sidebar" id="sidebar">
            <img src="{{ asset('images/logo.png') }}" alt="Atma Petshop Logo">
            <div class="admin-info">
                <a href="{{ url('/dashboard') }}" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                <img src="{{ asset('images/adminprofile.png') }}" alt="Admin Avatar" class="admin-avatar">
                <p>Admin123</p>
            </div>
            <div class="admin-info" style="background-color: #b3b792; margin-top: 10px;">
                <a href="{{ url('/konfirmasiPembayaran') }}" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                <img src="{{ asset('images/payment.png') }}" alt="Payment Icon" class="admin-avatar"> 
                <p>Konfirmasi Pembayaran</p>
            </div>
            <div class="admin-info" style="background-color: #b3b792; margin-top: 10px;">
                <a href="{{ url('/daftarBarang') }}" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                <img src="{{ asset('images/addBarang.png') }}" alt="Tambah Barang Icon" class="admin-avatar"> 
                <p>Daftar Barang</p>
            </a>
            </div>
    </div>

    <header id="header">
        <button class="navbar-toggler" id="sidebarToggle" type="button" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #e5e0d8; border: none; color: white; border-radius: 5px;">
            <span style="background-color: #725c3a; width: 30px; height: 3px; display: block; margin: 5px auto;"></span>
            <span style="background-color: #725c3a; width: 30px; height: 3px; display: block; margin: 5px auto;"></span>
            <span style="background-color: #725c3a; width: 30px; height: 3px; display: block; margin: 5px auto;"></span>
        </button>
        <a href="{{ url('loginAndRegister') }}" class="logout-btn">Logout</a>
    </header>

    <div class="main-content" id="mainContent">
        <h1>Daftar Barang</h1>
        <button class="btn btn-tambah-barang btn-sm" data-bs-toggle="modal" data-bs-target="#tambahBarangModal">Tambah Barang</button>

        <div class="table-container">
            <div class="table-title">List Barang</div>
            <div class="search-box">
                <input type="text" placeholder="Cari barang...">
                <button>
                    <img src="{{ asset('images/search.png') }}" alt="Search Icon" style="width: 20px; height: 20px;">
                </button>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                    @foreach($produk as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                            @if($item->gambar_produk)
                            <img src="{{ $item->gambar_produk }}" alt="{{ $item->nama }}" width="100">

                            @else
                            -
                            @endif
                        </td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>
                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editBarangModal{{ $item->id }}">Edit</button>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusBarangModal{{ $item->id }}">Hapus</button>
                            <div class="modal fade" id="editBarangModal{{ $item->id }}" tabindex="-1" aria-labelledby="editBarangModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editBarangModalLabel">Edit Barang</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="editForm" data-id="{{ $item->id }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama Barang</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->nama}}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kategori" class="form-label">Kategori</label>
                                                    <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $item->kategori }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $item->deskripsi }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="gambar" class="form-label">Gambar</label>
                                                    <input type="file" class="form-control" id="gambar_produk" name="gambar_produk">
                                                    @if($item->gambar_produk)
                                                    <img src="{{ asset('storage/' . $item->gambar_produk) }}" alt="{{ $item->nama }}" width="50">

                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <label for="harga" class="form-label">Harga</label>
                                                    <input type="number" class="form-control" id="harga" name="harga" value="{{ $item->harga }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="stok" class="form-label">Stok</label>
                                                    <input type="number" class="form-control" id="stok" name="stok" value="{{ $item->stok }}" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="hapusBarangModal{{ $item->id }}" tabindex="-1" aria-labelledby="hapusBarangModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hapusBarangModalLabel">Konfirmasi Hapus</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus barang <strong>{{ $item->nama}}</strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form class="deleteForm" data-id="{{ $item->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="tambahBarangModal" tabindex="-1" aria-labelledby="tambahBarangModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahBarangModalLabel">Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="barangForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gambar_produk" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar_produk" name="gambar_produk">
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" required>
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('barangForm').addEventListener('submit', function(e) {
        e.preventDefault();  // Mencegah form reload halaman

        let formData = new FormData(this);  // Ambil data form, termasuk file

        fetch('/api/produk', {  // Pastikan URL API sesuai
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: formData,  // Kirim data sebagai FormData, bukan JSON
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Gagal menambahkan produk');
            }
            return response.text();  // Mengambil response dalam bentuk plain text
        })
        .then(responseText => {
            alert(responseText);  // Menampilkan pesan sukses
            location.reload();  // Halaman akan reload otomatis
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan: ' + error.message);
        });
    });

    document.querySelectorAll('.editForm').forEach(form => {
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);  // Ambil data form
        let id = this.getAttribute('data-id');  // Ambil ID barang dari form

        fetch(`/api/produk/${id}`, {  // API endpoint dengan ID produk
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'X-HTTP-Method-Override': 'PUT',  // Laravel butuh ini untuk PUT
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) throw new Error('Gagal mengedit produk');
            return response.text();
        })
        .then(responseText => {
            alert(responseText);  // Tampilkan pesan sukses
            location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan: ' + error.message);
        });
    });
});

// Hapus Barang
document.querySelectorAll('.deleteForm').forEach(form => {
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        let id = this.getAttribute('data-id');  // Ambil ID produk dari form

        fetch(`/api/produk/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        })
        .then(response => {
            if (!response.ok) throw new Error('Gagal menghapus produk');
            return response.text();
        })
        .then(responseText => {
            alert(responseText);  // Tampilkan pesan sukses
            location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan: ' + error.message);
        });
    });
});


    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('hidden');
            document.getElementById('mainContent').classList.toggle('hidden');
            document.getElementById('header').classList.toggle('hidden');
        });
    </script>
</body>

</html>