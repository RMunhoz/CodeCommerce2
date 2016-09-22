<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Product;

class AdminProductsController extends Controller
{
    /**
     * @var Category
     */
    private $productModel;
    private $categoryModel;

    public function __construct(Product $productModel, Category $categoryModel)
    {
        $this->productModel = $productModel;
        $this->categoryModel = $categoryModel;
    }

    public function index()
    {
        $products = $this->productModel->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryModel->lists('name', 'id');
        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $input = $request->all();
        $product = $this->productModel->fill($input);
        $product->save();
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = $this->productModel->find($id);
        $categories = $this->categoryModel->lists('name', 'id');
        return view('products.edit', compact('product','categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        $this->productModel->find($id)->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $this->productModel->find($id)->delete();
        return redirect()->route('products.index');
    }
}
