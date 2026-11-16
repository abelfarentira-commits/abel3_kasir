<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenjang;

class JenjangController extends Controller
{
    // Menampilkan daftar jenjang
    public function index()
    {
        $jenjangs = Jenjang::query()
            ->when(request('search'), function ($query) {
                $query->where('kode_jenjang', 'like', '%' . request('search') . '%')
                    ->orWhere('nama_jenjang', 'like', '%' . request('search') . '%');
            })
            ->paginate(10);

        return view('jenjang.index', compact('jenjangs'));
    }

    // Form tambah jenjang
    public function create()
    {
        return view('jenjang.create');
    }

    // Menyimpan jenjang
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_jenjang' => 'required|string|max:255',
            'kode_jenjang' => 'required|string|max:10|unique:jenjangs',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif'
        ]);

        Jenjang::create($validatedData);

        return redirect()->route('jenjang.index')
            ->with('success', 'Jenjang berhasil ditambahkan.');
    }

    // Menampilkan detail jenjang
    public function show(string $id)
    {
        $jenjang = Jenjang::findOrFail($id);

        return view('jenjang.show', compact('jenjang'));
    }

    // Form edit jenjang
    public function edit(string $id)
    {
        $jenjang = Jenjang::findOrFail($id);

        return view('jenjang.edit', compact('jenjang'));
    }

    // Memperbarui data jenjang
    public function update(Request $request, string $id)
    {
        $jenjang = Jenjang::findOrFail($id);

        $validatedData = $request->validate([
            'kode_jenjang' => 'required|string|max:10|unique:jenjangs,kode_jenjang,' . $jenjang->id,
            'nama_jenjang' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $jenjang->update($validatedData);

        return redirect()->route('jenjang.index')
            ->with('success', 'Jenjang berhasil diperbarui.');
    }

    // Menghapus jenjang
    public function destroy(Jenjang $jenjang)
    {
        $jenjang->delete();

        return redirect()->route('jenjang.index')
            ->with('success', 'Jenjang berhasil dihapus.');
    }
}
