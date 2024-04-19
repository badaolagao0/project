<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Components\Recusive;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $category;
    private $htmlSelect = '';
    
    public function __construct(Category $category){
        $this->category = $category;
    }

    public function create(){
        $htmlOption = $this->getCategory($parentId='');
        return view('admin.category.add', compact('htmlOption'));
    }

    public function index(){
        $categories = $this->category->latest()->paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request){
        $this->category->create([
            'name'=>$request->name,
            'parent_id'=>$request ->parent_id,
            'slug' => $request->name
        ]);
        return redirect() -> route('categories.index');
    }

    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function edit($id){
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.category.edit', compact('category','htmlOption'));
    }

    public function delete($id){
        $this->category->find($id)->delete();
        return redirect() -> route('categories.index');
    }

    public function update($id, Request $request){
        $category = $this->category->find($id)->update([
            'name'=>$request->name,
            'parent_id'=>$request ->parent_id,
            'slug' => $request->name
        ]);
        return redirect() -> route('categories.index');
    }
}