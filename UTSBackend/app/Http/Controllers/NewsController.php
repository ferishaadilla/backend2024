<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mengambil semua data dari model news
        $news = News::all();

        if ($news->isNotEmpty()) {
            //membuat array jika data tidak kosong
            $data = [
                'message' => 'Get All Resource',
                'data' => $news,
            ];
            return response()->json($data, 200);
        } else {
            return response()->json([
                'message' => 'Data is Empty'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required',
            'url' => 'required|url',
            'url_image' => 'required|url',
            'published_at' => 'required|date',
            'category' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        //menyimpan data ke database
        $news = News::create($request->all());

        //menampilkan notif jika berhasil disimpan
        if ($news) {
            $data = [
                'message' => 'Successfully',
                'data' => $news,
            ];
            return response()->json($data, 201);
        } else {
            //menampilkan notif jika gagal disimpan
            $data = [
                'message' => 'Failed Updated'
            ];
        }

        return response()->json($data, 404);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //mencari data news berdasarkan id
        $news = News::find($id);

        if ($news) {
            //membuat array jika data ditemukan
            $data = [
                'message' => 'Get Detail Resource',
                'data' => $news,
            ];
            return response()->json($data, 200);
        } else {
            //jika data tidak ditemykan akan direspon dengan pesan
            $data = [
                'message' => 'Resource not found',
            ];

            return response()->json($data, 404);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = News::find($id);

        if ($news) {
            //mengambil data request
            $input = [
                'title' => $request->title ?? $news->title,
                'author' => $request->author ?? $news->author,
                'description' => $request->description ?? $news->description,
                'content' => $request->content ?? $news->content,
                'url' => $request->url ?? $news->url,
                'url_image' => $request->url_image ?? $news->url_image,
                'published_at' => $request->published_at ?? $news->published_at,
                'category' => $request->category ?? $news->category

            ];

            //mengupdate data
            $news->update($input);

            $data = [
                'message' => 'Resource is Updated Successfully',
                'data' => $news
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 404);
        }
    }


    //menghapus data
    public function destroy(string $id)
    {
        $news = News::find($id);

        if ($news) {
            $news->delete();

            $data = [
                'message' => 'Resource is Delete Successfully'
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];
            return response()->json($data, 404);
        }
    }
}