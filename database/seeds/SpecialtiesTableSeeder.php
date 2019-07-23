<?php

use App\Specialty;
use Illuminate\Database\Seeder;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialties = [
            'allergologue', 'anatomopathologie', 'anesthesie reanimation', 'anesthèsiologie',
            'biologie medicale', 'cardiologie', 'chirurgie cardiovisculaire', 'chirurgie dentaire',
            'chirurgie générale', 'chirurgie infantile', 'chirurgie orthopedique',
            'chirurgie plastique', 'dermato venerologie', 'electroradiologi',
            'endocrinologie experts pres les tribunaux', 'gastroenterologie',
            'gynecologie obstetrique', 'hematologie clinique','maladies infectieuses',
            'médecine du sport', 'médecine du travail', 'médecine générale', 'médecine interne',
            'nephrologie', 'neurochirurgie', 'neurologie', 'oncologie', 'ophtalmologie',
            'orthopedie dento faciale', 'orthopedie traumatologie', 'oto rhino laryngologie',
            'parodontie', 'pathologie digestive', 'pediatrie', 'pharmaco toxicologie',
            'pneumo phtisiologie', 'prothesistes dentaires', 'psychiatrie', 'reanimation medicale',
            'reeducation readaptation fonctionnelle', 'rhumatologie', 'sante publique',
            'stomatologie', 'urologie'
        ];

        foreach ($specialties as $specialty) {

            Specialty::create([
                'specialty'     => $specialty
            ]);

        }

    }

}
