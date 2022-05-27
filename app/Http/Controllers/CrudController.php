<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CrudController extends Controller
{
    // public function getoffer(){
    //     return Offer::get();
    // }
    // public function store(){
    //     Offer::create([
    //         'name'=>'offer3',
    //         'price'=>'200',
    //         'details'=>'offer is show',
    //     ]);
    // }
    public function create(){
        return view('offer.create');
    }
    public function store(OfferRequest $request){
        //  $message = $this->getMessage();
        //  $rules = $this->getRules();

        // validate data before insert to database
        // $validator = Validator::make($request->all(),$rules,$message);
        // if ($validator->fails()){
        //     return redirect()->back()->withErrors($validator)->withInput($request->all());
        // }
        
        // insert
        Offer::create([
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en,
            'price'=>$request->price,
            'details_ar'=>$request->details_ar,
            'details_en'=>$request->details_en,
        ]);
        return redirect()->back()->with(['success' => 'تم اضافه العرض بنجاح']);
    }

    // protected function getMessage(){
    //     return $message=[
    //      'name.required'=>__('message.offer name'),
    //      'price.required'=>__('message.price must be name'),
    //      'details.required'=>'التفاصيل مطلوبه',
    //     ];
    // }
    // protected function getRules(){
    //     return $rules=[
    //         'name' => 'required|max:100|unique:offers,name',
    //         'price' => 'required|numeric',
    //         'details' => 'required',
    //     ];
    // }
    public function getAlls(){
        $offers = Offer::select('id',
        'name_'.LaravelLocalization::getCurrentLocale() . ' as name',
        'details_'.LaravelLocalization::getCurrentLocale() . ' as details',
        'price',
        )->get();
        return view('offer.all',compact('offers'));
    }
}

