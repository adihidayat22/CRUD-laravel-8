<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class Players extends Controller
{
    public function index()
    {
        $pemain = Player::all()->sortBy('nama');
        return view('Player.index', compact('pemain'));
    }

    public function create()
    {
        return view('Player.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => "required|min:3|max:50|regex:/^([-a-z .',-])+$/i",
        ]);

        $pemain = Player::create([
            'nama' => $request->nama,
        ]);

        if ($pemain) {
            return redirect()
                ->route('players.index')
                ->with([
                    'success' => 'Data Pemain Yang Baru Berhasil Di Tambah'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi Kesalahan !'
                ]);
        }
    }

    public function edit($id)
    {
        $pemain = Player::findOrFail($id);
        return view('Player.edit', compact(['pemain']));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => "required|min:3|max:50|regex:/^([-a-z .',-])+$/i",
        ]);

        $player = Player::findOrFail($id);

        $player->update([
            'nama' =>  $request->nama,
        ]);

        if ($player) {
            return redirect()
                ->route('players.index')
                ->with([
                    'success' => 'Data Pemain Berhasil Diperbarui'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi Kesalahan, Silahkan Coba Kembali'
                ]);
        }
    }

    public function destroy($id)
    {
        $pemain = Player::findOrFail($id);
        $pemain->delete();

        if ($pemain) {
            return redirect()
                ->route('players.index')
                ->with([
                    'success' => 'Pemain Berhasil Dihapus !'
                ]);
        } else {
            return redirect()
                ->route('players.index')
                ->with([
                    'error' => 'Terjadi Kesalahan, Silahkan Coba Kembali'
                ]);
        }
    }
}
