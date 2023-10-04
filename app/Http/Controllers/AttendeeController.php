<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Illuminate\Support\Facades\DB;

class AttendeeController extends Controller
{
    //
    protected $model;
    public function __construct(Attendee $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {
        $data = Attendee::when($request->search, function ($query, $searchItem) {
            $query->orwhere('First_Name', 'LIKE', '%' . $searchItem . '%')
                ->orwhere('Last_Name', 'LIKE', '%' . $searchItem . '%')
                ->orwhere('Middle_Name', 'LIKE', '%' . $searchItem . '%');
        })
            ->when($request->chapter, function ($query, $searchItem) {
                $query->where('Chapter', '=', $searchItem);
            })
            ->paginate(10);
        return inertia('Participants/Index', [
            "data" => $data,
            "filters" => $request->only(['search']),
        ]);
    }

    public function importParticipants(Request $request)
    {
        $date = Carbon::now();
        $dateTime = $date->format('Y-m-d');
        $file = $request->myfile;
        $validate = $request->validate([
            'myfile' => 'required|mimes:xlsx,csv',
        ]);
        if ($validate) {
            $fileName = $file->getClientOriginalName();
            $file->move(storage_path('app/public'), "file.xlsx");
            $reader = ReaderEntityFactory::createReaderFromFile(storage_path('app/public') . "file.xlsx");

            $reader->open(public_path() . "/storage/file.xlsx");

            $row_index_arr = [];
            foreach ($reader->getSheetIterator() as $sheet) {
                //dd("validate import");
                if ($sheet->getIndex() === 0) {
                    foreach ($sheet->getRowIterator() as $rowIndex => $row) {
                        $cells = $row->getCells();
                        //$my_index = $rowIndex;
                        $idattend = $cells[0]->getValue();
                        $Last_Name = $cells[1]->getValue();
                        $First_Name = $cells[2]->getValue();
                        $Middle_Name = $cells[3]->getValue();
                        $Chapter = $cells[4]->getValue();

                        if ($rowIndex > 1) {
                            $details = [
                                // "index" => $rowIndex,
                                "idattend" => $idattend,
                                "Last_Name" => $Last_Name,
                                "First_Name" => $First_Name,
                                "Middle_Name" => $Middle_Name,
                                "Chapter" => $Chapter
                            ];
                            // dd($details);
                            array_push($row_index_arr, $details);
                        }
                    }
                }
            }

            $chunk_division = array_chunk($row_index_arr, 1000);
            foreach ($chunk_division as $key => $value) {
                DB::table('attendees')->insert($value);
            }
        }
        return inertia('Participants/Index')
            ->with('message', 'Participants added');
    }

    public function qrcode(Request $request)
    {
        $id_from = $request->id_from;
        $id_to = $request->id_to;
        $qrcode = Attendee::select(
            'idattend',
            'Last_Name',
            'First_Name',
            'Middle_Name',
            'Chapter',
        )
            ->selectRaw("'$id_from' as id_from, '$id_to' as id_to")
            ->wherebetween('idattend', [$id_from, $id_to])
            ->get();
        return $qrcode;
    }

    public function attendqr(Request $request)
    {
        $idattend = $request->idattend;
        $qrcode = Attendee::select(
            'idattend',
            'Last_Name',
            'First_Name',
            'Middle_Name',
            'Chapter',
        )
            ->where('idattend', $idattend)
            ->get();
        return $qrcode;
    }
}
