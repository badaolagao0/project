<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Components\MenuRecusive;
use ILluminate\Support\Str;
use Illuminate\Support\Facades\DB;


class MenuController extends Controller
{
    private $menuRecursive;
    public function __construct(MenuRecusive $menuRecursive, Menu $menu){
        $this->menuRecursive = $menuRecursive;
        $this->menu = $menu;
    }

    public function index(){
        $menus = $this->menu->paginate(5);
        return view('admin.menus.index', compact('menus'));
    }

    public function create(){
        $optionSelect = $this->menuRecursive->menuRecusiveAdd();
        return view('admin.menus.add', compact('optionSelect'));
    }

    public function store(Request $request){
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('admin.menus.index');
    }

    public function edit($id, Request $request){
        $menuFollowIdEdit = $this->menu->find($id); 
        $optionSelect = $this->menuRecursive->menuRecusiveEdit($menuFollowIdEdit->parent_id);
        return view('admin.menus.edit', compact('optionSelect','menuFollowIdEdit'));
    }

    public function update($id, Request $request){
        $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
        ]);
        return redirect() -> route('admin.menus.index');
    }

    public function delete($id){
        $this -> menu -> find($id) -> delete($id);
        return redirect() -> route('admin.menus.index');
    }
}