<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]);

        // Simpan data ke database
        $post = Post::create($validated);

        // Kembalikan response JSON
        return response()->json([
            'message' => 'Post berhasil dibuat!',
            'data' => $post
        ], 201);
    }
    public function update(Request $request, $id)
{
    $post = Post::find($id);

    if (!$post) {
        return response()->json([
            'message' => 'Data tidak ditemukan'
        ], 404);
    }

    $post->update($request->only(['title', 'content']));

    return response()->json([
        'message' => 'Data berhasil diperbarui',
        'data' => $post
    ], 200);
}
public function destroy($id)
{
    // Cari post berdasarkan id
    $post = Post::find($id);

    // Jika data tidak ditemukan
    if (!$post) {
        return response()->json([
            'message' => 'Data tidak ditemukan'
        ], 404);
    }

    // Hapus data
    $post->delete();

    // Berikan response
    return response()->json([
        'message' => 'Data berhasil dihapus'
    ], 200);
}

public function show($id)
{
    $post = Post::find($id);

    if (!$post) {
        return response()->json([
            'message' => 'Data tidak ditemukan'
        ], 404);
    }

    return response()->json($post);
}

    public function index()
    {
        // Ambil semua data
        $posts = Post::all();

        return response()->json([
            'message' => 'Daftar semua post',
            'data' => $posts
        ]);
    }
}
