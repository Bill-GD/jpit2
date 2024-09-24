function toggleDropdown(event) {
    event.stopPropagation(); // Prevent the click event from bubbling up
    const dropdown = document.getElementById('userDropdown');
    const isDisplayed = dropdown.style.display === 'block';
    dropdown.style.display = isDisplayed ? 'none' : 'block';
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    const dropdown = document.getElementById('userDropdown');
    if (event.target.closest('.user-logo') === null && event.target.closest('.dropdown') === null) {
        dropdown.style.display = 'none';
    }
};

function playSound(audioSrc) {
    const audioPlayer = document.getElementById('audioPlayer');
    audioPlayer.src = audioSrc; // Set the audio source
    audioPlayer.play(); // Play the audio
}

function scrollRight() {
    const container = document.querySelector('.grid-container');
    container.scrollBy({ left: 300, behavior: 'smooth' });
}

function scrollLeft() {
    const container = document.querySelector('.grid-container');
    container.scrollBy({ left: -300, behavior: 'smooth' });
}
