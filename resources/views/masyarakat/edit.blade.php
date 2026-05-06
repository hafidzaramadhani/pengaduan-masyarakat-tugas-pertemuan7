@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold text-dark mb-1">Tambah Data Masyarakat</h2>
                    <p class="text-muted small mb-0">Pastikan NIK dan Nomor KK sudah sesuai dengan KTP asli.</p>
                </div>
                <a href="{{ route('masyarakat.index') }}" class="btn btn-outline-secondary btn-sm px-3">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <div class="card border-0 shadow-sm p-4" style="border-radius: 16px;">
                <form action="{{ route('masyarakat.update', $masyarakat->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold text-secondary">Nomor KK</label>
                            <input type="text" name="nomor_kk" class="form-control @error('nomor_kk') is-invalid @enderror" 
                                   value="{{ $masyarakat->nomor_kk }}" placeholder="Masukkan 16 digit No. KK">
                            @error('nomor_kk') 
                                <div class="invalid-feedback">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold text-secondary">Nomor KTP (NIK)</label>
                            <input type="text" name="nomor_ktp" class="form-control @error('nomor_ktp') is-invalid @enderror" 
                                   value="{{ $masyarakat->nomor_ktp }}" readonly="Masukkan 16 digit NIK">
                            @error('nomor_ktp') 
                                <div class="invalid-feedback">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label fw-semibold text-secondary">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" 
                                   value="{{ $masyarakat->nama }}" placeholder="Nama sesuai identitas">
                            @error('nama') 
                                <div class="invalid-feedback">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label fw-semibold text-secondary">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror">
                                <option value="" selected disabled> Pilih Jenis Kelamin </option>
                                <option value="Laki-Laki" {{ $masyarakat->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="Perempuan" {{ $masyarakat->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin') 
                                <div class="invalid-feedback">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="col-12 mb-4">
                            <label class="form-label fw-semibold text-secondary">Alamat Lengkap</label>
                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" 
                                      rows="3" placeholder="Contoh: Jl. Merdeka No. 10, RT 01/RW 02">{{ $masyarakat->alamat }}</textarea>
                            @error('alamat') 
                                <div class="invalid-feedback">{{ $message }}</div> 
                            @enderror
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary py-2 fw-bold shadow-sm">
                            <i class="bi bi-save me-2"></i> Simpan Data Masyarakat
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

    body {
        background-color: #f3f4f6;
        font-family: 'Inter', sans-serif;
    }

    .form-label {
        font-size: 0.85rem;
    }

    .form-control, .form-select {
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 10px 15px;
        font-size: 0.95rem;
        transition: all 0.2s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }

    .btn-primary {
        background-color: #4f46e5;
        border: none;
        border-radius: 10px;
        transition: all 0.3s;
    }

    .btn-primary:hover {
        background-color: #4338ca;
        transform: translateY(-1px);
    }

    .invalid-feedback {
        font-size: 0.8rem;
    }
</style>
@endpush
