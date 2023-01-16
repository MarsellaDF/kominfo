<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\AdminBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['article'] =  DB::table('articles')->orderByDesc('id')
                                                 ->get();
        return view('article.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        $penulis = 'Admin';

        $reqImage = $request->image;
        if ($request->hasFile('image')) {
            $name = time() . rand(1, 100) . '.' . $reqImage->extension();
            $reqImage->move(public_path() . '/upload/articles/', $name);
            $imageurl = $name;
        }

        $dtarticles = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $imageurl,
            'created_by' => $penulis,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('articles')->insert($dtarticles);

        if ($save) {
            return redirect('/article')
                ->with([
                    'success' => 'Data Berhasil Ditambah',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Gagal Ditambah!',
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data'] =  AdminBerita::where('id', $id)
            ->first();
        // $data["data"]->created_at = $data["data"]->created_at
        // return $data;

        return view('detail-berita', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['articles'] =  DB::table('articles')->where('id', $id)->first();
        return view('article.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $articles =  DB::table('articles')->where('id', $id)->first();
        $imageurl = $articles->image;
        $penulis = 'Admin';

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time() . rand(1, 100) . '.' . $reqImage->extension();
            $reqImage->move(public_path() . '/upload/articles/', $name);
            $imageurl = $name;

            $file = 'upload/articles/' . $articles->image;
            if ($articles->image != '' && $articles->image != null) {
                unlink($file);
            }
        }

        $dtarticles = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $imageurl,
            'created_by' => $penulis,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('articles')
            ->where('id', $id)
            ->update($dtarticles);

        if ($data) {
            return redirect('/article')
                ->with([
                    'success' => 'Data Berhasil Diperbarui',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Gagal Diperbarui!',
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articles = Article::where('id', $id)->first();

        if (empty($articles)) {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'data Artikel tidak ditemukan!',
                ]);
        }

        $file = 'upload/articles/' . $articles->image;
        if ($articles->image != '' && $articles->image != null) {
            unlink($file);
        }

        $data = Article::where('id', $id)->delete();

        if ($data) {
            return redirect('/article')
                ->with([
                    'success' => 'Data Berhasil Dihapus',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Gagal Dihapus!',
                ]);
        }
    }
}