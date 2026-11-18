<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APEXMOTO — Sistem Manajemen Service Motor</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 36 36'%3E%3Crect width='36' height='36' rx='9' fill='%2318181b'/%3E%3Cpath d='M18 3L31 10.5V25.5L18 33L5 25.5V10.5L18 3Z' stroke='%23FB923C' stroke-width='2.5' fill='%23ea580c' fill-opacity='0.2'/%3E%3Cpath d='M18 8L26 24H21.5L18 16.5L14.5 24H10L18 8Z' fill='%23FB923C'/%3E%3Crect x='13' y='25.5' width='10' height='2.5' rx='1.25' fill='%23FACC15'/%3E%3C/svg%3E">
    <!-- Google Fonts: Space Grotesk & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --sidebar-bg: #111827;
            --sidebar-hover: #1f2937;
            --accent-orange: #ea580c;
            --accent-orange-light: #fff7ed;
            --canvas-bg: #f4f4f5;
            --border-subtle: #e4e4e7;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--canvas-bg);
            color: #18181b;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, .font-display {
            font-family: 'Space Grotesk', sans-serif;
        }

        /* Layout Wrapper */
        .app-shell {
            display: flex;
            min-height: 100vh;
        }

        /* Left Sidebar */
        .sidebar {
            width: 270px;
            background-color: var(--sidebar-bg);
            color: #f4f4f5;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            position: sticky;
            top: 0;
            height: 100vh;
            padding: 1.5rem 1rem;
            border-right: 1px solid #27272a;
        }

        .brand-box {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 0.75rem 1.5rem 0.75rem;
            border-bottom: 1px solid #27272a;
            margin-bottom: 1.25rem;
        }

        .brand-logo {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, #f97316, #c2410c);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: #fff;
            box-shadow: 0 4px 14px rgba(234, 88, 12, 0.4);
        }

        .sidebar-label {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #71717a;
            padding: 0 0.75rem;
            margin-bottom: 0.6rem;
        }

        .sidebar-nav .nav-link {
            color: #a1a1aa;
            font-weight: 500;
            font-size: 0.9rem;
            padding: 0.75rem 0.9rem;
            border-radius: 10px;
            margin-bottom: 0.35rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.2s ease;
            border: 1px solid transparent;
        }

        .sidebar-nav .nav-link:hover {
            background-color: var(--sidebar-hover);
            color: #ffffff;
        }

        .sidebar-nav .nav-link.active {
            background: linear-gradient(90deg, rgba(234, 88, 12, 0.2) 0%, rgba(234, 88, 12, 0.05) 100%);
            color: #fb923c;
            border-color: rgba(249, 115, 22, 0.35);
            font-weight: 600;
        }

        .sidebar-nav .nav-link .count-pill {
            background: #27272a;
            color: #d4d4d8;
            font-size: 0.75rem;
            padding: 0.15rem 0.55rem;
            border-radius: 999px;
        }

        .sidebar-nav .nav-link.active .count-pill {
            background: var(--accent-orange);
            color: #ffffff;
        }

        .sidebar-footer {
            margin-top: auto;
            background: #1f2937;
            border-radius: 12px;
            padding: 0.9rem;
            font-size: 0.8rem;
            border: 1px solid #374151;
        }

        /* Main Workspace */
        .main-workspace {
            flex-grow: 1;
            padding: 1.5rem 2rem;
            max-width: 100%;
        }

        /* Top Strip Bar */
        .top-strip {
            background: #ffffff;
            border: 1px solid var(--border-subtle);
            border-radius: 16px;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .mini-stat-group {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .mini-stat {
            background: #fafafa;
            border: 1px solid var(--border-subtle);
            border-radius: 10px;
            padding: 0.45rem 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.82rem;
        }

        /* Panel Cards */
        .panel-card {
            background: #ffffff;
            border: 1px solid var(--border-subtle);
            border-radius: 16px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
            overflow: hidden;
        }

        .panel-header {
            padding: 1.1rem 1.35rem;
            border-bottom: 1px solid var(--border-subtle);
            background: #fafafa;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .form-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: #3f3f46;
            margin-bottom: 0.35rem;
        }

        .form-control, .form-select {
            border-radius: 9px;
            border: 1px solid #d4d4d8;
            font-size: 0.88rem;
            padding: 0.55rem 0.8rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--accent-orange);
            box-shadow: 0 0 0 3px rgba(234, 88, 12, 0.15);
        }

        /* Auto-filled highlight */
        .auto-highlight {
            background-color: var(--accent-orange-light) !important;
            border: 1.5px dashed #fb923c !important;
            color: #9a3412;
            font-weight: 600;
        }

        /* Custom Radio Switch */
        .radio-switch {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.5rem;
        }

        .radio-switch input[type="radio"] {
            display: none;
        }

        .radio-switch label {
            text-align: center;
            padding: 0.55rem 0.5rem;
            border: 1.5px solid #d4d4d8;
            border-radius: 9px;
            font-size: 0.82rem;
            font-weight: 600;
            color: #52525b;
            cursor: pointer;
            transition: all 0.18s ease;
            margin: 0;
        }

        .radio-switch input[type="radio"]:checked + label {
            background-color: #111827;
            border-color: #111827;
            color: #fb923c;
        }

        /* Action Button */
        .btn-orange {
            background-color: var(--accent-orange);
            border-color: var(--accent-orange);
            color: #ffffff;
            font-weight: 600;
            font-size: 0.88rem;
            padding: 0.6rem 1.2rem;
            border-radius: 9px;
            transition: all 0.2s;
        }

        .btn-orange:hover {
            background-color: #c2410c;
            border-color: #c2410c;
            color: #ffffff;
        }

        /* Table Aesthetics */
        .table-garage thead th {
            background: #18181b;
            color: #e4e4e7;
            font-size: 0.74rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            padding: 0.85rem 1rem;
            border: none;
        }

        .table-garage tbody td {
            padding: 0.85rem 1rem;
            font-size: 0.86rem;
            vertical-align: middle;
            border-bottom: 1px solid #f4f4f5;
        }

        .table-garage tbody tr:hover {
            background-color: #fff7ed;
        }

        .tag-plat {
            background: #18181b;
            color: #facc15;
            font-family: 'Space Grotesk', monospace;
            font-weight: 700;
            padding: 0.25rem 0.6rem;
            border-radius: 6px;
            font-size: 0.8rem;
            letter-spacing: 0.8px;
        }

        .tag-id {
            background: #f4f4f5;
            color: #18181b;
            border: 1px solid #d4d4d8;
            font-weight: 700;
            padding: 0.22rem 0.55rem;
            border-radius: 6px;
            font-size: 0.78rem;
        }

        @media (max-width: 991.98px) {
            .app-shell { flex-direction: column; }
            .sidebar { width: 100%; height: auto; position: relative; }
            .main-workspace { padding: 1rem; }
        }
    </style>
</head>
<body>

<div class="app-shell">
    <!-- LEFT SIDEBAR NAVIGATION -->
    <aside class="sidebar">
        <div class="brand-box">
    <div class="brand-logo" style="background: #18181b; border: 1.5px solid rgba(249, 115, 22, 0.5); box-shadow: 0 4px 16px rgba(234, 88, 12, 0.35);">
        <!-- Custom SVG Emblem APEXMOTO -->
        <svg width="28" height="28" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="apexGrad" x1="4" y1="4" x2="32" y2="32" gradientUnits="userSpaceOnUse">
                    <stop offset="0%" stop-color="#FB923C"/>
                    <stop offset="50%" stop-color="#EA580C"/>
                    <stop offset="100%" stop-color="#FACC15"/>
                </linearGradient>
            </defs>
            <!-- Hexagon Mechanical Frame -->
            <path d="M18 2L31.8564 10V26L18 34L4.14359 26V10L18 2Z" stroke="url(#apexGrad)" stroke-width="2.5" fill="rgba(234, 88, 12, 0.12)"/>
            <!-- Dynamic Apex Wing / Piston Bolt -->
            <path d="M18 8L26 24H21.5L18 16.5L14.5 24H10L18 8Z" fill="url(#apexGrad)"/>
            <!-- Bottom Crank Accent -->
            <rect x="13" y="25.5" width="10" height="2.5" rx="1.25" fill="#FACC15"/>
        </svg>
    </div>
    <div>
        <div class="font-display fw-bold text-white fs-5 lh-1" style="letter-spacing: 0.8px;">
            APEX<span style="color: #fb923c;">MOTO</span>
        </div>
        <small class="text-secondary" style="font-size: 0.7rem; letter-spacing: 0.4px;">Workshop & Pitstop OS</small>
    </div>
</div>

        <div class="sidebar-label">Menu Operasional</div>
        <div class="nav flex-column sidebar-nav" id="garageMenu" role="tablist">
            <button class="nav-link active" id="nav-pelanggan" data-bs-toggle="pill" data-bs-target="#pane-pelanggan" type="button" role="tab">
                <span><i class="bi bi-person-badge me-2"></i>Data Pelanggan</span>
                <span class="count-pill">{{ $pelanggans->count() }}</span>
            </button>
            <button class="nav-link" id="nav-kendaraan" data-bs-toggle="pill" data-bs-target="#pane-kendaraan" type="button" role="tab">
                <span><i class="bi bi-bicycle me-2"></i>Data Kendaraan</span>
                <span class="count-pill">{{ $kendaraans->count() }}</span>
            </button>
            <button class="nav-link" id="nav-daftar" data-bs-toggle="pill" data-bs-target="#pane-daftar" type="button" role="tab">
                <span><i class="bi bi-journal-check me-2"></i>Daftar Service</span>
                <span class="count-pill">{{ $daftar_services->count() }}</span>
            </button>
            <button class="nav-link" id="nav-data" data-bs-toggle="pill" data-bs-target="#pane-data" type="button" role="tab">
                <span><i class="bi bi-tools me-2"></i>Data Service</span>
                <span class="count-pill">{{ $data_services->count() }}</span>
            </button>
            <button class="nav-link" id="nav-pembayaran" data-bs-toggle="pill" data-bs-target="#pane-pembayaran" type="button" role="tab">
                <span><i class="bi bi-receipt-cutoff me-2"></i>Pembayaran Service</span>
                <span class="count-pill">{{ $pembayarans->count() }}</span>
            </button>
        </div>

        <div class="sidebar-footer mt-4">
            <div class="d-flex align-items-center justify-content-between mb-1">
                <span class="text-secondary">REST API Status</span>
                <span class="badge bg-success">ONLINE</span>
            </div>
            <div class="text-white-50" style="font-size: 0.72rem;">MySQL & Postman Ready</div>
        </div>
    </aside>

    <!-- RIGHT WORKSPACE -->
    <main class="main-workspace">
        <!-- TOP SUMMARY STRIP -->
        <div class="top-strip">
            <div>
                <h4 class="fw-bold mb-0">Dashboard Bengkel Service Motor</h4>
                <small class="text-muted">Sistem Terintegrasi Input Data, Antrian Mekanik & Kasir</small>
            </div>
            <div class="mini-stat-group">
                <div class="mini-stat">
                    <i class="bi bi-people text-primary"></i>
                    <span>Pelanggan: <strong>{{ $pelanggans->count() }}</strong></span>
                </div>
                <div class="mini-stat">
                    <i class="bi bi-scooter text-warning"></i>
                    <span>Unit: <strong>{{ $kendaraans->count() }}</strong></span>
                </div>
                <div class="mini-stat">
                    <i class="bi bi-cash-stack text-success"></i>
                    <span>Omzet: <strong class="text-success">Rp {{ number_format($pembayarans->sum('jumlah_biaya'), 0, ',', '.') }}</strong></span>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-3 d-flex align-items-center justify-content-between mb-4">
                <div><i class="bi bi-check-circle-fill me-2"></i><strong>Berhasil!</strong> {{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="tab-content" id="garageTabContent">

            <!-- 1. DATA PELANGGAN (SPLIT VIEW) -->
            <div class="tab-pane fade show active" id="pane-pelanggan" role="tabpanel">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="panel-card">
                            <div class="panel-header">
                                <span class="fw-bold"><i class="bi bi-person-plus-fill text-warning me-2"></i>Form Data Pelanggan</span>
                                <span class="badge bg-dark">Menu 1</span>
                            </div>
                            <div class="p-4">
                                <form action="{{ route('pelanggan.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">ID Pelanggan</label>
                                        <input type="text" name="id_pelanggan" class="form-control" placeholder="Contoh: PLG-004" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama lengkap pelanggan" required>
                                    </div>
                                    <div class="row g-2 mb-3">
                                        <div class="col-6">
                                            <label class="form-label">No HP</label>
                                            <input type="text" name="no_hp" class="form-control" placeholder="08xxxxxxxxxx" required>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Pekerjaan</label>
                                            <input type="text" name="pekerjaan" class="form-control" placeholder="Mahasiswa / Karyawan" required>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Alamat Pelanggan</label>
                                        <input type="text" name="alamat" class="form-control" placeholder="Alamat lengkap" required>
                                    </div>
                                    <button type="submit" class="btn btn-orange w-100">
                                        <i class="bi bi-plus-circle me-1"></i> Simpan Data Pelanggan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="panel-card">
                            <div class="panel-header">
                                <span class="fw-bold"><i class="bi bi-list-ul me-2"></i>Database Pelanggan</span>
                                <small class="text-muted">{{ $pelanggans->count() }} data</small>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-garage mb-0">
                                    <thead>
                                        <tr><th>ID</th><th>Nama Lengkap</th><th>No HP</th><th>Alamat</th><th>Pekerjaan</th></tr>
                                    </thead>
                                    <tbody>
                                        @forelse($pelanggans as $p)
                                        <tr>
                                            <td><span class="tag-id">{{ $p->id_pelanggan }}</span></td>
                                            <td class="fw-semibold">{{ $p->nama_lengkap }}</td>
                                            <td>{{ $p->no_hp }}</td>
                                            <td>{{ $p->alamat }}</td>
                                            <td>{{ $p->pekerjaan }}</td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="5" class="text-center py-4 text-muted">Belum ada data pelanggan.</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. DATA KENDARAAN (SPLIT VIEW) -->
            <div class="tab-pane fade" id="pane-kendaraan" role="tabpanel">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="panel-card">
                            <div class="panel-header">
                                <span class="fw-bold"><i class="bi bi-bicycle text-warning me-2"></i>Form Data Kendaraan</span>
                                <span class="badge bg-dark">Menu 2</span>
                            </div>
                            <div class="p-4">
                                <form action="{{ route('kendaraan.store') }}" method="POST">
                                    @csrf
                                    <div class="row g-2 mb-3">
                                        <div class="col-6">
                                            <label class="form-label">No Plat Kendaraan</label>
                                            <input type="text" name="no_plat" class="form-control text-uppercase" placeholder="BL 1234 AB" required>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Tahun Pembuatan</label>
                                            <input type="number" name="tahun_pembuatan" class="form-control" placeholder="2023" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jenis Kendaraan</label>
                                        <div class="radio-switch">
                                            <div>
                                                <input type="radio" name="jenis_kendaraan" id="rad_matic" value="Matic" required>
                                                <label for="rad_matic"><i class="bi bi-lightning-fill me-1"></i>Matic</label>
                                            </div>
                                            <div>
                                                <input type="radio" name="jenis_kendaraan" id="rad_manual" value="Manual Transmisi" required>
                                                <label for="rad_manual"><i class="bi bi-gear-fill me-1"></i>Manual Transmisi</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">No STNK</label>
                                        <input type="text" name="no_stnk" class="form-control" placeholder="Nomor STNK kendaraan" required>
                                    </div>
                                    <div class="row g-2 mb-4">
                                        <div class="col-7">
                                            <label class="form-label">Nama Pemilik</label>
                                            <input type="text" name="nama_pemilik" class="form-control" placeholder="Nama pemilik" required>
                                        </div>
                                        <div class="col-5">
                                            <label class="form-label">Warna</label>
                                            <input type="text" name="warna_kendaraan" class="form-control" placeholder="Hitam" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-orange w-100">
                                        <i class="bi bi-plus-circle me-1"></i> Simpan Data Kendaraan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="panel-card">
                            <div class="panel-header">
                                <span class="fw-bold"><i class="bi bi-list-ul me-2"></i>Unit Kendaraan Terdaftar</span>
                                <small class="text-muted">{{ $kendaraans->count() }} unit</small>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-garage mb-0">
                                    <thead>
                                        <tr><th>No Plat</th><th>Jenis</th><th>No STNK</th><th>Tahun</th><th>Pemilik</th><th>Warna</th></tr>
                                    </thead>
                                    <tbody>
                                        @forelse($kendaraans as $k)
                                        <tr>
                                            <td><span class="tag-plat">{{ $k->no_plat }}</span></td>
                                            <td><span class="badge bg-secondary">{{ $k->jenis_kendaraan }}</span></td>
                                            <td>{{ $k->no_stnk }}</td>
                                            <td>{{ $k->tahun_pembuatan }}</td>
                                            <td class="fw-semibold">{{ $k->nama_pemilik }}</td>
                                            <td>{{ $k->warna_kendaraan }}</td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="6" class="text-center py-4 text-muted">Belum ada data kendaraan.</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. DAFTAR SERVICE (SPLIT VIEW) -->
            <div class="tab-pane fade" id="pane-daftar" role="tabpanel">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="panel-card">
                            <div class="panel-header">
                                <span class="fw-bold"><i class="bi bi-journal-plus text-warning me-2"></i>Form Daftar Service</span>
                                <span class="badge bg-dark">Menu 3</span>
                            </div>
                            <div class="p-4">
                                <form action="{{ route('daftar-service.store') }}" method="POST">
                                    @csrf
                                    <div class="row g-2 mb-3">
                                        <div class="col-6">
                                            <label class="form-label">ID Servis Pelanggan</label>
                                            <input type="text" name="id_servis" class="form-control" placeholder="SRV-002" required>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Tanggal Servis</label>
                                            <input type="date" name="tanggal_servis" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">No Plat Kendaraan (Dropdown)</label>
                                        <select name="no_plat" class="form-select" required>
                                            <option value="">-- Pilih No Plat --</option>
                                            @foreach($kendaraans as $k)
                                                <option value="{{ $k->no_plat }}">{{ $k->no_plat }} ({{ $k->nama_pemilik }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">ID Pelanggan (Dropdown)</label>
                                        <select name="id_pelanggan" id="select_pelanggan" class="form-select" required>
                                            <option value="">-- Pilih ID Pelanggan --</option>
                                            @foreach($pelanggans as $p)
                                                <option value="{{ $p->id_pelanggan }}" data-nama="{{ $p->nama_lengkap }}">{{ $p->id_pelanggan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-warning-emphasis"><i class="bi bi-lightning-charge-fill me-1"></i>Nama Pelanggan (Otomatis)</label>
                                        <input type="text" id="auto_nama_pelanggan" class="form-control auto-highlight" readonly placeholder="Otomatis muncul setelah ID dipilih...">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Keluhan Kendaraan</label>
                                        <input type="text" name="keluhan" class="form-control" placeholder="Keluhan motor pelanggan" required>
                                    </div>
                                    <button type="submit" class="btn btn-orange w-100">
                                        <i class="bi bi-plus-circle me-1"></i> Simpan Daftar Service
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="panel-card">
                            <div class="panel-header">
                                <span class="fw-bold"><i class="bi bi-list-ul me-2"></i>Daftar Antrian Service</span>
                                <small class="text-muted">{{ $daftar_services->count() }} antrian</small>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-garage mb-0">
                                    <thead>
                                        <tr><th>ID Servis</th><th>No Plat</th><th>ID Pelanggan</th><th>Nama Pelanggan</th><th>Keluhan</th><th>Tanggal</th></tr>
                                    </thead>
                                    <tbody>
                                        @forelse($daftar_services as $ds)
                                        <tr>
                                            <td><span class="tag-id">{{ $ds->id_servis }}</span></td>
                                            <td><span class="tag-plat">{{ $ds->no_plat }}</span></td>
                                            <td>{{ $ds->id_pelanggan }}</td>
                                            <td class="fw-bold">{{ $ds->pelanggan->nama_lengkap ?? '-' }}</td>
                                            <td>{{ $ds->keluhan }}</td>
                                            <td>{{ $ds->tanggal_servis }}</td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="6" class="text-center py-4 text-muted">Belum ada daftar servis.</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. DATA SERVICE (SPLIT VIEW) -->
            <div class="tab-pane fade" id="pane-data" role="tabpanel">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="panel-card">
                            <div class="panel-header">
                                <span class="fw-bold"><i class="bi bi-tools text-warning me-2"></i>Form Data Service</span>
                                <span class="badge bg-dark">Menu 4</span>
                            </div>
                            <div class="p-4">
                                <form action="{{ route('data-service.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">ID Servis Pelanggan (Dropdown)</label>
                                        <select name="id_servis" id="select_servis" class="form-select" required>
                                            <option value="">-- Pilih ID Servis --</option>
                                            @foreach($daftar_services as $ds)
                                                <option value="{{ $ds->id_servis }}" data-keluhan="{{ $ds->keluhan }}">{{ $ds->id_servis }} — {{ $ds->no_plat }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-warning-emphasis"><i class="bi bi-lightning-charge-fill me-1"></i>Keluhan Kendaraan (Otomatis)</label>
                                        <input type="text" id="auto_keluhan" class="form-control auto-highlight" readonly placeholder="Otomatis muncul setelah ID Servis dipilih...">
                                    </div>
                                    <div class="row g-2 mb-3">
                                        <div class="col-6">
                                            <label class="form-label">Estimasi Service</label>
                                            <input type="text" name="estimasi_service" class="form-control" placeholder="2 Jam" required>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Nama Mekanik</label>
                                            <input type="text" name="nama_mekanik" class="form-control" placeholder="Nama mekanik" required>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Sparepart Pengganti</label>
                                        <input type="text" name="sparepart_pengganti" class="form-control" placeholder="Oli Mesin, Busi, Kampas Rem" required>
                                    </div>
                                    <button type="submit" class="btn btn-orange w-100">
                                        <i class="bi bi-plus-circle me-1"></i> Simpan Data Service
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="panel-card">
                            <div class="panel-header">
                                <span class="fw-bold"><i class="bi bi-list-ul me-2"></i>Pengerjaan & Sparepart Mekanik</span>
                                <small class="text-muted">{{ $data_services->count() }} pengerjaan</small>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-garage mb-0">
                                    <thead>
                                        <tr><th>ID Servis</th><th>Keluhan</th><th>Estimasi</th><th>Mekanik</th><th>Sparepart</th></tr>
                                    </thead>
                                    <tbody>
                                        @forelse($data_services as $dts)
                                        <tr>
                                            <td><span class="tag-id">{{ $dts->id_servis }}</span></td>
                                            <td>{{ $dts->daftarService->keluhan ?? '-' }}</td>
                                            <td>{{ $dts->estimasi_service }}</td>
                                            <td class="fw-semibold">{{ $dts->nama_mekanik }}</td>
                                            <td>{{ $dts->sparepart_pengganti }}</td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="5" class="text-center py-4 text-muted">Belum ada data service.</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5. PEMBAYARAN SERVICE (SPLIT VIEW) -->
            <div class="tab-pane fade" id="pane-pembayaran" role="tabpanel">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="panel-card">
                            <div class="panel-header">
                                <span class="fw-bold"><i class="bi bi-cash-coin text-success me-2"></i>Form Pembayaran Service</span>
                                <span class="badge bg-dark">Menu 5</span>
                            </div>
                            <div class="p-4">
                                <form action="{{ route('pembayaran.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">ID Servis Pelanggan (Dropdown)</label>
                                        <select name="id_servis" class="form-select" required>
                                            <option value="">-- Pilih ID Servis --</option>
                                            @foreach($daftar_services as $ds)
                                                <option value="{{ $ds->id_servis }}">{{ $ds->id_servis }} — {{ $ds->pelanggan->nama_lengkap ?? '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah Biaya Servis (Rp)</label>
                                        <input type="number" name="jumlah_biaya" class="form-control" placeholder="150000" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jenis Pembayaran (Opsional)</label>
                                        <div class="radio-switch">
                                            <div>
                                                <input type="radio" name="jenis_pembayaran" id="pay_cash" value="Cash / Tunai" checked>
                                                <label for="pay_cash"><i class="bi bi-cash me-1"></i>Cash / Tunai</label>
                                            </div>
                                            <div>
                                                <input type="radio" name="jenis_pembayaran" id="pay_non" value="Non Tunai">
                                                <label for="pay_non"><i class="bi bi-qr-code me-1"></i>Non Tunai</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Keterangan</label>
                                        <input type="text" name="keterangan" class="form-control" placeholder="Lunas / Catatan transaksi">
                                    </div>
                                    <button type="submit" class="btn btn-success w-100 fw-semibold py-2">
                                        <i class="bi bi-check2-circle me-1"></i> Simpan Pembayaran
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="panel-card">
                            <div class="panel-header">
                                <span class="fw-bold"><i class="bi bi-receipt me-2"></i>Riwayat Pembayaran</span>
                                <small class="text-muted">{{ $pembayarans->count() }} transaksi</small>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-garage mb-0">
                                    <thead>
                                        <tr><th>ID Servis</th><th>Jumlah Biaya</th><th>Jenis Pembayaran</th><th>Keterangan</th></tr>
                                    </thead>
                                    <tbody>
                                        @forelse($pembayarans as $pb)
                                        <tr>
                                            <td><span class="tag-id">{{ $pb->id_servis }}</span></td>
                                            <td class="fw-bold text-success">Rp {{ number_format($pb->jumlah_biaya, 0, ',', '.') }}</td>
                                            <td><span class="badge bg-dark text-warning">{{ $pb->jenis_pembayaran }}</span></td>
                                            <td>{{ $pb->keterangan ?? '-' }}</td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="4" class="text-center py-4 text-muted">Belum ada data pembayaran.</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Otomatis isi Nama Pelanggan saat ID Pelanggan dipilih
    document.getElementById('select_pelanggan').addEventListener('change', function() {
        const selected = this.options[this.selectedIndex];
        document.getElementById('auto_nama_pelanggan').value = selected.getAttribute('data-nama') || '';
    });

    // Otomatis isi Keluhan Kendaraan saat ID Servis dipilih
    document.getElementById('select_servis').addEventListener('change', function() {
        const selected = this.options[this.selectedIndex];
        document.getElementById('auto_keluhan').value = selected.getAttribute('data-keluhan') || '';
    });

    // Simpan posisi menu sidebar aktif agar tidak reset setelah simpan data
    document.querySelectorAll('#garageMenu button[data-bs-toggle="pill"]').forEach(function(btn) {
        btn.addEventListener('shown.bs.tab', function(e) {
            localStorage.setItem('activeGarageMenu', e.target.id);
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const savedMenu = localStorage.getItem('activeGarageMenu');
        if (savedMenu) {
            const el = document.getElementById(savedMenu);
            if (el) new bootstrap.Tab(el).show();
        }
    });
</script>
</body>
</html>
