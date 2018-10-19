<?php
 
namespace HeistaDesign\Providers;

use IO\Helper\TemplateContainer;
use IO\Helper\ComponentContainer;
use IO\Extensions\Functions\Partial;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\Twig;
 
class HeistaDesignServiceProvider extends ServiceProvider
{
 
	/**
	 * Register the service provider.
	 */
	public function register()
	{
 
    }
    /**
	 * Boot a template for the footer that will be displayed in the template plugin instead of the original footer.
	 */
	public function boot(Twig $twig, Dispatcher $eventDispatcher)
    {
        $eventDispatcher->listen('IO.init.templates', function(Partial $partial)
        {
           $partial->set('header', 'HeistaDesign::content.Header');
           $partial->set('footer', 'HeistaDesign::content.ThemeFooter');

           
          
        }, 0);

        $eventDispatcher->listen('IO.Component.Import', function (ComponentContainer $container)
        {
            if ($container->getOriginComponentTemplate()=='Ceres::Item.Components.SingleItem')
            {
                $container->setNewComponentTemplate('HeistaDesign::content.SingleItem');
            }
        }, 0);

        return false;
    }
}