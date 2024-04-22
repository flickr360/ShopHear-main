        const startButton = document.getElementById('startButton');
        const outputDiv = document.getElementById('output');
        const itemsList = document.getElementById('itemsList');
        const cart = document.getElementById('cart');
        const resultDiv = document.getElementById('result'); // Add result div reference
        let recognition = null; // Declare recognition variable globally
        let isListening = false; // Track the current state of speech recognition
        let recognitionTimeout; // Declare a variable to store the recognition timeout
        let lastCommandTime = 0; // Initialize a variable to store the timestamp of the last recognized command

       /* $.ajax({
            type: 'POST',
            url: 'insert-transaction.php',
            data: {
                itemName: itemName,
                totalCost: itemPrice,
                quantity: quantity,
                picturePath: picturePath
            },
            success: function (response) {
                alert(response);
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });*/

        // Function to initialize speech recognition
        function initRecognition() {
            // Create new instance of SpeechRecognition if not already created
            if (!recognition) {
                recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
                
                // Set properties for recognition
                recognition.lang = 'en-US'; // Specify language
                recognition.continuous = true; // Keep listening until stopped
                recognition.interimResults = true; // Get interim results
                
                // Add event listener for result event
                recognition.onresult = (event) => {
                    const transcript = event.results[event.results.length - 1][0].transcript.trim().toLowerCase();
                    addToCart(transcript);
                    console.log(transcript);
                    
                };
                
                // Add event listener for error event
                recognition.onerror = (event) => {
                    console.error('Speech recognition error:', event.error);
                    outputDiv.textContent = 'Speech recognition error: ' + event.error;
                };

                // Add event listener for end event
                recognition.onend = () => {
                    startButton.disabled = false; // Enable start button when recognition ends
                };
            }
        }



    // Function to toggle speech recognition
    function toggleRecognition() {
        // Initialize speech recognition if not already initialized
        initRecognition();
        
        if (!isListening) {
            // Start speech recognition if not already active
            recognition.start();
            startButton.textContent = 'Stop Listening'; // Change button text
            startButton.disabled = true; // Disable start button while recognition is active
            isListening = true; // Update state
            console.log('Speech recognition started.');
            
        } else {
            // Stop speech recognition if already active
            clearTimeout(recognitionTimeout); // Clear the recognition timeout
            recognition.stop();
            startButton.textContent = 'Start Speech Recognition'; // Change button text
            isListening = false; // Update state
            console.log('Speech recognition stopped.');
            
            // Reset the recognition object completely
            recognition = null;
        }
    }

    function getItemListId(itemName) {
        switch (itemName) {
            case "glasses":
                return "itemsList1";
            case "aviator":
                return "itemsList2";
            case "brow":
                return "itemsList3";
            case "four":
                return "itemsList4";
            default:
                return itemName;
        }
    }

    speechSynthesis.onvoiceschanged = () => {
        const voices = speechSynthesis.getVoices();
        if (voices.length > 0) {
            // You can select a default voice here if needed
            console.log('Voices loaded.');
        } else {
            console.log('No voices available for speech synthesis.');
        }
    };

    // Modify the addToCart function to handle the two-step process
    function addToCart(voiceCommand) {

        // Calculate the time difference since the last recognized command
        const currentTime = new Date().getTime();
        const timeDifference = currentTime - lastCommandTime;

        // If the time difference is less than 1000 milliseconds (1 second), ignore the command
        if (timeDifference < 1000) {
            return;
        }
        
        lastCommandTime = currentTime; // Update the last command time

        const match = voiceCommand.match(/add (.+) to cart/i); // Match the item name without the quantity
        if (match && match[1]) { // Check if match and match[1] exist
            let itemName = match[1].trim().toLowerCase(); // Access match at index 1
            console.log("Item Name from Voice Command:", itemName);

            let itemsListId = getItemListId(itemName);
            let itemsList = document.getElementById(itemsListId);

            // Find the selected item in the items list
            selectedItem = Array.from(itemsList.children).find(item => {
                const name = item.getAttribute('data-name').toLowerCase(); // Convert to lowercase
                console.log("Item Name in List:" , name);
                return name === itemName; // Compare lowercase versions

            });

            if (selectedItem) {
                let name = selectedItem.getAttribute('data-name'); // Use getAttribute('data-name')
                let price = selectedItem.getAttribute('data-price');

                // Speak the prompt for quantity
                const utterance = new SpeechSynthesisUtterance();
                utterance.text = `How many ${name} would you like?`;
                utterance.voice = speechSynthesis.getVoices()[0]; // Set the voice

                // Speak the prompt
                speechSynthesis.speak(utterance);

                // Temporarily stop recognition while the prompt is being uttered
                recognition.stop();
                // Listen for the end of the utterance and start recognizing the user's response
                    utterance.onend = () => {
                        console.log('Quantity prompt spoken:', utterance.text); // Log the quantity prompt
                        recognition.start(); // Start recognizing the user's response
                    };

                

                // Listen for the user's response after the utterance has finished speaking
                recognition.onresult = function handleResult(event) {
                    console.log('result handling:')
                    const quantity = parseInt(event.results[event.results.length - 1][0].transcript.trim());
                    if (!isNaN(quantity) && quantity > 0) {
                        for (let i = 0; i < quantity; i++) {
                            const listItem = document.createElement('div');
                            listItem.textContent = `${name} - P${price}`;
                            cart.appendChild(listItem);
                        }
                        outputDiv.textContent = `Added ${quantity} ${name} to cart.`;
                        console.log(`Added ${quantity} ${name} to cart.`);
                    } else {
                        // If an invalid quantity is recognized, inform the user and restart recognition
                        outputDiv.textContent = `Invalid quantity for ${name}. Please try again.`;
                        console.log(`Invalid quantity for ${name}. Please try again.`);
                        recognition.start(); // Restart recognition
                    }

                    // Reset recognition event handlers after processing the command
                    recognition.onresult = null;
                    recognition.onend = null;

                    selectedItem = null;
                };
            } else {
                outputDiv.textContent = `Item "${itemName}" not found.`;
                console.log('Item not found');

                // Restart recognition after an item is not found
                recognition.start();
            }
        } else {
            console.log('Invalid command');

            // Restart recognition after an invalid command is recognized
            recognition.start();
        }
    }


        
        // Add event listener for startButton click
        startButton.addEventListener('click', toggleRecognition);

        // Add event listener for keydown event on document
        document.addEventListener('keydown', (event) => {
            if (event.key === ' ' || event.key === 'Space') { // Corrected key code for spacebar
                event.preventDefault(); // Prevent default spacebar behavior (scrolling the page)
                toggleRecognition(); // Toggle speech recognition
            }
        });
