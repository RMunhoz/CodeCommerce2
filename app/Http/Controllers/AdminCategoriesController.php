<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Session;

class AdminCategoriesController extends Controller
{
    private $categoryModel;

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function index()
    {
        $categories = $this->categoryModel->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $input = $request->all();
        $category = $this->categoryModel->fill($input);
        $category->save();
        Session::flash('message-success', 'Category, adicionada com sucesso!!!');
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = $this->categoryModel->find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $this->categoryModel->find($id)->update($request->all());
        Session::flash('message-success', 'Category, modificada com sucesso!!!');
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $this->categoryModel->find($id)->delete();
        Session::flash('message-error', 'Category, deletada com sucesso!!!');
        return redirect()->route('categories.index');
    }
}
