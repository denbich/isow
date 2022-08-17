<?php

namespace App\Http\Controllers\coordinator;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Form_category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Form_category_translate;
use App\Http\Requests\FormCategoryRequest;

class CFormCategoryController extends Controller
{
    public function index()
    {
        if(isset($_GET['q']))
        {
            $q = $_GET['q'];
            $categories = Form_category::whereHas('form_category_translate', function ($query) use ($q){
                $query->where('name', 'like', '%'.$q.'%');})->with('form_category_translate')->withCount('form')->get();
        } else {
            $categories = Form_category::with('form_category_translate')->withCount('form')->get();
        }

        return view('coordinator.forms.category.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('coordinator.forms.category.create');
    }

    public function store(FormCategoryRequest $request)
    {
        $validated = $request->validated();
        $category = Form_category::create([
            'ivid'=> Str::uuid(),
            'author_id' => Auth::id(),
            'color' => $validated['color'],
            'icon' => $validated['icon'],
        ]);

        Form_category_translate::create([
            'locale' => 'pl',
            'category_id' => $category->id,
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('c.formcategory.show', $category->ivid)->with(['create_category' => true]);
    }

    public function show($id)
    {
        $category = Form_category::where('ivid', $id)->with('form_category_translate', 'form')->firstOrFail();
        return view('coordinator.forms.category.show', ['category' => $category]);
    }

    public function edit($id)
    {
        $category = Form_category::where('ivid', $id)->with('form_category_translate')->firstOrFail();
        return view('coordinator.forms.category.edit', ['category' => $category]);
    }

    public function update(FormCategoryRequest $request, $id)
    {
        $validated = $request->validated();
        $category = Form_category::where('ivid', $id)->firstOrFail();

        Form_category_translate::where('category_id', $category->id)->firstOrFail()->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        $category->update([
            'color' => $validated['color'],
            'icon' => $validated['icon'],
        ]);

        return back()->with(['edit_category' => true]);
    }

    public function destroy($id)
    {
        Form_category::where('ivid', $id)->delete();
        return redirect()->route('c.formcategory.list')->with(['delete_category' => true]);
    }
}
