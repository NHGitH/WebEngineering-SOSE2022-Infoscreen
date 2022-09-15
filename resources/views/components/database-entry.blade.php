<div>
    <p>Raum</p>
    <div class="form-container">
        <form action="">
            <label for="room">Name:</label>
            <input type="number" id="room" name="room" value="200">
            <label for="room">Gebäude:</label>
            <input type="text" id="room" name="room" value="H">
            <button>Eintragen</button>
        </form>
    </div>
    <p>Professor</p>
    <div class="form-container">
        <form action="">
            <label for="prof">Name:</label>
            <input type="text" id="prof" name="prof" value="Max Mustermann">
            <label for="prof">Bild:</label>
            <input type="text" id="prof" name="prof" value="/images/">
            <button>Eintragen</button>
        </form>
    </div>
    <p>Gebäude</p>
    <div class="form-container">
        <form action="">
            <label for="building">Name:</label>
            <input type="text" id="building" name="building" value="H">
            <button>Eintragen</button>
        </form>
    </div>
    <p>Veranstaltung</p>
    <div class="form-container">
        <form action="">
            <label for="module">Name:</label>
            <input type="text" id="module" name="module" value="Data Science">
            <label for="module">Raum:</label>
            <input type="text" id="module" name="module" value="220">
            <label for="module">Professor:</label>
            <input type="text" id="module" name="module" value="Jan Gerken">
            <label for="module">Studiengang:</label>
            <input type="text" id="module" name="module" value="H">
            <button>Eintragen</button>
        </form>
    </div>
    <p>Studiengang</p>
    <div class="form-container">
        <form action="">
            <label for="room">Name:</label>
            <input type="text" id="room" name="room" value="Wirtschaftsinformatik">
            <label for="room">Gebäude:</label>
            <input type="text" id="room" name="room" value="H">
            <button>Eintragen</button>
        </form>
    </div>
</div>

<style>
    input{
        border: 2px solid #D9D9D9;
        border-radius: 5px;
        padding: 2px;
    }

    .form-container{
        margin-top: 5px;
        margin-bottom: 10px;
    }

    form{
        border:2px solid #D9D9D9;
        border-radius: 10px;
        display:grid;
        grid-template-columns: 100%;
        padding: 5px;
    }

    button{
        border:2px solid #D9D9D9;
        border-radius: 10px;
        padding: 5px;
        margin: 5px;
    }

    button:hover{
        background-color: #D4FCC3;
    }
</style>