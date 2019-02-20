<?php

namespace App\Nova;

use App\Category;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Installation extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Installation';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'installation_type';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'installation_type',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Select::make('Installation Type')
                ->options([
                    'Basic' => 'Basic', 
                    'Economy' => 'Economy', 
                    'Any' => 'Any'
                ])
                ->sortable()
                ->rules('required'),

            Select::make('Horsepower')
                ->options(
                    Category::where('type', 'horsepower')
                        ->get()
                        ->mapWithKeys(function ($category){ 
                            return [$category->name => $category->name];
                        })
                        ->put("Any", "Any")
                    )
                ->sortable()
                ->rules('required'),

            Select::make('Aircond Type')
                ->options(
                    Category::where('type', 'type')
                            ->get()
                            ->mapWithKeys(function ($category){ 
                                return [$category->name => $category->name];
                            })
                            ->put("Any", "Any")
                    )
                ->sortable()
                ->rules('required'),

            Select::make('Refrigerant Gas')
                ->options(
                    Category::where('type', 'refrigerant-gas')
                            ->get()
                            ->mapWithKeys(function ($category){ 
                                return [$category->name => $category->name];
                            })
                            ->put("Any", "Any")
                    )
                ->sortable()
                ->rules('required'),

            Select::make('Feature')
                ->options(
                    Category::where('type', 'features')
                            ->get()
                            ->mapWithKeys(function ($category){ 
                                return [$category->name => $category->name];
                            })
                            ->put("Any", "Any")
                    )
                ->sortable()
                ->rules('required'),

            Currency::make("Price")
                ->sortable()
                ->rules('required'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
