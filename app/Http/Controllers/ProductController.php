<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\ProductUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\LikeService as LikeService;
use Auth;

class ProductController extends Controller
{
    protected $likeService = null;

    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Active Record
        $products = Product::latest()->paginate(5);
        return view('products.index', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'price' => 'numeric|min:100'            
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product stored successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $comments = Review::where('product_id', $product->id)
            ->get()
            ->toArray();
            $likesNumber = $this->likeService->getLikesNumber($product->id);
            $likesNumber = (!$likesNumber) ? 0: $likesNumber;
        return view('products.show', compact(
            'product', 
            'comments',
            'likesNumber'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
        //return view('products.edit')->with(['product', $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required' 
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

    public function like(Request $request)
    {
        $productId = [$request->input('productId')];
        $isLiked = ProductUser::where('product_id', $productId)
                                ->where('user_id', Auth::id())
                                ->get()
                                ->toArray();
        
        $user = User::find(Auth::id());

//==================== Поставить лайк ====================
        if(!isset($isLiked[0]['$isLiked'])){                     
            $user->products()->attach($productId, ['isLiked' => 1]);                       
        } else {
            $user->products()->detach($productId, Auth::id());            
        }
        $likesNumber = $this->likeService->getLikesNumber($productId);
        $response = [
            'likes' => $likesNumber, 
            //'message' => 'Liked '
        ]; 
        echo json_encode($response);
    }
}
