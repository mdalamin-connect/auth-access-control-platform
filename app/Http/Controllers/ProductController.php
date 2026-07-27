<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Uom;
use App\Models\Role; // Added this import
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\CustomAuth');
    }

	public function index()
	{
		$user_id = session('sess_user_id');
		$user_role_id = session('sess_user_role_id');
		
		// Retrieve user role and permissions
		$userRole = session('sess_user_role_name');
		$userPermissions = Role::where('name', $userRole)->first()?->permissions->pluck('name')->toArray() ?? [];
	
		// Check if the user has permission to manage products
		if (in_array('Manage Product', $userPermissions)) {
			$products = Product::with([
					'creator:id,name',
					'updater:id,name',
					'category:id,name',
					'uom:id,name'
				])
				->leftJoin('categories as c','products.category_id','=','c.id')
			->leftJoin('uoms as u','products.uom_id','=','u.id')
				->select(
					'products.*','c.name as category_id','u.name as uom_id' // Select all product fields
				)
				->paginate(10);
				
			return view("pages.erp.product.index", [
				"products" => $products, 
				"categories" => Category::all(), 
				"uoms" => Uom::all(),
				"user_role_id" => $user_role_id
			]);
		} else {
			abort(403, 'Unauthorized');
		}
	}

    public function create()
    {
        return view("pages.erp.product.create", [ 
            "categories" => Category::all(), 
            "uoms" => Uom::all()
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'offer_price' => 'required|numeric',
            'regular_price' => 'required|numeric',
            'category_id' => 'required',
            'uom_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $product = new Product;
        $product->name = $request->name;
        $product->offer_price = $request->offer_price;
        $product->regular_price = $request->regular_price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->uom_id = $request->uom_id;
        $product->is_featured = $request->is_featured ?? 0;
        $product->star = $request->star ?? 0;
        $product->is_brand = $request->is_brand ?? 0;
        $product->offer_discount = $request->offer_discount ?? 0;
        $product->weight = $request->weight;
        $product->barcode = $request->barcode;
        
        date_default_timezone_set("Asia/Dhaka");
        $product->created_at = date('Y-m-d H:i:s');
        $product->created_by = session('sess_user_id', 0);

        if ($request->hasFile('photo')) {
            $imageName = $product->name . '.' . $request->photo->extension();
            $product->photo = $imageName;
            $request->photo->move(public_path('img/products'), $imageName);
        }

        $product->save();

        return redirect()->route("products.index")->with('success', 'Created Successfully.');
    }

    public function show($id)
    {
        $product = Product::with(['category', 'uom', 'creator', 'updater'])
            ->findOrFail($id);

        return view("pages.erp.product.show", ["product" => $product]);
    }

    public function edit(Product $product)
    {
        return view("pages.erp.product.edit", [
            "product" => $product, 
            "categories" => Category::all(), 
            "uoms" => Uom::all(),
			"user_role_id" => session('sess_user_role_id')
			
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $rules = [
            'name' => 'required',
            'offer_price' => 'required|numeric',
            'regular_price' => 'required|numeric',
            'category_id' => 'required',
            'uom_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $product->name = $request->name;
        $product->offer_price = $request->offer_price;
        $product->regular_price = $request->regular_price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->uom_id = $request->uom_id;
        $product->is_featured = $request->is_featured ?? 0;
        $product->star = $request->star ?? 0;
        $product->is_brand = $request->is_brand ?? 0;
        $product->offer_discount = $request->offer_discount ?? 0;
        $product->weight = $request->weight;
        $product->barcode = $request->barcode;
        
        date_default_timezone_set("Asia/Dhaka");
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = session('sess_user_id', 0);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($product->photo && file_exists(public_path('img/products/' . $product->photo))) {
                unlink(public_path('img/products/' . $product->photo));
            }
            
            $imageName = $product->name . '.' . $request->photo->extension();
            $product->photo = $imageName;
            $request->photo->move(public_path('img/products'), $imageName);
        }

        $product->save();

        return redirect()->route("products.index")->with('success', 'Updated Successfully.');
    }

    public function destroy(Product $product)
    {
        // Delete photo if exists
        if ($product->photo && file_exists(public_path('img/products/' . $product->photo))) {
            unlink(public_path('img/products/' . $product->photo));
        }
        
        $product->delete();
        return redirect()->route("products.index")->with('success', 'Deleted Successfully.');
    }

    public function get_product_json()
    {
        $id = $_GET["id"];
        $request = Product::with(['category', 'uom'])->find($id);
        return json_encode($request);
    }
}