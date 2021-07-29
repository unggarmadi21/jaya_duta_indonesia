<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komunitas;
use Session;

class KomunitasController extends Controller
{
    public function index(){

        if (empty(Session::get('id_user'))) {
            return redirect('admin/login');
        }

        $komunitas = Komunitas::all();
    	return view('komunitas/index_komunitas', compact('komunitas'));
    }

    public function insert(Request $req){

        $this->validate($req,[
            'nama_komunitas' => 'required'
        ]);

        $tori = new Komunitas; 

        $tori->id_komunitas = uniqid();
        $tori->nama_komunitas = $req->nama_komunitas;

        $tori->save();

        return redirect('admin/komunitas');
    }

    public function edit($id){

        if (empty(Session::get('id_user'))) {
            return redirect('admin/login');
        }
        
        $komunitas = Komunitas::where('id_komunitas', $id)->first();

        return view('komunitas/edit_komunitas', ['data' => $komunitas]);
    }

    public function update(Request $req, $id){

        $data = array(
            'nama_komunitas' => $req->nama_komunitas
        );

        Komunitas::where('id_komunitas',$id)->update($data);

        return redirect('admin/komunitas');
    }

    public function destroy($id)
    {

        Komunitas::where('id_komunitas', $id)->delete();

        return redirect('admin/komunitas')->with('success', 'Data is successfully deleted');
    }
}
