@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('content')

    <div class="header-members">
        <div>
            <h1>Daftar Anggota</h1>
            <a href="{{ route('members.create') }}" class="btn">+ Tambah Anggota</a>
        </div>

        <form action="{{ route('members.index') }}" method="GET" class="search-form">
            <input
                type="text"
                name="search"
                placeholder="Cari nama anggota..."
                value="{{ request('search') }}"
            >
            <button type="submit" class="btn">Cari</button>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($members as $member)
                <tr>
                    <td>{{ $member['id'] }}</td>
                    <td>{{ $member['nama'] }}</td>
                    <td>{{ $member['nim'] }}</td>
                    <td>{{ $member['email'] }}</td>
                    <td>{{ $member['nomor_telepon'] }}</td>
                    <td>{{ ucfirst($member['status']) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data anggota.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $members->appends(request()->query())->links() }}

@endsection

<style>
    .header-members {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .header-members h1 {
        margin-bottom: 10px;
    }

    .search-form {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .search-form input {
        width: 250px;
        padding: 8px 12px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .search-form .btn {
        padding: 8px 15px;
    }
</style>
