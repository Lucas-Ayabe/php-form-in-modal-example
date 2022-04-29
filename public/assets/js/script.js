function openDialog(dialog) {
    dialog.showModal();
    dialog.addEventListener("click", (event) => {
        if (event.target === event.currentTarget) {
            dialog.close();
        }
    });
}

function redirect(location) {
    window.location = location;
}

const updatePersonModule = (() => {
    function configureUpdatePersonForm({ name, form, nameInput }) {
        nameInput.value = name;

        form.addEventListener("submit", (event) => {
            // Evita de enviar o formulário
            event.preventDefault();

            // Pega todos os dados do formulário e coloca dentro desse objeto FormData
            const body = new FormData(form);

            // Adiciona um campo chamado name nos dados que vão ser enviados para o PHP
            body.append("name", name);

            // Cria o objeto que vai configurar a nossa requisição HTTP
            const request = {
                method: form.method,
                body,
            };

            // Faz a requisição HTTP (o AJAX no caso)
            fetch(form.action, request).then(() => redirect("/"));
        });
    }

    document.querySelectorAll("[data-update]").forEach((trigger) => {
        const dialogId = trigger.getAttribute("aria-controls");
        const dialog = document.getElementById(dialogId);

        trigger.addEventListener("click", () => {
            openDialog(dialog);
            configureUpdatePersonForm({
                name: trigger.dataset.update,
                form: dialog.querySelector("form"),
                nameInput: dialog.querySelector("input#name"),
            });
        });
    });
})();
