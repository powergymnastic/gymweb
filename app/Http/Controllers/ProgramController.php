<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramRequest;
use App\Models\Shape;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class ProgramController extends Controller
{
    public function __invoke(ProgramRequest $request)
    {
        $data = $request->validated();
        $elementsForProgram = collect([]);
        foreach ($data['elements'] as $element) {
            if ($element['is_include']) {
                $sets = $element['sets'] ?? 2;
                $exercise = $element['exercise'] ?? 2;

                $elementMain = Shape::where('elem_id', $element['elem_id'])->where('level', 1)->where('step', $element['step'])->inRandomOrder()->first();
                for ($i = 0; $i < $sets; $i++) {
                    $elementsForProgram->push($elementMain);
                }
                for ($k = 0; $k < $exercise; $k++) {
                    $elementExercise = Shape::where('elem_id', $element['elem_id'])->where('level', '!=', 1)->where('step', $element['step'])->inRandomOrder()->first();
                    for ($j = 0; $j < $sets; $j++) {
                        $elementsForProgram->push($elementExercise);
                    }
                }
            }
        }
        if ($data['is_mix']) {
            $mixedProgram = collect([]);
            $group = $elementsForProgram->groupBy('crystal_id');
            foreach ($group[1] as $key => $crystalElem) {
                $mixedProgram->push($crystalElem);
                $mixedProgram->push($group[2][$key]);
            }

            $elementsForProgram = isset($group[3]) ? $mixedProgram->merge($group[3]) : $mixedProgram;

        }
        dd($elementsForProgram);
//        $sets = $data['sets'] ?? 2;
//        $flexible = $data['flexible'] ? null : 1;
//        $program = [];
//        if ($data['crystals'][0]['is_active'] && $data['crystals'][1]['is_active']) {
//            foreach ($data['crystals'] as $crystal) {
//                if ($crystal['is_active']) {
//
//                    if ($crystal['crystal'] === 1) {
//
//                        for ($k = 0; $k < 5; $k++) {
//                            $elems = collect([]);
//                            $mainExerciseFirst = Shape::whereNotNull('video_url')
//                                ->where('crystal_id', 1)
//                                ->where('difficult', $crystal['difficult'])
//                                ->where('level', 1)
//                                ->where('flexible', '!=', $flexible)
//                                ->inRandomOrder()
//                                ->first();
//
//                            $mainExerciseSecond = Shape::whereNotNull('video_url')
//                                ->where('crystal_id', 2)
//                                ->where('difficult', $crystal['difficult_back'])
//                                ->where('level', 1)
//                                ->where('flexible', '!=', $flexible)
//                                ->inRandomOrder()
//                                ->first();
//                            $exercises = collect([]);
//                            $ids = [];
//
//                            for ($o = 0; $o < $sets; $o++) {
//                                $secondaryExercisesFirst = Shape::whereNotNull('video_url')
//                                    ->where('crystal_id', 1)
//                                    ->where('difficult', $crystal['difficult'])
//                                    ->where('level', '!=', 1)
//                                    ->where('flexible', '!=', $flexible)
//                                    ->whereNotIn('id', $ids)
//                                    ->inRandomOrder()
//                                    ->first();
//
//                                $secondaryExercisesSecond = Shape::whereNotNull('video_url')
//                                    ->where('crystal_id', 2)
//                                    ->where('difficult', $crystal['difficult_back'])
//                                    ->where('level', '!=', 1)
//                                    ->where('flexible', '!=', $flexible)
//                                    ->whereNotIn('id', $ids)
//                                    ->inRandomOrder()
//                                    ->first();
//                                $secondaryExercisesFirst->deeper = $crystal['deeper'] ?? 1;
//                                $secondaryExercisesSecond->deeper = $crystal['deeper_back'] ?? 1;
//                                array_push($ids, $secondaryExercisesFirst->id ?? null);
//                                array_push($ids, $secondaryExercisesSecond->id ?? null);
//                                $exercises = $exercises->push($secondaryExercisesFirst);
//                                $exercises = $exercises->push($secondaryExercisesSecond);
//                                $exercises = $exercises->push($secondaryExercisesFirst);
//                                $exercises = $exercises->push($secondaryExercisesSecond);
//
//
//                            }
//                            $mainExerciseFirst->deeper = $crystal['deeper'] ?? 1;
//                            $mainExerciseSecond->deeper = $crystal['deeper_back'] ?? 1;
//
//                            $elems->push($mainExerciseFirst);
//                            $elems->push($mainExerciseSecond);
//                            $elems->push($mainExerciseFirst);
//                            $elems->push($mainExerciseSecond);
//                            $elems = $elems->merge($exercises);
//                            $program[$k][$crystal['crystal']] = $elems;
//
//                        }
//                    }
//                    if ($crystal['crystal'] != 1 && $crystal['crystal'] != 2) {
//
//                        for ($j = 0; $j < 5; $j++) {
//                            $elems = collect([]);
//                            $mainExercise = Shape::whereNotNull('video_url')
//                                ->where('crystal_id', $crystal['crystal'])
//                                ->where('difficult', $crystal['difficult'])
//                                ->where('level', 1)
//                                ->where('flexible', '!=', $flexible)
//                                ->inRandomOrder()
//                                ->first();
//                            $exercises = collect([]);
//                            $ids = [];
//                            for ($o = 0; $o < $sets; $o++) {
//                                $secondaryExercises = Shape::whereNotNull('video_url')
//                                    ->where('crystal_id', $crystal['crystal'])
//                                    ->where('difficult', $crystal['difficult'])
//                                    ->where('level', '!=', 1)
//                                    ->whereNotIn('id', $ids)
//                                    ->where('flexible', '!=', $flexible)
//                                    ->inRandomOrder()
//                                    ->first();
//
//                                array_push($ids, $secondaryExercises->id ?? null);
//
//                                $secondaryExercises->deeper = $crystal['deeper'] ?? 1;
//                                $exercises = $exercises->push($secondaryExercises);
//                                $exercises = $exercises->push($secondaryExercises);
//
//                            }
//
//                            $mainExercise->deeper = $crystal['deeper'] ?? 1;
//
//                            $elems = $elems->push($mainExercise);
//                            $elems = $elems->push($mainExercise);
//                            $elems = $elems->merge($exercises);
//                            $program[$j][$crystal['crystal']] = $elems;
//
//                        }
//                    }
//                }
//            }
//        } else {
//            foreach ($data['crystals'] as $crystal) {
//                if ($crystal['is_active']) {
//                    for ($k = 0; $k < 5; $k++) {
//                        $mainExercise = Shape::whereNotNull('video_url')
//                            ->where('crystal_id', $crystal['crystal'])
//                            ->where('difficult', $crystal['difficult'])
//                            ->where('level', 1)
//                            ->where('flexible', '!=', $flexible)
//                            ->inRandomOrder()
//                            ->first();
//                        $exercises = collect([]);
//                        $ids = [];
//                        for ($o = 0; $o < $sets; $o++) {
//                            $secondaryExercises = Shape::whereNotNull('video_url')
//                                ->where('crystal_id', $crystal['crystal'])
//                                ->where('difficult', $crystal['difficult'])
//                                ->where('level', '!=', 1)
//                                ->whereNotIn('id', $ids)
//                                ->where('flexible', '!=', $flexible)
//                                ->inRandomOrder()
//                                ->first();
//                            array_push($ids, $secondaryExercises->id ?? null);
//
//                            $secondaryExercises->deeper = $crystal['deeper'] ?? 1;
//                            $exercises = $exercises->push($secondaryExercises);
//                            $exercises = $exercises->push($secondaryExercises);
//                        }
//
//                        $elems = collect([]);
//                        $mainExercise->deeper = $crystal['deeper'] ?? 1;
//                        $elems = $elems->push($mainExercise);
//                        $elems = $elems->push($mainExercise);
//                        $elems = $elems->merge($exercises);
//
//                        $program[$k][$crystal['crystal']] = $elems;
//                    }
//
//                }
//
//            }
//
//        }
        $phpWord = new PhpWord();
//        <div v-for="(day, key) in program" class="mb-3">
//    День {{ key + 1 }}
//                <div v-for="crystal in day">
//    Группа
//
//                    <div v-for="exercise in crystal">
//                        <template v-if="exercise">
//                            <div><a :href="exercise.video_url">{{ exercise.name }}</a></div>
//                        </template>
//                    </div>
//                </div>
//            </div>
        $section = $phpWord->addSection();

        $section->addText('Внимание! Доступ к плану тренировки прекратится через месяц. Поэтому, если хочешь, скачай его себе.', [
            'size' => 13, 'color' => '#ff4545', 'bold' => true
        ]);
        $section->addText('');

        $section->addText('Прогресс зависит от того, насколько ты серьёзно отнесешься к программе и будешь тренироваться стабильно, выполняя, все упражнения из списка', [
            'size' => 13, 'color' => '#545454', 'italic' => true
        ]);
        $section->addText('');
        $section->addText('Отдых между упражнениями, которые идут подряд - 3 минуты, между разными - 2 минуты, смена стороны и рук - тоже 2 минуты', [
            'size' => 13, 'color' => '#545454', 'italic' => true
        ]);
        $section->addText('');
        $section->addText('Все названия упражнений - это ссылки, поэтому ты можешь перейти по ссылке и посмотреть видео демонстрацию упражнения', [
            'size' => 13, 'color' => '#1691d9', 'italic' => true
        ]);
        $section->addText('Ссылка на видео с таймкодом, поэтому с какого момента идёт видео - это и есть твоё упражнение.', [
            'size' => 13, 'color' => '#1691d9', 'italic' => true
        ]);
        $section->addText('Ты можешь посмотреть более усложненный или упрощенный вариант, если вдруг захочешь внести личные корректировки', [
            'size' => 13, 'color' => '#1691d9', 'italic' => true
        ]);
        $section->addText('Если динамичные упражнения будут идти слишком легко, делай их более плавно и медленно', [
            'size' => 13, 'color' => '#1691d9', 'italic' => true
        ]);
        $section->addText('');

        $section->addText('');

        $counterDay = 1;
        foreach ($program as $day) {
            $section->addText('День ' . $counterDay, ['size' => 17, 'color' => '#292929'], ['lineHeight' => 1.2]);
            $counterDay++;

            $counter = 1;
            $counterBlock = 1;
            foreach ($day as $key => $crystal) {
                $section->addText('Блок ' . $counterBlock, ['size' => 15, 'color' => '#333333'], ['lineHeight' => 1.2]);
                foreach ($crystal as $exercise) {
                    if (!$exercise) continue;
                    $section->addLink($exercise->video_url, $counter . '. ' . $exercise->name . ' - '
                        . round($exercise->deep * ((int)$exercise->deeper)) . ' '
                        . $exercise->unit
                        , ['size' => 13, 'color' => '#4f4f4f'], ['lineHeight' => 1.2]);
                    $counter++;
                }
                $counterBlock++;
                $section->addText('');
            }
        }
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(storage_path($data['person'] . '.docx'));

        return response()->json(['program' => $program]);
    }
}
