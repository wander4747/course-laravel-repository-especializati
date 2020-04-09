<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateProductFormRequest;

class ProductController extends Controller
{

    protected $repository;

    public function __construct(ProductRepositoryInterface $repository)
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
        $products = $this->repository->paginate();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductFormRequest $request)
    {
        /*METHOD 1
        $category = Category::find($request->category_id);
        $product = $category->products()->create($request->all());
        */

        $product = $this->repository->store($request->all());
        return redirect()
                    ->route('products.index')
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
        $product = $this->repository->findWhereFirst('id', $id);
        if(!$product) {
            return redirect()->back();
        }

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->repository->findById($id);
        if(!$product) {
            return redirect()->back();
        }

        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductFormRequest $request, $id)
    {
        $this->repository->update($id, $request->all());

        return redirect()
                    ->route('products.index')
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
        $this->repository->delete($id);
        return redirect()
                    ->route('products.index')
                    ->withSuccess('Deleted successfully');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $products = $this->repository
                            ->with('category')
                            ->where(function ($query) use ($request){
                                if ($request->name) {
                                    $filter = $request->name;

                                    $query->where(function ($querySub) use ($filter) {
                                        $querySub->where('name', 'LIKE', "%{$filter}%")
                                            ->orWhere('description', 'LIKE', "%{$filter}%");
                                    });
                                }

                                if ($request->price) {
                                    $query->where('price', 'LIKE', "%{$request->price}%");
                                }

                                if ($request->category) {
                                    $query->orWhere('category_id', $request->category);
                                }

                            })
                            ->paginate();

        return view('admin.products.index', compact('products', 'filters'));
    }
}
