<?php
$name = "hello";
$name = ""
?>

<html>


    <head>
        <script src="https://cdn.jsdelivr.net/npm/tone@14.7.77/build/Tone.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@tonejs/midi@2.0.27/build/Midi.js"></script>

        <title>Skakal Pes</title>
    </head>


      <style>
    body {

        color: white;

      /* Path to your image */
      background-image: url(https://img09.deviantart.net/68dc/i/2007/076/a/5/the_edmund_fitzgerald_by_dureall.jpg);

      /* Make it cover the entire page */
      background-size: cover;

      /* Keep it fixed while scrolling (optional) */
      background-attachment: fixed;

      /* Center the image */
      background-position: center;

      /* Don't repeat the image */
      background-repeat: no-repeat;

      /* Optional: add a fallback color */
      background-color: #000;
    }
  </style>


    <script>
        async function playMidi() {
            await Tone.start(); // Required by Chrome autoplay policy

            console.log("Audio started.");

            // Load MIDI file
            const response = await fetch("/Skakalpes.mid");
            const arrayBuffer = await response.arrayBuffer();
            const midi = new Midi(arrayBuffer);

            const synth = new Tone.PolySynth(Tone.Synth).toDestination();

            // Schedule the MIDI notes
            midi.tracks.forEach(track => {
                track.notes.forEach(note => {
                    synth.triggerAttackRelease(
                        note.name,
                        note.duration,
                        note.time
                    );
                });
            });

            // Start playback
            Tone.Transport.start();
        }
    </script>

    <body style="color:white">
    <h1>Skákal pes</h1>
    <p>Klasická česká lidová píseň, kterou zná uplně každý.</p>
    <p>Autor je neznamý, tedy lze říct že autorem je lid.</p>
    <p>Odhadem vznikla okolo ruko 1890, ještě za Habsburské monarchie</p>
    <p>Na <a href="https://necyklopedie.org/wiki/Skákal_pes">Necyklopedii</a> lze zjistit mnohem více</p>
    
    <img style="max-width: 200px;" src="https://upload.wikimedia.org/wikipedia/en/1/1a/WreckEdmundFitzgerald.jpg">

        
    <h3 style="background-color: gray;">
        <button style="margin: left 30px;" onclick="playMidi()">Klikni na me a poslechni midi</button><br>
        <a style="margin: left 30px;" href="/Skakalpes.mid"> Stahni midi </a><br>
        <a style="margin: left 30px;" href="/Skakalpes.pdf"> Stahni noty </a><br>
        <a style="margin: left 30px;" href="https://www.youtube.com/watch?v=9sylecKAu44"> Youtube </a><br>    
    </h3>

    </body>
</html>