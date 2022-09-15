<div>

    <form action="">
        <label for="room">Gebäude:</label>
        <input type="text" id="building" name="building" value=""/>
        <label for="room">Raum:</label>
        <input type="number" id="room" name="room" value=""/>
        <a href='' onclick="this.href='/'+document.getElementById('building').value+'/rooms/'+document.getElementById('room').value">Seite laden</a>
    </form>

</div>