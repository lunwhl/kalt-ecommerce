<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Avatar;
use Vyuldashev\NovaMoneyField\Money;
use Laravel\Nova\Fields\BelongsToMany;
use Emilianotisato\NovaTinyMCE\NovaTinyMCE;

class Product extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Product';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
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

            Avatar::make('Feature image', 'image_path')
                ->disk('public')
                ->path('images')
                ->help(
                    'Please select an image with at least 300px width for the best result'
                )->rules('required'),

            Text::make('Name')
                ->sortable()
                ->rules('required'),

            Money::make("Price", "MYR")
                ->sortable()
                ->rules('required'),

            NovaTinyMCE::make('Description')->options([
                            'plugins' => [
                                'advlist autolink lists image charmap hr anchor'
                            ],
                            'toolbar' => 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media',
                            'use_lfm' => true,
                        ])
                        ->rules('required'),

            NovaTinyMCE::make('Specification')->options([
                            'plugins' => [
                                'advlist autolink lists image charmap hr anchor'
                            ],
                            'toolbar' => 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media',
                            'use_lfm' => true,
                        ])
                        ->rules('required'),

            BelongsToMany::make('Categories'),
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
