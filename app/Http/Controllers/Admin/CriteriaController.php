<?php

namespace App\Http\Controllers\Admin;

use App\Criterion;
use App\Filter;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
            $criteria = Criterion::where('name', 'LIKE', "%$keyword%")
                ->orWhere('parent_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $criteria = Criterion::paginate($perPage);
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
            'filters' => Filter::all(),
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

        Criterion::create($requestData);

        return redirect('admin/criteria')->with('flash_message', 'Criterion added!');
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
            'criterion' => Criterion::findOrFail($id),
            'criteria' => Criterion::with('children')->where('parent_id', '0')->get(),
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
            'criterion' => Criterion::findOrFail($id),
            'criteria' => Criterion::with('children')->where('parent_id', '0')->get(),
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

        $criteria = Criterion::findOrFail($id);
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
        Criterion::destroy($id);

        return redirect('admin/criteria')->with('flash_message', 'criteria deleted!');
    }
}
