@extends('layouts.app')

@section('title', 'Profil Petugas')

@section('style')
    <style>
        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 6px;
            margin-top: 4px;
            box-sizing: border-box;
        }

        .error {
            color: #b91c1c;
            font-size: 14px;
            margin-top: 4px;
        }

        .success {
            color: #15803d;
            background: #dcfce7;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }

        .btn {
            margin-top: 20px;
            padding: 8px 16px;
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .profile-info {
            margin-bottom: 25px;
        }

        .profile-info p {
            margin-top: 4px;
        }
    </style>
@endsection

@section('content')
    <h1>Profil Petugas</h1>

    <p>Informasi akun petugas yang sedang login.</p>

    {{-- Informasi Profil --}}
    <div class="profile-info">
        <label>Nama</label>
        <p>{{ $user->name }}</p>

        <label>Email</label>
        <p>{{ $user->email }}</p>

        <label>Role</label>
        <p>{{ ucfirst($user->role) }}</p>
    </div>

    <hr>

    {{-- Notifikasi Berhasil --}}
    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Ganti Password --}}
    <h2>Ganti Password</h2>
    <p>Masukkan password lama dan password baru untuk mengganti password akun.</p>

    <form action="{{ route('profil.password') }}" method="POST">
        @csrf

        <label for="password_lama">Password Lama</label>
        <input
            type="password"
            name="password_lama"
            id="password_lama"
            required
        >
        @error('password_lama')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="password_baru">Password Baru</label>
        <input
            type="password"
            name="password_baru"
            id="password_baru"
            required
        >
        @error('password_baru')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="password_baru_confirmation">Konfirmasi Password Baru</label>
        <input
            type="password"
            name="password_baru_confirmation"
            id="password_baru_confirmation"
            required
        >

        <button type="submit" class="btn">
            Ganti Password
        </button>
    </form>
@endsection

