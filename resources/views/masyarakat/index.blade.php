@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
            <h5 class="mb-0 fw-bold text-primary">
                <i class="bi bi-people-fill me-2"></i>Daftar Masyarakat
            </h5>
            <a href="{{ route('masyarakat.create') }}" class="btn btn-primary btn-sm px-3 shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Tambah Data
            </a>
        </div>
        
        <div class="card-body p-0"> <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-secondary">
                        <tr>
                            <th class="ps-4">No</th>
                            <th>No. KK</th>
                            <th>No. KTP</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat</th>
                            <th>L/P</th>
                            <th class="text-center pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    @forelse($masyarakats as $index => $m)
                        <tr>
                            <td class="ps-4">{{ $index + 1 }}</td>
                            <td><code>{{ $m->nomor_kk ?? '-' }}</code></td>
                            <td><code>{{ $m->nomor_ktp }}</code></td>
                            <td class="fw-bold text-dark">{{ $m->nama }}</td>
                            <td>{{ $m->alamat }}</td>
                            <td>{{ str_contains(strtolower($m->jenis_kelamin), 'laki') ? 'L' : 'P' }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Aksi
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('masyarakat.edit', $m->id) }}">Edit</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                <i class="bi bi-info-circle me-1"></i> Belum ada data masyarakat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    body {
        background-color: #f8f9fa; /* Warna background abu-abu soft */
    }

    .card {
        border-radius: 12px;
    }

    /* Styling Header Tabel */
    .table thead th {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        border-top: none;
        padding: 15px 10px;
    }

    /* Efek Hover baris */
    .table-hover tbody tr:hover {
        background-color: #f1f5f9 !important;
        transition: all 0.2s ease-in-out;
    }

    /* Styling Badge */
    .badge {
        font-weight: 500;
        font-size: 0.75rem;
    }

    /* custom styling untuk kolom code (NIK/KK) */
    code {
        padding: 2px 6px;
        background-color: #f1f1f1;
        border-radius: 4px;
    }

    /* Jarak antar tombol aksi */
    .btn-group .btn {
        margin: 0 2px;
        border-radius: 6px !important;
    }

    /* Animasi muncul */
    .card {
        animation: fadeInUp 0.5s ease;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endpush