export function handleClick({ data, event, uri, redirect = uri }) {
    const config = {
        title: "Apa kamu yakin?",
        text: `Kamu akan ${event.verb}  ${event.noun} ini.`,
        icon: "question",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: "Ya, lakukanlah!",
        denyButtonText: `Gak Dulu ...`,
    };

    Swal.fire(config).then(async (result) => {
        if (result.isConfirmed) {
            const req = await fetch(`${uri}/${data.unique}`, {
                method: event.method,
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify(data),
            });

            const res = await req.json();

            const message = res.message;
            const successResponse = {
                title: "Berhasil!",
                text: message,
                icon: "success",
            };
            const errorResponse = {
                title: "Error!",
                text: message,
                icon: "error",
            };

            if (req.ok)
                return Swal.fire(successResponse).then(
                    () => (window.location.href = redirect),
                );

            return Swal.fire(errorResponse).then(
                () => (window.location.href = redirect),
            );
        }
    });
}
