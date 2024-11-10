<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FixEnrollmentForeignKey extends Command
{
    protected $signature = 'fix:enrollment-foreignkey';
    protected $description = 'Fix foreign key constraint violation in enrollments table';

    public function handle()
    {
        // Find enrollments where student_id does not exist in students table
        $invalidEnrollments = DB::table('enrollments')
            ->whereNotIn('student_id', DB::table('students')->pluck('id'))
            ->get();

        if ($invalidEnrollments->isEmpty()) {
            $this->info('No invalid foreign key entries found.');
        } else {
            $this->info('Found invalid foreign key entries. Deleting them...');

            // Delete invalid enrollments
            foreach ($invalidEnrollments as $enrollment) {
                DB::table('enrollments')->where('id', $enrollment->id)->delete();
            }

            $this->info('Invalid foreign key entries deleted successfully.');
        }
    }
}
