import { handleClick } from "../../index";

document.documentElement.addEventListener("click", function (event) {
    const unique = event.target.dataset.unique ?? "";

    // Destroy
    if (
        event.target &&
        event.target.matches("[data-confirm-your-review-destroy]")
    )
        handleClick({
            data: { unique },
            event: {
                noun: "book review",
                verb: "remove",
                method: "DELETE",
            },
            uri: "/dashboard/reviews",
            redirect: "/dashboard/reviews",
        });

    // Destroy
    console.log(
        event.target &&
            event.target.matches("[data-confirm-your-review-photo-destroy]"),
    );
    if (
        event.target &&
        event.target.matches("[data-confirm-your-review-photo-destroy]")
    )
        handleClick({
            data: { unique },
            event: {
                noun: "book review's photo",
                verb: "remove",
                method: "DELETE",
            },
            uri: "/dashboard/reviews/destroy-your-review-photo",
            redirect: "/dashboard/reviews",
        });
});
