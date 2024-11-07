<?php

namespace App\Http\Controllers;

use App\Models\Meter;
use App\Models\Price;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CountController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function index()
    {
        $obMeters = Meter::orderBy('id', 'desc')->paginate(10);

        return view('count.main', [
            'obMeters' => $obMeters,
        ]);
    }
    public function getData(Request $request)
    {
        if ($request->has('page')) {

            return Meter::orderBy('id', 'desc')->paginate(10,page :$request->get('page'));
        }

        return Meter::orderBy('id', 'desc')->paginate(10,page :1);
    }
    public function getPrice()
    {
        return Price::orderBy('id', 'desc')->first();
    }
    public function delPrice(Request $request)
    {
        if ($request->has('id')) {
            Price::where('id', $request->get('id'))->delete();
        }

        return Price::orderBy('id', 'desc')->first();
    }
    public function setPrice(Request $request)
    {
        if ($request->has('id')) {
            if ($request->get('id') === '0') {
                $price = new Price;
                $price->created_at = Carbon::now()->format('Y-m-d');
            } else {
                $price = Price::find($request->get('id'));
            }
            $price->water = $request->get('newWater');
            $price->warming = $request->get('newWarming');
            $price->electric = $request->get('newElectric');
            $price->updated_at = Carbon::now()->format('Y-m-d');
            $price->save();

        }

        return Price::orderBy('id', 'desc')->first();

    }
    public function delRowCount(Request $request)
    {

        if ($request->has('id')) {
//            return response()->json(['error'=>'Удалил'],500);
            Meter::where('id', $request->get('id'))->delete();
        }

        if ($request->has('page')) {

            return Meter::orderBy('id', 'desc')->paginate(10,page :$request->get('page'));
        }

        return Meter::orderBy('id', 'desc')->paginate(10,page :1);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function editData(Request $request)
    {
        if ($request->has('id')) {
            $obMeter = Meter::find($request->get('id'));
            $obMeter->hot_water = $request->get('hot_water');
            $obMeter->cold_water = $request->get('cold_water');
            $obMeter->electric = $request->get('electric');
            $obMeter->date = $request->get('date');
            $obMeter->total = $request->get('total');
            $obMeter->save();

        }
        if ($request->has('page')) {

            return Meter::orderBy('id', 'desc')->paginate(10,page :$request->get('page'));
        }

        return Meter::orderBy('id', 'desc')->paginate(10,page :1);
    }
    public function addData(Request $request)
    {
        Meter::create($request->all());

        return Meter::orderBy('id', 'desc')->paginate(10,page :1);
    }
}
