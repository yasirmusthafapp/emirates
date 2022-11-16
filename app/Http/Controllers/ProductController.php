<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(20);
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required',
            'sku'     =>  'required',
            'price' => 'required|numeric',
            'image'         =>  'required|image|max:2048'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'name'       =>   $request->name,
            'sku'        =>   $request->sku,
            'price'        =>   $request->price,
            'image'            =>   $new_name
        );

        Product::create($form_data);

        return redirect('product')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'name'    =>  'required',
                'sku'     =>  'required',
                'price' => 'required|numeric',
                'image'         =>  'image|max:2048'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'name'    =>  'required',
                'sku'     =>  'required',
                'price'     =>  'required'
            ]);
        }

        $form_data = array(
            'name'       =>   $request->name,
            'sku'        =>   $request->sku,
            'price'        =>   $request->price,
            'image'            =>   $image_name
        );

        Product::whereId($id)->update($form_data);

        return redirect('product')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();

        return redirect('product')->with('success', 'Data is successfully deleted');
    }


    /////////////////product api//////////////////
    /**
     * list product api
     */
    public function list_product(){
        $product = Product::all();
        return response()->json(
            [
                "data" => [
                    "status" => "success",
                    "message" => "list product successfully",
                    "data" => $product,
                ],
            ],
            200
        );
    }
    /**
     * create product
     */
    public function create_product(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image'         =>  'required|image|max:2048'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'name'       =>   $request->name,
            'sku'        =>   $request->sku,
            'price'        =>   $request->price,
            'image'            =>   $new_name
        );

        $data = Product::create($form_data);


        return response()
            ->json([
                'status' => 'success',
                'data' => $data,
            ]);
    }
    /**
     * update product
     */
    public function update_product(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id' => 'exists:products,id',
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image'         =>  'required|image|max:2048'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        $data = Product::find($request->id);
        $data->name = $request->name;
        $data->sku = $request->sku;
        $data->price = $request->price;
        $data->image = $new_name;
        $data->save();

        return response()
            ->json([
                'status' => 'success',
                'data' => $data,
            ]);
    }
    /**
     * delete product
     */
    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id' => 'exists:products,id',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $product = Product::find($request->id);
        $product->delete();
        return response()->json(
            [
                "data" => [
                    "type" => "activities",
                    "message" => "Success",
                    "data" => "deleted!",
                ],
            ],
            200
        );
    }
}
