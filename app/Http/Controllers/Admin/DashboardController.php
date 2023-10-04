<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $currentDate = Carbon::now();
        $startDate = Carbon::create($currentDate->year, 1, 1, 0, 0, 0);
        $endDate = $currentDate;

        $categoryCount = DB::table('categories')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();

        $subcategoryCount = DB::table('sub_categories')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();

        $permissionCount = DB::table('permissions')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();



        // Query the database to get category creation data by month
        $categoryData = DB::table('categories')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('month')
            ->get();

        // Create an array to store month names
        $months = [];

        // Create an array to store category counts for each month
        $categoryCounts = [];

        // Initialize arrays with zero counts for each month
        for ($i = 1; $i <= 12; $i++) {
            $months[] = date("F", mktime(0, 0, 0, $i, 1));
            $categoryCounts[] = 0;
        }

        // Fill in the actual counts for each month
        foreach ($categoryData as $item) {
            $monthIndex = intval($item->month) - 1;
            $categoryCounts[$monthIndex] = $item->count;
        }
        return view('admin.dashboard', compact('months', 'categoryCounts', 'startDate', 'endDate', 'categoryCount', 'subcategoryCount', 'permissionCount'));
    }
}
