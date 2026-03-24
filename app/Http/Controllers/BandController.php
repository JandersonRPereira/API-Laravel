<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Nette\Utils\Json;

class BandController extends Controller
{
    public function getAll(){

        $bands = $this->getBands();
        return response()->json($bands);
    }


    public function getById($id){
        $band = null;

        foreach ($this->getBands() as $key => $_band) {
            if($_band['id'] == $id){
                $band = $_band;
            }
        }

        return $band ? response()->json($band) : abort(404);

    }


    public function getBandsByGender($gender){

    // dd($gender);
        $bands = [];

        foreach ($this->getBands() as $key => $_band) {
            if($_band['gender'] == $gender)
                $bands[] = $_band;
        }

        return response()->json($bands);
    }


    public function store(Request $request){

        $validated = $request->validate([
            'id' => 'numeric',
            'name' => 'required|min:3',
        ]);

        return response()->json($request->all());
    }


   protected function getBands(){
        return [
            [
                'id'=>1, 'name'=>'Dream Theaher', 'gender'=>'progressivo'
            ],
            [
                'id'=>2, 'name'=>'Megadeth', 'gender'=>'trash metal'
            ],
            [
                'id'=>3, 'name'=>'DIO', 'gender'=>'heavy metal'
            ],
            [
                'id'=>4, 'name'=>'Metallica', 'gender'=>'heavy metal'
            ],
            [
                'id'=>5, 'name'=>'Barões da pisadinha', 'gender'=>'tecno forró'
            ]
        ];
    }



}
