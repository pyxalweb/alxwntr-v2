const sounds = () => {
  const soundsContainer = document.querySelector('.sounds');
  const soundsItems = soundsContainer.querySelectorAll('.sounds__item');
  
  soundsItems.forEach((soundsItem) => {
    const soundButton = soundsItem.querySelector('button');
    const soundAudio = soundsItem.querySelector('audio');
    
    soundButton.addEventListener('click', () => {
      soundAudio.play();
    })
  });
}

sounds();