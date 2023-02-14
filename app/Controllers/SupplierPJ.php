<?php

namespace App\Controllers;

use App\Models\SupplierPJModel;
use CodeIgniter\RESTful\ResourcePresenter;

class SupplierPJ extends ResourcePresenter
{
    public function index()
    {
        //
    }


    public function show($id = null)
    {
        //
    }


    public function new()
    {
        //
    }


    public function create()
    {
        $modelSupplierPJ = new SupplierPJModel();
        $id_supplier = $this->request->getPost('id_supplier');

        $data = [
            'id_supplier' => $this->request->getPost('id_supplier'),
            'id_user' => $this->request->getPost('id_user'),
            'urutan' => $this->request->getPost('urutan'),
        ];
        $modelSupplierPJ->save($data);

        session()->setFlashdata('pesan', 'Penanggung Jawab berhasil ditambahkan.');

        return redirect()->to('/supplier/' . $id_supplier . '/edit');
    }


    public function edit($id = null)
    {
        $modelSupplierPJ = new SupplierPJModel();
        echo json_encode($modelSupplierPJ->find($id));
    }


    public function update($id = null)
    {
        $modelSupplierPJ = new SupplierPJModel();
        $id_supplier = $this->request->getPost('id_supplier');

        $data = [
            'id'            => $id,
            'urutan'        => $this->request->getPost('edit-urutan'),
        ];
        $modelSupplierPJ->save($data);

        session()->setFlashdata('pesan', 'Penanggung Jawab berhasil diedit.');

        return redirect()->to('/supplier/' . $id_supplier . '/edit');
    }


    public function remove($id = null)
    {
        //
    }


    public function delete($id = null)
    {
        $id_supplier = $this->request->getPost('id_supplier');

        $modelSupplierPJ = new SupplierPJModel();

        $modelSupplierPJ->delete($id);

        session()->setFlashdata('pesan', 'Penanggung Jawab berhasil dihapus.');
        return redirect()->to('/supplier/' . $id_supplier . '/edit');
    }
}