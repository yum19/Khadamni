<?php
ob_start();
include 'C:/xampp/htdocs/web/controller/EntrepriseC.php';
require 'vendor/autoload.php';

$c = new EntrepriseC();
$tab = $c->listEntreprises();

if (isset($_POST["type"]) && $_POST["type"] === "pdf") {
    error_reporting(0);
    ob_start();

    // Création d'une nouvelle instance de PDF
    $pdf = new TCPDF();
    
    // Ajouter une page
    $pdf->AddPage();
    // Définir les informations du document
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Ameni');
    $pdf->SetTitle('Liste des entreprises PDF');
    $pdf->SetSubject('Table des entreprises');

    // Définir la police
    $pdf->SetFont('dejavusans', '', 12);

    // Générer le contenu HTML avec un design personnalisé
    $html = '<style>
    
    </style>';

    $html .= '<h1 style="text-align: center; font-size: 25rem; font-family: "poppins", sans-serif;">Table des entreprises</h1>';
    $html .= '<table style="width:100%"; border-collapse:collapse;>';
    $html .= '<thead>
                <tr>
                  <th style="border:1px solid #ddd; text-align: left; padding: 8px;">Nom Entreprise</th>
                  <th style="border:1px solid #ddd; text-align: left; padding: 15px;">Adresse</th>
                  <th style="border:1px solid #ddd; text-align: left; padding: 15px;">Date de création</th>
                  <th style="border:1px solid #ddd; text-align: left; padding: 15px;">Téléphone</th>
                  <th style="border:1px solid #ddd; text-align: left; padding: 15px;">Description</th>
                  <th style="border:1px solid #ddd; width: 20%; text-align: left; padding: 15px;">Email</th>
                  <th style="border:1px solid #ddd; text-align: left; padding: 15px;">Mot De Passe</th>
                </tr>
              </thead>';
    $html .= '<tbody>';
    
    foreach ($tab as $entreprise) {
        $html .= '<tr>';
        $html .= '<td style="border:1px solid #ddd; text-align: left; padding: 15px;">' . $entreprise['nomEntreprise'] . '</td>';
        $html .= '<td style="border:1px solid #ddd; text-align: left; padding: 15px;">' . $entreprise['adresse'] . '</td>';
        $html .= '<td style="border:1px solid #ddd; text-align: left; padding: 15px;">' . $entreprise['dateCreation'] . '</td>';
        $html .= '<td style="border:1px solid #ddd; text-align: left; padding: 15px;">' . $entreprise['telephoneEn'] . '</td>';
        $html .= '<td style="border:1px solid #ddd; text-align: left; padding: 15px;">' . $entreprise['descriptionE'] . '</td>';
        $html .= '<td style="border:1px solid #ddd; width: 20%;text-align: left; padding: 15px; ">' . $entreprise['emailEn'] . '</td>';
        $html .= '<td style="border:1px solid #ddd; text-align: left; padding: 15px;">' . $entreprise['MDPEn'] . '</td>';
        $html .= '</tr>';
    }

    $html .= '</tbody></table>';

    // Écrire le contenu HTML dans le PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Télécharger le PDF
    $pdf->Output('utilisateurs_table.pdf', 'D');
    exit;
}
?>
