<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Card;
use App\Models\Order;


class HomeController extends Controller
{
    //after login redirect admin/user page
    public function redirect()
    {
        $userType = Auth::user()->userType;

        if($userType == 1)
        {
            return view('admin.home');
        }
        else
        {
            $products = Product::paginate(10);

            $user = Auth::user();
            $count = Card::where('phone',$user->phone)->count();

            return view('user.home', [
                'products' => $products,
                'count'    => $count
            ]);
        }
    }

    public function index()
    {

        if(Auth::id())
        {
            return redirect('redirect');
        }
        else
        {
            $products = Product::paginate(10);

            return view('user.home', [
                'products' => $products
            ]);
        }
        
    }

    //search product
    public function search(Request $request)
    {
        $search = $request->search;
        $products = Product::where('title', 'like', '%'.$search.'%')->get();

        return view('user.home', [
            'products' => $products
        ]);

    }

    //add card to product
    public function addCard(Request $request, $id)
    {
        if(Auth::id())
        {
            $product = Product::find($id);

            $user = auth()->user();

            $card = new Card();

            $card->name = $user->name;
            $card->phone = $user->phone;
            $card->address = $user->address;
            $card->product_title = $product->title;
            $quantity = $request->quantity;
            $card->price = ($product->price)*$quantity;
            $card->quantity = $quantity;

            $card->save();


            return redirect()->back()->with('message', 'Add Card Successfully');
        }
        else
        {
            return redirect('login');
        }
    }

    //show card
    public function showCard()
    {
        $user = Auth::user();
        $count = Card::where('phone', $user->phone)->count();
        $cards = Card::where('phone', $user->phone)->get();

        return view('user.showCard', [
            'count' => $count,
            'cards' => $cards
        ]);
    }

    //remove card
    public function removeCard($id)
    {
        $card = Card::find($id);

        $card->delete();

        return redirect()->back()->with('message', 'Card Remove Successfully');
    }

    //confirm order
    public function confirmOrder(Request $request)
    {
        $user = Auth()->user();
        
        if($request->product_name)
        {
            foreach ($request->product_name as $key => $product)
           {
            $order = new Order();

            $order->name    = $user->name;
            $order->phone   = $user->phone;
            $order->address = $user->address;

            $order->product_name = $request->product_name[$key];
            $order->quantity     = $request->quantity[$key];
            $order->price        = $request->price[$key];
            $order->status       = 'Pending';

            $order->save();
            DB:: table('cards')->where('phone', $user->phone)->delete();

            return redirect()->back()->with('message', 'Order Confirm Successfully');
          }
      }

    }

}
