const defaultConfig = {
    dateFormat: "Y-m-d",
};

export function dateFormat(className = ".flatpickr", config = defaultConfig) {
    flatpickr(className, config);
}
