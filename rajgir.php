<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Explore Patna - Tourist Attractions</title>
    <link rel="stylesheet" href="patnaStyle.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Explore Patna: Tourist Attractions</h1>
        </header>

        <!-- Golghar Section -->
        <section class="tourist-place">
            <img src="https://cities2explore.com/wp-content/uploads/2022/08/Golghar-Patna-Garden-768x402.jpg" alt="Golghar Patna" class="place-image">
            <div class="description">
                <h2>Golghar</h2>
                <p>
                    Golghar is a famous historical landmark in Patna, built in 1786 by Captain John Garstin. It was originally constructed as a grain storage facility for the British East India Company. 
                    The structure's unique beehive design and panoramic view from the top make it one of Patna's most iconic tourist attractions.
                </p>
               
            </div>
        </section>

        <!-- Gurudwara Patna Sahib Section -->
        <section class="tourist-place">
            <img src="https://www.culturalindia.net/iliimages/patna%20sahib.jpg" alt="Gurudwara Patna Sahib" class="place-image">
            <div class="description">
                <h2>Gurudwara Patna Sahib</h2>
                <p>
                    Gurudwara Patna Sahib is one of the most revered Sikh shrines in India, located in the heart of Patna. 
                    This sacred place is the birthplace of Guru Gobind Singh Ji, the tenth Sikh Guru. 
                    It is known for its stunning architecture, serene ambiance, and the historical significance it holds for Sikhs worldwide.
                </p>
               
            </div>
        </section>

        <!-- Sabhyata Dwar Section -->
        <section class="tourist-place">
            <img src="https://www.hlimg.com/images/things2do/738X538/ht-phg20-5-018-kanil-36-1526847006-1526847006_1559729606-3696e.JPG" alt="Sabhyata Dwar Patna" class="place-image">
            <div class="description">
                <h2>Sabhyata Dwar</h2>
                <p>
                    Sabhyata Dwar, also known as the "Gateway of Civilization," is an impressive monument located near the banks of the Ganges River in Patna. 
                    The archway symbolizes the rich cultural and historical heritage of Patna and Bihar. 
                    Visitors can enjoy the view of the Ganges and the surrounding landscapes while appreciating the grandeur of this architectural wonder.
                </p>
                <!-- <button onclick="bookNow('Sabhyata Dwar')">Book Now</button> -->
            </div>
        </section>
        <a href="index.php">Back</a>
        <button onclick="bookNow('Sabhyata Dwar')">Book Now</button>
        
    </div>

    <script src="scripts.js">
        function bookNow(place) {
    alert(`Thank you for your interest in visiting ${place}! Your booking request has been received.`);
}

    </script>
</body>
</html>
