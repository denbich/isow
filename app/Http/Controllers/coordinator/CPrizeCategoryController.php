<?php

namespace App\Http\Controllers\coordinator;

use Illuminate\Support\Str;
use App\Models\Prize_category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Prize_category_translate;
use App\Http\Requests\PrizeCategoryRequest;

class CPrizeCategoryController extends Controller
{
    public function index()
    {
        if(isset($_GET['q']))
        {
            $q = $_GET['q'];
            $categories = Prize_category::whereHas('prize_category_translate', function($query) use($q){
                return $query->where('name', 'like', '%'.$q.'%');
            })->with('prize_category_translate')->withCount('prize')->get();
        } else {
            $categories = Prize_category::with('prize_category_translate')->withCount('prize')->get();
        }

        return view('coordinator.prizes.category.index', ['categories' => $categories]);
    }

    public function create()
    {
        return redirect()->route('c.prizecategory.list');
    }

    public function store(PrizeCategoryRequest $request)
    {
        $validated = $request->validated();
        $category = Prize_category::create(['ivid' => Str::uuid(), 'author_id' => Auth::id()]);

        Prize_category_translate::create([
            'locale' => 'pl',
            'category_id' => $category->id,
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('c.prizecategory.show', [$category->ivid])->with(['create_category' => true]);
    }

    public function show($id)
    {
        $category = Prize_category::where('ivid', $id)->with('prize_category_translate', 'prize')->firstOrFail();
        return view('coordinator.prizes.category.show', ['category' => $category]);
    }

    public function edit($id)
    {
        return redirect()->route('c.prizecategory.show', [$id]);
    }

    public function update(PrizeCategoryRequest $request, $id)
    {
        $validated = $request->validated();
        $category = Prize_category::where('ivid', $id)->firstOrFail()->prize_category_translate()->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);
        return back()->with(['edit_category' => true]);
    }

    public function destroy($id)
    {
        Prize_category::where('ivid', $id)->delete();
        return redirect()->route('c.prizecategory.list')->with(['delete_category' => true]);
    }
}
