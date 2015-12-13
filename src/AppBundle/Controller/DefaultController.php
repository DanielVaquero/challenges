<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $productForm = $this->createImportFileForm();

        return $this->render(
            'default/index.html.twig',
            array(
                'productForm' => $productForm->createView()
            )
        );
    }

    /**
     * @Route("/importProducts", name="importProducts")
     * @Method("POST")
     */
    public function importProductsAction(Request $request)
    {
        $importProductService = $this->container->get('import_products_from_file_service');

        $importFileForm = $this->createImportFileForm();
        $importFileForm->handleRequest($request);
        $file = $importFileForm->get('importFile')->getData();

        $importProductService->import($file->getPathname());

        $productsCounterService = $this->container->get('product_by_month_and_merchant_service');

        $productsByMonthList    = $productsCounterService->byMonth();
        $productsByMerchantList = $productsCounterService->byMerchant();

        return $this->render(
            'default/productList.html.twig',
            array(
                'productsByMonthList'    => $productsByMonthList,
                'productsByMerchantList' => $productsByMerchantList
            )
        );
    }

    private function createImportFileForm()
    {
        $formBuilder = $this->createFormBuilder();
        $formBuilder
            ->setAction($this->generateUrl('importProducts'))
            ->setMethod('POST')
            ->add('importFile', 'file', ['label' => 'File to import ', 'required' => true])
            ->add('submit', 'submit', ['label' => 'Submit']);

        return $formBuilder->getForm();

    }

}
