<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateCategoryFormRequest;

class CategoryController extends Controller
{
    protected $repository;

    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->repository->orderBy('id')->paginate();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateCategoryFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategoryFormRequest $request)
    {

        $this->repository->store([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()
                    ->route('categories.index')
                    ->withSuccess('Saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->repository->findById($id);
        if (!$category) {
            return redirect()->back();
        }

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->repository->findById($id);

        if (!$category) {
            return redirect()->back();
        }

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCategoryFormRequest $request, $id)
    {
        $this->repository->update($id, [
                'title' => $request->title,
                'description' => $request->description,
            ]);

        return redirect()
                    ->route('categories.index')
                    ->withSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = $this->repository->productsByCategoryId($id);
        if (count($products) > 0) {
            return redirect()->route('categories.index')
                            ->withErrors('Cannot delete. There are linked products');
        }

        $this->repository->delete($id);

        return redirect()->route('categories.index');
    }

    public function search(Request $request)
    {
        $data = $request->except('_token');
        $categories = $this->repository->search($data);
        return view('admin.categories.index', compact('categories', 'data'));
    }
}
