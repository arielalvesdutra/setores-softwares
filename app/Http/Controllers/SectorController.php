<?php

namespace App\Http\Controllers;

use App\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class SectorController extends Controller
{
    public function destroy(int $id)
    {
        Sector::destroy($id);

        return redirect('/sectors');
    }

    public function edit(Sector $sector)
    {
        return view('sector.edit', compact('sector'));
    }

    public function index()
    {
        $sectors = Sector::all();

        return view('sector.index', compact('sectors'));
    }

    public function store(Sector $sector)
    {
        $name = request('name');

        if (empty($name)) {
            return back()->with('errors',
                new MessageBag(['nameRequired' => 'nameRequired']));
        }

        $hasDuplicated =
            Sector::where('name','=', $name)->first();

        if ($hasDuplicated) {
            return back()->with('errors',
                new MessageBag(['duplicated' => 'duplicated']));
        }

        $sector->name = $name;
        $sector->save();

        return back();
    }

    public function update(Sector $sector)
    {
        $name = request('name');

        if (empty($name)) {
            return back()->with('errors',
                new MessageBag(['nameRequired' => 'nameRequired']));
        }

        $hasDuplicated =
            Sector::where('name','=', $name)->first();

        if ($hasDuplicated) {
            return back()->with('errors',
                new MessageBag(['duplicated' => 'duplicated']));
        }

        $sector->name = $name;
        $sector->update();

        return back();
    }
}
