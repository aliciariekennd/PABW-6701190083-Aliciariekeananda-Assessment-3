<?php

namespace App\Controllers;
use App\Models\ArtikelModel;
use Config\Services;
use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{
	public function randString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
	public function index()
	{
		return view('list');
	}
	public function get()
    {
        $request = Services::request();
        $datatable = new ArtikelModel($request);

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $list->artikel_id;
                $row[] = $list->tanggal;
                $row[] = $list->judul;
				$row[] = $list->konten;
				$row[] = '<a class="btn btn-sm btn-primary" href="'.$list->artikel_id.'/edit">Edit</a>&nbsp;<a href="#" data-href="'.base_url('/'.$list->artikel_id.'/delete').'" onclick="confirmToDelete(this)" class="btn btn-sm btn-danger">Hapus</a>';
                $data[] = $row;
            }

            $output = [
                'draw' => $request->getPost('draw'),
                'recordsTotal' => $datatable->countAll(),
                'recordsFiltered' => $datatable->countFiltered(),
                'data' => $data
            ];

            echo json_encode($output);
        }
    }
	public function tambah() {
		return view('tambah');
	}
	public function add() {
		// lakukan validasi
		$request = Services::request();
        $validation =  Services::validation();
        $validation->setRules(['judul' => 'required']);
        $isDataValid = $validation->withRequest($request)->run();

        // jika data valid, simpan ke database
        if($isDataValid){
            $model = new ArtikelModel($request);
            $model->insert([
				"artikel_id" => "KL".$this->randString(),
				"tanggal" => date("Y-m-d H:i:s"),
                "judul" => $request->getPost('judul'),
                "konten" => $request->getPost('konten'),
            ]);
            return redirect('/');
        }
		
        // tampilkan form create
        echo view('tambah');
	}
	public function edit($id) {
		$request = Services::request();
		$model = new ArtikelModel($request);
		$data['data'] = $model->where('artikel_id', $id)->first();
		
		if(!$data['data']){
			throw PageNotFoundException::forPageNotFound();
		}
		echo view('edit', $data);
	}
	public function update($id) {
		$request = Services::request();
		// ambil artikel yang akan diedit
        $model = new ArtikelModel($request);
        $data['data'] = $model->where('artikel_id', $id)->first();
        
        // lakukan validasi data artikel
        $validation =  Services::validation();
        $validation->setRules([
            'artikel_id' => 'required',
            'judul' => 'required'
        ]);
        $isDataValid = $validation->withRequest($request)->run();
        // jika data vlid, maka simpan ke database
        if($isDataValid){
            $model->update($id, [
                "judul" => $request->getPost('judul'),
                "konten" => $request->getPost('konten'),
            ]);
            return redirect('/');
        }

        // tampilkan form edit
        echo view('edit', $data);
    }

    //--------------------------------------------------------------------------

	public function delete($id){
		$request = Services::request();
        $model = new ArtikelModel($request);
        $model->delete($id);
        return redirect('/');
    }
}
