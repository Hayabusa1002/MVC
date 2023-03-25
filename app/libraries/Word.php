<?php
    # Load Composer's autoloader
    require_once '../vendor/autoload.php';

    # Import PHPOffice classes into the global namespace
    # These must be at the top of your script, not inside a function
    // \PhpOffice\PhpWord\Autoloader::register();   # Apparently this method is not necessary
    use PhpOffice\PhpWord\PhpWord;
    use PhpOffice\PhpWord\TemplateProcessor;
    use PhpOffice\PhpWord\Style\Language;
    use PhpOffice\PhpWord\Style\Font;

    class Word
    {
        public function example()
        {
            # Create an instance
            $doc = new PhpWord();
            //$phpWord = new \PhpOffice\PhpWord\PhpWord(); # Other way to instance

            // New section
            $section = $doc->addSection();

            // Plain text
            $section->addText(htmlspecialchars('Primer texto - Texto sin formato'));

            // Rich text
            $section->addText(
                htmlspecialchars('Segundo texto - Texto con formato'),
                array('name' => 'Arial', 'size' => '12', 'bold' => 'true')
            );

            // Text with custom font
            $custom_font = 'myfont';
            $doc->addFontStyle($custom_font, array('name' => 'Arial', 'size' => '14', 'bold' => 'true', 'color' => '5882FA'));

            $section->addText(
                htmlspecialchars('Tercer texto - Texto con formato personalizado'),
                $custom_font
            );

            // Text with methods
            $font = new Font();
            $font->setBold(true);
            $font->setName('Tahoma');
            $font->setSize(16);
            $font->setColor('9F81F7');

            $text = $section->addText(htmlspecialchars('Cuarto texto - Texto con métodos'));
            $text->setFontStyle($font);

            // Tabla personalizada
            $table_style = array(
                'borderColor'   => 'F2F2F2',
                'borderSize'    => '5',
                'cellMargin'    => '20',
                'bgColor'       => '088A68',
            );
            $first_row = array('bgColor' => 'F2F2F2');

            $doc->addTableStyle('mytable', $table_style, $first_row);
            $table = $section->addTable('mytable');

            for ($row = 1; $row <= 8; $row++) {
                $table->addRow();

                for ($cell = 1; $cell <= 3; $cell++) {
                    if($row ==1) $table->addCell(200)->addText(htmlspecialchars('primera'));
                    else $table->addCell(200)->addText(htmlspecialchars('celda'));
                }
            }

            // Break line = <br> in HTML
            $section->addTextBreak(1);

            // Image
            $section->addImage(
                'img/imagen.jpg',
                array(
                    'width' => 600,
                    'height' => 400,
                    'wrappingStyle' => 'behind'
                )
            );

            // Save it in 'public/doc/out' folder
            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($doc, 'Word2007');
            $objWriter->save('doc/out/doc01.docx');

            // Download it
            // header("Content-Disposition: attachment; filename=doc01.docx");
            // echo file_get_contents('doc01.docx');
        }

        public function exampleWithTemplate()
        {
            $templateWord = new TemplateProcessor('doc/in/template.docx');
 
            $nombre     = "Mi nombre";
            $direccion  = "Mi dirección";
            $municipio  = "Mrd";
            $provincia  = "Bdj";
            $cp         = "02541";
            $telefono   = "24536784";

            // Assign values to the template
            $templateWord->setValue('nombre_empresa',   $nombre);
            $templateWord->setValue('direccion_empresa',$direccion);
            $templateWord->setValue('municipio_empresa',$municipio);
            $templateWord->setValue('provincia_empresa',$provincia);
            $templateWord->setValue('cp_empresa',       $cp);
            $templateWord->setValue('telefono_empresa', $telefono);

            // Save it in 'public/doc/out' folder
            $templateWord->saveAs('doc/out/doc02.docx');

            // Download it
            // header("Content-Disposition: attachment; filename=doc02.docx; charset=iso-8859-1");
            // echo file_get_contents('doc/out/doc02.docx');
        }
    }
?>