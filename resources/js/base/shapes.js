import breakpoints from "../utils/breakpoints";

const upShape = document.body.querySelector("#up-shape");
const downShape = document.body.querySelector("#down-shape");
const upShapePath = "assets/shapes/up-shape.png";
const downShapePath = "assets/shapes/down-shape.png";
const upShapeBigPath = "assets/shapes/up-shape-1920.png";
const downShapeBigPath = "assets/shapes/down-shape-1920.png";

const shapesChangeSize = () => {
    if (window.innerWidth >= breakpoints["2xl"])
        shapesBig("src", upShapeBigPath, downShapeBigPath);
    if (window.innerWidth <= breakpoints["2xl"])
        shapesSmall("src", upShapePath, downShapePath);
};

const shapesSmall = (attribute, upPath, downPath) => {
    upShape.setAttribute(attribute, upPath);
    downShape.setAttribute(attribute, downPath);
};

const shapesBig = (attribute, upPath, downPath) => {
    upShape.setAttribute(attribute, upPath);
    downShape.setAttribute(attribute, downPath);
};

export default shapesChangeSize;
