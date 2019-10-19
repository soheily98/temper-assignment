<?php

class ChartsControllerTest extends TestCase
{
    /**
     * @test
     */
    public function testItGetsRightResponse()
    {
        $this->get('/api/v1/charts/weekly-retention')
            ->seeStatusCode(200)
            ->seeJsonContains([
                'success' => true,
                'message' => "OK",
            ])
            ->seeHeader("Content-Type", "application/json");
    }
}
