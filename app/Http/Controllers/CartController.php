<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Requests\CartRequest;
use CodeCommerce\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * @var Cart
     */
    private $cart;
    /**
     * @var Product
     */
    private $productModel;

    public function __construct(Cart $cart, Product $productModel)
    {
        $this->cart = $cart;

        $this->productModel = $productModel;
    }

    public function index()
    {
        if (!Session::has('cart')){
            Session::set('cart', $this->cart);
        }
        return view('store.cart', ['cart' => Session::get('cart')]);
    }

    public function add($id)
    {
        $cart = $this->getCart();

        $product = $this->productModel->find($id);
        $cart->add($id, $product->name, $product->price);

        Session::set('cart', $cart);
        return redirect()->route('cart');
    }

    public function destroy($id)
    {
        $cart = $this->getCart();
        $cart->remove($id);
        Session::set('cart', $cart);
        return redirect()->route('cart');
    }

    public function update(CartRequest $request, $id)
    {
        $qtd = $request->get("qtd");
        $cart = $this->getCart();
        $cart->setQtd($id, $qtd);

        Session::set('cart', $cart);

        return redirect()->route('cart');
    }

    /**
     * @return Cart
     */
    public function getCart()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }
        return $cart;
    }
    
}
