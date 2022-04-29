<figure>
    <table>
        <caption></caption>
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($people as $person) : ?>
                <tr>
                    <td><?= $person->name ?></td>
                    <td><?= $person->age ?></td>
                    <td>
                        <button class="inline" aria-controls="update-form-dialog" data-update="<?= $person->name ?>">Update Person</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</figure>

<!-- Você pode trocar pelo modal do bootstrap aqui -->
<dialog id="update-form-dialog">
    <article>
        <form action="/person/update" method="POST">
            <label for="name">
                <span>Name</span>
                <input id="name" disabled />
            </label>

            <label for="age">
                <span>Age</span>
                <input name="age" id="age" type="number">
            </label>

            <button>Send</button>
        </form>
    </article>
</dialog>