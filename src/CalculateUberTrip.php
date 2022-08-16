<?php

namespace Agilize\Basic1Challenge;

use DateTime;
use Exception;

class CalculateUberTrip
{
    protected float  $fee = 2.1;

    /**
     * @param $tripOrderTime
     * @param $distance
     * @return float|int
     * @throws Exception
     */
    public function calculateUberTrip($tripOrderTime, $distance) : float
    {
        try {
            $this->validateTimeFormat($tripOrderTime);

            $this->isOvernight($tripOrderTime);
            $this->isSunday($tripOrderTime);

            return $distance * $this->fee;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    private function validateTimeFormat($actualTime) : void
    {
        if (!$actualTime instanceof DateTime) {
            throw new Exception('Invalid time format');
        }
    }

    private function isOvernight($actualTime) : bool
    {
        $isOverThan22 = intval($actualTime->format('H')) > 22;
        $isLessThan6 = intval($actualTime->format('H')) < 6;

        if ($isOverThan22 || $isLessThan6) {
            $this->fee = 3.9;
            return true;
        }
        
        return false;
    }

    private function isSunday($actualTime) : void
    {
        $isSunday = intval($actualTime->format('w')) === 0;

        if ($isSunday && !$this->isOvernight($actualTime)) {
            $this->fee = 3;
        }
    }
}