<?php

namespace App\Nova;

use Laravel\Nova\Panel;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Select;
use Vyuldashev\NovaMoneyField\Money;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;


class Order extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Order';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id'
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
            ID::make()
            ->sortable()
            ->hideFromIndex(),

            BelongsTo::make('User Name', 'User', 'App\Nova\User'),

            Text::make('Billplz no', 'billplz_bill_id')
                ->sortable()
                ->hideFromIndex(),

            Text::make('Billing Name')
                ->sortable()
                ->hideFromIndex()
                ->rules('required'),

            Text::make('Billing Company Name')
                ->hideFromIndex()
                ->sortable(),

            Text::make('Billing Address')
                ->sortable()
                ->hideFromIndex()
                ->rules('required'),

            Text::make('Billing City')
                ->sortable()
                ->hideFromIndex()
                ->rules('required'),

            Text::make('Billing State')
                ->sortable()
                ->hideFromIndex()
                ->rules('required'),

            Text::make('Billing Postcode')
                ->sortable()
                ->hideFromIndex()
                ->rules('required'),

            Text::make('Billing Email')
                ->sortable()
                ->hideFromIndex()
                ->rules('required'),

            Text::make('Billing Phone')
                ->sortable()
                ->hideFromIndex()
                ->rules('required'),

            new Panel('Shipping Information', $this->shippingFields()),

            Money::make("Total", "MYR")
                ->sortable()
                ->rules('required'),

            Select::make('Status')
                ->options([
                    'unpaid' => 'Unpaid', 
                    'paid' => 'Paid', 
                    'sent' => 'Sent',
                ])
                ->sortable()
                ->rules('required'),

                // Text::make('Status')
                // ->sortable()
                // ->hideFromIndex()
                // ->rules('required'),

            Text::make('Note')
                ->sortable(), 

            HasMany::make('Items'),
        ];
    }

    protected function shippingFields()
    {
        return [
            Text::make('Shipping Name')
                ->sortable()
                ->hideFromIndex()
                ->rules('required'),

            Text::make('Shipping Phone')
                ->sortable()
                ->hideFromIndex()
                ->rules('required'),

            Text::make('Shipping Company Name')
                ->sortable()
                ->hideFromIndex(),

            Text::make('Shipping Address')
                ->sortable()
                ->hideFromIndex()
                ->rules('required'),

            Text::make('Shipping City')
                ->sortable()
                ->hideFromIndex()
                ->rules('required'),

            Text::make('Shipping State')
                ->sortable()
                ->hideFromIndex()
                ->rules('required'),

            Text::make('Shipping Postcode')
                ->sortable()
                ->hideFromIndex()
                ->rules('required'), 

            Text::make('Pickup Option', 'pickup')
                ->sortable()
                ->hideFromIndex()
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
