<?php

namespace App\Http\Controllers;

use App\Sector;
use App\Software;
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
        $sectorSoftwares = $sector->softwares;

        $allSoftwares = Software::all();

        return view('sector.edit', compact(
            'sector',
            'allSoftwares',
            'sectorSoftwares')
        );
    }

    public function index()
    {
        $sectors = Sector::all();

        return view('sector.index', compact('sectors'));
    }

    public function linkSoftwares(int $sectorId, int $softwareId)
    {
        $sector = Sector::findOrFail($sectorId);
        $software = Software::findOrFail($softwareId);

        $sector->softwares()->attach($software->id);

        return back();
    }

    public function retrieveSectorSoftwares(int $sectorId)
    {
        $sector = Sector::findOrFail($sectorId);

        return response()->json($sector->softwares);
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

    public function unlinkSoftwares(int $sectorId, int $softwareId)
    {
        $sector = Sector::findOrFail($sectorId);
        $software = Software::findOrFail($softwareId);

        $sector->softwares()->detach($software->id);

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
