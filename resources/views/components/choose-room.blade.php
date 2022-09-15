<div>

    <form action="">
        <label for="room">Gebäude:</label>
        <input type="text" id="building" name="building" value=""/>
        <label for="room">Raum:</label>
        <input type="number" id="room" name="room" value=""/>
        <a href='' onclick="this.href='/buildings/'+document.getElementById('building').value+'/'+document.getElementById('room').value">Seite laden</a>
    </form>

</div>