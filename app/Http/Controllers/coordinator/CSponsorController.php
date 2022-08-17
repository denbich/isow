<?php

namespace App\Http\Controllers\coordinator;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Prize_sponsor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SponsorPrizeRequest;

class CSponsorController extends Controller
{
    public function index()
    {
        $sponsors = Prize_sponsor::all();
        return view('coordinator.prizes.sponsor.index', ['sponsors' => $sponsors]);
    }

    public function create()
    {
        return view('coordinator.prizes.sponsor.create');
    }

    public function store(SponsorPrizeRequest $request)
    {
        $validated = $request->validated();
        $image = $this->create_image($validated['logo']);
        Storage::disk('sponsors')->put($image['imageName'], $image['image']);
        $sponsor = Prize_sponsor::create([
            'ivid' => Str::uuid(),
            'name' => $validated['name'],
            'description' => $validated['description'],
            'address' => $validated['address'],
            'website' => $validated['website'],
            'facebook' => $validated['facebook'],
            'instagram' => $validated['instagram'],
            'email' => $validated['email'],
            'telephone' => $validated['telephone'],
            'logo_src' => '/sponsors/'.$image['imageName'],
        ]);

        return redirect()->route('c.sponsor.show', $sponsor->ivid)->with(['create_sponsor' => true]);
    }

    public function show($id)
    {
        $sponsor = Prize_sponsor::where('ivid', $id)->firstOrFail();
        return view('coordinator.prizes.sponsor.show', ['sponsor' => $sponsor]);
    }

    public function edit($id)
    {
        $sponsor = Prize_sponsor::where('ivid', $id)->firstOrFail();
        return view('coordinator.prizes.sponsor.edit', ['sponsor' => $sponsor]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|max:255',
            'address' => 'required|string|max:255',
            'website' => 'required|string|max:255',
            'facebook' => 'nullable|max:255',
            'instagram' => 'nullable|max:255',
            'email' => 'nullable|email|max:255',
            'telephone' => 'required|numeric',
            'phone' => 'required|max:255',
            'logo' => 'nullable',
        ]);
        $sponsor = Prize_sponsor::where('ivid', $id)->firstOrFail();
        if($request->logo != null)
        {
            $image = $this->create_image($request->logo);
            Storage::disk('sponsors')->delete($sponsor->logo_src);
            Storage::disk('sponsors')->put($image['imageName'], $image['image']);
            $sponsor->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'address' => $validated['address'],
                'website' => $validated['website'],
                'facebook' => $validated['facebook'],
                'instagram' => $validated['instagram'],
                'email' => $validated['email'],
                'telephone' => $validated['phone'],
                'logo_src' => '/sponsors/'.$image['imageName'],
            ]);

        } else {
            $sponsor->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'address' => $validated['address'],
                'website' => $validated['website'],
                'facebook' => $validated['facebook'],
                'instagram' => $validated['instagram'],
                'email' => $validated['email'],
                'telephone' => $validated['phone'],
            ]);
        }

        return back()->with(['edit_sponsor' => true]);
    }

    public function destroy($id)
    {
        Prize_sponsor::where('ivid', $id)->firstOrFail()->delete();
        return redirect()->route('c.sponsor.list')->with(['delete_sponsor' => true]);
    }

    public function search()
    {
        if(isset($_GET['q']))
        {
            $q = $_GET['q'];
            $sponsors = Prize_sponsor::where('name', 'like', '%'.$q.'%')->orwhere('website', 'like', '%'.$q.'%')->orwhere('email', 'like', '%'.$q.'%')->orwhere('facebook', 'like', '%'.$q.'%')->orwhere('instagram', 'like', '%'.$q.'%')->orwhere('telephone', 'like', '%'.$q.'%')->get();

            return view('coordinator.prizes.sponsor.search', ['sponsors' => $sponsors]);

        } else {
            return view('coordinator.prizes.sponsor.search');
        }
    }
}
