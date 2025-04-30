// Create status element for feedback (optional)
const statusElement = document.createElement('div');
statusElement.style.display = 'none';
document.addEventListener('DOMContentLoaded', function() {
    document.body.appendChild(statusElement);
});

// Audio player functionality
function playSound(type, value) {
    let audioFile;
    switch(type) {
        case 'letter':
            audioFile = `${value.toLowerCase()}.mp3`;
            break;
        case 'number':
            audioFile = `number_${value}.mp3`;
            break;
        case 'color':
            audioFile = `color_${value.toLowerCase()}.mp3`;
            break;
        default:
            console.error('Unknown sound type:', type);
            return;
    }

    const audio = new Audio(`/audio/${audioFile}`);
    
    audio.oncanplaythrough = () => {
        console.log(`${audioFile} loaded successfully`);
    };
    
    audio.onerror = (e) => {
        console.error(`Error loading ${audioFile}:`, e.target.error);
    };
    
    audio.play().then(() => {
        console.log(`Playing ${audioFile}`);
    }).catch(error => {
        console.error(`Error playing ${audioFile}:`, error);
    });
}

// Wrapper functions for specific types
function playLetterSound(letter) {
    playSound('letter', letter);
}

function playNumberSound(number) {
    playSound('number', number);
}

function playColorSound(color) {
    playSound('color', color);
}

// Add click event listeners when document is ready
document.addEventListener('DOMContentLoaded', function() {
    // Handle alphabet cards
    const alphabetCards = document.querySelectorAll('.alphabet-card');
    alphabetCards.forEach(card => {
        card.addEventListener('click', function() {
            const letterElement = this.querySelector('.text-3xl');
            if (letterElement) {
                const letter = letterElement.textContent;
                playLetterSound(letter);
                addClickAnimation(this);
            }
        });
    });

    // Handle number cards
    const numberCards = document.querySelectorAll('#numbers-container .alphabet-card');
    numberCards.forEach(card => {
        card.addEventListener('click', function() {
            const numberElement = this.querySelector('.text-3xl');
            if (numberElement) {
                const number = numberElement.textContent;
                playNumberSound(number);
                addClickAnimation(this);
            }
        });
    });

    // Handle color cards
    const colorCards = document.querySelectorAll('.color-card');
    colorCards.forEach(card => {
        card.addEventListener('click', function() {
            const colorName = this.querySelector('.color-name').textContent;
            playColorSound(colorName);
            addClickAnimation(this);
        });
    });
});

// Animation helper function
function addClickAnimation(element) {
    element.style.transform = 'scale(1.2)';
    setTimeout(() => {
        element.style.transform = 'scale(1)';
    }, 200);
} 