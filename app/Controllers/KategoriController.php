<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class KategoriController extends BaseController
{
    protected $kategori;

    function __construct()
    {
        $this->kategori = new KategoriModel();
    }

    public function index()
    {
        $kategori = $this->kategori->findAll();
        $data['kategori'] = $kategori;

        return view('v_kategori', $data);
    }

    public function create()
    {
        $dataFoto = $this->request->getFile('foto');

        $dataForm = [
            'nama' => $this->request->getPost('nama'),
            'created_at' => date("Y-m-d H:i:s")
        ];


        $this->kategori->insert($dataForm);

        return redirect('produk-kategori')->with('success', 'Data Berhasil Ditambah');
    }

    public function edit($id)
    {
        $dataKategori = $this->kategori->find($id);

        $dataForm = [
            'nama' => $this->request->getPost('nama'),
            'updated_at' => date("Y-m-d H:i:s")
        ];

        $this->kategori->update($id, $dataForm);

        return redirect('produk-kategori')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $dataKategori = $this->kategori->find($id);

        $this->kategori->delete($id);

        return redirect('produk-kategori')->with('success', 'Data Berhasil Dihapus');
    }
}