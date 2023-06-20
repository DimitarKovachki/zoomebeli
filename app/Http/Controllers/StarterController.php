<?php

namespace App\Http\Controllers;

use App\Product;
use App\CustomeImage;
use App\Mail\ContactMailable;
use App\Mail\CustomMailable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;

class StarterController extends Controller
{
    public function home()
    {
        $topOrders = Product::with('categories')
            ->with(['variations' => function ($q) {
                return $q->orderBy('base_price', 'asc');
            }])
            ->with(['images' => function ($q) {
                $q->orderBy('is_main', 'desc');
            }])
            ->whereIn('id', [5,12,3,10])
            ->get();
        return view('pages.home', compact('topOrders'));
    }
    public function custom(Request $request)
    {
        $images = $request->file('image');
        if ($images) {
            foreach (array_values($images) as $key => $image) {
                $extension = $image->extension();
                $filename = date('YmdHis') . uniqid() . $image->getClientOriginalName();
                $image->storePubliclyAs(CustomeImage::STORAGE_DIR, $filename);
                $url = Storage::url(CustomeImage::STORAGE_DIR . $filename);
                CustomeImage::create([
                    'image' => $url,
                    'is_main' => !$key ? 1 : 0
                ]);
            }
        }
        // return redirect()->back();

        return view('pages.custom-furniture');
    }

    public function sendCustom(Request $request)
    {

        //dobavi si tuk backend valiaciq kakvato iskash
        $this->validate(
            $request, 
            [
                'image.*' => 'image|max:5120',
                'username' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'subject' => 'required',
                'msg' => 'required',
            ],
            [
                'image.*.image' => 'Невалиден формат на файла само jpg, jpeg, png, bmp, gif, svg, или webp',
                'image.*.max' => 'Твърде голям размер на файла до 5мб',
                'username.*' => 'Моля въведете име и фамилия',
                'email.*' => 'Моля въведете имейл',
                'phone.*' => 'Моля въведете телефон',
                'subject.*' => 'Моля въведете относно',
                'msg.*' => 'Моля въведете съобщение',
            ]
        );
        
        Mail::to($request->email)->send(new CustomMailable($request, 'user'));
        Mail::to('zoomebeli@gmail.com')->send(new CustomMailable($request, 'admin'));
        return view('layouts.custom-success');
        return redirect()->back();
    }

    public function about()
    {
        return view('pages.about');
    }
    public function contact()
    {
        return view('pages.contact');
    }
    public function sendContact(Request $request)
    {
        $this->validate(
            $request,
            [
                'username' => 'required',
                'email' => 'required',
                'subject' => 'required',
                'msg' => 'required',
            ],
            [
                'username.*' => 'Моля въведете име и фамилия',
                'email.*' => 'Моля въведете имайл',
                'subject.*' => 'Моля въведете относно',
                'msg.*' => 'Моля въведете съобщение',
            ]
        );

        // dd($request->email);

        Mail::to($request->email)->send(new ContactMailable($request, 'user'));
        Mail::to('zoomebeli@gmail.com')->send(new ContactMailable($request, 'admin'));

        return view('layouts.contact-success');
    }
    public function gallery()
    {
        return view('pages.gallery');
    }
    public function productView()
    {
        return view('pages.product-view');
    }
    public function terms()
    {
        return view('pages.terms');
    }
    public function faq()
    {
        return view('pages.faq');
    }
    public function delivery()
    {
        return view('pages.delivery');
    }

    public function warranty()
    {
        return view('pages.warranty');
    }

    public function cart()
    {
        return view('pages.cart');
    }
    public function emptyCart()
    {
        return view('cart.empty-cart');
    }


    public function dogCategory()
    {
        return view('pages.dog-category');
    }
    public function dogBowlStand()
    {
        return view('pages.dog.bowl-stand');
    }
    public function dogBedHouse()
    {
        return view('pages.dog.bed-house');
    }
    public function dogOthers()
    {
        return view('pages.dog.others');
    }


    public function catCategory()
    {
        return view('pages.cat-category');
    }
    public function catBowlStand()
    {
        return view('pages.cat.bowl-stand');
    }
    public function catBedHouse()
    {
        return view('pages.cat.bed-house');
    }
    public function catOthers()
    {
        return view('pages.cat.others');
    }
}
