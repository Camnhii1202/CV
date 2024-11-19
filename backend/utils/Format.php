<?php

class Format
{
    public function formatDateMothYear($date)
    {
        $datetime = new DateTime($date);
        return $datetime->format("m/Y");
    }

    public function seperateJobDescription($jobDescription)
    {
        return explode('.', $jobDescription);
    }
}


?>