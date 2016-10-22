<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use CodeCommerce\Product;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    private $orderModel;
    private $itemModel;
    private $productModel;
    private $categoryModel;

    public function __construct(Order $orderModel, OrderItem $itemModel, Product $productModel,
                                Category $categoryModel)
    {
        $this->orderModel = $orderModel;
        $this->itemModel = $itemModel;
        $this->productModel = $productModel;
        $this->categoryModel = $categoryModel;
    }

    public function index()
    {
        $orders = $this->orderModel->all();
        return view('admin.orders.index', compact('orders'));
    }

    public function edit($id)
    {
        $orders = $this->orderModel->lists('status', 'id');
        $order = $this->orderModel->find($id);
        return view('admin.orders.edit', compact('orders', 'order'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $this->orderModel->find($id)->update($input);

        return redirect()->route('account.index');
    }

    public function orders()
    {
        $orders = Auth::user()->orders;

        return view('store.orders', compact('orders'));
    }
}
