import { BUTTON_TYPES } from "./constants";
import { ICONS } from "./icons";

export function isButtonTypeValid(type) {
    return BUTTON_TYPES.includes(type);
}
export function isIconValid(icon){
    return Object.keys(ICONS).includes(icon)
  }


export function isString(label) {
    return typeof label === "string";
}

export function isNull(value) {
    return value === null;
}
export function isUndefined(value) {
    return value === undefined;
}
export function isNumber(value) {
    return typeof value === "number";
}
