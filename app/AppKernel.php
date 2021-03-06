<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new AppBundle\AppBundle(),
            new pi\FrontEnd\FicheDeSoinBundle\FicheDeSoinBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new pi\FrontEnd\FicheDeDressageBundle\FicheDeDressageBundle(),
            new pi\FrontEnd\VeterinaireBundle\VeterinaireBundle(),
            new pi\BackEnd\AdminBundle\AdminBundle(),
            new Gregwar\CaptchaBundle\GregwarCaptchaBundle(),
            new pi\FrontEnd\AnimaleBundle\AnimaleBundle(),

            new pi\FrontEnd\DresseurBundle\DresseurBundle(),
            new blackknight467\StarRatingBundle\StarRatingBundle(),

            new pi\FrontEnd\AdoptionBundle\AdoptionBundle(),
            new pi\FrontEnd\PetiteurBundle\PetiteurBundle(),
            new pi\BackEnd\ReclamationBundle\ReclamationBundle(),
            new AncaRebeca\FullCalendarBundle\FullCalendarBundle(),
            new pi\FrontEnd\CalenderBundle\CalanderBundle(),
//            new Tiloweb\PaginationBundle\TilowebPaginationBundle(),
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
          //  new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),


            new pi\FrontEnd\CouncoursBundle\ConcoursBundle(),
           // new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new CMEN\GoogleChartsBundle\CMENGoogleChartsBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new pi\FrontEnd\CommercialBundle\CommercialBundle(),
            new pi\FrontEnd\FaqBundle\FaqBundle(),
            new pi\BackEnd\faqAdminBundle\faqAdminBundle(),
        ];

        if (in_array($this->getEnvironment(), ['dev', 'test'], true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();

            if ('dev' === $this->getEnvironment()) {
                $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
                $bundles[] = new Symfony\Bundle\WebServerBundle\WebServerBundle();
            }
        }

        return $bundles;
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function getCacheDir()
    {
        return dirname(__DIR__).'/var/cache/'.$this->getEnvironment();
    }

    public function getLogDir()
    {
        return dirname(__DIR__).'/var/logs';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        try {
            $loader->load($this->getRootDir() . '/config/config_' . $this->getEnvironment() . '.yml');
        } catch (Exception $e) {
        }
    }
}
