<?php

namespace afBackendName;

use Shopware\Components\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Shopware-Plugin afBackendName.
 */
class afBackendName extends Plugin
{

    /**
    * @param ContainerBuilder $container
    */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('af_backend_name.plugin_dir', $this->getPath());
        parent::build($container);
		}

		public static function getSubscribedEvents()
		{
		 	  return [
		 	  			'Enlight_Controller_Action_PostDispatchSecure_Backend_Index' => 'onPostDispatch'
		 	  ];
		}

		public function onPostDispatch(\Enlight_Event_EventArgs $args)
		{
						$config = $this->container->get('shopware.plugin.cached_config_reader')->getByPluginName($this->getName());

						$controller = $args->getSubject();
						$view = $controller->View();

						$view->assign('afBackendNameLogo', $config['afBackendNameLogo']);
						$this->container->get('Template')->addTemplateDir(
										$this->getPath() . '/Resources/views'
						);
						$args->getSubject()->View()->extendsTemplate('backend/afBackendName/index/header.tpl');
						$args->getSubject()->View()->extendsTemplate('backend/afBackendName/index/index.tpl');
		}

}
