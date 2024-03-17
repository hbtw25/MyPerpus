<?php

namespace App\Console\Commands;

use App\Models\RecBookReceipt;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CheckRecieptDateTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-reciept-date-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check reciept date and alter the status of the receipt if the date is passed.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $receipts = RecBookReceipt::with(["user"])->get();
        foreach ($receipts as $receipt) {
            $toTimeReceipt = $receipt->to_time;
            $sevenDaysLater = new Carbon($toTimeReceipt);
            $sevenDaysLater = $sevenDaysLater->subDays(-7);

            if ($toTimeReceipt < now() && $receipt->status === "taken") {
                $fields = [
                    "status" => "overdue",
                ];
                $receipt->update($fields);
            }

            if ($receipt->status === "overdue" && now() > $sevenDaysLater) {
                $receipt->user->delete();
                $receipt->user->refresh();
                $receipt->user->update(["flag_active" => "N", "deleted_at" => null]);
            }
        }
    }
}
