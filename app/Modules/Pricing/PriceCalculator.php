<?php

namespace App\Modules\Pricing;
use Carbon\Carbon;

class PriceCalculator
{
   protected PriceConfigurator $priceConfigurator;
   protected PeriodConfigurator $periodConfigurator;

   protected array $periodMap=[];
   protected array $pricedMap=[];

   protected int $calculated=0;

   public function setPriceConfigurator(PriceConfigurator $priceConfigurator):self{
    $this->priceConfigurator=$priceConfigurator;
    return $this;
   }

   public function setPeriodConfigurator(PeriodConfigurator $periodConfigurator):self{
    $this->periodConfigurator=$periodConfigurator;
    return $this;
   }

   public function calaculate(Carbon $from, Carbon $to):int{
    $this->periodMap=$this->periodConfigurator->configure($from,$to)->getPeriodMap();

    $this->priceMap=$this->priceConfigurator->getConfig();
    $this->calculatePrice($from);
    return $this->calculated;
   }

   private function calculatePrice(Carbon $from):void{
    $this->calculated=collect($this->periodMap)->map(function($hours,$dayOfYear)use($from){
        return array_intersect_key(
            Arr::get($this->priceMap,$from->startOfYear()->subday()->addDays($dayOfYear)->dayofWeekIso),$hours);

    })->map(function($hourlyPrices,$dayOfYear){
        return collect($hourlyPrices)->map(function($price, $hour)use($dayOfYear){
            return $price*$this->periodMap[$dayOfYear][$hour]
        })->sum();
    })->sum();
   }

}
