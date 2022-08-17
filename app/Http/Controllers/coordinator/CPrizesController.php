<?php

namespace App\Http\Controllers\coordinator;

use App\Models\Prize;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Prize_sponsor;
use App\Models\Prize_category;
use App\Models\Prize_translate;
use App\Models\Prize_combination;
use App\Http\Controllers\Controller;
use App\Http\Requests\PrizeCategoryRequest;
use App\Models\Prize_category_translate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Prize_combination_translate;

class CPrizesController extends Controller
{
    public function index()
    {
        $prizes = Prize::with('prize_translate', 'category')->withCount('orders')->get();
        return view('coordinator.prizes.index', ['prizes' => $prizes]);
    }

    public function create()
    {
        $categories = Prize_category::with('prize_category_translate')->get();
        $sponsors = Prize_sponsor::all();
        return view('coordinator.prizes.create', ['categories' => $categories, 'sponsors' => $sponsors]);
    }

    public function store(Request $request)
    {
        $validate = [
            'title' => 'required|max:255',
            'description' => 'required',
            'category' => 'required|max:255',
            'points' => 'required|numeric|min:1',
            'icon' => 'required',
            'category' => 'required|uuid',
            'sponsor' => 'required|uuid',
        ];

        $combinations = [];
        if($request->combination_check == "on")
        {
            $iscomb = 1;
            for( $i = 1; $i <= $request->combination_count; $i++)
            {
                $comb = [
                    'name_combination'.$i => 'required|string|max:255',
                    'quanitity_combination'.$i => 'required|numeric|min:0',
                ];
                $combinations = array_merge($combinations, $comb);
            }
        } else {
            $combinations = ['quantity' => 'required|numeric|min:1'];
            $iscomb = 0;
        }

        $validator = array_merge($combinations, $validate);
        $validated = $request->validate($validator);

        $image = $this->create_image($request->icon);
        Storage::disk('prizes')->put($image['imageName'], $image['image']);

        $category = Prize_category::where('ivid', $validated['category'])->firstOrFail();
        $sponsor = Prize_sponsor::where('ivid', $validated['sponsor'])->firstOrFail();

        $prize = Prize::create([
            'ivid' => Str::uuid(),
            'quantity' => ($iscomb == 0) ? $validated['quantity'] : 0,
            'points' => $request->points,
            'with_combinations' => $iscomb,
            'sponsor_id' => $sponsor->id,
            'category_id' => $category->id,
            'author_id' => Auth::id(),
            'icon_src' => '/prizes/'.$image['imageName'],
        ]);

        Prize_translate::create([
            'prize_id' => $prize->id,
            'locale' => $request->locale,
            'title' => $request->title,
            'description' => str_replace('"', "'", str_replace('\r\n', '', $request->description)),
            'category' => $request->category,
        ]);

        for($i = 1; $i <= $request->combination_count; $i++)
        {
            $quantity = 'quanitity_combination'.$i;
            $title = 'name_combination'.$i;
            $comb_prize = Prize_combination::create(['ivid' => Str::uuid(), 'quantity' => $request->$quantity, 'prize_id' => $prize->id]);
            Prize_combination_translate::create([
                'combination_id' => $comb_prize->id,
                'locale' => 'pl',
                'title' => $request->$title,
                'description' => null,
            ]);
        }

        return redirect()->route('c.prize.show', [$prize->ivid])->with(['create_prize' => true]);
    }

    public function show($id)
    {
        $prize = Prize::where('ivid', $id)->with('prize_translate', 'category', 'combinations', 'sponsor', 'orders')->firstOrFail();
        return view('coordinator.prizes.show', ['prize' => $prize]);
    }

    public function edit($id)
    {
        $prize = Prize::where('ivid', $id)->with('prize_translate', 'combinations')->firstOrFail();
        $categories = Prize_category::with('prize_category_translate')->get();
        $sponsors = Prize_sponsor::all();
        return view('coordinator.prizes.edit', ['prize' => $prize, 'categories' => $categories, 'sponsors' => $sponsors]);
    }

    public function update(Request $request, $id)
    {
        $prize = Prize::where('ivid', $id)->with('combinations')->firstOrFail();

        $validate = [
            'title' => 'required|max:255',
            'description' => 'required',
            'category' => 'required',
            'sponsor' => 'required',
            'points' => 'required|numeric',
            'icon' => 'nullable',
        ];

        $combinations = [];
        if($prize->with_combinations == 1)
        {
            $quantity = 0;
            for( $i = 1; $i <= $prize->combinations->count(); $i++)
            {
                $comb = [
                    'name_combination'.$i => 'required|string|max:255',
                    'quanitity_combination'.$i => 'required|numeric',
                ];
                $combinations = array_merge($combinations, $comb);
            }
        } else {
            $quantity = $request->quantity;
            $combinations = ['quantity' => 'required|numeric',];
        }

        $validator = array_merge($combinations, $validate);
        $validated = $request->validate($validator);

        $category = Prize_category::where('ivid', $validated['category'])->firstOrFail();
        $sponsor = Prize_sponsor::where('ivid', $validated['sponsor'])->firstOrFail();

        if($validated['icon'] != null)
        {
            $image = $this->create_image($validated['icon']);

            Storage::disk('prizes')->delete($prize->icon_src);
            Storage::disk('prizes')->put($image['imageName'], $image['image']);

            $prize->update([
                'points' => $validated['points'],
                'quantity' => $quantity,
                'sponsor_id' => $sponsor->id,
                'category_id' => $category->id,
                'icon_src' => '/prizes/'.$image['imageName'],
            ]);

        } else {
            $prize->update([
                'points' => $validated['points'],
                'quantity' => $quantity,
                'sponsor_id' => $sponsor->id,
                'category_id' => $category->id,
            ]);
        }

        $prize_t = Prize_translate::where('prize_id', $prize->id)->firstOrFail();
        $prize_t->update([
            'title' => $validated['title'],
            'description' => str_replace('"', "'", str_replace("\r\n", '', $validated['description'])),
            ]);

        if($prize->with_combinations == 1)
            {
                for( $i = 1; $i <= $prize->combinations->count(); $i++)
                {
                    $cid = 'id_combination'.$i;
                    $index = 'quanitity_combination'.$i;
                    $combination = Prize_combination::where('id', $request->$cid)->firstOrFail();
                    $combination->update(['quantity' => $request->$index]);

                    $name = 'name_combination'.$i;
                    $combination_t = Prize_combination_translate::where('combination_id', $request->$cid)->firstOrFail();
                    $combination_t->update(['title' => $request->$name]);
                }
            }

        return back()->with(['edit_prize' => true]);
    }

    public function destroy($id)
    {
        Prize::where('ivid', $id)->delete();
        return redirect()->route('c.prize.list')->with(['delete_prize' => true]);
    }

    //OTHER FUNCTIONS

    public function update_quantity(Request $request, $id)
    {
        $validated = $request->validate(['quantity' => 'required|numeric']);
        $prize = Prize::where('ivid', $id)->firstOrFail();
        $prize->fill(['quantity' => $validated['quantity']]);
        $prize->save();

        return redirect()->route('c.prize.show', [$id])->with(['update_quantity' => true]);
    }

    public function search()
    {
        if (isset($_GET['q']))
        {
            $q = $_GET['q'];
            $prizes = Prize::with('prize_translate', 'category', 'combinations', 'sponsor')
            ->whereHas('prize_translate', function ($query) use ($q){
                $query->where('title', 'like', '%'.$q.'%');})
            ->orWhereHas('category', function ($query) use ($q){
                $query->where('name', 'like', '%'.$q.'%');})
            ->orWhereHas('sponsor', function ($query) use ($q){
                $query->where('name', 'like', '%'.$q.'%');})->get();
                return view('coordinator.prizes.search', ['prizes' => $prizes]);
        } else {
            return view('coordinator.prizes.search');
        }
    }

    public function create_category(PrizeCategoryRequest $request)
    {
        if($request->ajax())
        {
            $validated = $request->validated();
            $category = Prize_category::create([
                'ivid' => Str::uuid(),
                'author_id' => Auth::id(),
            ]);
            $category_translate = Prize_category_translate::create([
                'locale' => 'pl',
                'category_id' => $category->id,
                'name' => $validated['name'],
                'description' => $validated['description'],
            ]);

            $cat = [
                'ivid' => $category->ivid,
                'name' => $category_translate->name,
            ];
            return response()->json($cat);
        }
    }

    public function create_sponsor(Request $request)
    {
        if($request->ajax())
        {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|max:255',
                'address' => 'required|string|max:255',
                'website' => 'required|string|max:255',
                'facebook' => 'nullable|max:255',
                'instagram' => 'nullable|max:255',
                'email' => 'nullable|email|max:255',
                'telephone' => 'required|string|max:255',
                'logo' => 'required',
            ]);
            $image = $this->create_image($request->logo);
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

            $cat = [
                'ivid' => $sponsor->ivid,
                'name' => $sponsor->name,
            ];
            return response()->json($cat);
        }
    }
}
