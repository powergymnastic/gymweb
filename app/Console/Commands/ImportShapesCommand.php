<?php

namespace App\Console\Commands;

use App\Components\ShapesImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportShapesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:shapes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import shapes';

    public function handle()
    {

        $filePath = public_path().'/import/shapes.xlsx';
        Excel::import(new ShapesImport(), $filePath);
    }
}
