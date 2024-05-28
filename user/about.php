<?php include "header1.php" ?>
<!DOCTYPE html>
<html>
<head>
    <title>About Us</title>
    <style>
                body {
    font-family: Arial, sans-serif;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-image: url("../user/img/bg-forall.gif");
    background-size: cover; /* Adjust as needed */
    background-position: center; /* Adjust as needed */
}

body::before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-color: rgba(255, 255, 255, 0.9); /* Adjust the opacity as needed */
    z-index: -1;
}
        /* Add your CSS styles here */
.containe-about {
    background-color:#e1f5fe;
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    text-align: center;
}

.image-container {
    margin-bottom: 20px;
}

.image-container img {
    max-width: 100%;
    height: auto;
}

.info-container {
    text-align: left;
}
.info-container p{
    font-size:20px;
}


        </style>
</head>
<body>
    <div class="containe-about">
        <div class="image-container">
            <img src="img/frepik.jpg" alt="Company Logo">
        </div>
        <div class="info-container">
            <h1>About Us</h1>
            <p>ORION Study Abroad Pvt. Ltd, established in the year 2002 is one of the best study abroad consultants, headquartered in Kochi, Kerala, India , headed by its founder and Managing Director Mr. Denny Thomas Vattakunnel an astute businessman, illustrious Author, Blogger,
                 philanthropist social worker and sports administrator.The company offers end to end study abroad facilitation services. It’s the authorized representative of 600+ top-notch Universities/ Colleges from over 20+ countries, with branches and associate offices in virtually all districts/
                  cities of Kerala and key Indian cities. The brand today has become synonymous with quality and reliability for hand -holding students wishing to study abroad in the best of overseas educational institutions across the globe, paving the way to phenomenal international academic success and
                   rewarding careers for thousands of students which has earned unwavering trust and patronage of students and parents alike.</p>
            <p>Complementing the management is a team of highly trained motivated professionals with years of experience and skill with international exposure . Team Santamonica owes its success to the unwavering dedication, ethics, professional practices, continuous investment in staff training, the use of 
                state of the art technology, and above all to its ‘’client first’’ policy”.</p>
            <p>Contact us at: info@company.com</p>
        </div>
    </div>
</body>
</html>
