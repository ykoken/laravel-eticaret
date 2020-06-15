<?php

namespace App\Http\Controllers\Admin;

use App\Concerns\FileUploadTrait;
use App\Http\Requests\Product\CreateProductRequest;
use App\Models\Products\Product;
use App\Repositories\Product\BasketRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $product;
    protected $request;

    use FileUploadTrait;

    public function __construct(BasketRepository $productRepository, Request $request)
    {
        $this->request = $request;
        $this->product = $productRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->product->getProductList();
        return view('admin.product.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        try {
            $data = $this->request->only(
                'product_name',
                'product_code',
                'stock',
                'price',
                'product_image',
                'product_description'
            );

            $this->product->addProduct($data);

            return response()->json([
                'message' => null,
                'success' => true
            ]);
        } catch (RepositoryException $re) {
            return $this->response
                ->message('error', $re->getMessage())
                ->get($re->getStatusCode());
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $productModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->product->findProduct($id);
        return view('admin.product.edit',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $productModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $productModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $productModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $data = $this->request->only(
                'product_name',
                'product_code',
                'stock',
                'price',
                'product_image',
                'product_description'
            );
            if ($request->file('product_image2')){
                $data['product_image'] = $this->__fileuploads($request->file('product_image2'),'products');
            }
            $this->product->editProduct($data,$request->get('id'));

            return response()->json([
                'message' => null,
                'success' => true
            ]);
        } catch (RepositoryException $re) {
            return $this->response
                ->message('error', $re->getMessage())
                ->get($re->getStatusCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $productModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->product->deleteProduct($id);

        if (isset($data)){
            return response()->json([
                'message' => '',
                'success' => true
            ]);
        }else{
            return false;
        }

    }
}
