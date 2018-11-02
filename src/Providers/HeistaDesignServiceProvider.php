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

        $eventDispatcher->listen('IO.Resources.Import', function (ResourceContainer $container) {
            $container->addStyleTemplate('HeistaDesign::includeCSS');
        }, 99);
        
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

        $eventDispatcher->listen('IO.tpl.category.item', function (TemplateContainer $container)
        {
            $container->setTemplate('HeistaDesign::content.CategoryItem');
            
        }, 0);

        $eventDispatcher->listen('IO.Component.Import', function (ComponentContainer $container)
        {
            if ($container->getOriginComponentTemplate()=='Ceres::ItemList.Components.ItemSearch')
            {
                $container->setNewComponentTemplate('HeistaDesign::content.ItemSearch');
            }
        }, 0);

        $eventDispatcher->listen('IO.tpl.home', function (TemplateContainer $container)
        {
            $container->setTemplate('HeistaDesign::content.Homepage');
            return false;
        }, 0);

       

        return false;
    }
}