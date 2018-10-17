<?php
 
namespace HeistaDesign\Providers;
 
use Plenty\Plugin\ServiceProvider;
 
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
           $partial->set('footer', 'HeistaDesign::content.ThemeFooter');
        }, 0);
        return false;
    }
}