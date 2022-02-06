<?php
/**
 * Created by PhpStorm.
 * User: Giansalex
 * Date: 10/03/2019
 * Time: 21:45
 */

declare(strict_types=1);

namespace Greenter\Data;

use Greenter\Model\Client\Client;
use Greenter\Model\Company\Address;
use Greenter\Model\Company\Company;

class SharedStore
{
    public function getCompany(): Company
    {
        return (new Company())
            ->setRuc('20481046905')
            ->setNombreComercial('FERRETERIA LA MARQUEZA')
            ->setRazonSocial('FERRETERIA LA MARQUEZA E.I.R.L.')
            ->setAddress((new Address())
                ->setUbigueo('150101')
                ->setDistrito('TRUJILLO')
                ->setProvincia('TRUJILLO')
                ->setDepartamento('TRUJILLO')
                ->setUrbanizacion('LA MARQUEZA')
                ->setCodLocal('0000')
                ->setDireccion('CAL.EDUARDO YONG MZA. A LOTE. 28 '))
            ->setEmail('admin@lamarqueza.com')
            ->setTelephone('967606181');
    }

    public function getClientPerson(): Client
    {
        $client = new Client();
        $client->setTipoDoc('1')
            ->setNumDoc('72108539')
            ->setRznSocial('MIULER PUELLES')
            ->setAddress((new Address())
                ->setDireccion('Calle S/N, TRUJILLO - LA LIBERTAD - PERU'));

        return $client;
    }

    public function getClient(): Client
    {
        $client = new Client();
        $client->setTipoDoc('6')
            ->setNumDoc('10485546215')
            ->setRznSocial('EMPRESA ANONIMA S.A.C.')
            ->setAddress((new Address())
                ->setDireccion('JR. CASTILLO MZA. F LOTE. 3 URB. PRIMAVERA - TRUJILLO - LA LIBERTAD -PERU'))
            ->setEmail('client@corp.com')
            ->setTelephone('01-445566');

        return $client;
    }

    public function getSeller(): Client
    {
        $client = new Client();
        $client->setTipoDoc('1')
            ->setNumDoc('72108539')
            ->setRznSocial('VENDEDOR MIULER')
            ->setAddress((new Address())
                ->setDireccion('AV LARCO 201 - TRUJILLO - LA LIBERTAD - PERU'));

        return $client;
    }
}