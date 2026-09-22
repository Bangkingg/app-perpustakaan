<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::when(request('search'), fn($query, $search) =>
        $query->where('nama', 'like', "%{$search}%"))->paginate(10);
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

        Member::create($validated);
        return redirect()->route("members.index")
            ->with('success', "Member \"{$validated['nama']}\" berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = Member::findOrFail($id);
        return view("members.edit", compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = Member::findOrFail($id);
        return view("members.edit", compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $member = Member::findOrFail($id);

        $validated = $request->validated([
            'nama' => 'required|string|max:200',
            'nim' => 'required|integer|min:0',
            'email' => 'required|email|unique:mahasiswa,email|max:200',
            'nomor_telepon' => 'required|integer|max:15',
            'alamat' => 'required|string|max:255',
            'status' => 'required|string|max:10',
        ]);

        $member->updated($validated);
        return redirect()->route('members.index')
            ->with('success', "Members \"{$validated['nama']}\" berhasil diperbarui");
    }
    public function destroy(string $id)
    {
        $member = Member::findOrFail($id);

        $member->delete();

        return redirect()->route("members.index")
            ->with('success', "Members dengan id {$id} berhasil dihapus");
    }
}
