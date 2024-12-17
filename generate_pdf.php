<?php
require('fpdf/fpdf.php');

include_once "connection.php";

// Fetch booking details from the database
$sql = "SELECT * FROM booking";
$result = $conn->query($sql);

// Create new PDF instance
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);

// Add header
$pdf->Cell(16,8,'Booking ID', 1);
$pdf->Cell(30,8,'Name', 1);
$pdf->Cell(40,8,'Email', 1);
$pdf->Cell(20,8,'Date', 1);
$pdf->Cell(20,8,'Time', 1);
$pdf->Cell(30,8,'No. of Adult Tickets', 1);
$pdf->Cell(32,8,'No. of Children Tickets', 1);
$pdf->Ln();

// Add data rows
while($row = $result->fetch_assoc()) {
    $pdf->Cell(16,8,$row['id'], 1);
    $pdf->Cell(30,8,$row['name'], 1);
    $pdf->Cell(40,8,$row['email'], 1);
    $pdf->Cell(20,8,$row['date'], 1);
    $pdf->Cell(20,8,$row['time'], 1);
    $pdf->Cell(30,8,$row['adult_tickets'], 1);
    $pdf->Cell(32,8,$row['children_tickets'], 1);
    $pdf->Ln();
}

// Output PDF to browser for downloading
$pdf->Output('D', 'bookings.pdf');

// Close database connection
$conn->close();
?>
