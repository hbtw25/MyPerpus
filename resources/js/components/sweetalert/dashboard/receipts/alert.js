import { handleClick } from "../../index";

document.documentElement.addEventListener("click", function (event) {
    const unique = event.target.dataset.unique ?? "";

    // Returned
    if (event.target && event.target.matches("[data-confirm-book-returned]"))
        handleClick({
            data: { unique },
            event: {
                noun: "receipt",
                verb: "mark as returned",
                method: "PUT",
            },
            uri: "/dashboard/receipts/returned",
            redirect: "/dashboard/receipts",
        });

    // Destroy
    if (event.target && event.target.matches("[data-confirm-user-destroy]"))
        handleClick({
            data: { unique },
            event: {
                noun: "user",
                verb: "non-active",
                method: "DELETE",
            },
            uri: "/dashboard/users",
            redirect: "/dashboard/users",
        });
});
