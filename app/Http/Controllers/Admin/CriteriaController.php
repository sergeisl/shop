<?php

namespace App\Http\Controllers\Admin;

use App\Criteria;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;
use Illuminate\Http\Request;

class CriteriaController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index (Request $request) {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $criteria = Criteria::where('name', 'LIKE', "%$keyword%")
                ->orWhere('parent_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $criteria = Criteria::paginate($perPage);
        }

        return view('admin.criteria.index', compact('criteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create () {

        return view('admin.criteria.create', [
            'criterion' => [],
            'criteria' => Criteria::with('children')->where('parent_id', '0')->get(),
            'delimiter' => ''
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

        Criteria::create($requestData);

        return redirect('admin/criteria')->with('flash_message', 'Criteria added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show ($id) {

        return view('admin.criteria.create', [
            'criterion' => Criteria::findOrFail($id),
            'criteria' => Criteria::with('children')->where('parent_id', '0')->get(),
            'delimiter' => ''
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit ($id) {
        return view('admin.criteria.create', [
            'criterion' => Criteria::findOrFail($id),
            'criteria' => Criteria::with('children')->where('parent_id', '0')->get(),
            'delimiter' => ''
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

        $criteria = Criteria::findOrFail($id);
        $criteria->update($requestData);

        return redirect('admin/criteria')->with('flash_message', 'criteria updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy ($id) {
        Criteria::destroy($id);

        return redirect('admin/criteria')->with('flash_message', 'criteria deleted!');
    }
}
