<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategories;
use App\Notification\Toast;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10)->onEachSide(1);

        return view('admin.products.index', compact('products'));
    }

    public function show(Product $product)
    {

    }

    public function create()
    {
        $categories = Category::orderBy('name')->get()->toArray();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'desc' => ['required', 'string'],
            'price' => ['required', 'integer'],
        ]);

        try{
            DB::beginTransaction();

            $product = new Product();
            $product->fill($request->input());
            $product->save();

            $productCategories = $request->productCategories;
            if($productCategories){
                foreach ($productCategories as $category_id) {
                    ProductCategories::create([
                        'product_id' => $product->id,
                        'category_id' => $category_id
                    ]);
                }
            }

            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
            return back()->with('toast', new Toast('Product saved unsuccessfully', 'error'));
        }

        return back()->with('toast', new Toast('Product saved successfully', 'success'));
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get()->toArray();

        return view('admin.products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'desc' => ['required', 'string'],
            'price' => ['required', 'integer'],
        ]);

        try{
            DB::beginTransaction();

            $product->fill($request->input());
            $product->productCategories->each(function($productCategory){
                $productCategory->delete();
            });
            $product->update();

            $productCategories = $request->productCategories;
            if($productCategories){
                foreach ($productCategories as $category_id) {
                    ProductCategories::create([
                        'product_id' => $product->id,
                        'category_id' => $category_id
                    ]);
                }
            }

            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
            return back()->with('toast', new Toast('Product updated unsuccessfully', 'error'));
        }

        return back()->with('toast', new Toast('Product updated successfully', 'success'));
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('toast', new Toast('Product deleted successfully', 'success'));
    }
}
