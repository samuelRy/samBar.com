const synth = window.speechSynthesis;
const speechElement = document.getElementsByClassName("speech")[0];
const utterThis = new SpeechSynthesisUtterance(speechElement.innerHTML);

function populateVoiceList() {
  const voices = synth.getVoices();
  console.log(voices); // inspect available voices

  // Pick a specific voice by name
  const deepVoice = voices.find(v => v.name.includes("Mark") || v.name.includes("Male"));
  if (deepVoice) {
    utterThis.voice = deepVoice;
  }

  // Tune parameters
  utterThis.pitch = 0.3;
  utterThis.rate = 0.85;
  utterThis.volume = .3;
}

speechSynthesis.onvoiceschanged = populateVoiceList;
populateVoiceList();

synth.speak(utterThis);
