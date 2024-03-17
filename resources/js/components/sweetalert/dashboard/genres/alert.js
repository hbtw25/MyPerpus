import { handleClick } from "../../index";

document.documentElement.addEventListener("click", function (event) {
    const unique = event.target.dataset.unique ?? "";

    // Destroy
    if (event.target && event.target.matches("[data-confirm-genre-destroy]"))
        handleClick({
            data: { unique },
            event: {
                noun: "genre",
                verb: "non-active",
                method: "DELETE",
            },
            uri: "/dashboard/genres",
            redirect: "/dashboard/genres",
        });

    // Activate
    if (event.target && event.target.matches("[data-confirm-genre-activate]"))
        handleClick({
            data: { unique },
            event: {
                noun: "genre",
                verb: "activate",
                method: "PUT",
            },
            uri: "/dashboard/genres/activate",
            redirect: "/dashboard/genres",
        });
});
