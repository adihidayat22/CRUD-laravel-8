<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Playing;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index(){
        $jadwal = Playing::join('players', 'playings.player_id', '=', 'players.id')->orderBy('playings.start_time', 'desc')->get(['players.nama', 'playings.id', 'playings.start_time', 'playings.score']);
        return view('Home.index', compact('jadwal'));
    }

    public function create()
    {
        $player = Player::all();
        return view('Home.create', compact('player'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'pemain' => 'required|exists:players,id',
            'tgl' => 'required|date',
            'score' => 'required|numeric'
        ]);

        $jadwal = Playing::create([
            'player_id' => $request->pemain,
            'start_time' =>  date('Y-m-d', strtotime($request->tgl)),
            'score' =>  $request->score,
        ]);

        if ($jadwal) {
            return redirect()
                ->route('home.index')
                ->with([
                    'success' => 'Data Jadwal Yang Baru Berhasil Di Tambah'
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
        $play = Playing::findOrFail($id);
        $player = Player::all();
        return view('Home.edit', compact(['play', 'player']));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'pemain' => 'required|exists:players,id',
            'tgl' => 'required|date',
            'score' => 'required|numeric'
        ]);

        $play = Playing::findOrFail($id);

        $play->update([
            'player_id' => $request->pemain,
            'start_time' =>  date('Y-m-d', strtotime($request->tgl)),
            'score' =>  $request->score,
        ]);

        if ($play) {
            return redirect()
                ->route('home.index')
                ->with([
                    'success' => 'Data Jadwal Berhasil Diperbarui'
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
        $jadwal = Playing::findOrFail($id);
        $jadwal->delete();

        if ($jadwal) {
            return redirect()
                ->route('home.index')
                ->with([
                    'success' => 'Jadwal Berhasil Dihapus !'
                ]);
        } else {
            return redirect()
                ->route('home.index')
                ->with([
                    'error' => 'Terjadi Kesalahan, Silahkan Coba Kembali'
                ]);
        }
    }

}
