<?php
namespace HeistaDesign\Containers;
use Plenty\Plugin\Templates\Twig;
class HeistaDesignContainer
{
    public function call(Twig $twig):string
    {
        return $twig->render('HeistaDesign::Stylesheet');
    }
}