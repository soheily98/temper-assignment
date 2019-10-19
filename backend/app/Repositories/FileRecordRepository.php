<?php

namespace App\Repositories;

use App\Models\Record;
use App\Repositories\Contracts\RecordRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * Class FileRecordRepository
 * @package App\Repositories
 */
class FileRecordRepository implements RecordRepository
{
    /**
     * @var Collection
     */
    private $collection;

    /**
     * @var string
     */
    private $filePath;

    /**
     * FileRecordRepository constructor.
     */
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        if (!isset($this->collection)) {
            $this->loadDataFromDisk();
        }

        return $this->collection;
    }

    private function loadDataFromDisk()
    {
        $data = collect([]);

        $fileContents = trim(File::get($this->getFilePath()));

        $fileRows = explode("\n", $fileContents);

        $rowCount = count($fileRows);

        for ($i = 1; $i < $rowCount; $i++) {
            $row = explode(";", trim($fileRows[$i]));

            $data->add(
                new Record([
                    'user_id' => $row[0],
                    'created_at' => $row[1],
                    'onboarding_percentage' => $row[2],
                    'count_applications' => $row[3],
                    'count_accepted_applications' => $row[4],
                ])
            );
        }

        $this->collection = $data;
    }
}
