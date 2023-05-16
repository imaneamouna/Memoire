<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;
use Cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = auth()->user()->id;
        // dd($id);
        $user = auth()->user();
        //dd($user->type);
        if ($user->type == 'admin') {
            // add the product to cart
            Cart::session(auth()->user()->id)->add(array(
                'id' => 1,
                'name' => '2',
                'price' => 256,
                'quantity' => 58,
                // 'attributes' => array(),
                // 'associatedModel' => $Product
            ));
            return Cart::getContent();
            dd(123);
        }
    }

    //     Cart::add(['id' => '293ad',
    //      'name' => 'Product 1',
    //      'qty' => 1,
    //      'price' => 9.99,
    //      'options' => ['size' => 'large']]);
    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
