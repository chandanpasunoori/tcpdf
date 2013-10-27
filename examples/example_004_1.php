<?php

function getDoc($offerTitle, $offerAddress, $offerText, $offerImage) {
    require_once('tcpdf_include.php');

// create new PDF document
    $pdf = new TCPDF('L', PDF_UNIT, 'A6', true, 'UTF-8', false);
// set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('TodayOffers');
    $pdf->SetTitle('TodayOffers');
    $pdf->SetSubject('TodayOffers');
// set default header data
    $pdf->SetHeaderData("today_offers_logo1.jpg", PDF_HEADER_LOGO_WIDTH, "Offer", "by TodayOffers \nwww.todayoffers.in");
// set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
// set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
    $pdf->SetMargins(5, 20, 5);
    $pdf->SetHeaderMargin(2);
    $pdf->SetFooterMargin(0);
    $pdf->setPrintFooter(FALSE);

    $pdf->AddPage();

//MultiCell($w, $h, $txt, $border = 0, $align = 'J', $fill = false, $ln = 1, $x = '', $y = '', $reseth = true, $stretch = 0, $ishtml = false, $autopadding = true, $maxh = 0, $valign = 'T', $fitcell = false)
// test Cell stretching
//148 x 105
//138 x 83
    $pdf->SetFont('times', '', 15);
    $pdf->setTextRenderingMode($stroke = 0.2, $fill = false, $clip = false);
    $pdf->MultiCell($w = 0, $h = 9, $txt = $offerTitle, $border = 'LTRB', $align = 'C', $fill = false, $ln = 1);
    $pdf->SetFont('times', '', 11);
    $pdf->setTextRenderingMode($stroke = 0, $fill = true, $clip = false);
    $pdf->Image($offerImage, $pdf->GetX() + 1, $pdf->GetY() + 1, 28, 28, 'JPG', '', '', true);
    $pdf->MultiCell($w = 32, $h = 30, '', $border = 'L', $align = 'C', $fill = false, $ln = 0);
    $pdf->MultiCell($w = 22, $h = 30, $txt = "\tAddress : ", $border = '', $align = 'C', $fill = false, $ln = 0);
    $pdf->MultiCell($w = 0, $h = 30, $txt = $offerAddress, $border = 'R', $align = 'L', $fill = false, $ln = 1);
    $pdf->MultiCell($w = 0, $h = 0, $txt = 'Offer Details', $border = 'LTRB', $align = 'C', $fill = false, $ln = 1);
    if (strlen($offerText) > 273) {
        $offerText = substr($offerText, 0, 273);
        $offerText = $offerText . " ....";
    }
    $pdf->MultiCell($w = 0, $h = 0, $txt = $offerText, $border = 'LTRB', $align = 'L', $fill = false, $ln = 1);
//    $pdf->MultiCell($w = 0, $h = 0, $txt = '', $border = 'LTRB', $align = 'L', $fill = false, $ln = 1);
// ---------------------------------------------------------
//Close and output PDF document
    $pdf->Output('example_004.pdf', 'I');
}

getDoc('10 % Discount on Designing & Hosting', "SR Nagar,Hyderabad.", "We are professional Web Designers expert in designing websites & applications using the latest technologies. We understand your business requirements and can fulfill them to add value to your business and beat the competition. We give more importance to commitment and deadlines.
                Our Services are :
                WEB DESIGNING
                WEB DEVELOPMENT
                LOGO DESIGN
                FLASH DESIGN
                GRAPHIC DESIGN
                BANNER DESIGN
                CMS
                E-COMMERCE
                SEO
                CONTENT WRITING
                INTERNET MARKETING", "images/image_demo.jpg");
