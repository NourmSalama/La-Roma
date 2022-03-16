<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));
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
            'name'=>'required',
            'type'=>'required',
            'price'=> 'required',
            'quantity'=>'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);


        $newImageName = time() . '-' . $request->name . '.' .
        $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);


        $product = new Product([
            'name' => $request->get('name'),
            'type'=> $request->get('type'),
            'price'=> $request->get('price'),
            'quantity' => $request->get('quantity'),
            'image_path' => $newImageName
        ]);

        $product->save();

        return redirect('product')->with('success', 'Product successfully added to the menu.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        // Return de pagina met het ID
        return view('product.edit', compact('product'));
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
        $request->validate([
            'name'=>'required',
            'type'=>'required',
            'price'=> 'required',
            'quantity'=>'required',
        ]);

        // Kijk welke id je het aangepast gaat worden
        $product = Product::find($id);


        if ($request->has('image')) {
            $newImageName = time() . '-' . $request->name . '.' .
            $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);

            $product->name = $request->get('name');
            $product->type = $request->get('type');
            $product->price = $request->get('price');
            $product->quantity = $request->get('quantity');
            $product->image_path = $newImageName;

            $product->save();

            return  redirect('product')->with('success', 'Menu item successfully updated WITH IMAGES CHANGES');

        } else {

            $product->name = $request->get('name');
            $product->type = $request->get('type');
            $product->price = $request->get('price');
            $product->quantity = $request->get('quantity');
            $product->save();
            return  redirect('product')->with('success', 'Menu item successfully updated WITHOUT any image changes');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Vind de Reservation with the ID
        $product = Product::find($id);

        // Verwijder de reservatie id
        $product->delete();

        // Stuur hem terug met een succes berictje
        return redirect('product')->with('success', 'Product successfully removed.');
    }
}
