<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class ReportManageController extends Controller
{
    //
    public function viewReport()
    {
        $data_report = Transaction::all();
        return view('report.report_manage', compact('data_report'));
    }
}
