<?php

namespace App\Modules\Pricing;
use Illuminate\Support\Arr;

class PriceConfigurator
{
    protected int $amount;
    protected array $config;

    
    public function addConfig(array $additionalConfig):self
    {
        foreach($additionalConfig as $config){
            if(!Arr::has($config,keys:'amount')){
                Arr::set(&array:$config,key:'amount',$this->amount);
            }
            $this->configure(
                Arr::get($config,key:'amount'),
                Arr::get($config,key:'days'),
                Arr::get($config,key:'hours'),
            );
        } 
       
        return $this;
    }

    public function getConfig():array{
        return $this->config;
    }

    public function setBasePrice(int $price):self
    {
       $this->amount=$price;
       $this->configure($price);
       return $this;
    }

    private function configure(int $amount,array $days=null,string $configHours=null):void{
        $hours=null;
        if(is_string($configHours)){
            $hours=$this->prepareHours($configHours);
        }

        if(is_null($hours)){
            $hours=range(start:0,end:23);
        }

        if(empty($days)){
            $days=range(start:1,end:7);
        }

        collect($days)->each(function($day)use($hours,$amount){
            collect($hours)->each(function($hour)use($day,$amount){
                $this->config[$day][$hour]=amount;
            });
        });
    }

    private function prepareHours(string $hours):array{
        [$start,$end]=explode(separator:'-',$hours);
        return range($start,$end);
    }

    public function resetConfig():void{
        $this->setBasePrice($this->amount);
        //$this->setDefaultConfig($this->amount);
    }

    private function setDefaultConfig():void{
        $this->configure($amount);
    }
}
