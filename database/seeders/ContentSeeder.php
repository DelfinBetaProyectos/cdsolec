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
            'description' => '<p style="text-align: justify;">Somos un grupo de empresas 100% capital venezolano, conformadas por profesionales con clara visi&oacute;n tecnol&oacute;gica y gerencial, con m&aacute;s de 40 a&ntilde;os de experiencia en soluciones de automatizaci&oacute;n, instrumentaci&oacute;n, control de proceso y distribuci&oacute;n eficiente y segura de la Energ&iacute;a, para sectores de mercado como Industria qu&iacute;mica, alimentos y bebidas, Oil&amp;Gas, metal mec&aacute;nico, miner&iacute;a, residencial y construcci&oacute;n. En todas nuestras soluciones integrales incorporamos productos con las &uacute;ltimas tecnolog&iacute;as en digitalizaci&oacute;n e interconectividad a los fines de asegurar el manejo inteligente y eficiente de los recursos.</p>
            <p style="text-align: justify;">En CD-SOLEC distribuimos equipos y componentes de las mejores marcas disponibles, tales como Siemens, Schneider Electric, Rockwell Automaci&oacute;n, Mitsubishi Electric y ABB, a los fines de facilitarles a nuestros clientes el desarrollo de soluciones de ingenier&iacute;a a los mejores precios con m&aacute;xima calidad y sin intermediarios.</p>'
        ]);

        $content = Content::factory()->create([
            'name' => 'Contáctanos',
            'description' => '
            <p style="text-align: left;">Visitanos o escribemos por:</p>
                <p style="text-align: left;">Facebook: CDSOLEC</p>
                <p style="text-align: left;">Instagram: @CDSOLEC</p>
                <p style="text-align: left;">Correo: cdsolecmaracay@gmail.com</p>
                <p style="text-align: left;">Tel&eacute;fonos:</p>
                <ul style="text-align: left;">
                <li style="text-align: left;">(0414)-590.43.46</li>
                <li style="text-align: left;">(0424)-305.05.99</li>
                <li style="text-align: left;">(0424)-322.97.43</li>
                </ul>'
        ]);
    }
}
