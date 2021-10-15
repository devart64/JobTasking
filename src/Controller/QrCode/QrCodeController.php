<?php

namespace App\Controller\QrCode;

use App\Services\QrcodeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\SearchType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QrCodeController extends AbstractController
{
    /**
     * @Route("/test-qr-code", name="testQrCode")
     * @param Request $request
     * @param QrcodeService $qrcodeService
     * @return Response
     */
    public function testQrCode(Request $request, QrcodeService $qrcodeService): Response
    {
        $qrCode = null;
        $form = $this->createForm(SearchType::class, null);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $qrCode = $qrcodeService->qrcode($data['name']);
        }

        return $this->render('qrCode/index.html.twig', [
            'form' => $form->createView(),
            'qrCode' => $qrCode
        ]);
    }
}