function getBotResponse(input) {
    //rock paper scissors
    if (input == "rock") {
        return "paper";
    } else if (input == "paper") {
        return "scissors";
    } else if (input == "scissors") {
        return "rock";
    }

    if (input == "reservacion"){
        return "<form action='tunel'><label for='inicio'>Check In:</label><input type='date' id='inicio' name='inicio'></div><br><label for='fin'>Check Out:</label><input type='date' id='fin' name='fin'><br><label for='personas'>Personas:</label><input type='text' id='personas' name='personas'><button type='submit'>Consultar disponibilidad</button></form>";
    }
    // Simple responses
    if (input == "hello") {
        return "Hello there!";
    } else if (input == "goodbye") {
        return "Talk to you later!";
    } else {
        return "Try asking something else!";
    }

    
}

