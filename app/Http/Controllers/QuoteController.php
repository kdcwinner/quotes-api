<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\Quote;

class QuoteController extends Controller
{
    private $endpoint = 'https://api.kanye.rest';
    
    /**
     * Used to get new 5 random quotes
     * @param Request
     * @return json data
     */
    public function getQuotes(Request $request){
        $data = [];
        $quote_count = 5;
        for($i=0;$i<$quote_count;$i++){
            $quote  = self::callApi($this->endpoint,[]);
            $data[] = $quote; 
            Quote::create(['quote'=>$quote]); 
        }
        return response()->json(['status'=>true,'message'=>'Quote fetched successfully!','data'=>$data]);
    }

    /**
     * Used to Call API
     * @param $url (Endpoint),$data (Array)
     * @return 
     */
    public static function callApi($url='',$data){
        try{
            $client = new Client;
            $response = $client->request($url,$data);
            return $response->getBody()->getContents();
        }catch(\Throwable $t){
            return response()->json(['status'=>false,'message'=>$t->getMessage()]);
        }
    }
}
