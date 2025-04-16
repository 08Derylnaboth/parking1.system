<?php

namespace App\Processors;

class PriceCalculationProcessor
{
    protected PriceConfigurator $priceConfigurator;
    protected PeriodConfigurator $periodConfigurator;
    protected PriceCalculator $priceCalculator;

    public function _construct(){
        $this->priceCalculator= new PriceCalculator();
        $this->periodConfigurator=new PeriodConfigurator();
        $this->priceConfigurator=new PriceConfigurator();
    }
    /**
     * Create a new class instance.
     */
    public function process(int $reservationId):int
    {
        $reservation=Reservation::findOrFail($reservationId);
        $spot=optional($reservation)->spot;

        $garageAttributes=$spot->garage->spotAttributes()
        ->whereIn(column:'spot_attributes.id',$spotAttributeIds)->get()->toArray();

        $attributePrice=$spot->garage->spotAttributes()
        ->whereIn(column:'spot_attributes.id',$spot->spotAttributes->pluck(value:'id')
        -toArray()->get()->sum(callback:'pivot.price_per_hour'));

        //$basePrice=$spot->garage->prices()->where(column:'size_id',$spot->size_id)->first();

        return $this
            ->priceCalculator
            ->setPeriodConfigurator(
                $this->periodConfigurator->configure($reservation->start,$reservation->end)
            )
            ->setPriceConfigurator(
                $this->priceConfigurator
                ->setBasePrice(price:$spot->garage->prices()
                ->where(column:'size_id',$spot->size_id)->first()->base()+$attributePrice)
            )
            ->calculate(
                $reservation->start,
                $reservation->end
            );
    }
}
