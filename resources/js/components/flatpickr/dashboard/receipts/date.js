import { dateFormat } from "../../index";
import moment from "moment";

const localDate = moment().format("YYYY-MM-DD");
const gapNumber = 10; // 7 days
const dateGapBetweenFromAndTo = moment().day(gapNumber).format("YYYY-MM-DD");
const dateToDefaultStart = moment().day(4).format("YYYY-MM-DD"); // Start on 1 day after the current day

const config = {
    from: {
        dateFormat: "Y-m-d",
        minDate: localDate,
        maxDate: localDate,
    },
    to: {
        dateFormat: "Y-m-d",
        minDate: dateToDefaultStart,
        maxDate: dateGapBetweenFromAndTo,
        defaultDate: dateToDefaultStart,
    },
};

dateFormat(".flatpickr-from", config.from);
dateFormat(".flatpickr-to", config.to);
