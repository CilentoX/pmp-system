<?php

use Dompdf\Dompdf;

$nomeDocumento = 'Lista_de_Presenca.pdf';
$dompdf = new Dompdf(['isRemoteEnabled' => true]);
$dompdf->loadHtml($this->fetch('content'));
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream($nomeDocumento, array("Attachment" => false));
exit();
?>
