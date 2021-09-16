<?php

namespace App\Observers\Evaluation;

use App\Models\Evaluation;

class EvaluationObserver
{
    /**
     * Handle the Evaluation "created" event.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return void
     */
    public function created(Evaluation $evaluation)
    {
        //
    }

    /**
     * Handle the Evaluation "updated" event.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return void
     */
    public function updated(Evaluation $evaluation)
    {
        //
    }

    /**
     * Handle the Evaluation "deleted" event.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return void
     */
    public function deleted(Evaluation $evaluation)
    {
        //
    }

    /**
     * Handle the Evaluation "restored" event.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return void
     */
    public function restored(Evaluation $evaluation)
    {
        //
    }

    /**
     * Handle the Evaluation "force deleted" event.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return void
     */
    public function forceDeleted(Evaluation $evaluation)
    {
        //
    }
}
