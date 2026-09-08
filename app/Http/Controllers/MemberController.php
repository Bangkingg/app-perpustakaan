<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private array $members = [
        [
            'id' => 1,
            'nama' => 'Arya Denta Wibisana',
            'nim' => '3125500023',
            'email' => 'arya@example.com',
            'nomor_telepon' => '081234567890',
            'alamat' => 'Surabaya',
            'status' => 'Aktif'
        ],
        [
            'id' => 2,
            'nama' => 'Budi Santoso',
            'nim' => '3125500024',
            'email' => 'budi@example.com',
            'nomor_telepon' => '081298765432',
            'alamat' => 'Sidoarjo',
            'status' => 'Aktif'
        ],
        [
            'id' => 3,
            'nama' => 'Citra Lestari',
            'nim' => '3125500025',
            'email' => 'citra@example.com',
            'nomor_telepon' => '082112345678',
            'alamat' => 'Gresik',
            'status' => 'Aktif'
        ]
    ];

    public function index()
    {
        $members = $this->members;
        return view("members.index", compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("members.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();
        return redirect()->route("categories.index")
            ->with('success', "Member \"{$validated['nama']}\" berhasil ditambahkan (data dummy, belum tersimpan ke database).");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = collect($this->members)->firstWhere('id', (int) $id);

        abort_if(! $member, 404);

        return view("members.edit", compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = collect($this->members)->firstWhere('id', (int) $id);

        abort_if(! $member, 404);

        return view("members.edit", compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validated([
            'nama' => 'required|string|max:200',
            'nim' => 'required|integer|min:0',
            'email' => 'required|email|unique:mahasiswa,email|max:200',
            'nomor_telepon' => 'required|integer|max:15',
            'alamat' => 'required|string|max:255',
            'status' => 'required|string|max:10',
        ]);
        return redirect()->route('members.index')
            ->with('success', "Members \"{$validated['nama']}\" berhasil diperbarui (data dummy, belum tersimpan ke database).");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route("members.index")
            ->with('success', "Members dengan id {$id} berhasil dihapus (data dummy, belum tersimpan ke database).");
    }
}
