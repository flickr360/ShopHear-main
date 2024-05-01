        const startButton = document.getElementById('startButton');
        const outputDiv = document.getElementById('output');
        const itemsList = document.getElementById('itemsList');
        const cart = document.getElementById('cart');
        const resultDiv = document.getElementById('result'); 
        const quantity = null;
        const listItem = null;
        const price = null;
        totalPrice = null;
        let recognition = null; 
        let isListening = false; 
        let recognitionTimeout; 
        let lastCommandTime = 0; 
        let utteranceSpoken = false;
        let orderProcessed = false;
        let transcriptWindow;

       

        $.ajax({
            type: 'GET',
            url: 'cart.php',
            data: {
                quantity: quantity,
                listItem: listItem,
                price: price,
                totalPrice: totalPrice
            },
            success: function(response) {
                
            },
            error: function(error) {
                console.error('Error:', error); 
            }
        });
        
        function initRecognition() {
            if (!recognition) {
                recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
                
                recognition.lang = 'en-US'; 
                recognition.continuous = true; 
                recognition.interimResults = true; 
                
                recognition.onresult = (event) => {
                    const transcript = event.results[event.results.length - 1][0].transcript.trim().toLowerCase();
                    addToCart(transcript);
                    console.log(transcript);
                    
                };
                
                recognition.onerror = (event) => {
                    console.error('Speech recognition error:', event.error);
                    outputDiv.textContent = 'Speech recognition error: ' + event.error;
                };

                recognition.onend = () => {
                    startButton.disabled = false; 
                };
            }
        }



    function toggleRecognition() {
        initRecognition();

        const transcriptContainer = document.getElementById('transcriptContainer');
        const body = document.body;
        const background = document.querySelector('.background'); 

        function toggleTranscriptContainer() {
            transcriptContainer.classList.toggle('active');
            body.classList.toggle('transcript-active');
            background.classList.toggle('blur-background');
            if (transcriptContainer.classList.contains('active')) {
                transcriptContainer.style.zIndex = '9999';
            } else {
                transcriptContainer.style.zIndex = 'initial';
            }
            if (!transcriptContainer.classList.contains('active')) {
                updateTranscript('');
            }
        }
        
        if (isListening) {
            transcriptContainer.style.display = 'block';
            toggleTranscriptContainer();
        } else {
            transcriptContainer.style.display = 'none';
            toggleTranscriptContainer();
        }
        

        if (!isListening) {
            recognition.start();
            startButton.innerHTML = '<img src="assets/recording.gif" alt="Recording Icon">';
            isListening = true; 
            console.log('Speech recognition started.');

            toggleTranscript(true);
        } else {
            clearTimeout(recognitionTimeout); 
            recognition.stop();
            startButton.innerHTML = '<img src="assets/metal ball.png" alt="Recording Icon">'; 
            isListening = false; 
            console.log('Speech recognition stopped.');
            
            toggleTranscript(false);
        }
    }

    function getItemListId(itemName) {
        switch (itemName) {
            case "retro":
                return "itemsList1";
            case "trendy":
                return "itemsList2";
            case "urban":
                return "itemsList3";
            case "funky":
                return "itemsList4";
            case "sharp":
                return "itemsList5";
            case "iconic":
                return "itemsList6";
            case "fashion":
                return "itemsList7";
            case "classy":
                return "itemsList8";
            default:
                return itemName;
        }
    }
    function toggleTranscript(show) {
        const transcriptContainer = document.getElementById('transcriptContainer');
        if (show) {
            transcriptContainer.style.display = 'block';
        } else {
            transcriptContainer.style.display = 'none';
        }
    }

    function updateTranscript(transcript) {
        const transcriptContent = document.getElementById('transcriptContent');
        transcriptContent.textContent = transcript;
    }

    function openTranscriptWindow() {
        transcriptWindow = window.open('', 'Transcript', 'width=400,height=300');
    }

    function displayTranscript(transcript) {
        const transcriptContent = document.getElementById('transcriptContent');
        transcriptContent.textContent = transcript;
    }

    speechSynthesis.onvoiceschanged = () => {
        const voices = speechSynthesis.getVoices();
        if (voices.length > 0) {
            console.log('Voices loaded.');
        } else {
            console.log('No voices available for speech synthesis.');
        }
    };
    function addToCartButton(itemName, userId) {
        const quantity = parseInt(document.getElementById(`quantity_${itemName}`).value);
        const price = parseInt(document.querySelector(`[data-name="${itemName}"]`).getAttribute('data-price'));
        
        const totalPrice = quantity * price;

        addToTransaction(itemName, quantity, totalPrice, userId);
    }

    
        var urlParams = new URLSearchParams(window.location.search);
        var userId = urlParams.get('user_id');


        $("#cart").click(function(){
            window.location.href = "cart.php?user_id=" +userId;
        });

        function addToTransaction(itemName, quantity, totalPrice, userId) {
            
    
            $.ajax({
                type: 'POST',
                url: 'insert-transaction.php',
                data: {
                    itemName: itemName,
                    quantity: quantity,
                    totalPrice: totalPrice,
                    userId: userId
                    
                },
                success: function(response) {
                    alert(quantity + " " + itemName + " added to cart");
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }
    

        function wordToNumber(transcript) {
            const wordMap = {
                'zero': 0,
                'one': 1,
                'two': 2,
                'three': 3,
                'four': 4,
                'five': 5,
                'six': 6,
                'seven': 7,
                'eight': 8,
                'nine': 9,
                'ten': 10,
                'eleven': 11,
                'twelve': 12,
                'thirteen': 13,
                'fourteen': 14,
                'fifteen': 15,
                'sixteen': 16,
                'seventeen': 17,
                'eighteen': 18,
                'nineteen': 19,
                'twenty': 20,
                'thirty': 30,
                'forty': 40,
                'fifty': 50,
                'sixty': 60,
                'seventy': 70,
                'eighty': 80,
                'ninety': 90,
                'hundred': 100,
                'thousand': 1000,
                'million': 1000000,
                'billion': 1000000000,
            };
            return transcript.toLowerCase().split(/\s+/).reduce((acc, curr) => {
                if (wordMap[curr]) {
                    return acc + wordMap[curr];
                } else {
                    return acc;
                }
            }, 0);
        }
        

        function addToCart(voiceCommand) {

            if (isListening) {
                displayTranscript(voiceCommand);
            }
            
            const currentTime = new Date().getTime();
            const timeDifference = currentTime - lastCommandTime;
        
            if (timeDifference < 1000) {
                return;
            }
        
            lastCommandTime = currentTime;
        
            const match = voiceCommand.match(/add (.+) to cart/i);
            if (match && match[1]) {
                let itemName = match[1].trim().toLowerCase();
                console.log("Item Name from Voice Command:", itemName);
        
                let itemsListId = getItemListId(itemName);
                let itemsList = document.getElementById(itemsListId);
        
                selectedItem = Array.from(itemsList.children).find(item => {
                    const name = item.getAttribute('data-name').toLowerCase();
                    console.log("Item Name in List:", name);
                    return name === itemName;
                });
        
                if (selectedItem) {
                    let name = selectedItem.getAttribute('data-name');
                    let price = parseFloat(selectedItem.getAttribute('data-price'));
        
                    const utterance = new SpeechSynthesisUtterance();
                    utterance.text = `How many ${name} would you like?`;
                    utterance.voice = speechSynthesis.getVoices()[0];
        
                    speechSynthesis.speak(utterance);
        
                    recognition.stop();
        
                    utterance.onend = () => {
                        console.log('Quantity prompt spoken:', utterance.text);
                        recognition.start();
                    };
        
                    recognition.onresult = function handleResult(event) {
                        if (orderProcessed) {
                            return; 
                        }
        
                        const transcript = event.results[event.results.length - 1][0].transcript.trim();
        
                        if (transcript === "") {
                            console.log('No input detected');
                            return;
                        }
        
                        const quantity = wordToNumber(transcript);
        
                        if (!isNaN(quantity) && quantity > 0) {
                            const price = parseInt(document.querySelector(`[data-name="${itemName}"]`).getAttribute('data-price'));
                            const totalPrice = quantity * price;
                            addToTransaction(itemName, quantity, totalPrice, userId);
                            console.log(`Added ${quantity} ${name} to cart. Total price: $${totalPrice.toFixed(2)}`);
                            orderProcessed = true; 
                        } else {
                            console.log('Invalid quantity, please try again');
                        }
                        selectedItem = null;
                        orderProcessed = false;
                    };
                    
        
                } else {
                    console.log('Item not found');
        
                    recognition.start();
                }
            } else {
        
                recognition.start();
        
                const utterance = new SpeechSynthesisUtterance();
                utterance.text = `Invalid command, please try again`;
                speechSynthesis.speak(utterance);
            }
        }
        
        startButton.addEventListener('click', toggleRecognition);

        document.addEventListener('keydown', (event) => {
            if (event.key === ' ' || event.key === 'Space') { 
                event.preventDefault(); 
                toggleRecognition();
            }
        });
