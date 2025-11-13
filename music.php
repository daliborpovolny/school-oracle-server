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

        <p>
        The legend lives on from the Chippewa on down
        Of the big lake they called Gitche Gumee
        The lake, it is said, never gives up her dead
        When the skies of November turn gloomy
        With a load of iron ore twenty-six thousand tons more
        Than the Edmund Fitzgerald weighed empty
        That good ship and true was a bone to be chewed
        When the gales of November came early
        <br>
        The ship was the pride of the American side
        Coming back from some mill in Wisconsin
        As the big freighters go, it was bigger than most
        With a crew and good captain well seasoned
        Concluding some terms with a couple of steel firms
        When they left fully loaded for Cleveland
        And later that night when the ship's bell rang
        Could it be the north wind they'd been feelin'?
        <br>
        The wind in the wires made a tattle-tale sound
        And a wave broke over the railin'
        And every man knew, as the captain did too
        'Twas the witch of November come stealin'
        The dawn came late and the breakfast had to wait
        When the gales of November came slashin'
        When afternoon came it was freezin' rain
        In the face of a hurricane west wind
        <br>
        When suppertime came the old cook came on deck sayin'
        "Fellas, it's too rough to feed ya"
        At seven P.M. a main hatchway caved in, he said
        "Fellas, it's been good to know ya"
        The captain wired in he had water comin' in
        And the good ship and crew was in peril
        And later that night when his lights went outta sight
        Came the wreck of the Edmund Fitzgerald
        <br>
        Does anyone know where the love of God goes
        When the waves turn the minutes to hours?
        The searchers all say they'd have made Whitefish Bay
        If they'd put fifteen more miles behind her
        They might have split up or they might have capsized
        They may have broke deep and took water
        And all that remains is the faces and the names
        Of the wives and the sons and the daughters
        <br>
        Lake Huron rolls, Superior sings
        In the rooms of her ice-water mansion
        Old Michigan steams like a young man's dreams
        The islands and bays are for sportsmen
        And farther below Lake Ontario
        Takes in what Lake Erie can send her
        And the iron boats go as the mariners all know
        With the gales of November remembered
        <br>
        In a musty old hall in Detroit they prayed
        In the Maritime Sailors' Cathedral
        The church bell chimed till it rang twenty-nine times
        For each man on the Edmund Fitzgerald
        The legend lives on from the Chippewa on down
        Of the big lake they call Gitche Gumee
        Superior, they said, never gives up her dead
        When the gales of November come early
        </p>

    <img src="https://musicnotesbox.com/media/catalog/product/g/o/gordon_lightfoot-the_wreck_of_the_edmund_fitzgerald-sheet-music-thumbnail.png"
     style="max-width: 400px; height: auto;">


    </body>
</html>