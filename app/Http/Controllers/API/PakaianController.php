<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pakaian;

class PakaianController extends Controller
{
    public function index()
    {
        $pakaian = Pakaian::all();

        return response()->json($pakaian);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|string|max:255',
            'merk' => 'required|string|max:255',
        ]);

        $pakaian = Pakaian::create([
            'jenis' => $request->jenis,
            'merk' => $request->merk,
        ]);

        return response()->json($pakaian, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required|string|max:255',
            'merk' => 'required|string|max:255',
        ]);

        $pakaian = Pakaian::findOrFail($id);
        $pakaian->update([
            'jenis' => $request->jenis,
            'merk' => $request->merk,
        ]);

        return response()->json($pakaian);
    }

    public function destroy($id)
    {
        $pakaian = Pakaian::findOrFail($id);
        $pakaian->delete();

        return response()->json(['message' => 'Pakaian deleted successfully']);
    }
}
