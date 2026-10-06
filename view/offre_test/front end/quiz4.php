
<!-- Created By CodingNepal - www.codingnepalweb.com  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awesome Quiz App | CodingNepal</title>
    <link rel="stylesheet" href="style.css">
    <!-- FontAweome CDN Link for Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <!-- start Quiz button -->
    <div class="start_btn"><button>Commencer le Quiz</button></div>

    <!-- Info Box -->
    <div class="info_box">
        <div class="info-title"><span>Quelques règles de ce Quiz</span></div>
        <div class="info-list">
            <div class="info">1. Vous aurez seulement <span>15 secondes</span> par question.</div>
            <div class="info">2. Une fois que vous avez sélectionné votre réponse, elle ne peut pas être annulée.</div>
            <div class="info">3. Vous ne pouvez pas sélectionner d'option une fois que le temps est écoulé.</div>
            <div class="info">4. Vous ne pouvez pas quitter le Quiz pendant que vous jouez.</div>
            <div class="info">5. Vous obtiendrez des points en fonction de vos réponses correctes.</div>
        </div>
        <div class="buttons">
            <button class="quit">Quitter</button>
            <button class="restart">Continuer</button>
        </div>
    </div>

    <!-- Quiz Box -->
    <div class="quiz_box">
        <header>
            <div class="title"> Quiz Sur Sécurité Informatique</div>
            <div class="timer">
                <div class="time_left_txt">Temps Restant</div>
                <div class="timer_sec">15</div>
            </div>
            <div class="time_line"></div>
        </header>
        <section>
            <div class="que_text">
                <!-- Here I've inserted question from JavaScript -->
            </div>
            <div class="option_list">
                <!-- Here I've inserted options from JavaScript -->
            </div>
        </section>

        <!-- footer of Quiz Box -->
        <footer>
            <div class="total_que">
                <!-- Here I've inserted Question Count Number from JavaScript -->
            </div>
            <button class="next_btn">Question suivante</button>
        </footer>
    </div>

    <!-- Result Box -->
    <div class="result_box">
        <div class="icon">
            <i class="fas fa-crown"></i>
        </div>
        <div class="complete_text">Vous avez terminé le Quiz !</div>
        <div class="score_text">
            <!-- Here I've inserted Score Result from JavaScript -->
        </div>
        <div class="buttons">
            
            <button class="suivant">Suivant</button>
            
        </div>
    </div>

    <!-- Inside this JavaScript file I've inserted Questions and Options only -->
    <script src="js/questions4.js"></script>

    <!-- Inside this JavaScript file I've coded all Quiz Codes -->
    <script src="script.js"></script>

    
</body>
</html>