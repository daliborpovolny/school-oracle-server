<?php
$name = "hello";
$name = ""
?>

<html>


    <head>
        <script src="https://cdn.jsdelivr.net/npm/tone@14.7.77/build/Tone.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@tonejs/midi@2.0.27/build/Midi.js"></script>

        <title>The Wreck of the Edmund Fitzgerald</title>
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
            const response = await fetch("/edmund.mid");
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
    <h1>The Wreck of the Edmund Fitzgerald</h1>
    <p>50 years ago, on the November 10th 1975 the Edmund Fitzgerald sank.</p>
    <p>All 29 aboard perished, just 15 miles from safe shores.</p>
    <p>The song was written and performed by Canadian singer-songwriter Gordon Lightfoot.</p>
    <p>Released in 1976, it tells the story of the ship's tragic sinking on Lake Superior.</p>
    <p>Thanks to this song millions of people from all around the world know of this tragedy.</p>
    <p>Every year on the anniversary the bell of Edmund Fitzgerald rings 29 times, once for each crew member.</p>
    <p>Since Gordon's death it rings 30 times</p>

    <img style="max-width: 200px;" src="https://upload.wikimedia.org/wikipedia/en/1/1a/WreckEdmundFitzgerald.jpg">

        
        <h3 style="background-color: gray;">
            <button onclick="playMidi()">Poslechni midi</button><br>
            <a href="https://www.youtube.com/watch?v=FuzTkGyxkYI"> youtube </a><br>
            <a href="/edmund.mid"> midi </a><br>
        </h3>

    <img src="https://musicnotesbox.com/media/catalog/product/g/o/gordon_lightfoot-the_wreck_of_the_edmund_fitzgerald-sheet-music-thumbnail.png"
     style="max-width: 400px; height: auto;">


    </body>
</html>