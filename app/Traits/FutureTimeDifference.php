<?php
namespace App\Traits;


trait FutureTimeDifference
{
    public function getRemainTime($field)
    {
        $currentYear  = date('Y', time() + 6 * 60 * 60);
        $currentMonth = date('m', time() + 6 * 60 * 60);
        $currentDate  = date('d', time() + 6 * 60 * 60);
        $currentHours = date('H', time() + 6 * 60 * 60 );
        $currentMinutes = date('i', time() + 6 * 60 * 60 );

        $bigDates     = explode('-', $this->{$field});

        $timeYear    = $bigDates[0];
        $timeMonth   = $bigDates[1];
        $x_array     = explode(' ', $bigDates[2]);
        $timeDate    = $x_array[0];

        $diff = null;

        $smallDates  = explode(' ', $this->{$field});
        $smallDates  = explode(':', $smallDates[1]);

        $timeHours   = $smallDates[0];
        $timeMinutes = $smallDates[1];
        $timeSeconds = $smallDates[2];

        if ( $currentYear == $timeYear && $currentYear <= $timeYear )
        {
            if ($currentMonth == $timeMonth && $currentMonth <= $timeMonth )
            {
                if ($currentDate == $timeDate && $currentDate <= $timeDate )
                {
                    if ($currentHours == $timeHours && $currentHours <= $timeHours )
                    {
                        $diff = $timeMinutes - $currentMinutes;
                        if ($diff == 1)
                        {
                            $diff .= ' minute';
                        }elseif ($diff > 0)
                        {
                            $diff .= ' minutes';
                        }
                    }elseif ( $currentHours <= $timeHours )
                    {
                        $diff = $timeHours - $currentHours;
                        if ($diff == 1)
                        {
                            $diff .= ' hour';
                        }elseif ( $diff > 0 )
                        {
                            $diff .= ' hours';
                        }
                    }
                }elseif ( $currentDate <= $timeDate )
                {
                    $diff = $timeDate - $currentDate;
                    if ($diff == 1)
                    {
                        $diff .= ' day';
                    }elseif ( $diff > 0 )
                    {
                        $diff .= ' days';
                    }
                }
            }elseif ( $currentMonth <= $timeMonth )
            {
                $diff = $timeMonth - $currentMonth;
                if ($diff == 1)
                {
                    $diff .= ' month';
                }elseif ( $diff > 0 )
                {
                    $diff .= ' months';
                }
            }
        }elseif ( $currentYear <= $timeYear )
        {
            $diff = $timeYear - $currentYear;

            if ($diff == 1)
            {
                $monthDiff = $timeMonth - $currentMonth;

                $m_array = explode('-', $monthDiff);

                if ( count($m_array) > 1 )
                {
                    unset($m_array[0]);
                    $monthDiff = $m_array[1];
                }

                if ( $currentMonth > 6 )
                {
                    $diff = 12 - $monthDiff;
                }else
                {
                    $diff = $monthDiff;
                }

                $diff .= ' month';
            }elseif ( $diff > 0 )
            {
                $diff .= ' years';
            }
        }

        return $diff;

    }
}