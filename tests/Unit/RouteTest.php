<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Films;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use databaseTransactions;
    public function testExample1_WHEN_indexIsCalled_THEN_allFilmsAreReceived_AND_status200IsReceived()
    {
        $response = $this->get("/api/films");
        $response->assertStatus(200);
    }

     public function testExample2_WHEN_storeIsCalled_THEN_aFilmsIsStored_AND_status200IsReceived()
    {
        $response = $this->post('/api/film', [
                                'title' => 'toto2',
                                'description' => 'titis',
                                'release_year' => 2006,
                                'language_id' => 2,
                                'length' => 103,
                                'rating' => 'G',
                                'special_features' => 'Commentaries'
                            ]);
        $response = $response->assertStatus(201);
    }

    public function testExample3_WHEN_editIsCalled_WITH_idIs1_THEN_aFilmsIsReceived_AND_status200IsReceived()
    {
        $response = $this->get("/api/film/1/edit");
        $response->assertStatus(200);
    }

    public function testExample4_WHEN_showActorIsCalled_WITH_idIs1_THEN_allActeursOfTheFilmsAreReceived_AND_status200IsReceived()
    {
        $response = $this->get("/api/film/1/acteur");
        $response->assertStatus(200);
    }

    public function testExample5_WHEN_findIsCalled_WITH_noParameter_THEN_allFilmsAreReceived_AND_status200IsReceived()
    {
        $response = $this->get("/api/film/find");
        $response->assertStatus(200);
    }

    public function testExample5_WHEN_findIsCalled_WITH_ratingParameter_THEN_FilmsAreReceivedAfterFiltered_AND_status200IsReceived()
    {
        $response = $this->get("/api/film/find?rating=G");
        $response->assertStatus(200);
    }

    public function testExample6_WHEN_findIsCalled_WITH_minLengthParameter_THEN_FilmsAreReceivedAfterFiltered_AND_status200IsReceived()
    {
        $response = $this->get("/api/film/find?minLength=90");
        $response->assertStatus(200);
    }

    public function testExample7_WHEN_findIsCalled_WITH_ratingAndminLengthParameter_THEN_FilmsAreReceivedAfterFiltered_AND_status200IsReceived()
    {
        $response = $this->get("/api/film/find?rating=G?minLength=90");
        $response->assertStatus(200);
    }

    public function testExample8_WHEN_findIsCalled_WITH_ratingAndminLengthAndmaxLengthParameter_THEN_FilmsAreReceivedAfterFiltered_AND_status200IsReceived()
    {
        $response = $this->get("/api/film/find?rating=G?minLength=90?maxLength=100");
        $response->assertStatus(200);
    }

    public function testExample9_WHEN_findIsCalled_WITH_maxLengthParameter_THEN_FilmsAreReceivedAfterFiltered_AND_status200IsReceived()
    {
        $response = $this->get("/api/film/find?maxLength=100");
        $response->assertStatus(200);
    }

    public function testExample10_WHEN_findIsCalled_WITH_ratingAndminLengthAndmaxLengthAndwordParameters_THEN_FilmsAreReceivedAfterFiltered_AND_status200IsReceived()
    {
        $response = $this->get("/api/film/find?rating=G?minLength=90?maxLength=100?word=ACE");
        $response->assertStatus(200);
    }

    public function testExample11_WHEN_findIsCalled_WITH_ratingAndwordParameters_THEN_FilmsAreReceivedAfterFiltered_AND_status200IsReceived()
    {
        $response = $this->get("/api/film/find?rating=G?word=ACE");
        $response->assertStatus(200);
    }

    public function testExample11_WHEN_findIsCalled_WITH_wordParameterInTitle_THEN_FilmsAreReceivedAfterFiltered_AND_status200IsReceived()
    {
        $response = $this->get("/api/film/find?word=ACE");
        $response->assertStatus(200);
    }

    public function testExample11_WHEN_findIsCalled_WITH_wordParameterInDescription_THEN_FilmsAreReceivedAfterFiltered_AND_status200IsReceived()
    {
        $response = $this->get("/api/film/find?word=Database");
        $response->assertStatus(200);
    }

    public function testExample12_WHEN_destroyIsCalled_WITH_id_THEN_FilmIsDeletedInDB_AND_status201IsReceived()
    {
        $response = $this->post('/api/film', [
            'title' => 'toto5',
            'description' => 'titis',
            'release_year' => 2006,
            'language_id' => 2,
            'length' => 103,
            'rating' => 'G',
            'special_features' => 'Commentaries'
        ]);

        $id = $response->id;

        $response = $this->call('DELETE',"/api/film/$id");
        $response->assertStatus(201);
    }
}
