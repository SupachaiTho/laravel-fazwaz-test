<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Property;
use Illuminate\Http\Request;
use App\Http\Resources\PropertyResource;

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
        $column = $request->input('column') || NULL; //Index
        $dir = $request->input('dir');
        $searchValue = $request->input('search');
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
            )->orderBy($columns[$column], $dir);

        if ($searchValue) {
            $query->where(function($query) use ($searchValue) {
                $query->where('title', 'like', '%' . $searchValue . '%')
                ->orWhere('description', 'like', '%' . $searchValue . '%');
            });
        }
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
