document.addEventListener('DOMContentLoaded', () => {
  // play sound when clicking the speaker icon
  for (let i of document.getElementsByClassName('play-sound')) {
    i.addEventListener('click', () => {
      const soundPath = `../../assets/sounds/${i.getAttribute('audio-path')}`;
      const audio = new Audio(soundPath);
      audio.play().then(() => {
        console.log(`Played audio file: ${soundPath.substring(19)}`);
      }).catch(error => {
        console.error('Error playing audio file:', error);
      });
    });
  }
});

window.onscroll = () => {
  const p = document.getElementById('progress-bar');
  if (p !== null) {
    const winScroll = document.documentElement.scrollTop;
    const maxScroll = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const ratio = (winScroll / maxScroll * 100).toFixed(2);
    console.log(`User scroll: ${winScroll} / ${maxScroll} (${ratio}%)`);
    p.style.width = ratio + '%';
  }
};