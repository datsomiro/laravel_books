<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // get all categories
        $categories = Category::get();

        if ($categories->count() === 0) {
            return 'no categories';
        }

        return view('categories/index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('categories/show', compact('category'));

//        return Category::where('id', $id)->first();
        //        return Category::find($id);

//        $name = 'Sci-Fi & Fantasy';
        //        return Category::where('name', $name)->first();
        //        return Category::where('name', $name)->firstOrFail();

//        $category = Category::find($id); // get first Category with `id` = $id
        //
        //        if($category === null){
        //            return '404';
        //        }
    }

    public function create()
    {
        return view('categories/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:3|max:191',
        ]);

//        $category = new Category;
        //        $category->name = $request->input('name');
        //        $category->save();

        // every category would have column `featured` - boolean (true / false)

//        {
        //            "_token": "2bi7nMZ0O6rwPBrEFKmZN2JtnzSMmEehnHgqWPse",
        //            "name": "asdasdfasdf",
        //            "featured": 1
        //        }

        // because `featured` attribute is not mentioned in $fillable it will be ignored

        // name of input must be matching the name of column in DB

        Category::create($request->all());

        return redirect(action('CategoryController@index'));

//        $name = $request->input('name');
        //
        //        $category = Category::where('name', $name)->first();
        //
        //        if($category === null){
        //
        //            $category = new Category;
        //            $category->name = $name;
        //            $category->save();
        //        }
        //
        //        return $category;
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('categories/edit', compact('category'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:3|max:191',
        ]);

//        $category = Category::findOrFail($id);
        //        $category->name = $request->input('name');
        //        $category->save();

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect(action('CategoryController@index'));
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);

        return view('categories/delete', compact('category'));
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect(action('CategoryController@index'));
    }
}
