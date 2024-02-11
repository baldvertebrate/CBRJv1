<?php

namespace App\Http\Controllers;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $position = Position::all();
        return view ('admin.position.home', ['position' => $position]);
        //dd($department);
    }

    public function create()
    {
        return view ('admin.position.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:4|max:255|unique:positions'
        ]);

        $newPosition = Position::create($data);

        return redirect(route('admin.position.home'))->with('status', 'Position has been succesfully added!');
    }
    public function destroy(Request $request, Position $position)
    {
        $position->delete();

        return redirect(route('admin.position.home'))->with('status', 'Position has been succesfully deleted!');
    }
    public function modify(Position $positions)
    {
        return view('admin.position.modify', ['positions' => $positions]);
    }
    public function update(Request $request, Position $position)
    {
        $data = $request->validate([
            'name' => 'required|min:4|max:255|unique:positions,name,' . $position->id,
        ]);

        $position->update($data);

        return redirect(route('admin.position.home'))->with('status', 'Position has been succesfully updated!');
    }
}
