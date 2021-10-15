<?php

namespace App\Services;

use App\Entity\Tache;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Margin\Margin;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\Builder\BuilderInterface;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;

class QrcodeService
{
    /**
     * @var BuilderInterface
     */
    protected $builder;

    public function __construct(BuilderInterface $builder)
    {
        $this->builder = $builder;
    }

    public function qrcode(Tache $Tache)
    {
        $url = 'http://jobcleaning.fr/tache/';

        $objDateTime = new \DateTime('NOW');
        $dateString = $objDateTime->format('d-m-Y H:i:s');

        $path = dirname(__DIR__, 2).'/public/';

        // set qrcode
        $result = $this->builder
            ->data($url.$Tache->getId())
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(400)
            ->margin(10)
            ->labelText($Tache->getIntitule())
            ->labelAlignment(new LabelAlignmentCenter())
            ->labelMargin(new Margin(15, 5, 5, 5))
            ->logoPath($path.'images/logo.png')
            ->logoResizeToWidth('100')
            ->logoResizeToHeight('100')
            ->backgroundColor(new Color(221, 158, 3))
            ->build()
        ;

        //generate name
        $namePng = uniqid('', '') . '.png';

        //Save img png
        $result->saveToFile($path.'qrCode/'.$namePng);

        // l'url du qr_code est : $path.'qrCode/'.$namePng
        $Tache->setUrlQrCode('/qrCode/'.$namePng);
        return $Tache;
        // return $result->getDataUri();
    }
}