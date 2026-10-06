function submitForm() {
    var formData = {
        'id_test': document.getElementsByName('id_test')[0].value,
        'email_test': document.getElementsByName('email_test')[0].value,
        'nom_entre': document.getElementsByName('nom_entre')[0].value,
        'prenom_entre': document.getElementsByName('prenom_entre')[0].value,
        'nom_entreprise_test': document.getElementsByName('nom_entreprise_test')[0].value,
        'date_entre': document.getElementsByName('date_entre')[0].value,
        'type_entre': document.getElementsByName('type_entre')[0].value
    };

    displayFormData(formData);
}

function displayFormData(formData) {
    var emailContent = `
    <div class="email-content">
        <h2>Objet: Confirmation de votre Entretien ${formData.type_entre}</h2>
        <p>Chère Mr/Mme <strong> ${formData.nom_entre} ${formData.prenom_entre}</strong>,</p>
        <br>
        <p>Nous vous remercions sincèrement d'avoir pris le temps de postuler pour le poste chez <strong> ${formData.nom_entreprise_test}</strong>. Nous avons le plaisir de vous informer que vous avez été sélectionnée pour passer à l'étape suivante : l'entretien en ligne.</p>
        <p>Votre performance exceptionnelle lors du test en ligne a captivé notre attention, démontrant votre engagement et votre compétence dans le domaine. Nous sommes impatients de discuter avec vous de vos compétences, de vos expériences professionnelles et de votre vision pour le poste.</p>
        
        <p>Voici les détails de votre entretien :</p>
        <p><strong>ID de Test:</strong> ${formData.id_test}</p>
        <p><strong>Email de contact:</strong> ${formData.email_test}</p>
        <p><strong>Date d'entretien:</strong> ${formData.date_entre}</p>
        <p><strong>Type d'entretien:</strong> ${formData.type_entre}</p>
        
        <p>Nous avons hâte de vous rencontrer et d'échanger avec vous lors de cet entretien. Votre succès jusqu'à présent est un témoignage de votre détermination et de votre capacité à exceller. Nous sommes convaincus que cette conversation sera fructueuse et nous rapprochera de la possibilité de travailler ensemble.</p>
        <p>Si vous avez des questions ou des préoccupations avant l'entretien, n'hésitez pas à nous contacter à l'adresse e-mail fournie. Nous sommes là pour vous aider dans tout ce dont vous pourriez avoir besoin pour préparer votre entretien.</p>
        <p>Encore une fois, félicitations pour votre réussite jusqu'à présent, et nous avons hâte de vous voir briller lors de notre entretien en ligne.</p>
        <p>Cordialement,</p>
        <p><strong>${formData.nom_entreprise_test}</strong><img src="assets/img/signature.png" alt="Signature" class="signature" width="200" height="auto"></p>
    </div>
    `;

    var certificateContent = `
    <div class="submitted-data">
        <img src="assets/img/logo.png" alt="Logo" class="logo" width="100" height="auto">
        ${emailContent}
        
        
    </div>
    <button id="toPDF">Export to PDF</button>
    `;

    document.body.innerHTML = certificateContent;
    
    // Attach event listener to the "Export to PDF" button
    document.getElementById("toPDF").addEventListener("click", function() {
        toPDF();
    });
}

function toPDF() {
    const htmlContent = document.querySelector(".submitted-data").innerHTML;
    const htmlCode = `
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Khadamni Entretien</title>
        <link rel="stylesheet" type="text/css" href="style_certif.css">
    </head>
    <body>
        ${htmlContent}
    </body>
    </html>`;

    const newWindow = window.open();
    newWindow.document.write(htmlCode);

    setTimeout(() => {
        newWindow.print();
        newWindow.close();
    }, 400);
}
