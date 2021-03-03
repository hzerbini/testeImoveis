<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Property;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PropertyController extends Controller
{
    function index($transactionType, $type = null, $addressSlug = null, $search = null){
        
        $lookUpTransactionTable = [
            'venda' => 0,
            'alugar' => 1
        ];

        $transaction = $lookUpTransactionTable[$transactionType];


        $properties = Property::where('transaction_type', $transaction)
            ->when($type != null, function($query) use ($type){
                $lookUpTypeTable = [
                    'casa' => 0,
                    'apartamento' => 1
                ];
                $typeNumber =  $lookUpTypeTable[$type];
                return $query->where('type', $typeNumber);
            })
            ->when($addressSlug, function($query) use ($addressSlug){
                return $query->where('address_slug', $addressSlug);
            })->when($search != null, function($query) use ($search){
                return $query->where(function($query) use ($search){
                    $searchArray = explode('-', $search);
                    $searchString = '%' . implode(' ', $searchArray) . '%';
                    $query->orWhere('neighborhood', 'like', $searchString);
                    $query->orWhere('title', 'like', $searchString);
                    $query->orWhere('price', 'like', $searchString);
                });
            })->paginate(10);

        return view('property.index', compact('properties'));
    }

    public function show($propertyCode)
    {
        $id = collect(explode('-', $propertyCode))->first(); 
        $property = Property::findOrFail($id);
        
        $this->checkValidShowUrl($propertyCode, $property);

        return view('property.show', compact('property'));
    }

    private function checkValidShowUrl($propertyCode, $property)
    {
        $rightCode = $property->generateCodeUrl();

        if($rightCode != $propertyCode){
            throw new NotFoundHttpException();
        }
    }
}
