<?php

namespace Database\Seeders;

use Domain\Receipt\Service\ReceiptService;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Infrastructure\Receipt\Repository\EloquentReceiptRepository;
use Random\Randomizer;

class ReceiptSeeder extends Seeder
{
    private ReceiptService $receiptService;

    public function __construct()
    {
        $this->receiptService = new ReceiptService(
            new EloquentReceiptRepository()
        );
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($counter = 0; $counter <= 1380; $counter++) {

            $dateTime = $faker->dateTimeBetween('-2 years');
            $date = $dateTime->format('Y-m-d');

            DB::table('receipts')->insert(
                [
                    'reference' => $faker->unique()->randomNumber(5),
                    'sheet' => $counter,
                    'payment_method' => $faker->randomElement(['Pago con tarjeta', 'Efectivo', 'Transferencia bancaria']),
                    'payment_concept' => $faker->sentence(4, true),
                    'amount' => $amount = $faker->randomNumber(4, false),
                    'amount_text' => $this->receiptService->moneyToText($amount),
                    'payment_date' => $date,
                    'note' => $faker->paragraph(1),
                    'created_by' => 1,
                    'created_at' => now(),
                    'modified_by' => null,
                ]
            );
        }
    }
}
