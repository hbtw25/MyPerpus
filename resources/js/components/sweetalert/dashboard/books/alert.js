import { handleClick } from "../../index";

document.documentElement.addEventListener("click", function (event) {
    const unique = event.target.dataset.unique ?? "";

    // Destroy
    if (event.target && event.target.matches("[data-confirm-book-destroy]"))
        handleClick({
            data: { unique },
            event: {
                noun: "book",
                verb: "delete",
                method: "DELETE",
            },
            uri: "/dashboard/books",
            redirect: "/dashboard/books",
        });
});
