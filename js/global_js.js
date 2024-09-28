document.addEventListener('DOMContentLoaded', () => {
  // play sound when clicking the speaker icon
  for (let i of document.getElementsByClassName('play-sound')) {
    i.addEventListener('click', () => {
      const soundPath = `../../assets/sounds/${i.getAttribute('audio-path')}`;
      const audio = new Audio(soundPath);
      audio.play().then(() => {
        console.log(`Played audio file at ${soundPath.split('..')[2]}`);
      }).catch(error => {
        console.error('Error playing audio file:', error);
      });
    });
  }
});