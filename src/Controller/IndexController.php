<?php

namespace App\Controller;

use App\Form\SearchFormType;
use App\Service\EtablissementPublicApi;
use App\Service\GeoApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request)
    {
        $form = $this->createForm(SearchFormType::class);
        $poles = [];

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $geoApi = new GeoApi($data['city'], $data['zip']);
            try {
                $cityCode = $geoApi->getCityCode();
                $etablissementPublicApi = new EtablissementPublicApi($cityCode, $data['infra']);
                $poles = $etablissementPublicApi->getEtablissements();
            } catch (\Exception $e) {
                $this->addFlash('error', $e->getMessage());
            }
        }

        return  $this->render('index.html.twig', [
           'form' => $form->createView(),
            'poles' => $poles,
        ]);
    }
}
