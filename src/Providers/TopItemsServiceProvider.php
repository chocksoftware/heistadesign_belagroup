<?php

namespace HeistaDesign\Providers;


use Plenty\Plugin\ServiceProvider;

class TopItemsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->getApplication()->register(TopItemsRouteServiceProvider::class);
    }

    /**
    * Boot a template for the basket that will be displayed in the template plugin instead of the original basket.
    */
   public function boot(Twig $twig, Dispatcher $eventDispatcher)
   {
       
   }
}
