<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Cloner\Data;

class ReportManageController extends Controller
{
    //
    public function viewReport()
    {
        $data_report = Transaction::all();
        $data_report = DB::table('transactions')->latest()->paginate(10);
        return view('report.report_manage', ['transactions' => $data_report], compact('data_report'));
    }
}
