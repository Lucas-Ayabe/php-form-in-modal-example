<form action="<?= $action ?>" method="POST">
    <label for="name">
        <span>Name</span>
        <input id="name" name="name" type="text" value="<?= !empty($person) ? $person?->name : '' ?>" />
    </label>

    <label for="age">
        <span>Age</span>
        <input name="age" id="age" type="number" value="<?= !empty($person) ? $person?->age : 0 ?>">
    </label>

    <button>Send</button>
</form>