<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Requests\ProductImageRequest;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminProductsController extends Controller
{
    /**
     * @var Category
     * @var Product
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
        $input['recommend'] = $request->get('recommend') ? true : false;
        $input['featured'] = $request->get('featured') ? true : false;
        $arrayTags = $this->tagToArray($input['tags']);
        $product = $this->productModel->fill($input);
        $product->save();
        $product->tags()->sync($arrayTags);
//        Session::flash('message-success', 'Product, adicionado com sucesso!!!');
        return redirect()->route('products.index');
    }

    private function tagToArray($tags)
    {
        $tags = explode(",", $tags);
        $tags = array_map('trim', $tags);

        $tagCollection = [];
        foreach ($tags as $tag) {
            $t = Tag::firstOrCreate(['name' => $tag]);
            array_push($tagCollection, $t->id);
        }

        return $tagCollection;
    }

    public function edit($id)
    {
        $categories = $this->categoryModel->lists('name', 'id');
        $product = $this->productModel->find($id);
        $product->tags = $product->tagList;
        return view('products.edit', compact('categories','product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $input = $request->all();
        $input['featured'] = $request->get('featured') ? true : false;
        $input['recommend'] = $request->get('recommend') ? true : false;

        $arrayTags = $this->tagToArray($input['tags']);

        $this->productModel->find($id)->update($input);

        $product = $this->productModel->find($id);
        $product->tags()->sync($arrayTags);
//        Session::flash('message-success', 'Product, editado com sucesso!!!');
        return redirect()->route('products.index');;
    }

    public function destroy($id)
    {
        $this->productModel->find($id)->delete();
        return redirect()->route('products.index');
    }

    public function images($id)
    {
        $product = $this->productModel->find($id);
        return view('products.images', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->productModel->find($id);
        return view('products.create_image', compact('product'));
    }

    public function storeImage(ProductImageRequest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id'=>$id, 'extension'=>$extension]);
        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));
        return redirect()->route('products.image', ['id'=>$id]);
    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);

        if (file_exists(public_path('uploads').$image->id.'.'.$image->extension)){
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
        }
        $product = $image->product;
        $image->delete();

        return redirect()->route('products.image', ['id'=>$product->id]);
    }
}
