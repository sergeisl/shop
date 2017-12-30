<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index (Request $request) {

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $menu = Menu::where('parent_id', 'LIKE', "%$keyword%")->
            orWhere('title', 'LIKE', "%$keyword%")->
            orWhere('link', 'LIKE', "%$keyword%")->
            orWhere('position', 'LIKE', "%$keyword%")->
            orWhere('disabled', 'LIKE', "%$keyword%")->
            paginate($perPage);
        } else {
            $menu = Menu::paginate($perPage);
        }
        $model_menu = new Menu();
        $menu_item = $model_menu->to_tree();

        return view('admin.menu.index', compact('menu', 'menu_item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create () {

//        $menu = new Menu();
//        $menu_item = $menu->to_list();
//
//        return view('admin.menu.create', compact('menu_item'));
        return view('admin.menu.create', [
            'menu'   => [],
            'menus' => Menu::with('children')->where('parent_id', '0')->get(),
            'delimiter'  => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store (Request $request) {

        $requestData = $request->all();

        Menu::create($requestData);

        return redirect('admin/menu')->with('flash_message', 'Menu added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show ($id) {
        $menu = Menu::findOrFail($id);

        return view('admin.menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit ($id) {
//        $model_menu = new Menu();
//        $menu_item = $model_menu->to_list();
//
//        return view('admin.menu.edit', compact('menu', 'menu_item'));

        $menu = Menu::findOrFail($id);
        return view('admin.menu.edit', [
            'menu'   => $menu,
            'menus' => Menu::with('children')->where('parent_id', '0')->get(),
            'delimiter'  => ''
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update (Request $request, $id) {

        $requestData = $request->all();

        $menu = Menu::findOrFail($id);
        $menu->update($requestData);

        return redirect('admin/menu')->with('flash_message', 'Menu updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy ($id) {
        Menu::destroy($id);

        return redirect('admin/menu')->with('flash_message', 'Menu deleted!');
    }
}
