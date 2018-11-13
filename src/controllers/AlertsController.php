<?php

namespace dofus\controllers;

use dofus\models\Alerts;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AlertsController
{

    public function alerts(RequestInterface $request, ResponseInterface $response, $args)
    {
        $getalert = Alerts::where('cmntt', '=', $args['cmntt'])->get();
        if ($getalert->isEmpty())
        {
        	$reponse = $response->withStatus(404);
        	return $response->getBody();
        }

        $alert = $getalert->first();
        $xml = '<alert id="' . $alert->id . '" ignoreVersion="' . $alert->ignore_versions . '">';
        $xml .= '<p class="t">' . $alert->title . '</p>';
        $xml .= '<p class="d">' . date('d/m/Y', strtotime($alert->created_at)) . '</p>';
        $xml .= '<p class="d"><font color="#D5CFAA">.</font></p>';
        $xml .= $alert->content;
        $xml .= '</alert>';

        $response = $response->withStatus(200)->withHeader('Content-Type', 'application/xml');
        $body = $response->getBody();
        $body->write($xml);
        return $response->getBody();
    }

}