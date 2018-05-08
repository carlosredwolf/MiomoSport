<?php

namespace MiomoSport\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class IntlTorneoController extends Controller
{

  const URL = 'https://api.sportradar.us/soccer-xt3/intl/es/';
  const APIKEY = '4jmn6ukdynyrw8fwf3yv29fq';

  public function __construct(){
    $this->client = new Client([
      'base_uri' => self::URL
    ]);
  }

  public function show($id)
  {
    $response = $this->client->request('GET','tournaments/'.$id.'/info.json',['query' => ['api_key'=>self::APIKEY]]);

    $responseData = json_decode($response->getBody(), true);

    return view('intl.torneo.show',compact('responseData'));
  }

  public function standings($id)
  {
    $response = $this->client->request('GET','tournaments/'.$id.'/info.json',['query' => ['api_key'=>self::APIKEY]]);

    $responseData = json_decode($response->getBody(), true);

    return view('intl.torneo.equipos',compact('responseData'));
  }

  public function equipos($id)
  {
    $response = $this->client->request('GET','tournaments/'.$id.'/info.json',['query' => ['api_key'=>self::APIKEY]]);

    $responseData = json_decode($response->getBody(), true);

    return view('intl.torneo.equipos',compact('responseData'));
  }
}
