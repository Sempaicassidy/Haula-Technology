<?php

// Basic pure PHP PDF 1.4 Generator for Haula Enterprises Company Profile

function createPdfFile($outputPath) {
    $pdf = "%PDF-1.4\n";
    $offsets = [];

    // Helper to add object
    $objects = [];

    // Obj 1: Catalog
    $objects[1] = "<< /Type /Catalog /Pages 2 0 R >>";

    // Obj 2: Pages
    $objects[2] = "<< /Type /Pages /Kids [3 0 R 6 0 R] /Count 2 >>";

    // Fonts
    $objects[4] = "<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica-Bold >>";
    $objects[5] = "<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica >>";

    // Page 1 Stream Content
    $p1Text = "BT\n";
    // Title
    $p1Text .= "/F4 26 Tf 50 720 Td (HAULA ENTERPRISES LIMITED) Tj\n";
    $p1Text .= "/F5 12 Tf 0 -22 Td (OFFICIAL CORPORATE COMPANY PROFILE 2026) Tj\n";
    $p1Text .= "/F4 11 Tf 0 -18 Td (SLOGAN: SMART LIFE, REAL VALUE) Tj\n";
    $p1Text .= "0 -10 Td (____________________________________________________________________________) Tj\n";

    // Executive Summary
    $p1Text .= "/F4 14 Tf 0 -35 Td (1. EXECUTIVE SUMMARY & OVERVIEW) Tj\n";
    $p1Text .= "/F5 10.5 Tf 0 -20 Td (Haula Enterprises Limited is a leading diversified Tanzanian conglomerate) Tj\n";
    $p1Text .= "0 -15 Td (operating across five high-impact strategic business divisions: Transportation,) Tj\n";
    $p1Text .= "0 -15 Td (Trading & Customs, Security Services, Software Technologies, and Technology Hub.) Tj\n";
    $p1Text .= "0 -15 Td (Our mission is to deliver sustainable economic value, enterprise automation, and) Tj\n";
    $p1Text .= "0 -15 Td (world-class service integrity across Tanzania, EAC, and SADC markets.) Tj\n";

    // Core Divisions Title
    $p1Text .= "/F4 14 Tf 0 -35 Td (2. OUR 5 CORE BUSINESS DIVISIONS) Tj\n";

    // Division 1
    $p1Text .= "/F4 12 Tf 0 -22 Td (1. HAULA TRANSPORTATION & LOGISTICS) Tj\n";
    $p1Text .= "/F5 10 Tf 0 -15 Td (- Heavy freight, containerized haulage, and cross-border transport across SADC/EAC.) Tj\n";
    $p1Text .= "0 -14 Td (- Fleet of 50+ heavy trucks equipped with real-time satellite GPS telemetry tracking.) Tj\n";

    // Division 2
    $p1Text .= "/F4 12 Tf 0 -22 Td (2. HAULA TRADING & CUSTOMS CLEARING) Tj\n";
    $p1Text .= "/F5 10 Tf 0 -15 Td (- Express customs clearing at Dar es Salaam Port (under 24 hours turnaround).) Tj\n";
    $p1Text .= "0 -14 Td (- Full compliance with TPA, TRA EFD documentation, and international supply chain.) Tj\n";

    // Division 3
    $p1Text .= "/F4 12 Tf 0 -22 Td (3. HAULA SECURITY SERVICES & CYBER) Tj\n";
    $p1Text .= "/F5 10 Tf 0 -15 Td (- Security firm capacity building, guard patrol OS management, and cyber defense.) Tj\n";
    $p1Text .= "0 -14 Td (- Enterprise vulnerability testing, physical guard operations, and network security.) Tj\n";

    // Footer Page 1
    $p1Text .= "/F5 9 Tf 0 -120 Td (Page 1 of 2  |  Haula Enterprises Ltd  |  www.haula.co.tz) Tj\n";
    $p1Text .= "ET\n";

    $objects[3] = "<< /Type /Page /Parent 2 0 R /MediaBox [0 0 612 792] /Resources << /Font << /F4 4 0 R /F5 5 0 R >> >> /Contents 7 0 R >>";
    $objects[7] = "<< /Length " . strlen($p1Text) . " >>\nstream\n" . $p1Text . "endstream";

    // Page 2 Stream Content
    $p2Text = "BT\n";
    // Title
    $p2Text .= "/F4 22 Tf 50 720 Td (HAULA ENTERPRISES LIMITED) Tj\n";
    $p2Text .= "/F5 11 Tf 0 -18 Td (CORPORATE COMPANY PROFILE - PAGE 2) Tj\n";
    $p2Text .= "0 -10 Td (____________________________________________________________________________) Tj\n";

    // Division 4
    $p2Text .= "/F4 12 Tf 0 -30 Td (4. HAULA TECHNOLOGIES (SOFTWARE ECOSYSTEM)) Tj\n";
    $p2Text .= "/F5 10 Tf 0 -15 Td (- Developer of Dawafy OS - Enterprise Pharmacy Inventory & TRA EFD Tax System.) Tj\n";
    $p2Text .= "0 -14 Td (- Custom enterprise web applications, cloud infrastructure, and operational software.) Tj\n";

    // Division 5
    $p2Text .= "/F4 12 Tf 0 -22 Td (5. HAULA TECHNOLOGY HUB & AI INNOVATION) Tj\n";
    $p2Text .= "/F5 10 Tf 0 -15 Td (- Startup incubation, AI research, developer capacity building, and tech workspace.) Tj\n";
    $p2Text .= "0 -14 Td (- Accelerating digital transformation and next-generation African technology talents.) Tj\n";

    // Contact Information
    $p2Text .= "/F4 14 Tf 0 -35 Td (3. CORPORATE CONTACT DETAILS & HEADQUARTERS) Tj\n";
    $p2Text .= "/F5 10.5 Tf 0 -20 Td (Head Office: Dar es Salaam, United Republic of Tanzania) Tj\n";
    $p2Text .= "0 -16 Td (Email: info@haula.co.tz / corporate@haula.co.tz) Tj\n";
    $p2Text .= "0 -16 Td (Website: https://www.haula.co.tz) Tj\n";
    $p2Text .= "0 -16 Td (Official Business Hours: Monday - Friday (08:00 AM - 05:00 PM EAT)) Tj\n";

    // Certification Box
    $p2Text .= "/F4 11 Tf 0 -35 Td (VERIFIED CORPORATE DOCUMENT) Tj\n";
    $p2Text .= "/F5 9.5 Tf 0 -15 Td (This profile is an official document of Haula Enterprises Limited.) Tj\n";
    $p2Text .= "0 -14 Td (All rights reserved. Smart Life, Real Value.) Tj\n";

    // Footer Page 2
    $p2Text .= "/F5 9 Tf 0 -180 Td (Page 2 of 2  |  Haula Enterprises Ltd  |  www.haula.co.tz) Tj\n";
    $p2Text .= "ET\n";

    $objects[6] = "<< /Type /Page /Parent 2 0 R /MediaBox [0 0 612 792] /Resources << /Font << /F4 4 0 R /F5 5 0 R >> >> /Contents 8 0 R >>";
    $objects[8] = "<< /Length " . strlen($p2Text) . " >>\nstream\n" . $p2Text . "endstream";

    // Assemble PDF
    $body = "";
    $objOffsets = [];
    ksort($objects);
    foreach ($objects as $id => $val) {
        $objOffsets[$id] = strlen($pdf) + strlen($body);
        $body .= "$id 0 obj\n" . $val . "\nendobj\n";
    }

    $xrefOffset = strlen($pdf) + strlen($body);
    $xref = "xref\n0 " . (count($objects) + 1) . "\n";
    $xref .= "0000000000 65535 f \n";
    foreach ($objects as $id => $val) {
        $xref .= sprintf("%010d 00000 n \n", $objOffsets[$id]);
    }

    $trailer = "trailer\n<< /Size " . (count($objects) + 1) . " /Root 1 0 R >>\nstartxref\n$xrefOffset\n%%EOF\n";

    $fullPdf = $pdf . $body . $xref . $trailer;

    $dir = dirname($outputPath);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }

    file_put_contents($outputPath, $fullPdf);
    echo "PDF generated successfully at: $outputPath (Size: " . strlen($fullPdf) . " bytes)\n";
}

createPdfFile('assets/docs/Haula_Enterprises_Company_Profile.pdf');
createPdfFile('public/assets/docs/Haula_Enterprises_Company_Profile.pdf');
