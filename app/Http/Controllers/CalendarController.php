<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Model\Client;
use App\Http\Model\Order;
use App\Http\Model\OrderItem;
use App\Http\Model\StockCode;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class CalendarController extends Controller
{

    function calendar()
    {
        // Get prev & next month
        if (isset($_GET['ym'])) {
            $ym = $_GET['ym'];
        } else {
            // This month
            $ym = date('Y-m');
        }

        // Check format
        $timestamp = strtotime($ym, "-01");
        if ($timestamp === false) {
            $timestamp = time();
        }

        // Today
        $today = date('Y-m-j', time());

        // For H3 title
        $html_title = date('M - Y', $timestamp);

        // Create prev & next month link     mktime(hour,minute,second,month,day,year)
        $prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) - 1, 1, date('Y', $timestamp)));
        $next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) + 1, 1, date('Y', $timestamp)));

        // Number of days in the month
        $day_count = date('t', $timestamp);

        // 0:Sun 1:Mon 2:Tue ...
        $str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));


        // Create Calendar!!
        $weeks = array();
        $week = '';

        // Add empty cell
        $week .= str_repeat('<td></td>', $str);

        for ($day = 1; $day <= $day_count; $day++, $str++) {

            $date = $ym . '-' . $day;

            if ($today == $date) {
                $week .= '<td class="today">' . $day;
            } else {
                $week .= '<td>' . $day;
            }
            $week .= '</td>';

            // End of the week OR End of the month
            if ($str % 7 == 6 || $day == $day_count) {

                if ($day == $day_count) {
                    // Add empty cell
                    $week .= str_repeat('<td></td>', 6 - ($str % 7));
                }

                $weeks[] = '<tr>' . $week . '</tr>';

                // Prepare for new week
                $week = '';

            }
        }

        //this is eloquent see the db statement
        return view("calendars.calendar")
            ->with("prev", $prev)
            ->with("next", $next);
    }

}
