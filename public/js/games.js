// Feedback System
const feedbackMessages = {
    correct: [
        "Amazing job! 🌟",
        "You're so smart! 🎓",
        "Fantastic work! 🌈",
        "Keep it up, superstar! ⭐",
        "You're doing great! 🏆",
        "Wonderful! 🎉",
        "That's correct! You're awesome! 🌟",
        "You're on fire! 🔥",
        "Brilliant! You got it! 🌞",
        "Super duper! 🦸‍♂️",
        "You're a learning champion! 👑",
        "Incredible job! 🎯",
        "Way to go! 🚀",
        "You're making magic happen! ✨",
        "High five! ✋",
        "You're unstoppable! 💫",
        "What a superstar! 🌠",
        "You're getting so smart! 🧠",
        "That's perfect! 💎",
        "You make learning fun! 🎨"
    ],
    incorrect: [
        "Don't worry, try again! 🌱",
        "You can do it! 💪",
        "Almost there! Keep trying! 🎯",
        "Not quite, but you're learning! 📚",
        "Keep going, you'll get it! 🌟",
        "Practice makes perfect! 🎨",
        "Give it another shot! 🎲",
        "You're getting closer! 🚀",
        "That's okay, keep going! 🌈",
        "Every try makes you stronger! 💪",
        "Learning is a journey! 🚂",
        "Mistakes help us learn! 📝",
        "You're brave to try! 🦁",
        "Don't give up, you've got this! 🎮",
        "Let's try one more time! 🎯",
        "Think and try again! 🤔",
        "You're doing your best! 🌺",
        "Keep exploring! 🔍",
        "Learning is an adventure! 🗺️",
        "Take your time, you'll get there! 🐢"
    ],
    gameComplete: [
        "🏆 Incredible! You've completed the game! 🎉",
        "🌟 You're a superstar! Game completed! 🌟",
        "👑 Champion! You've mastered this game! 🎮",
        "🎯 Perfect finish! You're amazing! 🎨",
        "🚀 Blast off! You've reached the top! 💫"
    ]
};

// Sound effects for feedback
const soundEffects = {
    correct: [
        '/audio/feedback/correct1.mp3',
        '/audio/feedback/correct2.mp3',
        '/audio/feedback/correct3.mp3'
    ],
    incorrect: [
        '/audio/feedback/incorrect1.mp3',
        '/audio/feedback/incorrect2.mp3'
    ],
    gameComplete: '/audio/feedback/victory.mp3'
};

function playFeedbackSound(type) {
    try {
        let soundFile;
        if (type === 'gameComplete') {
            soundFile = soundEffects.gameComplete;
        } else {
            const sounds = soundEffects[type];
            soundFile = sounds[Math.floor(Math.random() * sounds.length)];
        }
        const audio = new Audio(soundFile);
        audio.play().catch(error => console.log('Sound playback failed:', error));
    } catch (error) {
        console.log('Sound effect unavailable:', error);
    }
}

function showFeedback(isCorrect, customMessage = '') {
    const type = customMessage ? 'gameComplete' : (isCorrect ? 'correct' : 'incorrect');
    const messages = customMessage ? feedbackMessages.gameComplete : (isCorrect ? feedbackMessages.correct : feedbackMessages.incorrect);
    const message = customMessage || messages[Math.floor(Math.random() * messages.length)];
    
    // Play sound effect
    playFeedbackSound(type);
    
    // Create feedback container
    const feedbackContainer = document.createElement('div');
    feedbackContainer.className = 'fixed inset-0 flex items-center justify-center z-[1000]';
    feedbackContainer.style.pointerEvents = 'none';
    
    // Create background overlay with blur
    const overlay = document.createElement('div');
    overlay.className = 'absolute inset-0 bg-black bg-opacity-20 backdrop-blur-sm';
    overlay.style.opacity = '0';
    overlay.style.transition = 'opacity 0.3s ease-in-out';
    
    // Create message container with animation
    const messageBox = document.createElement('div');
    messageBox.className = `transform scale-0 transition-all duration-500 ease-out flex flex-col items-center justify-center 
        ${type === 'gameComplete' ? 'bg-purple-500' : (isCorrect ? 'bg-green-500' : 'bg-yellow-500')} 
        rounded-2xl p-8 shadow-2xl`;
    messageBox.style.minWidth = '300px';
    
    // Add emoji with bounce animation
    const emoji = document.createElement('div');
    emoji.className = 'text-6xl mb-4 animate-bounce';
    emoji.textContent = type === 'gameComplete' ? '🏆' : (isCorrect ? '⭐' : '💪');
    
    // Add message text with glow effect
    const text = document.createElement('div');
    text.className = 'text-white text-2xl font-bold text-center';
    text.style.textShadow = '0 0 10px rgba(255,255,255,0.5)';
    text.textContent = message;
    
    // Add particles for correct answers and game completion
    if (isCorrect || type === 'gameComplete') {
        const particles = document.createElement('div');
        particles.className = 'absolute inset-0 pointer-events-none';
        for (let i = 0; i < 20; i++) {
            const particle = document.createElement('div');
            particle.className = 'absolute w-2 h-2 rounded-full';
            particle.style.backgroundColor = type === 'gameComplete' ? 
                ['#FFD700', '#FFA500', '#FF69B4'][Math.floor(Math.random() * 3)] : 
                ['#4CAF50', '#8BC34A', '#CDDC39'][Math.floor(Math.random() * 3)];
            particle.style.left = Math.random() * 100 + '%';
            particle.style.top = Math.random() * 100 + '%';
            particle.style.animation = `particle-float ${2 + Math.random() * 2}s linear infinite`;
            particles.appendChild(particle);
        }
        messageBox.appendChild(particles);
    }
    
    // Assemble the feedback elements
    messageBox.appendChild(emoji);
    messageBox.appendChild(text);
    feedbackContainer.appendChild(overlay);
    feedbackContainer.appendChild(messageBox);
    document.body.appendChild(feedbackContainer);
    
    // Add keyframe animation for particles
    const style = document.createElement('style');
    style.textContent = `
        @keyframes particle-float {
            0% { transform: translate(0, 0) rotate(0deg); opacity: 1; }
            100% { transform: translate(var(--tx), var(--ty)) rotate(360deg); opacity: 0; }
        }
    `;
    document.head.appendChild(style);
    
    // Trigger animations
    requestAnimationFrame(() => {
        overlay.style.opacity = '1';
        messageBox.style.transform = 'scale(1)';
        if (isCorrect || type === 'gameComplete') {
            messageBox.style.animation = 'pulse 1s ease-in-out infinite';
        }
    });
    
    // Remove feedback after delay
    const duration = type === 'gameComplete' ? 3000 : 2000;
    setTimeout(() => {
        overlay.style.opacity = '0';
        messageBox.style.transform = 'scale(0)';
        setTimeout(() => {
            document.body.removeChild(feedbackContainer);
            style.remove();
        }, 500);
    }, duration);
}

// Add necessary styles to the document
const feedbackStyles = document.createElement('style');
feedbackStyles.textContent = `
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
    
    .animate-bounce {
        animation: bounce 1s infinite;
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }
`;
document.head.appendChild(feedbackStyles);

// Memory Game Logic
function initializeMemoryGame() {
    const cards = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
    const gameCards = [...cards, ...cards]; // Duplicate for pairs
    let flippedCards = [];
    let matchedPairs = 0;
    
    // Shuffle cards
    gameCards.sort(() => Math.random() - 0.5);
    
    const container = document.querySelector('#gameContent .grid');
    gameCards.forEach((card, index) => {
        const cardElement = document.createElement('div');
        cardElement.className = 'memory-card bg-purple-100 h-24 rounded-lg flex items-center justify-center cursor-pointer transform transition-transform duration-300 hover:scale-105';
        cardElement.innerHTML = '<div class="card-back text-3xl">?</div>';
        cardElement.dataset.card = card;
        cardElement.dataset.index = index;
        
        cardElement.addEventListener('click', () => {
            if (flippedCards.length < 2 && !flippedCards.includes(cardElement)) {
                flipCard(cardElement);
            }
        });
        
        container.appendChild(cardElement);
    });
    
    function flipCard(card) {
        card.innerHTML = `<div class="card-front text-3xl">${card.dataset.card}</div>`;
        flippedCards.push(card);
        
        if (flippedCards.length === 2) {
            setTimeout(checkMatch, 1000);
        }
    }
    
    function checkMatch() {
        const [card1, card2] = flippedCards;
        if (card1.dataset.card === card2.dataset.card) {
            matchedPairs++;
            showFeedback(true);
            if (matchedPairs === cards.length) {
                setTimeout(() => {
                    showFeedback(true, "🏆 Congratulations! You've completed the Memory Game! 🎉");
                }, 500);
            }
        } else {
            showFeedback(false);
            card1.innerHTML = '<div class="card-back text-3xl">?</div>';
            card2.innerHTML = '<div class="card-back text-3xl">?</div>';
        }
        flippedCards = [];
    }
}

// Spelling Game Logic
function initializeSpellingGame() {
    const words = ['CAT', 'DOG', 'BIRD', 'FISH', 'LION', 'BEAR'];
    let currentWord = '';
    
    function startNewRound() {
        currentWord = words[Math.floor(Math.random() * words.length)];
    }
    
    window.playCurrentWord = function() {
        const audio = new Audio(`/audio/words/${currentWord.toLowerCase()}.mp3`);
        audio.play();
    };
    
    window.checkSpelling = function() {
        const input = document.getElementById('spellingInput');
        if (input.value.toUpperCase() === currentWord) {
            showFeedback(true);
            input.value = '';
            startNewRound();
        } else {
            showFeedback(false);
        }
    };
    
    startNewRound();
}

// Math Game Logic
function initializeMathGame() {
    let correctAnswer = 0;
    
    function generateProblem() {
        const num1 = Math.floor(Math.random() * 10) + 1;
        const num2 = Math.floor(Math.random() * 10) + 1;
        const operators = ['+', '-', 'x'];
        const operator = operators[Math.floor(Math.random() * operators.length)];
        
        const problem = document.getElementById('mathProblem');
        problem.textContent = `${num1} ${operator} ${num2} = ?`;
        
        switch(operator) {
            case '+': correctAnswer = num1 + num2; break;
            case '-': correctAnswer = num1 - num2; break;
            case 'x': correctAnswer = num1 * num2; break;
        }
    }
    
    window.checkMathAnswer = function() {
        const answer = parseInt(document.getElementById('mathAnswer').value);
        if (answer === correctAnswer) {
            showFeedback(true);
            document.getElementById('mathAnswer').value = '';
            generateProblem();
        } else {
            showFeedback(false);
        }
    };
    
    generateProblem();
}

// Animal Game Logic
function initializeAnimalGame() {
    const animals = ['DOG', 'CAT', 'COW', 'SHEEP', 'LION', 'ELEPHANT'];
    let currentAnimal = '';
    
    function startNewRound() {
        currentAnimal = animals[Math.floor(Math.random() * animals.length)];
        const container = document.querySelector('#gameContent .grid');
        container.innerHTML = '';
        
        // Shuffle animals and show 3 options
        const options = [currentAnimal];
        while (options.length < 3) {
            const animal = animals[Math.floor(Math.random() * animals.length)];
            if (!options.includes(animal)) {
                options.push(animal);
            }
        }
        options.sort(() => Math.random() - 0.5);
        
        options.forEach(animal => {
            const button = document.createElement('button');
            button.className = 'animal-option bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow';
            button.textContent = animal;
            button.onclick = () => checkAnimal(animal);
            container.appendChild(button);
        });
    }
    
    window.playAnimalSound = function() {
        const audio = new Audio(`/audio/animals/${currentAnimal.toLowerCase()}.mp3`);
        audio.play();
    };
    
    function checkAnimal(answer) {
        if (answer === currentAnimal) {
            showFeedback(true);
            startNewRound();
        } else {
            showFeedback(false);
        }
    }
    
    startNewRound();
} 