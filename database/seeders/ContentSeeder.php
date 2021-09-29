<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = Content::factory()->create([
            'name' => 'Acerca de Nosotros',
            'description' => 'Somos un grupo de empresas 100% capital venezolano, conformadas por profesionales con clara visión tecnológica y gerencial, con más de 40 años de experiencia en soluciones de automatización, instrumentación, control de proceso y distribución eficiente y segura de la Energía, para sectores de mercado como Industria química, alimentos y bebidas, Oil&Gas, metal mecánico, minería, residencial y construcción. En todas nuestras soluciones integrales incorporamos productos con las últimas tecnologías en digitalización e interconectividad a los fines de asegurar el manejo inteligente y eficiente de los recursos.

                                    En CD-SOLEC distribuimos equipos y componentes de las mejores marcas disponibles, tales como Siemens, Schneider Electric, Rockwell Automación, Mitsubishi Electric y ABB, a los fines de facilitarles a nuestros clientes el desarrollo de soluciones de ingeniería a los mejores precios con máxima calidad y sin intermediarios.</p>'
        ]);
    }
}
