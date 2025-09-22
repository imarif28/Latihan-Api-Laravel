<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);

        return response()->json([
            'success'   => true,
            'message'   => 'List Semua Posts',
            'data'      => $posts
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title'   => 'required',
                'content' => 'required',
            ],
            [
                'title.required'   => 'Masukkan Title Post !',
                'content.required' => 'Masukkan Content Post !',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Silahkan isi bidang yang kosong',
                'data'    => $validator->errors()
            ], 422);
        } else {
            $post = Post::create([
                'title'   => $request->input('title'),
                'content' => $request->input('content')
            ]);

            if ($post) {
                return response()->json([
                    'success'   => true,
                    'message'   => 'Post Berhasil Disimpan!',
                    'data'      => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post gagal disimpan!',
                ], 400);
            }
        }
    }

    public function show($id)
    {
        $post = Post::find($id);

        if ($post) {
            return response()->json([
                'success'   => true,
                'message'   => 'Detail Post!',
                'data'      => $post
            ], 200);
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'Post tidak ditemukan!',
                'data'      => null
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title'   => 'required',
                'content' => 'required',
            ],
            [
                'title.required'   => 'Masukkan Title Post !',
                'content.required' => 'Masukkan Content Post !',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 422);
        }

        $post = Post::find($id);

        if ($post) {

            $post->update([
                'title'   => $request->input('title'),
                'content' => $request->input('content'),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Post Berhasil Diupdate!',
                'data'    => $post
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post Tidak Ditemukan!',
            ], 404);
        }
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if ($post) {
            $post->delete();

            return response()->json([
                'success' => true,
                'message' => 'Post Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post Tidak Ditemukan!',
            ], 404);
        }
    }
}
