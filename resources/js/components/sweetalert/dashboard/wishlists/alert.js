import { handleClick } from "../../index";

document.documentElement.addEventListener("click", function (event) {
    const unique = event.target.dataset.unique ?? "";

    // Destroy
    if (event.target && event.target.matches("[data-confirm-wishlist-destroy]"))
        handleClick({
            data: { unique },
            event: {
                noun: "wishlist",
                verb: "remove",
                method: "DELETE",
            },
            uri: "/dashboard/wishlists",
            redirect: "/dashboard/wishlists",
        });
});
