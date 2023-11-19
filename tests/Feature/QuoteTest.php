<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use GuzzleHttp\Client;
use App\Models\Quote;

class QuoteTest extends TestCase
{
    /**
     * used to test api data comes or not.
     *
     * @return void
     */
    public function test_quote()
    {
        // $this->withoutExceptionHandling();
        
        // $url = 'https://api.kanye.rest';
        // $quote_count = 5;
        // for($i=0;$i<$quote_count;$i++){
        //     $client = new Client;
        //     $response = $client->request($url);
        //     $quote = $response->getBody()->getContents();
        //     $data[] = $quote;
        //     Quote::create(['quote'=>$quote_count]);
        // }

        // $this->assertEquals(5, count($data));
        
    }
}
