<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder{
    public function run(): void{
        // Insérer le module EaE
        $moduleId = DB::table('modules')->insertGetId([
            'nom'        => "Entreprendre à l'école",
            'code'       => "eae",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Statistiques de base
        DB::table('statistiques_modules')->insert([
            'module_id'   => $moduleId,
            'nom'         => "Entreprises créées",
            'nombre'      => 10,
            'description' => "Description entreprises créées",
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        //Insérer module rens
        $moduleId = DB::table('modules')->insertGetId([
            'nom'        => "Recrutement des Enseignants",
            'code'       => "rens",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
