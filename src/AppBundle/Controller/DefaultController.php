<?php

namespace AppBundle\Controller;

use AppBundle\DataFixtures\ORM\LoadFixtures;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\Alice\Loader\NativeLoader as NativeLoader;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->get('doctrine.orm.default_entity_manager');

        $test = (new LoadFixtures())->load($em);
        echo "<pre>";
        var_dump($test);
        echo "</pre>";
        die();
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
