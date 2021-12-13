<?php
/**
 * $doc_num=7; id накладная Invoice
 * @$perechen=[
 * ['Виїзд до обладнення','2','100.33'],
 * ['Виїзд до обладнення2','1','1200']];
 * наименование работ / кол-во / цена за штуку
 */


namespace lib\printer\pdf\White_Reporting;

use lib\printer as Printer;

class Invoice{

/*
$doc_num=7;
$doc_num_date='31 серпня 2018 р.';

$spd='Фізична особа-підприємець Баранов Олександр Євгенович';
$spd_bank='П/р 978987798798';
$spd_adress='Mariupol';
$spd_inn='777';

$kontr_agent='Firma';
$kontr_agent_bank='П/р 978987798798 $kontr_agent_bank';
$kontr_agent_adress='Mariupol';
$kontr_agent_inn='888';

$perechen=[['Виїзд до обладнення','2','100.33'],['Виїзд до обладнення2','1','1200']];*/

static function getPdf($doc_num,$doc_num_date,$spd,$spd_bank,$spd_adress,$spd_inn,$kontr_agent,$kontr_agent_bank,$kontr_agent_adress,$kontr_agent_inn,$perechen){
    require( '../fpdf181/fpdf.php' );

    $pdf = new \FPDF();
// добавляем шрифт ариал
    $pdf->AddFont('Arial','','arial.php');
// устанавливаем шрифт Ариал
//$pdf->SetFont('Arial');
    $pdf->SetFont('Arial','',12);
    $pdf->AddPage();

    $pdf->SetLineWidth(0.5);
    $pdf->SetFontSize(16);

    $txt='Рахунок на сплату № '.$doc_num.' від '.$doc_num_date;
    $txt=iconv( 'utf-8','windows-1251',$txt);
    $pdf->Cell(190,9,$txt,"B");

//постачальник
    $pdf->SetLineWidth(0.5);
    $pdf->SetXY(10,23);
    $pdf->SetFontSize(12);
    $pdf->Cell(190,28,'',1);
//левый квадрат
    $pdf->SetLineWidth(0.5);
    $pdf->SetXY(10,23);
    $txt='Постачальник:';
    $txt=iconv( 'utf-8','windows-1251',$txt);
    $pdf->Cell(33,28,$txt,1,1,'C',false);

//правый квадрат
//1 стр
    $pdf->SetLineWidth(0.5);
    $pdf->SetXY(43,23);
// Arial bold 14
    $pdf->AddFont('ArialBold','','ArialBold.php');

    $txt=iconv( 'utf-8','windows-1251',$spd);
    $pdf->Cell(157,7,$txt,1,1,'L',false);

//2 стр
    $pdf->AddFont('Arial','','arial.php');

    $pdf->SetLineWidth(0.5);
    $pdf->SetXY(43,30);
// Arial 12
    $pdf->SetFont('Arial','',10);

    $txt=iconv( 'utf-8','windows-1251',$spd_bank);
    $pdf->Cell(157,7,$txt,1,1,'L',false);

//3 стр
    $pdf->SetLineWidth(0.5);
    $pdf->SetXY(43,37);
// Arial 12
    $pdf->SetFont('Arial','',10);

    $txt=iconv( 'utf-8','windows-1251',$spd_adress);
    $pdf->Cell(157,7,$txt,1,1,'L',false);


//4 стр
    $pdf->SetLineWidth(0.5);
    $pdf->SetXY(43,44);
// Arial 12
    $pdf->SetFont('Arial','',10);

    $txt=iconv( 'utf-8','windows-1251',$spd_inn);
    $pdf->Cell(157,7,$txt,1,1,'L',false);
//*************************
//*************************
//*************************
//*************************
//постачальник
    $pdf->SetLineWidth(0.5);
    $pdf->SetXY(10,53);
    $pdf->SetFontSize(12);
    $pdf->Cell(190,28,'',1);
//левый квадрат
    $pdf->SetLineWidth(0.5);
    $pdf->SetXY(10,53);
    $txt='Покупець:';
    $txt=iconv( 'utf-8','windows-1251',$txt);
    $pdf->Cell(33,28,$txt,1,1,'C',false);

//правый квадрат
//1 стр
    $pdf->SetLineWidth(0.5);
    $pdf->SetXY(43,53);
// Arial bold 14
    $pdf->AddFont('ArialBold','','ArialBold.php');

    $txt=iconv( 'utf-8','windows-1251',$kontr_agent);
    $pdf->Cell(157,7,$txt,1,1,'L',false);

//2 стр
    $pdf->AddFont('Arial','','arial.php');

    $pdf->SetLineWidth(0.5);
    $pdf->SetXY(43,60);
// Arial 12
    $pdf->SetFont('Arial','',10);

    $txt=iconv( 'utf-8','windows-1251',$kontr_agent_bank);
    $pdf->Cell(157,7,$txt,1,1,'L',false);

//3 стр
    $pdf->SetLineWidth(0.5);
    $pdf->SetXY(43,67);
// Arial 12
    $pdf->SetFont('Arial','',10);

    $txt=iconv( 'utf-8','windows-1251',$kontr_agent_adress);
    $pdf->Cell(157,7,$txt,1,1,'L',false);

//4 стр
    $pdf->SetLineWidth(0.5);
    $pdf->SetXY(43,74);
// Arial 12
    $pdf->SetFont('Arial','',10);

    $txt=iconv( 'utf-8','windows-1251',$kontr_agent_inn);
    $pdf->Cell(157,7,$txt,1,1,'L',false);

//*************************
//*************************
//*************************
//*************************
//*************************
//*************************

    $pdf->SetXY(10,76);
    $txt='Договір:';
    $txt=iconv( 'utf-8','windows-1251',$txt);
    $pdf->Cell(33,28,$txt,false,1,'C',false);
//*************************
//*************************
//1 столбец - порядковый номер
    $pdf->SetLineWidth(0.4);
    $pdf->SetXY(10,95);
// Arial 12
    $pdf->SetFont('Arial','',10);

    $txt=iconv( 'utf-8','windows-1251','№');
    $pdf->Cell(10,5,$txt,1,1,'C',false);


//2 столбец - Товари
    $pdf->SetXY(20,95);
// Arial 12
    $pdf->SetFont('Arial','',10);

    $txt=iconv( 'utf-8','windows-1251','Товари (роботи, послуги)');
    $pdf->Cell(100,5,$txt,1,1,'C',false);


//3 столбец - количество
    $pdf->SetXY(120,95);
// Arial 12
    $pdf->SetFont('Arial','',10);

    $txt=iconv( 'utf-8','windows-1251','Кіл-сть');
    $pdf->Cell(15,5,$txt,1,1,'C',false);


//4 столбец - Одиниця - грн
    $pdf->SetXY(135,95);
// Arial 12
    $pdf->SetFont('Arial','',10);

    $txt=iconv( 'utf-8','windows-1251','Од.');
    $pdf->Cell(15,5,$txt,1,1,'C',false);


//5 столбец - Ціна
    $pdf->SetXY(150,95);
// Arial 12
    $pdf->SetFont('Arial','',10);

    $txt=iconv( 'utf-8','windows-1251','Ціна');
    $pdf->Cell(23,5,$txt,1,1,'C',false);


//6 столбец - Сумма
    $pdf->SetXY(173,95);
// Arial 12
    $pdf->SetFont('Arial','',10);

    $txt=iconv( 'utf-8','windows-1251','Сума');
    $pdf->Cell(27,5,$txt,1,1,'C',false);

//***********************
//***********************
    $x=10;
    $y=95;
    $kol_vo=0;
    $sum_total=0;

    $pdf->SetLineWidth(0.4);
    $pdf->SetFont('Arial','',10);

    for($i=0; $i<count($perechen); $i++)
    {
        $y+=5;
        //1 столбец - порядковый номер
        $pdf->SetXY(10,$y);
        $pdf->Cell(10,5,$i+1,1,1,'C',false);
//2 столбец - Товари
        $pdf->SetXY(20,$y);
        $txt=iconv( 'utf-8','windows-1251',$perechen[$i][0]);
        $pdf->Cell(100,5,$txt,1,1,'L',false);
//3 столбец - количество
        $pdf->SetXY(120,$y);
        $pdf->Cell(15,5,$perechen[$i][1],1,1,'C',false);
        $kol_vo+=$perechen[$i][1];
//4 столбец - Одиниця - грн
        $pdf->SetXY(135,$y);
        $txt=iconv( 'utf-8','windows-1251','грн.');
        $pdf->Cell(15,5,$txt,1,1,'C',false);
//5 столбец - Ціна
        $pdf->SetXY(150,$y);
        $txt=iconv( 'utf-8','windows-1251',number_format($perechen[$i][2], 2, ',', ' '));
        $pdf->Cell(23,5,$txt,1,1,'C',false);
//6 столбец - Сумма
        $pdf->SetXY(173,$y);
        $sum=$perechen[$i][1]*$perechen[$i][2];
        $txt=iconv( 'utf-8','windows-1251',number_format($sum, 2, ',', ' '));
        $pdf->Cell(27,5,$txt,1,1,'C',false);
        $sum_total+=$sum;
    }

    $y+=5;
    $pdf->SetXY(10,$y);

    $txt=iconv( 'utf-8','windows-1251','Підсумок:');
    $pdf->Cell(190,5,$txt,1,1,'L');
    $pdf->SetXY(173,$y);
    $pdf->Cell(27,5,number_format($sum_total, 2, ',', ' '),1,1,'C');

//***********************
//***********************

    $y+=9;
    $pdf->SetXY(10,$y);

    $txt='Всього найменувань '.$kol_vo.', на суму '.number_format($sum_total, 2, ',', ' ').' грн.';
    $txt=iconv( 'utf-8','windows-1251',$txt);
    $pdf->Cell(190,5,$txt,0,1,'L');




    $y+=5;
    $pdf->SetXY(10,$y);

    $txt=Printer\FloatToStr::grn($sum_total,true);
    $txt=iconv( 'utf-8','windows-1251',$txt);
    $pdf->Cell(190,5,$txt,0,1,'L');
//***********************
//***********************
//***********************
//***********************
    $y+=8;
    $pdf->SetXY(90,$y);

    $pdf->SetLineWidth(0.5);
    $pdf->SetFont('Arial','',10);
    $txt=iconv( 'utf-8','windows-1251','Виписав:');
    $pdf->Cell(110,5,$txt,'B',1,'L');

    $y+=5;
    $pdf->SetXY(90,$y);
    $pdf->SetFont('Arial','',6);
    $txt=iconv( 'utf-8','windows-1251','(Ф.І.О. Підпис)');
    $pdf->Cell(120,4,$txt,0,1,'C');


    $pdf->Output();
}


}