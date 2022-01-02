<?php


namespace App\Components;


use App\Models\Shape;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ShapesImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {
            try {
                if ($row->filter()->isNotEmpty()) {
                    Shape::create([
                        'name' => $row['name'],
                        'video_url' => $row['video_url'],
                        'crystal_id' => $row['crystal'] ?? null,
                        'step' => $row['step'] ?? null,
                        'deep' => $row['deep'] ?? null,
                        'unit' => $row['unit'] ?? null,
                        'elem_id' => $row['elem_id'] ?? null,
                        'flexible' => $row['flexible'] == 1,
                        'difficult' => $row['difficult'] ?? null,
                        'level' => $row['level'] ?? null,
                    ]);
                }
            } catch (\Exception $exception) {
                dd($exception->getMessage());
            }

        }

    }
}
