<?php

namespace App\Http\Controllers;

use App\Software;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class SoftwareController extends Controller
{
    public function destroy(int $id)
    {
        Software::destroy($id);

        return redirect('/softwares');
    }

    public function edit(Software $software)
    {
        return view('software.edit', compact('software'));
    }

    public function index()
    {
        $softwares = Software::all();

        return view('software.index', compact('softwares'));
    }

    public function store(Software $software)
    {
        $name = request('name');

        if (empty($name)) {
            return back()->with('errors', new MessageBag(['nameRequired' => 'nameRequired']));
        }

        $hasDuplicated =
            Software::where('name','=', $name)->first();

        if ($hasDuplicated) {
            return back()->with('errors', new MessageBag(['duplicated' => 'duplicated']));
        }

        $software->name = $name;
        $software->save();

        return back();
    }

    public function update(Software $software)
    {
        $name = request('name');

        if (empty($name)) {
            return back()->with('errors', new MessageBag(['nameRequired' => 'nameRequired']));
        }

        $hasDuplicated =
            Software::where('name','=', $name)->first();

        if ($hasDuplicated) {
            return back()->with('errors', new MessageBag(['duplicated' => 'duplicated']));
        }

        $software->name = $name;
        $software->update();

        return back();
    }
}
