<?php

use App\Repositories\FileRecordRepository;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FileRecordRepositoryTest extends TestCase
{
    /**
     * @test
     */
    public function testItOpensRightFile()
    {
        $filePath = 'data.csv';

        $fileRepository = new FileRecordRepository($filePath);

        $this->assertEquals($filePath, $fileRepository->getFilePath());
    }

    /**
     * @test
     */
    public function testItJustOpensFileOneTime()
    {
        $filePath = 'data.csv';

        $fileRepository = new FileRecordRepository($filePath);

        File::shouldReceive('get')->once()->andReturn("");

        for ($i = 0; $i < 3; $i++) {
            $records = $fileRepository->all();
        }
    }

    /**
     * @test
     */
    public function testItParsesFileSuccessfully()
    {
        $this->fakeRightFile();

        $fileRepository = new FileRecordRepository("aPath");

        $this->assertEquals(2, $fileRepository->all()->count());
        $this->assertEquals(3121, $fileRepository->all()[0]->user_id);
        $this->assertEquals(3122, $fileRepository->all()[1]->user_id);
    }

    private function fakeRightFile()
    {
        File::shouldReceive('get')
            ->andReturn("user_id;created_at;onboarding_perentage;count_applications;count_accepted_applications
3121;2016-07-19;40;0;0
3122;2016-07-19;40;0;0");
    }
}
