<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Property;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $columns = [
            'property_title',
            'description',
            'bedroom',
            'bathroom',
            'property_type_title',
            'status_title',
            'for_sale',
            'for_rent',
            'project_title',
            'country_title',
        ];
        $length = $request->input('length');
        $column = $request->input('column'); //Index
        $dir = $request->input('dir');
        $filterTitle = $request->input('filterTitle');
        $filterDescription = $request->input('filterDescription');
        $filterBedroom = $request->input('filterBedroom');
        $filterBathroom = $request->input('filterBathroom');
        $filterType = $request->input('filterType');
        $filterStatus = $request->input('filterStatus');
        $filterForSale = $request->input('filterForSale');
        $filterForRent = $request->input('filterForRent');
        $filterProject = $request->input('filterProject');
        $filterCountry = $request->input('filterCountry');
        $query = Property::join('property_types', 'properties.property_type_id', 'property_types.id')
            ->join('statuses', 'properties.status_id', 'statuses.id')
            ->join('projects', 'properties.project_id', 'projects.id')
            ->join('regions', 'properties.region_id', 'regions.id')
            ->join('countries', 'regions.country_id', 'countries.id')
            ->select(
                'property_id',
                'property_title',
                'description',
                'bedroom',
                'bathroom',
                'property_type_title',
                'status_title',
                'for_sale',
                'for_rent',
                'project_title',
                'country_title',
            )
            ->orderBy($columns[$column], $dir)
            ->when($filterTitle, function($query, $filterTitle){
                return $query->whereRaw("property_title like '%$filterTitle%'");
            })
            ->when($filterDescription, function($query, $filterDescription){
                return $query->whereRaw("description like '%$filterDescription%'");
            })
            ->when($filterBedroom, function($query, $filterBedroom){
                return $query->whereRaw("bedroom = $filterBedroom");
            })
            ->when($filterBathroom, function($query, $filterBathroom){
                return $query->whereRaw("bathroom = $filterBathroom");
            })
            ->when($filterType, function($query, $filterType){
                return $query->whereRaw("property_type_title = '$filterType'");
            })
            ->when($filterStatus, function($query, $filterStatus){
                return $query->whereRaw("status_title = '$filterStatus'");
            })
            ->when($filterForSale, function($query, $filterForSale){
                return $query->whereRaw("for_sale = $filterForSale");
            })
            ->when($filterForRent, function($query, $filterForRent){
                return $query->whereRaw("for_rent = $filterForRent");
            })
            ->when($filterProject, function($query, $filterProject){
                return $query->whereRaw("project_title like '%$filterProject%'");
            })
            ->when($filterCountry, function($query, $filterCountry){
                return $query->whereRaw("country_title = '$filterCountry'");
            });

        $properties = $query->paginate($length);
        return ['data' => $properties, 'draw' => $request->input('draw')];
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
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
