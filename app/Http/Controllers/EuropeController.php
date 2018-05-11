<?php

namespace MiomoSport\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class EuropeController extends Controller
{
    //
    const URL = 'https://api.sportradar.us/soccer-xt3/eu/es/';
    const APIKEY = 'prw33zuhvpnv78rejpxr28um';
    const BRANCH = 'eu';

    public function __construct(){
      $this->client = new Client([
        'base_uri' => self::URL
      ]);
    }

    public function index()
    {
      $response = $this->client->request('GET','tournaments.json',['query' => ['api_key'=>self::APIKEY]]);

      $torneos = json_decode($response->getBody());
      $tournaments = $torneos->tournaments;
      $branch = self::BRANCH;
      $result = array();
      foreach ($tournaments as $torneo) {
          if (empty($torneo->season_coverage_info->max_coverage_level) ||
          $torneo->season_coverage_info->max_coverage_level == 'platinum') {
            array_push($result, $torneo);
          }
      }
      return view('share.index',compact('result','branch'));
    }

    public function show($id)
    {
      $response = $this->client->request('GET','tournaments/'.$id.'/info.json',['query' => ['api_key'=>self::APIKEY]]);

      $responseData = json_decode($response->getBody());

      $name = $responseData->tournament->current_season->name;
      $id = $responseData->tournament->id;

    session(['nombreTorneo' => $name]);

      return view('eu.show',compact('name','id'));

    }

    public function equipos($id)
    {
      $response = $this->client->request('GET','tournaments/'.$id.'/info.json',['query' => ['api_key'=>self::APIKEY]]);

      $responseData = json_decode($response->getBody());

      $name = $responseData->tournament->current_season->name;
      $id = $responseData->tournament->id;
      $groups = $responseData->groups;
      $category =$responseData->tournament->category->id;

      //return count($groups);
      return view('eu.equipos',compact('name','id','groups','category'));
    }

    public function posiciones($id)
    {
      $response = $this->client->request('GET','tournaments/'.$id.'/standings.json',['query' => ['api_key'=>self::APIKEY]]);

      $responseData = json_decode($response->getBody());

      $name = $responseData->tournament->current_season->name;
      $id = $responseData->tournament->id;
      $standings = $responseData->standings;

      return view('eu.posiciones',compact('name','id','standings'));
    }

    public function partidos($id)
    {
      $response = $this->client->request('GET','tournaments/'.$id.'/schedule.json',['query' => ['api_key'=>self::APIKEY]]);

      $responseData = json_decode($response->getBody());

      $name = $responseData->tournament->name;
      $id = $responseData->tournament->id;
      $partidos = $responseData->sport_events;
      $category = $responseData->tournament->category->id;
      $result = array();

      foreach ($partidos as $partido) {
        if ($partido->tournament_round->type != 'qualification') {
            array_push($result, $partido);
        }
      }

      $jornadas = collect($result)->groupBy('tournament_round.number')->toArray();
      if ($category == 'sr:category:393') {
        $jornadas = collect($jornadas)->sortBy('tournament_round.group')->toArray();
      }


      //return $jornadas;
      return view('eu.partidos',compact('name','id','jornadas','category'));
    }

    public function resultados($id)
    {
      $response = $this->client->request('GET','tournaments/'.$id.'/results.json',['query' => ['api_key'=>self::APIKEY]]);

      $responseData = json_decode($response->getBody());

      $name = $responseData->tournament->name;
      $id = $responseData->tournament->id;
      $category = $responseData->tournament->category->id;
      $resultados = $responseData->results;

      $result = array();
      foreach ($resultados as $resultado) {
        if ($resultado->sport_event->tournament_round->type != 'qualification') {
          array_push($result, $resultado);
        }
      }
      //return $result[0]->sport_event_status->away_score;
      return view('eu.resultados',compact('name','id','result','category'));
      //return view('eu.resultadosPrueba',compact('name','id','result','category'));
    }

}
