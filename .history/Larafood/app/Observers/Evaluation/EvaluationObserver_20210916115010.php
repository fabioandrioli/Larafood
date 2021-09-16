<?php

namespace App\Observers\Evaluation;

use App\Models\Evaluation;
use Illuminate\Support\Str;

class EvaluationObserver
{
    /**
     * Handle the Evaluation "created" event.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return void
     */
    public function creating(Evaluation $evaluation)
    {
        //
    }

    /**
     * Handle the Evaluation "updated" event.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return void
     */
    public function updating(Evaluation $evaluation)
    {
        //
    }


}
