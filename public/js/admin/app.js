const app = (() => {
    const ajax = (url, callback, method = "get", data = {}) => {
        const options = {
            method: method,
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
                "Content-Type": "application/json",
            },
        };

        fetch(url, options)
            .then((response) => response.json)
            .then((result) => {
                callback();
            });
    };

    const deleteRecord = () => {
        const deletes = document.querySelectorAll(".delete");
        deletes.forEach(function (value, key) {
            value.addEventListener("click", function (e) {
                e.preventDefault();

                const callback = () => {
                    e.target.closest("tr").remove();
                };

                ajax(e.target.href, callback, "delete");
            });
        });
    };

    const dataTable = () => {
        $("#example1")
            .DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
            })
            .buttons()
            .container()
            .appendTo("#example1_wrapper .col-md-6:eq(0)");
    };

    const select2 = () => {
        //Initialize Select2 Elements
        $(".select2bs4").select2({
            theme: "bootstrap4",
        });
    };

    const inputInit = () => {
        bsCustomFileInput.init();
    };
  
    return {
        init: () => {
            deleteRecord(), dataTable(), select2(), inputInit()
        },
    };
})();

app.init();
