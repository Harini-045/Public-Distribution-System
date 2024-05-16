<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>FAQ Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        header {
            text-align: center;
            color: black;
            padding: 3px;
        }

        h1 {
            font-size: 50px;
        }

        .faq-section {
           
            margin-top: 20px;
        }

        .faq-title {
            font-size: 30px;
            font-weight: bold;
            text-decoration: underline;
            color: #007bff;
        }

        .faq-box {
            border: 1px solid #dcdcdc;
            background-color: #f5f5f5;
            padding: 10px;
           
            cursor: pointer;
            margin-top: 15px;    
            margin-bottom: 15px;
            margin-left: 50px;   
            margin-right: 50px; 
            
        }
        .faq-question {
            font-weight: bold;
            color: black;
            font-size:20px;
          
        }

        .faq-answer {
            display: none;
            padding: 10px;
            font-size: 15px;
        }

        .expand-sign {
            float: right;
        }
        
    </style>
    <style>
    body {
        background-image: url('main.jpeg');
        background-size: cover; /* Adjust the image size */
    }
</style>
</head>
<body>
    <header>
        <h1>FAQ</h1>
    </header>
    <main>
    <section class="faq-section">
            <h2 class="faq-title"  style="text-align: center;" click="toggleSection('general-questions')">General Questions</h2>
            <div class="faq-box" onclick="toggleAnswer('answer1')">
                <span class="faq-question" style="text-align: center;">What is PDS?</span>
                <span class="expand-sign">+</span>
                <div class="faq-answer" id="answer1">The Public Distribution System (PDS) is a government-sponsored program in many countries that provides subsidized food and essential commodities to low-income and vulnerable populations.</div>
            </div>
            
            <div class="faq-box" onclick="toggleAnswer('answer2')">
                <span class="faq-question">What are types of ration cards?</span>
                <span class="expand-sign">+</span>
                <div class="faq-answer" id="answer2">PDS cards are categorized into Above Poverty Line (APL), Below Poverty Line (BPL), and Antyodaya Anna Yojana (AAY) cards, each with its own set of benefits and subsidies.</div>
            </div>
            
            <div class="faq-box" onclick="toggleAnswer('answer3')">
                <span class="faq-question">What are the essential food items available through the PDS?</span>
                <span class="expand-sign">+</span>
                <div class="faq-answer" id="answer3">The PDS typically provides items like rice, wheat, sugar, pulses, and edible oil at subsidized rates.</div>
            </div>
        </section>
    <section class="faq-section">
    
    <h2 class="faq-title" style="text-align: center;">Ration Card Related FAQ</h2>
            <div class="faq-box" onclick="toggleAnswer('answer4')">
                <span class="faq-question">Required documents for a new ration card</span>
                <span class="expand-sign">+</span>
                <div class="faq-answer" id="answer4">1.Detailed particulars of family members</br>
2. Copies of birth certificates of minor
members(Below 10 years in age)</br>
3. Certified copy of relevant page of Voter List</br>
4. Copy of Tax Pay / Land Revenue Pay receipt</br>
5. Surrender certificate of Ration Card/Family
Identity holding or non-availability certificate
from the FCS&CA authority where the
applicant was previously resided.</br>
6. Address Proof (attested copy of PAN Card
/Driving License / Bank Passbook / Post Office
Passbook /Municipal Holding receipt /
Electricity Bill / Telephone Bill)</div>
            </div>
            <div class="faq-box" onclick="toggleAnswer('answer5')">
                <span class="faq-question">Required documents for a separate ration card</span>
                <span class="expand-sign">+</span>
                <div class="faq-answer" id="answer5">1.Surrender Certificate(s) in original</br>
2. Parental Ration Cards in original</br>
3. Self Declaration</br>
4. Certificate From Village Head/Gaon Panchayat
president/Ward Commissioner</br>
5. No Objection Certificate by Head of Family of
Parental Ration Card for inclusion of additional
members (Attested Copies)</br>
6. Proof of Date of Birth (Birth Certificate / X Pass
Certificate / declared / other)</br>
7. Proof of Residence</br>
8. Photo Identity / Election / PAN / Driving license
card / Passport</div>
            </div>
            <div class="faq-box" onclick="toggleAnswer('answer6')">
                <span class="faq-question">Required documents for Inclusion/Deletion/Surrender</span>
                <span class="expand-sign">+</span>
                <div class="faq-answer" id="answer6">1. Original Ration Card</br>
2. Local Certificate / Election Card / PAN / Driving
license / Passport</br>
3. Proof of Date of Birth(Birth Certificate/X Pass
Certificate/declared/other)</br>
4. Surrender Certificate in original (for inclusion,
if any)</br>
5. Death Certificate in case of death of a member</div>
    
        </section>
        <section class="faq-section">
    
    <h2 class="faq-title" style="text-align: center;">Grievance Redressal FAQ</h2>
            <div class="faq-box" onclick="toggleAnswer('answer8')">
                <span class="faq-question">How to register complaint?</span>
                <span class="expand-sign">+</span>
                <div class="faq-answer" id="answer8">
Yes, you can register a complaint about PDS-related issues by mailing a formal complaint letter to 
<a href="mailto:xyz@gmail.com">xyz@gmail.com</a>
 </div>
          
        </section>
    </main>
    

    <script>
        function toggleAnswer(id) {
            const answer = document.getElementById(id);
            const expandSign = answer.previousElementSibling.querySelector(".expand-sign");

            if (answer.style.display === 'none' || answer.style.display === '') {
                answer.style.display = 'block';
                expandSign.innerText = '-';
            } else {
                answer.style.display = 'none';
                expandSign.innerText = '+';
            }
        }
    </script>
</body>
</html>
